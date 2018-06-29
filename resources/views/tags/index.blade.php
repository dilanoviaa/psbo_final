@extends('templates.admins.master')


@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
      @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <strong> {{session()->get('success')}} </strong>
      </div>
    @endif
    <div class="dashboard_graph">

      <div class="row x_title">
        <div class="col-md-6">
          <h3>List of Tag</h3>
        </div>
      </div>
      
      <div class="col-md-6 col-sm-6 col-xs-6">
          <table class="table table-striped  nowrap">
              <thead>
                <tr>
                  <th style="width: 1%" >No.</th>
                  <th>Tag</th>
                  <th style="width: 30%">Action</th>
                </tr>
              </thead>
              <tbody>
                  <?php $no = 0;?>
                  @foreach($tags as $tag)
                  <?php $no++ ;?>
                <tr>
                  <td>{{ $no }}</td>
                  <td>{{ $tag->name }}</td>
                  <td>
                      <form action="{{ route('tags.destroy', $tag->id) }}" method="post">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }} 
                          <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                          <button type="submit" class="btn btn-danger btn-xs"  onclick="deleteConfirm()"><i class="fa fa-trash-o"></i>Delete</button>
                      
                          <script>
                              function deleteConfirm() {
                                event.preventDefault(); // prevent form submit
                                var form = event.target.form; // storing the form
                                  swal({
                                    title: "Are you sure?",
                                    text: "You will not be able to recover this Tags!",         type: "warning",   
                                    showCancelButton: true,   
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "Yes, delete it!", 
                                    closeOnConfirm: false 
                                },
                                function(isConfirm){
                                  if (isConfirm) {
                                    form.submit();          // submitting the form when user press yes
                                  } 
                                });
                                }
                          </script>
    
                      </form>
                  </td>
                </tr>
                  @endforeach
              </tbody>
            </table>	
      </div>
      <div class="col-md-1 col-sm-1 col-xs-1"></div>
      <div class="col-md-4 col-sm-4 col-xs-12 bg-white" style="border:0px solid #e5e5e5;">
        <div class="product_price">   
            <div class="x_title">
                <h2>Create New Tag</h2>
                <div class="clearfix"></div>
              </div>
            <div>
                <form class="form-horizontal form-label-left" action="{{ route('tags.store') }}" method="post">
                  {{ csrf_field() }}    
                  <div class="form-group">
                    <div>
                      <div class="input-group">
                        <input type="text" class="form-control" name="name" placeholder="Tag Name">
                        <span class="input-group-btn">
                                          <button type="submit" class="btn btn-success">Create</button>
                                      </span>
                      </div>
                    </div>
                  </div>
                  <div class="divider-dashed"></div>
                </form>    
            </div>
        </div>
      </div>

      
      <div class="col-md-7 col-sm-7 col-xs-7"></div>
      <div class="col-md-4 col-sm-4 col-xs-4 bg-white" style="border:0px solid #e5e5e5;">
        
          <div>
              <div class="">
                  <div class="product_price">
                      <div class="x_title">
                          <h2>Edit Tag</h2>
                          <div class="clearfix"></div>
                        </div>

                      @if($tagEdit != null)
                        <form class="form-horizontal form-label-left" action="{{ route('tags.update', $tagEdit->id) }}" method="post">
                      @endif

                            {{ csrf_field() }} 
                            {{ method_field('PATCH') }} 

                            <div class="form-group">
                              <div>
                                  @if($tagEdit != null)                                
                                  <div class="input-group">
                                      <input type="text" class="form-control" value="{{ $tagEdit->name}}" name="name">
                                      <span class="input-group-btn">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </span>
                                    </div>
                                  @else
                                  <div class="input-group">
                                      <input type="text" class="form-control" disabled="disabled" placeholder="Disabled Input">
                                      <span class="input-group-btn">
                                                        <button type="button" class="btn btn-primary">Update</button>
                                      </span>
                                  </div> 
                                  @endif
                              </div>
                            </div>
                            <div class="divider-dashed"></div>
                        @if($tagEdit != null)
                          </form>
                        @endif
                  </div>
                </div>
                 
          </div>
         
        
        

      </div>
      <div class="clearfix"></div>
    </div>
  </div>

</div>
   


  @include('sweet::alert')



@endsection