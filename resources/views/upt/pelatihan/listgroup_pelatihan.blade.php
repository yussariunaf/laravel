<ul class="list-group list-group-horizontal mb-2" >
  <li class="list-group-item {{ (Route::currentRouteName() == 'upt.pelatihan.upcoming') ? 'list-group-item-primary' : '' }}">
    <a href="{{ route('upt.pelatihan.upcoming') }}">Pelatihan yang akan datang</a>
  </li>
  <li class="list-group-item {{ (Route::currentRouteName() == 'upt.pelatihan.today') ? 'list-group-item-primary' : '' }}">
    <a href="{{ route('upt.pelatihan.today')}}">Pelatihan saat ini</a>
  </li>
  <li class="list-group-item {{ (Route::currentRouteName() == 'upt.pelatihan.past') ? 'list-group-item-primary' : '' }}">
    <a href="{{ route('upt.pelatihan.past')}}">Pelatihan terdahulu</a>
  </li>
</ul>