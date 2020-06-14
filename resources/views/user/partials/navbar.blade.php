<div class="container-fluid bg-faded">
  <div class="container">
      <nav class="navbar navbar-toggleable-md navbar-light ">
          <button class="navbar-toggler navbar-toggler-right mt-3" type="button" data-toggle="collapse"
                  data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                  aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
          <a class="navbar-brand" href="#"><img src="{{ asset('user-style/images/Capture2.PNG')}}" alt="img" class="mobile_logo_width"/></a>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                  <li class="nav-item {{ (Route::currentRouteName() == 'beranda.index') ? 'active' : '' }}">
                      <a class="nav-link" href="{{ route('beranda.index')}}">Beranda <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item {{ (Route::currentRouteName() == 'profilupt.index') ? 'active' : '' }}">
                      <a class="nav-link" href="{{ route('profilupt.index') }}">Profil <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item {{ (Route::currentRouteName() == 'loker.index') ? 'active' : '' }}">
                      <a class="nav-link" href="{{ route('loker.index') }}">Info Lowongan <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item {{ (Route::currentRouteName() == 'pelatihan.index') ? 'active' : '' }}">
                      <a class="nav-link" href="{{ route('pelatihan.index')}}">Pelatihan <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item {{ (Route::currentRouteName() == 'kontak.index') ? 'active' : '' }}">
                      <a class="nav-link" href="{{ route('kontak.index') }}">Kontak <span class="sr-only">(current)</span></a>
                  </li>
              </ul>
          </div>
          @if (! Auth::guard('user')->user())
            <a class="btn btn-outline-success" href="/login">Login <span class="sr-only">(current)</span></a>
          @else
            <a class="btn btn-default" href="{{ route('profile.upcoming')}}"><i class="fa fa-user-circle-o" aria-hidden="true"></i> {{Auth::guard('user')->user()->name}} </span></a>
            <a class="btn btn-outline-danger" href="/logout">Logout <span class="sr-only">(current)</span></a>
          @endif
      </nav>   
  </div>
</div>
