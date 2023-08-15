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
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('deposite.create') }}">Add Deposite</a></li>
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
                    <h2 class="m-0">Add Deposit</h2>
                    @if ($message = Session::get('msg'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <!-- {{-- <h6 class="card-title"></h6>

                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a> --}} -->
                    <form class="row g-3" action="{{route('deposite.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-4">
                        <label for="" class="form-label">Name:</label> <br>
                            <select name="member_id" id="" class="form-control">
                                <option value="">Select Member</option>
                                @foreach($members as $m)
                                <option value="{{$m->id}}">{{$m->name}}</option>
                                @endforeach
                                

                                
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="number" class="form-control" id="amount" name="amount" placeholder="">
                        </div>

                        <div class="col-md-4">
                            <label for="interest" class="form-label">Interest Rate %</label>
                            <input type="number" class="form-control" id="interest" name="interest" placeholder="">
                        </div>

                        <div class="col-md-4">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="" cols="30" rows="3" class="form-control"></textarea>   
                        </div>
                        
                        <div class="col-md-3">
                            <label for="" class="form-label">Status</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="activeRadio" name="status" value="active" checked>
                                <label class="form-check-label" for="inactiveRadio">
                                    Active
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="inactiveRadio" name="status" value="inactive">
                                <label class="form-check-label" for="inactiveRadio">
                                    Inactive
                                </label>
                            </div>
                        </div>

                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>



                </div>
            </div>
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>


@include('admin.layout.footer')