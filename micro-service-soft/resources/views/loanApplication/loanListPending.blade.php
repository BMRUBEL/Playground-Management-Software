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
                    <h1>Pending Loans</h1>
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
                <table class='table table-striped table-hover table-responsive '>
                    <thead>
                        <tr>
                            <th>Loan ID</th>
                            <th>first_payment_date</th>
                            <th>release_date</th>
                            <th>Amount</th>
                            <th>total_payable</th>
                            <th>total_paid</th>
                            <th>late_payment_penalties</th>
                            <th>installment</th>
                            <th>status</th>
                            <th>approved_date</th>
                            <th>approved_by</th>
                            <th>created_by</th>
                            <th>member_id</th>
                            <th>branch_id</th>
                            <th colspan="3" >Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($lists as $list)
                        <tr>
                            <td>{{$list->id}}</td>
                            <td>{{$list->first_payment_date}}</td>
                            <td>{{$list->release_date}}</td>
                            <td>{{$list->applied_amount}}</td>
                            <td>{{$list->total_payable}}</td>
                            <td>{{$list->total_paid}}</td>
                            <td>{{$list->late_payment_penalties}}</td>
                            <td>{{$list->installment}}</td>
                            <td>{{$list->status}}</td>
                            <td>{{$list->approved_date}}</td>
                            <td>{{$list->approved->name}}</td>

                            <td>{{$list->createdby->name}}</td>

                            <td>{{$list->Member->name}}</td>
                            <td>{{$list->Branch->name}}</td>
                            <td>
                                <a href="{{}}" class='btn btn-primary btn-sm'>Edit</a>
                                <!-- <button  onClick={}></button> -->

                            </td>
                            <td>
                                <button class='btn btn-primary btn-sm' onClick={}>Details</button>

                            </td>
                            <td>
                                <button class='btn btn-danger btn-sm' onClick={}>Deny</button>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection