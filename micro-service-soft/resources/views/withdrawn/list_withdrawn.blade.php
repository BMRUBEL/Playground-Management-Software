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
            <li class="breadcrumb-item active">Withdraw</li>
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
          <h2 class="m-0">Withdrawer list</h2>
          @if ($message = Session::get('msg'))
          <div class="alert alert-success text-center">
            <p>{{ $message }}</p>
          </div>
          @endif
        </div>
        <div class="card-body">
          <!-- {{-- <h6 class="card-title"></h6>

                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a> --}} -->

          <h4 class="pull-right" style="margin-left: 90%"> <a href="{{route('withdrawn.create')}}">
              <button class="btn btn-warning"> <i class="fa fa-plus-circle">&nbsp; Create</i></button></a></h4>
          <div class="col-md-12">
            <table class="table table-bordered">
              <thead>
                <tr>

                  <th style="vertical-align: top">Depositor Account No</th>
                  <th style="vertical-align: top">Member Id</th>
                  <th style="vertical-align: top">Withdrawl Date</th>
                  <th style="vertical-align: top">Deposited Amount(TK)</th>
                  <th style="vertical-align: top">Withdrawl Amount(TK)</th>
                  <th style="vertical-align: top">Remaining Amount(TK)</th>
                  <th style="vertical-align: top">Status</th>
                  <th style="vertical-align: top">Action</th>
                </tr>

              </thead>
              <tbody>
                <?php
                $total = 0;
                ?>
                @foreach ($withdraw_list as $s=>$l )
                <?php $total += $l->amount ?>
                <tr>

                  <td>{{$l->deposit_id}}</td>
                  <td>{{$l->memberinfo->name}}</td>
                  <td>{{$l->date}}</td>
                  <td style="text-align: right">{{$l->depositinfo->amount}}</td>
                  <td style="text-align: right">{{$l->amount}}</td>
                  <td style="text-align: right">{{$l->depositinfo->amount-$l->amount}}</td>
                  <td>{{$l->status}}</td>
                  <td>
                    <form action="{{ route('withdrawn.destroy',$l->id) }}" method="POST">

                      <a class="btn btn-primary btn-xs" href="{{ route('withdrawn.edit',$l->id) }}"><i class="fa fa-edit"></i></a>

                      @csrf
                      @method('DELETE')

                      <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                    </form>
                  </td>
                </tr>
                @endforeach

                <tr>
                  <td colspan="4"><strong>Total Withdrawl Amount</strong></td>
                  <td style="text-align: right"><strong>{{$total}}</strong></td>
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