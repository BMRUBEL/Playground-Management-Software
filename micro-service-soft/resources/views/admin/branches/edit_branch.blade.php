 
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
            <h1>Branch Update</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Branch update</li>
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
                <h2 class="m-0">Branch Update</h2>
                @if ($message = Session::get('msg'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                    @endif
                </div>
          
              <h3 class="card-title">Branch</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="row g-3" action="{{route('branch.update',$branch->id)}}" method="POST">
              @csrf
              @method('PUT')
         <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="exampleInputName">Branch Name</label>
                  <input type="text" class="form-control"  name="name" value="{{$branch->name}}" placeholder="Enter your branch name">
                </div>
                </div>
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="exampleInputContactEmail">Contact Email</label>
                  <input type="email" class="form-control" name="contact_email" value="{{$branch->contact_email}}" placeholder="email">
                </div>
               </div>
            </div>
                
            <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="exampleInputContactPhone">Contact Phone</label>
                  <input type="text" class="form-control" name="contact_phone" value="{{$branch->contact_phone}}" placeholder="Enter phone number">
                </div>
                </div>
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="exampleInputAddress">Address</label>
                  <input type="text" class="form-control" name="address" value="{{$branch->address}}" placeholder="Enter address">
                </div>
               </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="exampleInputDescriptions">Descriptions</label>
                  <input type="text" class="form-control"  name="descriptions" value="{{$branch->descriptions}}" placeholder="Enter descriptions">
                </div>
                </div>
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="exampleInputUserId">User Id</label>
                  {{-- <input type="text" class="form-control"  name="user_id" placeholder="enter user id"> --}}
                  <select name="user_id" id="">
                        @foreach ($users as $u )
                           <option value="{{$u->id}}" {{ $u->id == $branch->user_id ? 'selected' : '' }}>{{$u->name}}</option> 
                        @endforeach

                  </select>
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