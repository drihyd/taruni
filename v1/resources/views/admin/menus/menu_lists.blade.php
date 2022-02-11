@extends('admin.template_v1')
@section('content')
@include('admin.pagetitle')
@include('admin.alerts')
@include('admin.errors')
 <div class="paddingleftright pt-2 pb-5" >
          <div class="row">
                     <div class="col-md-12">
                        <div class="card h-100 mb-3 shadow">
                          <div class="card-header"><h3 class="text-white">Header Menu</h3></div>
                          <div class="card-body">
                            <div class="row">

  @foreach($parent_menu as $key => $value)
  
  <div class="col-sm-3">
  <div class="row">
  <div class="col-sm-8">
  <a href="#"><h3 class="d-inline mb-1" style="font-size:18px;">{{$value->parentmenu??''}} </h3></a>
  </div>
  <div class="col-sm-4">
  <div class="edit-delete">
  	@if($value->is_active == 'Yes') <i class="fas fa-check-circle" style="color:green; font-size: 12px;"></i> @else <i class="fas fa-times-circle" style="color:red; font-size: 12px;"></i> @endif
   &nbsp;<a href="{{url('admin/menu/edit/'.$value->parentmenuid)}}" class="edit mr-2" title="Edit" ><i class="fas fa-xs fa-pen"></i></a>
  <a href="{{url('admin/menu/delete/'.$value->parentmenuid)}}" class="delete" title="Delete"  onclick="return confirm('Are you sure to delete this?')"><i class="fas fa-xs fa-trash-alt"></i></a>
  </div>
  </div>
  </div>


@php

$subcat_mens=DB::table('menus')->select('menu_name as childname','id as childid','is_active')
->where('parent_id',$value->parentmenuid)
->where('child_id',0)
->orderBy('menu_sorting', 'ASC')  
->get();

@endphp



@foreach($subcat_mens as $key => $item_subcat)


			@if($value->mapping_sub_cat=="yes")
			  <div class="row">
			  <div class="col-sm-8">
			  <a href="#"><h4 class="d-inline mb-1">{{$item_subcat->childname??''}}</h4></a>
			  </div>
			  <div class="col-sm-4">
			  <div class="edit-delete">
			  	@if($item_subcat->is_active == 'Yes') <i class="fas fa-check-circle" style="color:green; font-size: 12px;"></i> @else <i class="fas fa-times-circle" style="color:red; font-size: 12px;"></i> @endif &nbsp;
			  <a href="{{url('admin/menu/edit/'.$item_subcat->childid)}}" class="edit mr-2" title="Edit" ><i class="fas fa-xs fa-pen"></i></a>
			  <a href="{{url('admin/menu/delete/'.$item_subcat->childid)}}" class="delete" title="Delete"  onclick="return confirm('Are you sure to delete this?')"><i class="fas fa-xs fa-trash-alt"></i></a>
			  </div>
			  </div>
			  </div>
			  @endif


  



       

				@if($value->mapping_sub_cat=="yes")


				 @php

				$subchild_cat_menus=DB::table('menus')->select('menu_name as subchildname','id as subchildid','is_active')
				->where('parent_id',$value->parentmenuid)
				->where('child_id',$item_subcat->childid) 
				->where('child_id','>',0)  
				->orderBy('menu_sorting', 'ASC')  
				->get();
				
				
				
				
				@endphp

				@foreach($subchild_cat_menus as $key => $item_subchildname)

				  <div class="row">
				  <div class="col-sm-8">
				  <a href="#"><p class="d-inline mb-1">{{$item_subchildname->subchildname??''}}</p></a>
				  </div>
				  <div class="col-sm-4">
				  <div class="edit-delete">
				  	@if($item_subchildname->is_active == 'Yes') <i class="fas fa-check-circle" style="color:green; font-size: 12px;"></i> @else <i class="fas fa-times-circle" style="color:red; font-size: 12px;"></i> @endif &nbsp;
				  <a href="{{url('admin/menu/edit/'.$item_subchildname->subchildid)}}" class="edit mr-2" title="Edit" ><i class="fas fa-xs fa-pen"></i></a>
				  <a href="{{url('admin/menu/delete/'.$item_subchildname->subchildid)}}" class="delete" title="Delete"  onclick="return confirm('Are you sure to delete this?')"><i class="fas fa-xs fa-trash-alt"></i></a>
				  </div>
				  </div>
				  </div>
				  @endforeach

				  @endif


@endforeach



         @if($value->mapping_sub_cat=="no")
         @php
        $subchild_cat_menus1=DB::table('menus')
		->select('menu_name as subchildname','id as subchildid','is_active')
        ->where('parent_id',$value->parentmenuid)
        ->where('child_id',0)   
        ->orderBy('menu_sorting', 'ASC')
        ->get();
        @endphp
        @foreach($subchild_cat_menus1 as $key => $item_subchildname)
          <div class="row">
          <div class="col-sm-8">
          <a href="#"><p class="d-inline mb-1">{{$item_subchildname->subchildname??''}}</p></a>
          </div>
          <div class="col-sm-4">
          <div class="edit-delete">
          	 @if($item_subchildname->is_active == 'Yes') <i class="fas fa-check-circle" style="color:green; font-size: 12px;"></i> @else <i class="fas fa-times-circle" style="color:red; font-size: 12px;"></i> @endif&nbsp;
          <a href="{{url('admin/menu/edit/'.$item_subchildname->subchildid)}}" class="edit mr-2" title="Edit" ><i class="fas fa-xs fa-pen"></i></a>
          <a href="{{url('admin/menu/delete/'.$item_subchildname->subchildid)}}" class="delete" title="Delete"  onclick="return confirm('Are you sure to delete this?')"><i class="fas fa-xs fa-trash-alt"></i></a>
          </div>
          </div>
          </div>
          @endforeach

          @endif







  </div>
  @endforeach









                  
</div>
</div>

</div>
    </div>
                        </div>
                      </div>

                  @endsection
