<div class="paddingleftright pt-2 pb-5" >
<div class="row" id="floorplans">
@foreach ($testimonials as $testimonial)



 <div class="col-md-6">
                    <div class="card  rounded-0" id="aboutLocation">
                        <div class="card-body">
                            <div class="media">
                                <img class="mr-3 img-circle" src="{{url('assets/uploads/'.$testimonial->image) }}" alt="" width=150>
                                <div class="media-body">
                                    {{$testimonial->description}}
                                  <h5 class="mt-2">{{$testimonial->name}}</h5>
                                </div>
                              </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{url('admin/edit_testimonials/'.$testimonial->id)}}" class="edit mr-2" title="Edit" ><i class="fas fa-pen"></i></a>
                            <a href="{{url('admin/delete_testimonials/'.$testimonial->id)}}" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')"><i class="fas fa-trash-alt"></i></a>
                        </div>
                  </div>
                </div>




@endforeach     
</div>	
</div>