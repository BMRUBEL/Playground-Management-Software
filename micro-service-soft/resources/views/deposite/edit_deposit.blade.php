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
                        <li class="breadcrumb-item active"><a href="{{ route('deposite.index') }}">Deposite</a></li>
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
                    <h2 class="m-0">Edit Deposit</h2>
                    @if ($message = Session::get('msg'))
                    <div class="alert alert-success text-center">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <form class="row g-3" action="{{ route('deposite.update', $deposit->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="col-md-4">
                        <label for="" class="form-label">Name:</label> <br>
                            <select name="member_id" id="" class="form-control">
                                <option value="">Select Member</option>
                                @foreach($members as $m)
                                <option value="{{$m->id}}" @if($deposit->member_id == $m->id) selected @endif>{{$m->name}}</option>
                                @endforeach   
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="number" class="form-control" id="amount" name="amount" value="{{$deposit->amount}}">
                        </div>

                        <div class="col-md-4">
                            <label for="interest" class="form-label">Interest Rate %</label>
                            <input type="number" class="form-control" id="interest" name="interest" value="{{$deposit->interest}}">
                        </div>

                        <div class="col-md-4">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="" cols="30" rows="3" class="form-control">{{$deposit->description}}</textarea>   
                        </div>
                        
                        <div class="col-md-3">
                            <label for="" class="form-label">Status</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="activeRadio" name="status" value="active" {{$deposit->status == 'active' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inactiveRadio">
                                    Active
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="inactiveRadio" name="status" value="inactive" {{$deposit->status == 'inactive' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inactiveRadio">
                                    Inactive
                                </label>
                            </div>
                        </div>

                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-primary">Update</button>
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