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
                        <li class="breadcrumb-item active"><a href="{{ route('withdrawn.create') }}">Withdrawl entry</a></li>
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
                    <h2 class="m-0">Withdrawl Entry</h2>
                    @if ($message = Session::get('msg'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <form class="row g-3" action="{{route('withdrawn.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="col-md-4">
                            <label for="" class="form-label">Deposite Acc. no.</label> <br>
                            <input type="number" class="form-control" id="depo" name="deposit_id">
                            
                        </div>

                        <div class="col-md-4">
                            <label for="" class="form-label">Member Name</label> <br>
                            <div id="mem">
                                <select name="member_id" class="form-control" disabled>
                                    <option value=""></option>
                                </select>
                            </div>

                        </div>

                        <div class="col-md-4" id="diposit_amount">
                            <label for="interest" class="form-label">Deposit Amount</label>
                            <input type="number" class="form-control" id="interest" disabled>

                        </div>

                        <div class="col-md-4">
                            <label for="amount" class="form-label">Withdrawl Amount</label>
                            <input type="number" class="form-control" id="amount" name="amount" placeholder="">
                        </div>

                        <div class="col-md-4">
                            <label for="description" class="form-label">Withdrawl Date</label>
                            <input type="date" class="form-control" name="date">
                        </div>

                        <div class="col-md-3">
                            <label for="" class="form-label">Status</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="pending" name="status" value="pending" checked>
                                <label class="form-check-label" for="pending">
                                    Pending
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="approved" name="status" value="approved">
                                <label class="form-check-label" for="approved">
                                    Approved
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="release" name="status" value="release">
                                <label class="form-check-label" for="release">
                                    Release
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#depo').keyup(function() {
            let depositID = $(this).val();
            $.ajax({
                url: '{{route("getmember")}}',
                method: 'post',
                data: {
                    id: depositID,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    console.log(data);
                    let bt = `<label for="interest" class="form-label">Deposit Amount</label>`
                    let ht = `<select class="form-control" name="member_id" id="member">`


                    data.map((d, i) => {
                        bt += `<input type="number" class="form-control" id="interest" value="${d.amount}">`
                        ht += `<option value="${d.member_id}">${d.member.name}</option>`
                    })
                    ht += `</select> `
                    $('#mem').html(ht)
                    $('#diposit_amount').html(bt)
                }
            });
        });

    });
</script>



@include('admin.layout.footer')