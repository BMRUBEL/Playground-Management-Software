@include('admin.layout.header')
@include('admin.menu')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Deposite</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h2 class="m-0">Depositor list</h2>
          @if ($message = Session::get('msg'))
          <div class="alert alert-success text-center">
            <p>{{ $message }}</p>
          </div>
          @endif
        </div>
        <div class="card-body">
          <h4 class="pull-right" style="margin-left: 90%"> <a href="{{route('deposite.create')}}">
              <button class="btn btn-warning"> <i class="fa fa-plus-circle">&nbsp; Create</i></button></a></h4>
          <div class="col-md-12">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>SL</th>
                  <th>Depositor Name</th>
                  <th>Deposit Amount(TK)</th>
                  <th>Rate(%)</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Return Amount(TK)</th>
                  <th>Action</th>
                </tr>

              </thead>
              <tbody>
                <?php
                $total = 0;
                ?>
                @foreach ($depo_list as $s=>$l )
                <?php $total += $l->amount + ($l->amount * $l->interest) / 100 ?>
                <tr>
                  <td>{{$s+1}}</td>
                  <td>{{$l->member->name}}</td>
                  <td>{{$l->amount}}</td>
                  <td>{{$l->interest}}</td>
                  <td>{{$l->description}}</td>
                  <td>{{$l->status}}</td>
                  <td>{{$l->amount+($l->amount*$l->interest)/100}}</td>
                  <td>
                    <a class="btn btn-primary btn-xs" href="{{ url('deposite/'. $l->id . '/edit') }}"><i class="fa fa-edit"></i></a>
                    <form action="{{url('deposite/'.$l->id)}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                    </form>
                  </td>


                </tr>
                @endforeach
                <tr>
                  <td colspan="6"><strong>Total Return Amount</strong></td>
                  <td colspan="2"><strong>{{$total}}</strong></td>
                </tr>


              </tbody>
            </table>


          </div>
        </div>
      </div>
      <!--/. container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->


@include('admin.layout.footer')