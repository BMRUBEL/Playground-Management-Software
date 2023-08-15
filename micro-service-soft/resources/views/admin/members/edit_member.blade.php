 
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
            <h1>Member_Update</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Member</li>
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
                <h2 class="m-0"></h2>
                @if ($message = Session::get('msg'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                    @endif
                </div>
            
              {{-- <h3 class="card-title">Edit</h3> --}}
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="row g-3" action="{{route('member.update',$member->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
         <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="exampleInputName">Name</label>
                  <input type="text" class="form-control"  name="name" placeholder="Enter your members name" value="{{$member->name}}" >
                </div>
                </div>
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="exampleInputContactEmail">Status</label>
                  <input type="radio" value="pending" name="status" {{$member->status === 'pending' ? 'checked' : ''}} />pending
                  <input type="radio" value="approved" name="status" {{$member->status === 'approved' ? 'checked' : ''}} />approved
                  <input type="radio" value="denied" name="status" {{$member->status === 'denied' ? 'checked' : ''}} />denied
                </div>
               </div>
            </div>
                
            <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="exampleInputEmail">Email</label>
                  <input type="email" class="form-control" name="email" placeholder="Enter your email" value="{{$member->email}}">
                </div>
                </div>
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="exampleInputMobile">Mobile</label>
                  <input type="text" class="form-control" name="mobile" placeholder="Enter mobile number" value="{{$member->mobile}}">
                </div>
               </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="exampleInputBusinessName">Business Name</label>
                  <input type="text" class="form-control"  name="business_name" placeholder="Enter your business name" value="{{$member->business_name}}">
                </div>
                </div>
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="exampleInputMemberNo">Member No</label>
                  <input type="text" class="form-control"  name="member_no" placeholder="Enter your member_no" value="{{$member->member_no}}">
                  
                </div>
               </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="exampleInputGender">Gender</label>
                  <input type="radio"    name="gender" value="male" {{$member->gender === 'male' ? 'checked' : ''}}/>Male
                  <input type="radio"    name="gender" value="female" {{$member->gender === 'female' ? 'checked' : ''}} />Female
                  <input type="radio"    name="gender" value="others" {{$member->gender === 'others' ? 'checked' : ''}} />Others
                </div>
                </div>
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="exampleInputCity">City</label>
                  <input type="text" class="form-control"  name="city" placeholder="Enter your city" value="{{$member->city}}">
                  
                </div>
               </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="exampleInputAddress">Address</label>
                  <input type="text"   name="address" class="form-control" placeholder="enter your address" value="{{$member->address}}" >
                   
                </div>
                </div>
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="exampleInputCredit Source">Credit Source</label>
                  <input type="text" class="form-control"  name="credit_source" placeholder="Enter your credit source" value="{{$member->credit_source}}">
                  
                </div>
               </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="exampleInputPhoto">Photo</label>
                  <input type="file" class="form-control" name="photo" width="50" height="50" value="{{$member->photo}}">
                  <img src="/uploads/{{$member->photo}}" width=120px alt="" srcset="">
                </div>
                </div>
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="exampleInputNID">NID</label>
                  <input type="file" class="form-control" name="nid" width="50" height="50" value="{{$member->nid}}">
                  <img src="/uploads/{{$member->nid}}" width=120px alt="" srcset="">
                </div>
               </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="exampleInputBirthCertificate">BirthCertificate</label>
                  <input type="file" class="form-control" name="birth_certificate" width="50" height="50" value="{{$member->birth_certificate}}" >
                  <img src="/uploads/{{$member->birth_certificate}}" width=120px alt="" srcset="">
                </div>
                </div>
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="exampleInputUserId">User </label>
                  <select name="user_id" id="" class="form-control">
                    @foreach ($users as $u )
                       <option value="{{$u->id}}" {{ $u->id == $member->user_id ? 'selected' : '' }}>{{$u->name}}</option> 
                    @endforeach

                 </select>
                  
                </div>
               </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputBranchId">Branch Id</label>
                      <select name="branch_id" id="" class="form-control">
                        @foreach ($branches as $b )
                           <option value="{{$b->id}}" {{ $b->id == $member->branch_id ? 'selected' : '' }}>{{$b->name}}</option> 
                        @endforeach
    
                     </select>
                      
                    </div>
                   </div>
                   <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputGuaranterId">Guaranter Id</label>
                      <select name="guaranter_id" id="" class="form-control">
                        @foreach ($guaranters as $g )
                           <option value="{{$g->id}}" {{ $g->id == $member->guaranter_id ? 'selected' : '' }}>{{$g->name}}</option> 
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