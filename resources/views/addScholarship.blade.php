@extends('templates.admins.master')

@section('stylesheets')

  <link href= "{{ asset('css/parsley.css') }}" rel="stylesheet">
  <link href= "{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('content')

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

    <div class="x_panel">
        <div class="x_title">
            <h2>Add Scholarship</h2>
            <div class="clearfix"></div>
            </div>
            <div class="x_content">
            <br />
            <form class="form-horizontal form-label-left" action="{{ route('addScholarship.store') }}" method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label class="control-label col-md-2">Scholarship Image
                        </label>
                        <div class="col-md-4">
                        <input type="file" class="form-control" name="image" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2">Scholarship Name
                          <span class="required">*</span>
                        </label>
                        <div class="col-md-9">
                        <input type="text" class="form-control" required="required" name="name" value="{{old('name')}}" placeholder="Scholarship Name" class="form-control col-md-9 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">Company
                          <span class="required">*</span>
                        </label>
                        <div class="col-md-9">
                        <input type="text" class="form-control" name="firm" value="{{old('firm')}}" placeholder="Company Name" required="required">
                        </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-2">Program</label>
                      <div class="col-md-9">
                        <select class="tags form-control program-multi" tabindex="-1" multiple="multiple" name="programs[]">
                    
                            <option value="D3">D3</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                    
                        </select>
                        <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                      </div>
                    </div>
                    

                    <div class="form-group">
                      <label class="control-label col-md-2">Semester</label>
                      <div class="col-md-9">
                        <select class="tags form-control semester-multi" tabindex="-1" multiple="multiple" name="semesters[]">
                    
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                    
                        </select>
                        <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-2">Faculty</label>
                      <div class="col-md-9">
                        <select class="tags form-control faculty-multi" tabindex="-1" multiple="multiple" name="faculties[]">
                    
                            <option value="FAPERTA,FKH,FPIK,FAPET,FAHUTAN,FATETA,FMIPA,FEM,FEMA,DIPLOMA,SB">Semua Fakultas</option>
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
                        <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                      </div>
                    </div>

                  

                    <div class="form-group">
                      <label class="control-label col-md-2">Minimum GDA</label>
                      <div class="col-md-9">
                      <input type="text" class="form-control" name="gda" value="{{old('gda')}}" placeholder="2.7" required="required">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-2">Registration Limit
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-9">
                      <input type="text" class="form-control datepicker" value="{{old('deadline')}}" name="deadline" id="date" required="required">
                      </div>
                      <script>
                        $('#date').datepicker({
                          startDate: new Date(),
                          format: 'dd-mm-yyyy',
                          todayHighlight:'TRUE',
                          autoclose: true
                        });
                      </script>
                    </div>



                    <div class="form-group">
                      <label class="control-label col-md-2">Select Tags</label>
                      <div class="col-md-9">
                        <select class="tags form-control tag-multi" tabindex="-1" multiple="multiple" name="tags[]">
                          @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                          @endforeach
                        </select>
                        <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                      </div>
                    </div>
                  {{--  </div>  --}}



                  <div class="form-group">

                  <div class="item form-group">
                    <label class="control-label col-md-2" for="textarea">Deskripsi <span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                      <textarea id="konten" required="required" value="{{old('description')}}" name="description" class="form-control col-md-9 col-xs-12" required="required"></textarea>
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

    @endsection

    @section('script')
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/parsley.min.js') }}"></script>
    <script>
      CKEDITOR.replace( 'konten' );
    </script>
  
    <script type="text/javascript">
      $('.program-multi').select2({
        placeholder:"Select Program"
      });
    </script>
  
    <script type="text/javascript">
      $('.semester-multi').select2({
        placeholder:"Select Semester"
      });
    </script>
    <script type="text/javascript">
      $('.faculty-multi').select2({
        placeholder:"Select Faculty"
      });
    </script>
    <script type="text/javascript">
      $('.tag-multi').select2({
        placeholder:"Select Tags"
      });
    </script>
   
  @endsection