@extends('templates.master')

@section('header')
<header class="masthead" style="background-image: url({!! asset('assets/img/ipba.jpg') !!})">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-8">
            <div class="site-heading">
                <h3>"Searching and Serving The Best"</h3>
            </div>
        </div>
        </div>
    </div>

</header>
@endsection()

@section('content')

<div class="container">
          <div class="col-md-1 col-sm-1 col-xs-1"></div>
          <div class="col-md-2 col-sm-2 col-xs-2">
              <div class="text-center">
                  
                  @if ($user->avatar != null)
                    <img src="/storage/{{Auth::user()->avatar}}" class="avatar img-circle" alt="avatar"  height="100">  

                    @else
                      <img src="//placehold.it/100" class="avatar img-circle" alt="avatar"  height="100">      
                  @endif
                  
                  
              </div>
          </div>
          <div class="col-md-8 col-sm-8 col-xs-8">

            {{-- alert --}}
              <div class="alert alert-info alert-dismissable">
                  <a class="panel-close close" data-dismiss="alert">×</a> 
                  <i class="fa fa-coffee"></i>
                  Edit profile untuk mencoba fitur match me.
              </div>

              @if (count($errors) > 0)
              <div class="alert alert-danger alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong>Errors:</strong>
                <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach  
                </ul>
              </div>
              @endif

              @if (session()->has('success'))
              <div class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong> {{session()->get('success')}} </strong>
              </div>
            @endif

            {{-- end alert --}}
            

            <form class="form-horizontal" method="post" action="{{ route('user.updateProfile') }}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" >
              {{ csrf_field() }}
              {{ method_field('PATCH') }} 

              

              <div class="form-group">
                <label class="col-md-3 control-label">Update Photo</label>
                <div class="col-md-9">
                  <input type="file" id="first-name" name="avatar" value="{{ old('name', $user->avatar) }}" class="form-control">
                </div>
              </div>

              <div class="form-group">
                  <label class="col-md-3 control-label">Name:</label>
                  <div class="col-md-9">
                    <input class="form-control" type="text" name="name" value="{{$user->name}}">
                  </div>
                </div>

              <div class="form-group">
                <label class="col-md-3 control-label">Email:</label>
                <div class="col-md-9">
                  <input class="form-control" type="email" name="email" value="{{$user->email}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">NIM:</label>
                <div class="col-md-9">
                  <input class="form-control" type="text" name="nim" value="{{$user->nim}}">
                </div>
              </div>

              <div class="form-group">
                  <label class="col-md-3 control-label">Program:</label>
                  <div class="col-md-9">
                      <select class="tags form-control program-multi" tabindex="-1"  name="programs[]" required>
                    
                          <option value="D3">D3</option>
                          <option value="S1">S1</option>
                          <option value="S2">S2</option>
                  
                      </select>
                    </div>
                </div>

              <div class="form-group">
                  <label class="col-md-3 control-label">Faculty:</label>
                  <div class="col-md-9">
                      <select class="tags form-control faculty-multi" tabindex="-1"  name="faculties[]" required>
            
                          <option value="FAPERTA">A - Fakultas Pertanian</option>
                          <option value="FKH">B - Fakultas Kedokteran Hewan</option>
                          <option value="FPIK">C - Fakultas Perikanan dan Ilmu Kelautan</option>
                          <option value="FAPET">D - Fakultas Peternakan</option>
                          <option value="FAHUTAN">E - Fakultas Kehutanan</option>
                          <option value="FATETA">F - Fakultas Teknologi Pertanian</option>
                          <option value="FMIPA">G - Fakultas Matematikan dan Ilmu Pengetahuan</option>
                          <option value="FEM">H - Fakultas Ekonomi Manajemen</option>
                          <option value="FEMA">I - Fakultas Ekologi Manusia</option>
                          <option value="DIPLOMA">J - Diploma</option>
                          <option value="SB">Sekolah Bisnis</option>
                          
                      </select>
                    </div>
                </div>
              
             
                  
                

              <div class="form-group">
                <label class="col-md-3 control-label">Departement:</label>
                <div class="col-md-9">
                  <input class="form-control" type="text" name="department" value="{{$user->department}}">
                </div>
              </div>

              <div class="form-group">
                  <label class="col-md-3 control-label">Semester:</label>
                  <div class="col-md-9">
                      <select class="tags form-control semester-multi" tabindex="-1"  name="semesters[]" required>
                    
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                  
                      </select>
                  </div>
              </div>
             
              <div class="form-group">
                <label class="col-md-3 control-label">GDA:</label>
                <div class="col-md-9">
                  <input class="form-control" type="text" name="gda" value="{{$user->gda}}">
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-md-3 control-label">Telephone:</label>
                <div class="col-md-9">
                    <input class="form-control" type="text" name="telephon" value="{{$user->telephon}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-9">
                  <button type="submit"  class="btn btn-success"> Save </button>
                  <span></span>
                  <input type="reset" class="btn btn-default" value="Cancel">
                </div>
              </div>
            </form>
          </div>
          {{-- <div class="col-md-2 col-sm-2 col-xs-2"></div> --}}

          
            
          </div>
      </div>
    {{-- </div> --}}
@endsection()

@section('script')
  <script src="{{ asset('js/select2.min.js') }}"></script>
  <script src="{{ asset('js/parsley.min.js') }}"></script>
  <script>
    CKEDITOR.replace( 'konten' );
  </script>

  <script type="text/javascript">
		$('.faculty-multi').select2({
      maximumSelectionSize: 1
    });
		$('.faculty-multi').select2().val({!! json_encode($faculties) !!}).trigger('change');
  </script>

  <script type="text/javascript">
		$('.program-multi').select2({
      maximumSelectionSize: 1
    });
		$('.program-multi').select2().val({!! json_encode($programs) !!}).trigger('change');
  </script>

  <script type="text/javascript">
		$('.semester-multi').select2({
      maximumSelectionSize: 1
    });
		$('.semester-multi').select2().val({!! json_encode($semesters) !!}).trigger('change');
  </script>
  

@endsection