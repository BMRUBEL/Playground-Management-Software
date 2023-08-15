 
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
            <h1>Expense Add</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Expense Add</li>
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
                <h2 class="m-0">Expense Add</h2>
                @if ($message = Session::get('msg'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                    @endif
                </div>
            
              <h3 class="card-title"></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="row g-3" action="{{route('expense.store')}}" method="POST" enctype="multipart/form-data">
              @csrf
         <div class="card-body">
              <div class="row">
             <div class="col-sm-6">
                <div class="form-group">
                  <label for="exampleInputUserId">User Name</label>
                  <select name="user_id" id="" class="form-control">
                    @foreach ($users as $u )
                       <option value="{{$u->id}}">{{$u->name}}</option> 
                    @endforeach

                 </select>
                  
                </div>
               </div>
               <div class="col-sm-6">
                <div class="form-group">
                  <label for="exampleInputBranchId">Branch Name</label>
                  <select name="branch_id" id="" class="form-control">
                    @foreach ($branches as $b )
                       <option value="{{$b->id}}">{{$b->name}}</option> 
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
                           <option value="{{$c->id}}">{{$c->name}}</option> 
                        @endforeach
    
                     </select>
                      
                    </div>
                   </div>
                 <div class="col-sm-6">
                  <div class="form-group">
                      <label for="exampleInputName">Cost Amount</label>
                      <input type="text" class="form-control"  name="cost" placeholder="Enter your cost price">
                    </div>
                 </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputName">Notes</label>
                        <textarea name="note" id="" cols="80" rows="5" placeholder="enter your notes please"></textarea>
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