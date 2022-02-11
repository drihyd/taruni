<?php

namespace App\Http\Controllers;

use App\Models\Bulk_images_upload;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use App\Models\Product_Images;
use Yajra\DataTables\DataTables;
use App\Models\Categories;
use Image;
use Illuminate\Support\Str;
use File;

class BulkImagesUploadController extends Controller
{
    public function dropzone(Request $request)
    {

        
        

         



        $filename=$request->file('filename');
        // if(\File::exists('assets/uploads/products/'.$filename)){
           
        //     $images = \File::file_get_contents('assets/uploads/products/'.$filename);
        // }
        // $images = \File::allFiles('assets/uploads/products/');
      
      if($request->cat){
           $cat_id = Crypt::decryptString($request->cat);
			$Categories=Categories::where("id",$cat_id)->orderBy('name', 'ASC')->first();
            $pageTitle = $Categories->name." Images Upload";
      }
      else{
        $cat_id = $request->catid;
        $Categories=Categories::where("id",$cat_id)->orderBy('name', 'ASC')->first();
        $pageTitle ="Images Upload";
      }


       
        
        if ($request->ajax()) {

                $images = DB::table('product_images')
                ->select('product_images.*','categories.product_upload_path as pathname','categories.name as cname')
                ->leftjoin('categories','categories.id','=','product_images.cat_id')
                ->where('product_images.cat_id',$cat_id)
                ->orderBy('id', 'DESC')
				 ->orderBy('product_images.image', 'DESC')
                ->get();


            return Datatables::of($images)
                    ->addIndexColumn()
                    ->addColumn('thumbnails', function($row){
     
                           $file_path = url('public/products/'.$row->thumbnail);
                            $pic = "<img src='$file_path' width='50' class='d-flex align-items-center' />";
                            
                             return $pic;
                    })   
					->addColumn('skucode', function($row){     
                           $skucode = $row->image;
							return $skucode = Str::of($row->image)->basename();
						   
					
						 
                    })
                    ->addColumn('large', function($row){
     
                           $file_path = url('public/products/'.$row->image);
                            $pic = "<img src='$file_path' width='50' class='d-flex align-items-center' />";
                            
                             return $pic;
                    })
                    
                    ->addColumn('action', function($row){
     
                           $btn = "<a href='javascript:void(0);' data-id='$row->id'' class='nddelete delete' data-toggle='tooltip' data-original-title='Delete'><i class='fas fa-trash-alt'></i></a>";
                        return $btn;
                    })
                    
                    ->rawColumns(['action','thumbnails','large'])
                    ->make(true);

                    exit();
        }

        // echo '<pre>'; print_r($images); exit();

  
		
		
        return view('admin.bulk_images_upload.dropzone-view',compact('pageTitle','cat_id'));
    }
     
    /**
     * Image Upload Code
     *
     * @return void
     */
    public function dropzoneStore(Request $request)
    {
        

        $request->hasFile('file');   
        $image=$request->file('file');
        $imageName = $image->getClientOriginalName();
        $filename = str_replace(' ', '_', $imageName);
		
		
		$this->imgResize($request);
		
		
   /*      $request->file->move(('assets/uploads/products'),$filename);
        return response()->json(['success'=>$filename]);

		*/
    }
	
	
	
	public function imgResize($request)
    {
        $this->validate($request, [
                  'file' => 'required|image|mimes:jpg,jpeg,png',
        
        ]);

        $image = $request->file('file');
		
		
		$imageName = $image->getClientOriginalName();
		$imageName = str_replace(' ', '_', $imageName);
		
		
        $input['product_image'] = $imageName;
		

		$Categories=Categories::where("id",$request->cat_id)->orderBy('name', 'ASC')->first();
		$category_foldername=$Categories->product_upload_path;
		
		
		$image_path_check= public_path("products/$category_foldername/large/".$input['product_image']);
	
	   $image_chked=$this->image_is_exist($image_path_check);
	   
	   
	   if($image_chked==false){
		

        // Get path of thumbnails folder from /public
        $thumbnailFilePath = public_path("products/$category_foldername/thumbnails");

        //$image->move($thumbnailFilePath, $input['product_image']);


        $img = Image::make($image->path());

        // Image resize to given aspect dimensions
        // Save this thumbnail image to /public/thumbnails folder
    
        
        $img->resize(200, 200, function ($const) {
            $const->aspectRatio();
        })->save($thumbnailFilePath . '/' . $input['product_image']);
		
		
		
		
		
		
		

        // Product images folder
        $ImageFilePath1 = public_path("products/$category_foldername/large");

        // Store product original images
        $image->move($ImageFilePath1, $input['product_image']);
		
		
		//$img1 = Image::make($image->path());
		
		       // Save this thumbnail image to /public/thumbnails folder
		       
		       
		       /*
        $img1->resize(1000, 1000, function ($const1) {
            $const1->aspectRatio();
        })->save($ImageFilePath1 . '/' . $input['product_image']);
        */
		

        $Product_Images = new Product_Images();
		
		$string =$input['product_image'];
		$parts = explode('_', $string);
		$product_code = null;
		if (count($parts) <= 10) {
		$product_code = $parts[0]." ".$parts[1];
		}

        $Product_Images->image = "$category_foldername/large/" .$input['product_image'];
		$Product_Images->cat_id =$request->cat_id;
		$Product_Images->product_code =$product_code??null;
        $Product_Images->thumbnail = "$category_foldername/thumbnails/" .$input['product_image'];
        $Product_Images->save();
		
		 return response()->json(['success'=>"Success! Image are uploaded successfully" ]); 
	   }
	   else{
		  return response()->json(['error'=>"This $imageName file already exist" ]); 
	   }

      
    }



public function image_unlink($image_path1=null){
	
	            if(\File::exists($image_path1)){
				unlink($image_path1);
            }


            if(\File::exists($image_path2)){
				unlink($image_path2);
            }
	
}


public function image_is_exist($image_path=null){	
            if(\File::exists($image_path)){
				return true;
            }
           else{
				return false;
            }
	
}
	
	
    public function destroy(Request $request)
    {
		


        $images = DB::table('product_images')
                ->select('product_images.*','categories.product_upload_path as pathname','categories.name as cname')
                ->leftjoin('categories','categories.id','=','product_images.cat_id')
                ->where('product_images.id',$request->id)
                ->orderBy('id', 'DESC')
                ->get()->first();

        

            


                 $image_path1 = public_path("products/".$images->image);
                 $image_path2 = public_path("products/".$images->thumbnail);



 


            if(\File::exists($image_path1)){
            unlink($image_path1);
            }

            if(\File::exists($image_path2)){
            unlink($image_path2);
            }



		$query = DB::table('product_images')
		->select('product_images.*','categories.product_upload_path as pathname','categories.name as cname')
		->leftjoin('categories','categories.id','=','product_images.cat_id')
		->where('product_images.id', $request->id)
		->delete();

      
        return Response()->json(['message'=>"Success! Image is deleted successfully."]);

        

    }

    
}
