@extends('templates.admins.master')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
        <h2>Recent Activity</h2>
        <div class="clearfix"></div>
        </div>
        <div class="x_content">
                <ul class="messages">
                        @foreach($scholarships as $scholarship)
                        
                        <li>
                          
                          <div class="message_date">
                            <h3 class="date text-info">{{$scholarship->getDay()}}</h3>
                            <p class="month">{{$scholarship->getMonth()}}</p>
                          </div>
                          <div class="message_wrapper">
                            <h4 class="heading">{{$scholarship->name}}</h4>
                            <blockquote class="message"><h5>You just add Scholarship Post on {{$scholarship->getDate()}}</h5></blockquote>
                            
                            <p class="url">
                              <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                              <a href="{{ route('scholarship.view', $scholarship->id) }}"><i class="fa fa-paperclip"></i> Read More </a>
                            </p>
                          </div>
                        </li>
                        @endforeach

                      </ul>
        </div>
    </div>
    </div>
@endsection
