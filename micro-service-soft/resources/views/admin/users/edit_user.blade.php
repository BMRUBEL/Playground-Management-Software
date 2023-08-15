 
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
            <h1>User Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Add</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card card-primary">
            <div class="card-header">
                <h2 class="m-0">User_add</h2>
                @if ($message = Session::get('msg'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                    @endif
                </div>
            
              <h3 class="card-title">User</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="row g-3" action="{{route('user.update',$user->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
         <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="exampleInputName">User Name</label>
                  <input type="text" class="form-control"  name="name" placeholder="Enter your branch name" value="{{$user->name}}">
                </div>
                </div>
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="exampleInputEmail">Email</label>
                  <input type="email" class="form-control" name="email"  placeholder="email" value="{{$user->email}}">
                </div>
               </div>
            </div>
                
            <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="exampleInputRole">Role</label>
                  <input type="radio"    name="role" value="manager" {{$user->role === 'manager' ? 'checked' : ''}} />Manager
                  <input type="radio"    name="role" value="field officer" {{$user->role === 'field_officer' ? 'checked' : ''}}/>field officer
                </div>
                </div>
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="exampleInputStatus">Status</label>
                  <input type="radio"    name="status" value="active" {{$user->status === 'active' ? 'checked' : ''}} />Active
                  <input type="radio"    name="status" value="inactive" {{$user->status === 'inactive' ? 'checked' : ''}}/>Inactive
                </div>
               </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="exampleInputProfilePicture">Profile Picture</label>
                  <input type="file" class="form-control"  name="profile_picture" width="50" height="50" value="{{$user->profile_picture}}">
                  <img src="/uploads/{{$user->profile_picture}}" width=120px alt="" srcset="">
                </div>
                </div>
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="exampleInputProfilePicture">Password</label>
                  <input type="text" class="form-control"  name="password" placeholder="enter your password" value="{{$user->password}}">
                </div>
                </div>
                 
            </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-block btn-primary">update</button>
              </div>
            </form>
          </div>
        <!-- /.card-body -->
        <div class="card-footer">
           
        </div>;
     
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection