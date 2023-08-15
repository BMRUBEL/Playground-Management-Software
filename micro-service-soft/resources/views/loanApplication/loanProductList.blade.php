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
                    <!-- <a href="{{route('loanform')}}" class="btn btn-primary"><h1>Create New Loan</h1></a> -->
                    <h1>Loan Products List</h1>
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
                <table class='table table-striped table-hover table-responsive  '>
                    <thead>
                        <tr>
                            <th>Number</th>
                            <th>Name</th>
                            <th>Maximum Amount</th>
                            <th>Minimum Amount</th>
                            <th>Late Penalties</th>
                            <th>Type</th>
                            <th>Interest Rate</th>
                            <th>Term</th>
                            <th>Term Period</th>
                            <th>Statuz</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($lists as $list)
                        <tr>
                            <td>{{$list->id}}</td>
                            <td>{{$list->name}}</td>
                            <td>{{$list->maximum_amount}}</td>
                            <td>{{$list->minimum_amount}}</td>
                            <td>{{$list->late_payment_penalties}}</td>
                            <td>{{$list->description}}</td>
                            <td>{{$list->late_payment_penalties}}</td>
                            <td>{{$list->term}}</td>
                            <td>{{$list->term_period}}</td>
                            <td>{{$list->status}}</td>
                            <td>
                                <a href="{{}}" class='btn btn-primary btn-sm'>Edit</a>
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