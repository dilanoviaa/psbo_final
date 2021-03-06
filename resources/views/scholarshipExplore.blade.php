@extends('templates.master')

@section('header')

    <header class="masthead" style="background-image: url({!! asset('assets/img/ipba.jpg') !!})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-8">
                    <div class="post-heading">
                        <h1>Info Beasiswa</h1>
                        <span class="subheading">Informasi Beasiswa IPB</span>
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
                @if ($jumlah == 0)
                    Maaf pencarian tidak ditemukan.
                @else
                    @foreach($tag->scholarships as $scholarship)
                        <div class="post-preview">
                        <a href="{{ route('description.viewDescription', $scholarship->id) }}">
                            <h3 class="post-subtitle">
                            {{$scholarship->name}}
                            </h3>
                            {{$scholarship->firm}}
                        </a>
                        @if($scholarship->created_at != null)
                            <p class="post-meta">Posted by
                            {{$scholarship->getDay()}} {{$scholarship->getMonth()}}</p>
                        @endif

                        </div>
                        <hr>
                    @endforeach
                @endif


                    
                    
                </div>

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
@endsection