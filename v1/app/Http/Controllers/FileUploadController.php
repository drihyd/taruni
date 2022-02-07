<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function showUploadForm()
    {
        
  
        return view('frontend.upload');
    }
    
    
    public function upload(Request $request)
{
     $resizedImage = cloudinary()->upload($request->file('image')->getRealPath(), [
            'folder' => 'uploads',
            'transformation' => [
                      'width' => 100,
                      'height' => 100,
              ‘crop’ => ‘limit’
             ]
])->getSecurePath();


}
}