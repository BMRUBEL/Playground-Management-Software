 
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
            <h1>Blank Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Branch Add</li>
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
                <h2 class="m-0">Branch add</h2>
                @if ($message = Session::get('msg'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                    @endif
                </div>
            
              <h3 class="card-title"></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="row g-3" action="{{route('branch.store')}}" method="POST">
              @csrf
         <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="exampleInputName">Branch Name</label>
                  <input type="text" class="form-control"  name="name" placeholder="Enter your branch name">
                </div>
                </div>
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="exampleInputContactEmail">Contact Email</label>
                  <input type="email" class="form-control" name="contact_email"  placeholder="email">
                </div>
               </div>
            </div>
                
            <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="exampleInputContactPhone">Contact Phone</label>
                  <input type="text" class="form-control" name="contact_phone" placeholder="Enter phone number">
                </div>
                </div>
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="exampleInputAddress">Address</label>
                  <input type="text" class="form-control" name="address" placeholder="Enter address">
                </div>
               </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="exampleInputDescriptions">Descriptions</label>
                  <input type="text" class="form-control"  name="descriptions" placeholder="Enter descriptions">
                </div>
                </div>
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="exampleInputUserId">User Id</label>
                  {{-- <input type="text" class="form-control"  name="user_id" placeholder="enter user id"> --}}
                  <select name="user_id" id="">
                        @foreach ($users as $u )
                           <option value="{{$u->id}}">{{$u->name}}</option> 
                        @endforeach

                  </select>
                </div>
               </div>
            </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-block btn-primary">Submit</button>
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