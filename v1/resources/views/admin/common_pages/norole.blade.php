<!-- Sidebar -->
<nav id="sidebar">
<div class="sidebar-header">
    
    @php
$theme_options_data=DB::table('themeoptions')->get()->first();
@endphp
                  <img src="{{URL::to('assets/uploads/'.$theme_options_data->header_logo??'')}}" class="img-fluid">

</div>
<ul class="list-unstyled components sidebar-accordions">

<div id="accordion">
<li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('admin.logout')}}">Logout</a></li>

</div>
</ul>

</nav>