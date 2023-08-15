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
                     <h1>Create New Loan</h1>
                 </div>
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
                         <!-- <li class="breadcrumb-item active">Blank Page</li> -->
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
                     <h3 class="card-title"></h3>
                 </div>

                 <form action="{{route('loans.store')}}" method="post">
                     @csrf
                     <div class="card-body row">
                         <div class="col-3">
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Loan Product</label>

                                 <select name="loan_product_id" id="exampleInputEmail1" class="form-control" placeholder="Loan Product">
                                     <option value="">Select One</option>
                                     @foreach($loanproducts as $product)
                                     <option value="{{$product->id}}"> {{$product->name}}</option>
                                     @endforeach
                                 </select>

                             </div>

                             <div class="form-group">
                                 <label for="exampleInputPassword1">Members</label>
                                 <select name="member_id" id="exampleInputEmail1" class="form-control" placeholder="Loan Member">
                                     <option value="">Select One</option>
                                     @foreach($members as $member)
                                     <option value="{{$member->id}}"> {{$member->name}}</option>
                                     @endforeach
                                 </select>

                             </div>

                             <div class="form-group">
                                 <label for="exampleInputPassword1">First Payment Date</label>
                                 <input type="date" name='first_payment_date' class="form-control" id="exampleInputPassword1" placeholder="date">
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputPassword1">Release Date</label>
                                 <input type="date" name="release_date" class="form-control" id="exampleInputPassword1" placeholder="Date">
                             </div>

                         </div>
                         <div class="col-3">
                             <div class="form-group">
                                 <label for="exampleInputPassword1">Applied Amount</label>
                                 <input type="number" name="applied_amount" class="form-control" id="exampleInputPassword1" placeholder="Applied Amount">
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputPassword1">Total Payable</label>
                                 <input type="number" name="total_payable" class="form-control" id="exampleInputPassword1" placeholder="Total Payable">
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputPassword1">Total Paid</label>
                                 <input type="number" name="total_paid" class="form-control" id="exampleInputPassword1" placeholder="Total Paid">
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputPassword1">Late Payment Penalties</label>
                                 <input type="number" name="late_payment_penalties" class="form-control" id="exampleInputPassword1" placeholder="Late Payment Penalties">
                             </div>
                         </div>
                         <div class="col-3">

                             <div class="form-group">
                                 <label for="exampleInputPassword1">Installment</label>
                                 <input type="number" name="installment" class="form-control" id="exampleInputPassword1" placeholder="Installment">
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputPassword1">Description</label>
                                 <input type="text" name="description" class="form-control" id="exampleInputPassword1" placeholder="Description">
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputPassword1">Remarks</label>
                                 <input type="text" name="remarks" class="form-control" id="exampleInputPassword1" placeholder="Remarks">
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputPassword1">Status</label>
                                 <br>
                                 <input type="radio" class="" name="r" value="approved" checked id="">Approved
                                 <input type="radio" class="" name="r" value="pending" id="">Pending
                                 <br>
                                 <input type="radio" class="" name="r" value="denied" id="">Denied
                             </div>

                         </div>
                         <div class="col-3">

                             <div class="form-group">
                                 <label for="exampleInputPassword1">Approved Date</label>
                                 <input type="date" name="approved_date" class="form-control" id="exampleInputPassword1" placeholder="Approved Date">
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputPassword1">Approved By</label>
                                 <select name="approved_by" id="exampleInputEmail1" class="form-control" placeholder="Loan Member">
                                     <option value="">Select One</option>
                                     @foreach($managers as $manager)
                                     <option value="{{$manager->id}}"> {{$manager->name}}</option>
                                     @endforeach
                                 </select>

                                 <!-- <input type="number" name="" class="form-control" id="exampleInputPassword1" placeholder="Approved By"> -->
                             </div>

                             <div class="form-group">
                                 <label for="exampleInputPassword1">Created by</label>
                                 <select name="user_id" id="exampleInputEmail1" class="form-control" placeholder="Loan Member">
                                     <option value="">Select One</option>
                                     @foreach($users as $user)
                                     <option value="{{$user->id}}"> {{$user->name}}</option>
                                     @endforeach
                                 </select>
                             </div>


                             <div class="form-group">
                                 <label for="exampleInputPassword1">Branch</label>
                                 <select name="branch_id" id="exampleInputEmail1" class="form-control" placeholder="Loan Member">
                                     <option value="">Select One</option>
                                     @foreach($branches as $branche)
                                     <option value="{{$branche->id}}"> {{$branche->name}}</option>
                                     @endforeach
                                 </select>
                             </div>
                         </div>
                         <div class="form-group col-6">
                             <label for="exampleInputFile">attachment</label>
                             <div class="input-group">
                                 <div class="custom-file">
                                     <input type="file" name="attachment" class="custom-file-input" id="exampleInputFile">
                                     <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                 </div>
                                 <div class="input-group-append">
                                     <span class="input-group-text">Upload</span>
                                 </div>
                             </div>
                         </div>
                         <div class="card-footer col-6">
                             <label for=""></label>
                             <button type="submit" class="btn btn-primary btn-block">Submit</button>
                         </div>
                     </div>


                 </form>
             </div>

         </div>
         <!-- /.card -->

     </section>
     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->

 @endsection