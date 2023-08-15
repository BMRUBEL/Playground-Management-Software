 
@extends('admin.layout.main')
@section('main-content')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  {{-- menu --}}

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Status</h1>
            @if ($message = Session::get('msg'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
                @endif
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Users</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body table-responsive">
             
                <div class="float-right " style="margin-left:88%">
                   
                <a href="{{route('user.create')}}">Create New User</a>
                     
                </div>
          
            <table class="table table-hover text-nowrap">
                    
                <thead>
                  <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Profil picture</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($list as $k=>$l)
                  <tr>
                    <td>{{$k+1}}</td>
                    <td>{{$l->name}}</td>
                    <td>{{$l->email}}</td>
                    <td>{{$l->role}}</td>
                    <td>{{$l->status}}</td>
                    <td><img src="/uploads/{{ $l->profile_picture}}" width="120px"></td>
                    <td>
                      <form action="{{ route('user.destroy',$l->id) }}" method="POST">
                  
                        <a class="btn btn-primary" href="{{ route('user.edit',$l->id) }}"><i class="fa fa-edit"></i></a>
         
                        @csrf
                        @method('DELETE')
            
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                    </td>
                  </tr>
                  
                  @endforeach
                </tbody>
              </table>
            
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <div class="col-sm-4">
               
            </div>
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection