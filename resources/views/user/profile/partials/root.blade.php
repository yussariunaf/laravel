@extends('user.app.root')

@section('css')
    @yield('sub-css')
@endsection

@section('content')
<div class="container col-8 offset-2 mt-2 mb-2">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link 
        {{ (Route::currentRouteName() == 'profile.upcoming') ? 'bg-success text-white active' : '' }}" 
        href="{{ route('profile.upcoming') }}">Tickets</a>
    </li>
    {{-- <li class="nav-item">
      <a class="nav-link {{ (Route::currentRouteName() == 'profile.past') ? 'bg-success text-white active' : '' }}" 
        href="{{ route('profile.past') }}">Past</a>
    </li> --}}
    <li class="nav-item">
      <a class="nav-link 
        {{ (Route::currentRouteName() == 'profile.certificate.frm') ? 'bg-success text-white active' : '' }}" 
        href="{{ route('profile.certificate.frm') }}">Sertifikat</a>
    </li>
  </ul>
  @yield('sub-content')
</div>
@endsection