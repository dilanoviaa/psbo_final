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
                <p>
                        <img src="{{$scholarships->getImage()}}" alt="" style="width:400px;height:500px;"></p>
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

         {{-- FORM COMMENT --}}
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="col-md-7 col-sm-7 col-xs-7">
                    {{-- <div class="container" >
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="panel panel-info">
                                        <div class="panel-body">
                
                <form action="{{ route('comment.store', $scholarships->id) }}" method="post"  enctype="multipart/form-data">
                  {{ csrf_field() }}

                  <div class="form-group">

                    <div class="item form-group">
                      <label class="control-label col-md-2" for="textarea">Deskripsi <span class="required">*</span>
                      </label>
                      <div class="col-md-9">
                        <textarea id="konten" required="required" value="{{old('content')}}" name="content" class="form-control col-md-9 col-xs-12" required="required"></textarea>
                      </div>
                    </div>
                   </div>
  
                      <div class="form-group">
                          <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Submit</button>
                          </div>
                      </div>
                  
                </form>
            </div>
        </div>
    </div>
</div>
</div> --}}
                {{-- END FORM --}}

                 <!-- Comment Box - START -->
                  <div class="container" >
                      <div class="row">
                          <div class="col-sm-8">
                              <div class="panel panel-info">
                                  <div class="panel-body">
                                      
                                      <form action="{{ route('comment.store', $scholarships->id) }}" method="post"  enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                            <textarea id="konten" required="required" value="{{old('content')}}" name="content" placeholder="Write your comment here!" class="pb-cmnt-textarea"></textarea>
                                            </div>
                                            <div class="form-group">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <link href= "{{ asset('css/boxcoment.css') }}" rel="stylesheet">
                  <!-- Comment Box - END -->


                  <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
                 
                  <div class="container">
                      <div class="row">
                        <div class="col-sm-8">
                         @foreach ($comments as $comment)  
                          <div class="panel panel-info">
                             <div class="panel-body">
                                <div class="pull-left meta">
                                    <div class="title h5">
                                        @if ($comment->admin_id)
                                            <a href="#"><b>{{$comment->name}} (Admin)</b></a>
                                            made a post.
                                        @else
                                            <a href="#"><b>{{$comment->name}}</b></a>
                                            made a post.
                                        @endif
                                          
                                          </div>
                                          <h6 class="text-muted time">{{$comment->GetDate()}}</h6>
                                      </div>
                                  </div>  
                                  <div class="post-description">
                                      <p>{{$comment->content}}</p>
                                  <link href= "{{ asset('css/coment.css') }}" rel="stylesheet">     
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
            </article>
        

                <br>
                <br>
                {{-- SHOW COMMENT --}}
                {{-- @foreach ($comments as $comment)
                    {{$comment->content}}
                    <br>
                    {{$comment->name}}
                    <br>
                @endforeach --}}
                {{-- END SHOW COMMENT --}}
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
