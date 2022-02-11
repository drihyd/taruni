<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">

      <button type="button" id="sidebarCollapse" class="btn btn-togglebar">
          <i class="fas fa-align-left"></i>
          <!-- <span>Toggle Sidebar</span> -->
      </button>

      <div class="dropdown pull-right header-user-dropdown" style="display: inline-block;">
      <button class="btn btn-admin dropdown-toggle pr-4" type="button" id="userDropMenu" data-toggle="dropdown">
      {{Str::Title(substr(auth()->user()->firstname??'',0,1))}}{{Str::Title(substr(auth()->user()->lastname??'',0,1))}}</button>

      <ul class="dropdown-menu" role="menu" aria-labelledby="userDropMenu">
	  
	  @if(Auth::user()->role==1 || Auth::user()->role==4)
		 <a role="menuitem" tabindex="-1" href="{{url(\GetRolecode::_getRolecode(Auth::user()->role??'').'/profile')}}"><li role="presentation">Profile</li></a>
		  @elseif(Auth::user()->role==2)
			 <a role="menuitem" tabindex="-1" href="#"><li role="presentation">Profile</li></a>
		  @elseif(Auth::user()->role==3)
			 <a role="menuitem" tabindex="-1" href="#"><li role="presentation">Profile</li></a>
		  @else
			
		  @endif
		  
     
      <a role="menuitem" tabindex="-1" href="{{route('admin.logout')}}"><li role="presentation">Logout</li></a>
      </ul>
    </div>
  </div>
</nav>