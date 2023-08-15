 
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
            <h1>Expense Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Expense Edit</li>
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
                <h2 class="m-0">Expense Edit</h2>
                @if ($message = Session::get('msg'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                    @endif
                </div>
            
              <h3 class="card-title"></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="row g-3" action="{{route('expense.update',$expense->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
         <div class="card-body">
              <div class="row">
             <div class="col-sm-6">
                <div class="form-group">
                  <label for="exampleInputUserId">User Name</label>
                  <select name="user_id" id="" class="form-control">
                    @foreach ($users as $u )
                       <option value="{{$u->id}}" {{ $u->id == $expense->user_id ? 'selected' : '' }}>{{$u->name}}</option> 
                    @endforeach

                 </select>
                  
                </div>
               </div>
               <div class="col-sm-6">
                <div class="form-group">
                  <label for="exampleInputBranchId">Branch Id</label>
                  <select name="branch_id" id="" class="form-control">
                    @foreach ($branches as $b )
                       <option value="{{$b->id}}" {{ $b->id == $expense->branch_id ? 'selected' : '' }}>{{$b->name}}</option> 
                    @endforeach

                 </select>
                  
                </div>
               </div>
            </div>
            <div class="row">
                
                   <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputGuaranterId">Expense Category Name</label>
                      <select name="expense_category_id" id="" class="form-control">
                        @foreach ($categories as $c )
                           <option value="{{$c->id}}" {{ $c->id == $expense->expense_category_id ? 'selected' :''}}>{{$c->name}}</option> 
                        @endforeach
    
                     </select>
                      
                    </div>
                   </div>
                 <div class="col-sm-6">
                  <div class="form-group">
                      <label for="exampleInputName">Cost Amount</label>
                      <input type="text" class="form-control"  name="cost" placeholder="Enter your cost price" value="{{$expense->cost}}">
                    </div>
                 </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputName">Notes</label>
                        {{-- <textarea name="note" id="" cols="80" rows="5" placeholder="enter your notes please" value="{{$expense->note}}"></textarea> --}}
                        <input type="text" class="form-control" name="note" placeholder="enter your note" value="{{$expense->note}}">
                      </div>
                   </div>

            </div>
           
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-block btn-primary">Update</button>
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