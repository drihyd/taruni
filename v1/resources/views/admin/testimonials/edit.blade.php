@extends('theme.default')
@section('content')
<!-- <div class="mb-0 mt-4">
<h4 class="font-weight-bold">Edit Projects</h4>
</div> -->


            <div class="card  rounded-0" id="aboutLocation">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-md-5">
                            <label for="" class="">
                                <img src="{{ url('uploads/' . $projects->project_logo) }}" class="logo" alt="" width="200">
                            </label>
                            <p class="font-weight-bold">{{$projects->rera_number}}</p>
                        </div>
                        <div class="col-md-5 text-right">
                            <p class="font-weight-bold">{{$projects->name}}</p>
                            <p>{{$projects->address1}}</p>
                            <p>{{$projects->address2}}</p>
                        </div>
                    </div>
                </div>
             

          </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong> 
            <ul>
                @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    
    <form action="/edit" method="POST" enctype="multipart/form-data">
        @csrf

         <input type="hidden" name="id" value="{{$projects->id}}">

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Location<span style="color: red">*</span>:</strong>
                    <select name="location" class="form-control">
                        <option value="">--Select--</option>
                        <option value="Chennai"   @if ($projects->location=="Chennai") selected  @endif>Chennai</option>
                        <option value="Hyderabad" @if ($projects->location=="Hyderabad") selected  @endif>Hyderabad</option>
                    </select>
                </div>
                <div class="form-group">
                    <strong>Name<span style="color: red">*</span>:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{$projects->name}}">
                </div>    

                <div class="form-group">
                <strong>Logo<span style="color: red">*</span>:</strong>
                <input type="file" name="project_logo" class="file-input">
                </div>


                <div class="form-group">
                @if($projects->project_logo)
                <img src="{{ url('uploads/' . $projects->project_logo) }}" width="100" />
                @else
                <p>No logo found</p>
                @endif
                </div>

                <div class="form-group">
                    <strong>RERA No:</strong>
                    <input type="text" name="rera_number" class="form-control" placeholder="RERA No" value="{{$projects->rera_number}}">
                </div>

                    <div class="form-group">
                    <strong>Address1:</strong>
                     <input type="text" class="form-control" name="address1" placeholder="Address1" value="{{$projects->address1}}">
                </div>

                <div class="form-group">
                    <strong>Address2:</strong>
                     <input type="text" class="form-control" name="address2" placeholder="Address2" value="{{$projects->address2}}">
                </div>

                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:50px" name="description"
                        placeholder="description">{{$projects->description}}</textarea>
                </div>
               
          <!--       <div class="form-group">
                    <strong>Latitude:</strong>
                    <input type="text" name="latitude" class="form-control" placeholder="Latitude" value="{{$projects->latitude}}">
                </div>
                  <div class="form-group">
                    <strong>Longitude:</strong>
                    <input type="text" name="longitude" class="form-control" placeholder="Longitude" value="{{$projects->longitude}}">
                </div> -->

               


              <div class="form-group">
                <strong>Project price list:</strong>
                <input type="file" name="project_price_list" class="file-input">
                </div>
                <div class="form-group">
                @if($projects->project_price_list)
                <img src="{{ url('uploads/' . $projects->project_price_list) }}" width="100" />
                @else
                <p>No price list found</p>
                @endif
                </div>

                <div class="form-group">
                <strong>Project Brochure:</strong>
                <input type="file" name="project_brochure" class="file-input">
                </div>
                <div class="form-group">
                @if($projects->project_brochure)
                <img src="{{ url('uploads/' . $projects->project_brochure) }}" width="100" />
                @else
                <p>No brochure found</p>
                @endif
                </div>

                  <div class="form-group">
                    <strong>Tentative EMI starting from:</strong>
                    <input type="text" name="tentativ_emi_starting" class="form-control" placeholder="Tentative EMI starting from" value="{{$projects->tentativ_emi_starting}}">
                </div>

  <!--                <div class="form-group">
                    <strong>Neighbourhood Facilities:</strong>
    <input id="neigh_facilities" type="hidden" name="neigh_facilities">
   <trix-editor >{{$projects->neigh_facilities}}</trix-editor> 
<textarea name="neigh_facilities" class="form-control"> {{$projects->neigh_facilities}}</textarea>
                    
                </div> -->



                  
      
                <button type="submit" class="btn btn-primary font-weight-bold">Submit</button>
            </div>


             <div class="col-xs-12 col-sm-12 col-md-6">


                 <div class="form-group">
                <strong>Banner1<span style="color: red">*</span>:</strong>
                <input type="file" name="banner" class="file-input" >
                </div>
                <div class="form-group">
                @if($projects->banner)
                <img src="{{ url('uploads/' . $projects->banner) }}" width="100" />
                @else
                <p>No image found</p>
                @endif
                </div>

                <div class="form-group">
                <strong>Banner2:</strong>
                <input type="file" name="banner_2" class="file-input" >
                </div>
                <div class="form-group">
                @if($projects->banner_2)
                <img src="{{ url('uploads/' . $projects->banner_2) }}" width="100" />
                @else
                <p>No image found</p>
                @endif
                </div>

                <div class="form-group">
                <strong>Banner3:</strong>
                <input type="file" name="banner_3" class="file-input" >
                </div>
                <div class="form-group">
                @if($projects->banner_3)
                <img src="{{ url('uploads/' . $projects->banner_3) }}" width="100" />
                @else
                <p>No image found</p>
                @endif
                </div>

                <div class="form-group">
                <strong>Masterplan:</strong>
                <input type="file" name="master_plan_blueprint" class="file-input">
                </div>
                <div class="form-group">
                @if($projects->master_plan_blueprint)
                <img src="{{ url('uploads/' . $projects->master_plan_blueprint) }}" width="100" />
                @else
                <p>No image found</p>
                @endif
                </div>

                 <div class="form-group">
                    <strong>SEO title:</strong>
                    <input type="text" name="seo_title" class="form-control" placeholder="SEO title" value="{{$projects->seo_title}}">
                </div>  

                   <div class="form-group">
                    <strong>SEO Description:</strong>
                    <input type="text" name="seo_description" class="form-control" placeholder="SEO Description" value="{{$projects->seo_description}}">
                </div>
                  <div class="form-group">
                    <strong>SEO Keywords:</strong>
                    <input type="text" name="seo_keywords" class="form-control" placeholder="SEO Keywords" value="{{$projects->seo_keywords}}">
                </div>


            </div>


        </div>

    </form>

   


    @endsection