 
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
              <li class="breadcrumb-item active">Expense Category Add</li>
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
                <h2 class="m-0">Expense Category add</h2>
                @if ($message = Session::get('msg'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                    @endif
                </div>
            
              <h3 class="card-title"></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="row g-3" action="{{route('expense_category.store')}}" method="POST">
              @csrf
         <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="exampleInputName">Expense Category</label>
                  <input type="text" class="form-control"  name="name" placeholder="Enter your expense category">
                </div>
                </div>
                
                <button type="submit" class="btn btn-block btn-primary">Submit</button>
            </div>
                
            
            </div>
              <!-- /.card-body -->

              <div class="card-footer">
               
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