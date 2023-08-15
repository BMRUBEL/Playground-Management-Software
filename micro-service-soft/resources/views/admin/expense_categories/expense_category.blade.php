 
@extends('admin.layout.main')
@section('main-content')
  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Expense Category</h1>
            @if ($message = Session::get('msg'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
                @endif
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
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
          <h3 class="card-title">Category</h3>
        </div>
        <div class="card-body table-responsive">
             
                <div class="float-right " style="margin-left:88%">
                   
                <a href="{{route('expense_category.create')}}">Add New Category</a>
                     
                </div>
          
            <table class="table table-hover text-nowrap">
                    
                <thead>
                  <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($list as $k=>$l)
                  <tr>
                    <td>{{$k+1}}</td>
                    <td>{{$l->name}}</td>
                  
                     <td>
                      <form action="{{ route('expense_category.destroy',$l->id) }}" method="POST">
                  
                        <a class="btn btn-primary" href="{{ route('expense_category.edit',$l->id) }}"><i class="fa fa-edit"></i></a>
         
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