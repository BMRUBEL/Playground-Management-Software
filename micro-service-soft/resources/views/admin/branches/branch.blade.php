 
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
            <h1>Branch Status</h1>
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
          <h2 class="m-0">Branch status</h2>
          @if ($message = Session::get('msg'))
          <div class="alert alert-success">
              <p>{{ $message }}</p>
              @endif
          <h3 class="card-title"></h3>
        </div>
        <div class="card-body table-responsive">
             
                <div class="float-right " style="margin-left:92%">
                   
                <a href="{{route('branch.create')}}">Add New</a>
                     
                </div>
          
            <table class="table table-hover text-nowrap">
                    
                <thead>
                  <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Branch Name</th>
                    <th>Contact email</th>
                    <th>Contact phone</th>
                    <th>Address</th>
                    <th>Descriptions</th>
                     <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($list as $k=>$l)
                  <tr>
                    <td>{{$k+1}}</td>
                    <td>{{$l->user->name}}</td>
                    <td>{{$l->name}}</td>
                    <td>{{$l->contact_email}}</td>
                    <td>{{$l->contact_phone}}</td>
                    <td>{{$l->address}}</td>
                    <td>{{$l->descriptions}}</td>
                     <td>
                      <form action="{{ route('branch.destroy',$l->id) }}" method="POST">
                  
                        <a class="btn btn-primary" href="{{ route('branch.edit',$l->id) }}"><i class="fa fa-edit"></i></a>
         
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