 
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
           </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Members</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

 <section class="content">
    <div class="card card-primary">
       <div class="card-header">
          <h1>Member Status</h1>
          @if ($message = Session::get('msg'))
        <div class="alert alert-success">
              <p>{{ $message }}</p>
              @endif
         <h3 class="card-title"></h3>
           
        </div>
        <div class="card-body table-responsive">
           <div>
        <a href="{{route('member.create')}}">Add New</a>   
         </div>
          
            <table class="table table-hover text-nowrap">
                    
                <thead>
                  <tr>
                    <th>SL</th>
                    <th>Member No</th>
                    <th>MemeberName</th>
                    {{-- <th>Email</th> --}}
                    <th>Contact NO.</th>
                    <th>Gender</th>
              
                  
                   
                  
                    <th>Address</th>
                    <th>Photo</th>
                  
                    <th>Credit Source</th>
                    <th>BusinessName</th>
                    <th>Branch</th>
                    <th>User</th>
                    <th>Guaranter</th>
                    
                    <th>NID</th>
                    <th>Birth Certificate</th>                  
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($list as $k=>$l)
                  <tr>
                    <td>{{$k+1}}</td>
                    <td>{{$l->member_no}}</td>
                    <td>{{$l->name}}</td>
                    {{-- <td>{{$l->email}}</td> --}}
                    <td>{{$l->mobile}}</td>
                    <td>{{$l->gender}}</td>
                                
               
                    <td>{{$l->address}}</td>
                    <td><img src="/uploads/{{ $l->photo}}" width="100"> </td>
                    <td>{{$l->credit_source}}</td>
                    <td>{{$l->business_name}}</td>  
                    <td>{{$l->branch->name}}</td>
                    <td>{{$l->user->name}}</td>
                    <td>{{$l->guranter->name}}</td>
                   
                    <td><img src="/uploads/{{ $l->nid}}" width="100" height="80"></td>
                    <td><img src="/uploads/{{ $l->birth_certificate}}" width="100"></td>
                    <td>{{$l->status}}</td>  
                  <td>
                      <form action="{{ route('member.destroy',$l->id) }}" method="POST">
                  
                        <a class="btn btn-primary" href="{{ route('member.edit',$l->id) }}"><i class="fa fa-edit"></i></a>
         
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