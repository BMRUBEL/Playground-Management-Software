 
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
            <h1>Expenses Status</h1>
            @if ($message = Session::get('msg'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
                @endif
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Expenses</li>
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
            
             
               
          <h3 class="card-title">Expense</h3>

        </div>
        <div class="card-body table-responsive">
             
                <div class="float-right " >
                <h6 class="pull-right" > <a href="{{route('expense.create')}}">
                  <button class="btn btn-primary"><strong>Create</strong> </button></a>
                  <a href="{{route('exp.filter')}}">
                    <button class="btn btn-warning"><strong>Report</strong> </button></a></h6>
                  {{-- <h6 class="pull-right" > <a href="{{route('expense.create')}}">
                    <button class="btn btn-warning"><strong>Report</strong> </button></a></h6> --}}
         
                     
                </div>
          
            <table class="table table-hover text-nowrap">
                    
                <thead>
                  <tr>
                    <th>SL</th>
                    <th>User Name</th>
                    <th>Branch Name</th>
                    <th>Expense Category</th>
                    <th>Notes</th>
                    <th>Cost Amount</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($list as $k=>$l)
                  <tr>
                    <td>{{ $k + 1 }}</td>
                    <td>{{ $l->user->name }}</td>
                    <td>{{ $l->branch->name }}</td>
                    <td>{{ $l->category->name}}</td>
                    <td>{{ $l->note }}</td>
                    <td>{{ $l->cost }}</td>
                  <td>
                      <form action="{{ route('expense.destroy',$l->id) }}" method="POST">
                  
                        <a class="btn btn-primary" href="{{ route('expense.edit',$l->id) }}"><i class="fa fa-edit"></i></a>
         
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