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
                        <li class="breadcrumb-item active">Report</li>
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
                    <h2 class="m-0">Deposit Withdrawl Report</h2>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="vertical-align: top">Total no of deposit</th>
                                    <th style="vertical-align: top">Total no of Withdrawl</th>
                                    <th style="vertical-align: top">Total Deposited Amount(TK)</th>
                                    <th style="vertical-align: top">Total Withdrawl Amount(TK)</th>
                                </tr>

                            </thead>
                            <tbody>
                                <tr>
                                    <td>3</td>
                                    <td>3</td>
                                    <td>70000.00</td>
                                    <td>17000.00</td>
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