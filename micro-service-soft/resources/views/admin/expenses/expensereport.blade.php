 
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
            <h1>Expenses Report</h1>
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
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    {{-- <h2 class="m-0">Maintenance Report</h2> --}}
                </div>
                <div class="card-body">

                    <div class="col-md-12" >


                        <form class="row g-3" action="{{ route('exp.filter') }}" method="get" >
                            @csrf

                            <div class="col-md-3">
                                <label for="" class="form-label">Branch Name:</label> <br>
                                <select name="branch_id" id="" class="form-control">
                                    <option value="">Select Branch</option>
                                    @foreach ($branch as $t)
                                        <option value="{{ $t->id }}">{{ $t->name }}</option>
                                    @endforeach
                                
                                </select>
                                
                                </div>
                                
                                <div class="col-md-3" style="margin-top: 30px">
                                <button type="submit" class="btn btn-primary">Branch Check</button>
                                </div>

<br><br><br><br><br><br><br>
          
            <table class="table table-hover text-nowrap">
                    
                <thead>
                  <tr>
                    <th>SL</th>
                    <th>Branch Name</th>
                    <th>User Name</th>
                    <th>Expense Name</th>
                    <th>Notes</th>
                    <th>Cost Amount</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($main as $k=>$l)
                  <tr>
                    <td>{{ $k + 1 }}</td>
                    <td>{{ $l->branch->name }}</td>
                    <td>{{ $l->user->name }}</td>
                    
                    <td>{{ $l->category->name}}</td>
                    <td>{{ $l->note }}</td>
                    <td>{{ $l->cost }}</td>
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