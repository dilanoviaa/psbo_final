@extends('templates.admins.master')

@section('content')

jumlah: {{$tag->scholarships()->count()}}

<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th style="width: 1%" >No.</th>
            <th>Nama Beasiswa</th>
            <th>Perusahaan</th>
          </tr>
        </thead>
        <tbody>
            <?php $no = 0;?>
            @foreach($tag->scholarships as $scholarship)
            <?php $no++ ;?>
          <tr>
            <td>{{ $no }}</td>
            <td>{{ $scholarship->name }}</td>
            <td>{{ $scholarship->firm }}</td>
            
          </tr>
          @endforeach
        </tbody>
      </table>
  
	


@endsection