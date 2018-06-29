@extends('templates.admins.master')

@section('content')
<div class="tags">
		<h4><b>Tags:</b></h4>
		@foreach ($tags as $tag)
		  <a href="{{ route('admin.testview', $tag->id) }}">{{ $tag->name }}</a>
		  <br>
		@endforeach
	  </div>


  
	


@endsection