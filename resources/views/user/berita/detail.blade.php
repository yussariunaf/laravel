@extends('user.app.root')

@section('content')
  <div class="container offset-2 col-8 p-2 mt-3">
    <div class="h3">
      {{ $news->title }}
    </div>
    <p>By: UPT UPNVJ</p>
    <hr/>
    <p>Posted on {{ date('M d, Y', strtotime($news->created_at)) }} at {{ date('g:i A', strtotime($news->created_at)) }}</p> 
    <hr/>
    <div class="mt-2">
      {!! $news->body !!}
    </div>
  </div>
@endsection