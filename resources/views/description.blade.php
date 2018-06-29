@extends('templates.master')

@section('header')
     <!-- Page Header -->
     <header class="masthead" style="background-image: url({!! asset('assets/img/ipba.jpg') !!})">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-8 col-xs-8">
            <div class="post-heading">
                <h3>"Searching and Serving The Best"</h3>
            </div>
          </div>
        </div>
      </div>
    </header>
@endsection()

@section('content')
{{-- <section class="section blog-area">
      <div class="container">
        <div class="row"> --}}
          {{-- <div class="col-md-12 col-sm-12 col-xs-12"> --}}
            <div class="col-md-9 col-sm-9 col-xs-9">
                <h4>{{$scholarships->name}}</h4>
                {{-- <h2 class="subheading">{{$scholarships->firm}}</h2> --}}
                <span class="meta"><small>Posted on</small>
                {{$scholarships->getDate()}}</span>

                {!! $scholarships->description !!}
            <div class="form-group">
                <div class="col-md-9">
                  <b>Syarat:</b>
                  <ul>
                    <li>Program     : {{$requirements->program}} </li>
                    <li>Fakultas    : {{$requirements->faculty}} </li>
                    <li>Semester    : {{$requirements->semester}} </li>
                    <li>IPK minimal : {{$requirements->gda}} </li>
                  </ul>
                </div>
            </div>
            </div>
            {{-- <div class=""></div> --}}
                  <div class="col-md-1 col-sm-1 col-xs-1">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="sidebar-section tags-area">
                            <h4 class="title"><b class="light-color">Tags</b></h4>
                            <ul class="tags">
                              @foreach ($tags as $tag)
                                <li><a class="btn" href="{{ route('user.explore', $tag->id) }}">{{$tag->name}}</a></li>    
                              @endforeach  
                              
                                
                            </ul>
                        </div><!-- sidebar-section tags-area -->
                    </div>
                  {{-- </div> --}}
                {{-- </div>
              </div>
            </section> --}}
                
                  <!-- Pager -->
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="col-md-7 col-sm-7 col-xs-7">
        
              </div>
        
              @if (jumlah != 0)
                  <div class="col-md-2 col-sm-2 col-xs-2">
                      <div class="clearfix">
                          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
                      </div>
                  </div>
              @endif
              
                
            </div>
 
  @endsection()
