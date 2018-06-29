@extends('templates.admins.master')

@section('content')
<div class="page-title">
    <div class="title_left">
       <h3></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Tabel Mahasiswa Penerima Beasiswa</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Nama</th>
                          <th>Nim</th>
                          <th>Departemen</th>
                          <th>Fakultas</th>
                          <th>IPK</th>
                        </tr>
                      </thead>

                      <tbody>
                      <?php $no = 0;?>
                      @foreach($students as $student)
                      <?php $no++ ;?>
                        <tr>
                          <td>{{ $no }}</td>
                          <td>{{ $student->nim }}</td>
                          <td>{{ $student->departmen }}</td>
                          <td>{{ $student->faculty }}</td>
                          <td>{{ $student->gda }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>

             </tbody>
            </table>
	     	</div>
        </div>
    </div>
</div>

@endsection