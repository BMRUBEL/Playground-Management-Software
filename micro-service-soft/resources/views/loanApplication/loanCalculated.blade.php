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
        {{--Loan Calculation Form--}}
        @include('loanApplication.calculatorForm')



        <div class="card card-primary">
            <div class="card-header">
                <h1 class="card-title"> Clculated Loan Terms and Details</h1>
            </div>

            <div class="col-12 text-center ">
                <a href="#" class="text-center text-body">
                    <h3> <strong> Total Payable Amount :{{$lists[0]['totalPayable'] }}</strong> </h3>
                </a>

            </div>
            <div class="container">
                <table class='table table-striped table-hover'>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Amount to Pay</th>
                            <th>Penalty</th>
                            <th>Principal Amount</th>
                            <th>Interest</th>
                            <th>Rest Balance</th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach($lists as $list)
                        <tr>
                            <td>{{ $list['date'] }}</td>
                            <td>{{ $list['amount'] }}</td>
                            <td>{{ $list['penalty'] }}</td>
                            <td>{{ $list['principalAmnt'] }}</td>
                            <td>{{ $list['interest'] }}</td>
                            <td>{{ $list['balance'] }}</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</div>




<!-- /.card -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection