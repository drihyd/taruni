@php

$footer_widget=DB::table('menus')->select('menu_column_grid')->distinct()->where("menu_category","footer-widget-1")->orderBy('menu_column_grid','ASC')->get(); 





    foreach ($footer_widget as $key => $menu) {

            $footer_widget[$key]->menu_column_grid = DB::table('menus')->select('menus.*')->orderBy('menu_sorting','ASC')

            ->where('menus.menu_column_grid', "$menu->menu_column_grid")          

            ->where('menus.menu_category', "footer-widget-1") 

            ->where('menus.is_active', "Yes")         

            ->get(); 

        }

 @endphp 

 @php

$page_data= DB::table('pages')->get(); 



@endphp



@php

$rolein=Auth::user()->role??'';

@endphp



 <section class="bg-footer footer-sec pb-3 pt-4 hidden-print">

      <div class="container pt-2">

        @if($footer_widget)

        <div class="row">

          <div class="col-sm-6">

            <div class="wrapper mb-4">

              <h4 class="text-dark">Categories</h4>

              <div class="row">

                  <div class="col-sm-6">

                      

                      <p><a href="{{ URL('/category/anarkali')}}">Anarkali</a></p>

                      <p><a href="{{ URL('/category/gowns')}}">Gowns</a></p>

                      <p><a href="{{ URL('/category/kurtis')}}">kurtis</a></p>

                      <p><a href="{{ URL('/category/leggings')}}">Leggings</a></p>

                      <p><a href="{{ URL('/category/straight-cut-suits')}}">Straight Cut Suits</a></p>

                  </div>

                  <div class="col-sm-6">

                      <p><a href="{{ URL('/category/lehengas')}}">Lehengas</a></p>

                      <p><a href="{{ URL('/category/pants')}}">Pants</a></p>

                      <p><a href="{{ URL('/category/juttis')}}">Juttis</a></p>

                      <p><a href="{{ URL('/category/shararas-ghararas')}}">Shararas/Ghararas</a></p>

                      <p><a href="{{ URL('/category/kids-wear')}}">Kids</a></p>
                  </div>

              </div>

            </div>

          </div>

          <div class="col-sm-3">

            <div class="wrapper mb-4">

              <h4 class="text-dark">Collections</h4>

              <p><a href="{{ URL('collections/festive-collection')}}">Festive Collection</a></p>

              <p><a href="{{ URL('collections/regal-lehengas')}}">Regal Lehengas</a></p>

              <p><a href="{{ URL('collections/everyday-fashion')}}">Everyday Fashion</a></p>

            </div>

          </div>

          <div class="col-sm-3">

            <div class="wrapper mb-4">

              <h4 class="text-dark">Help</h4>

              <p><a href="{{ URL('locations')}}">Our Stores</a></p>
              <p><a href="https://taruni.in/blog">Blog</a></p>

              <div class="subscribe-form pt-3">

                

                 <form action="#" method="post" data-parsley-validate id="newslettersform">
           @csrf
            <div class="input-group mb-3">                          
              <input type="email" name="email" id="email" placeholder="Your Email" class="email-field"  data-parsley-type="email">
              <span class="input-group-btn">
              <button type="button" class="btn btn-brand btn-subscribe text-bright newslettersubmit">Subscribe</button>
              </span>                       
            </div>
          </form>
                  

                </div>

            </div>

          </div>

          @foreach($footer_widget as $key => $value)

            @foreach($value->menu_column_grid as $key1 => $value1)

                  @if($value1->is_heading=="Yes")

          <div class="col-sm-3">

            <div class="wrapper mb-4">

              <h4 class="text-dark">{{ucwords($value1->menu_name)}}</h4>

              @else

              <p><a href="{{$value1->menu_url??''}}">{{ucwords($value1->menu_name)}}</a></p>

              @endif

               @endforeach

            </div>

          </div>

       

        @endforeach

      @endif

        </div>







    

  <div class="row">

      <div class="col-sm-4">





        



          <div class="social-links">

              <p>

                <a href="{{$theme_options_data->facebook_url??''}}" class="facebook-link" target="_blank"><i class="fab fa-facebook-square"></i></a>

                <a href="{{$theme_options_data->instagram_url??''}}" class="instagram-link" target="_blank"><i class="fab fa-instagram-square"></i></a>

                <a href="{{$theme_options_data->twitter_url??''}}" class="twitter-link" target="_blank"><i class="fab fa-twitter-square"></i></a>

                <a href="{{$theme_options_data->pinterest_url??''}}" class="pinterest-link" target="_blank"><i class="fab fa-pinterest-square"></i></a>

                <a href="{{$theme_options_data->youtube_url??''}}" class="youtube-link" target="_blank"><i class="fab fa-youtube"></i></a> 

              </p>

            </div>

      </div>

      <div class="col-sm-8">

          <div class="terms-links">

            @if($page_data)

              <p>

                @foreach($page_data as $page)

            <a href="{{ URL('/'.$page->slug??'')}}">{{$page->name??''}}</a>  

            @endforeach

              </p>

              @endif

            </div>
           

      </div>

  </div>  

  <div class="row">
    <div class="col-sm-6">
      <div>
          <p class="small">{{$theme_options_data->copyright??''}}</p>
        </div>
    </div>
    <div class="col-sm-6">
      <div class="payment-card-images">
          <img src="{{url('assets/img/payment_cards.png')}}" class="img-fluid float-sm-right pr-3" width="150px">
        </div>
    </div>
  </div>
    

      </div>

    </section>

  <div class="fixedfloating">

    <a href="https://api.whatsapp.com/send?phone=918977528118" class="floatwhatsapp" target="_blank">

    <i class="fab fa-whatsapp my-float"></i></a>

  </div>

