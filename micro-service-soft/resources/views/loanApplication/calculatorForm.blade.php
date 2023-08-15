<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"></h3>
    </div>
    <div class="container">
        <form method="post" action="{{route('loanCalculate')}}" class="validate" autocomplete="off" name="myForm">
            {{-- <!-- onsubmit="return validateForm()" -->--}}
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Apply Amount<span class="required"> *</span></label>
                        <input type="text" id="apply_amount" class="form-control float-field" name="apply_amount" value="<?php

                           use Hamcrest\Collection\IsEmptyTraversable;

                    if (isset($formdata['famount'])) {
                     echo $formdata['famount'];
                                                                                                                            } else {
                                                                                                                                echo old('apply_amount');
                                                                                                                            }  ?>">
                        <span id="amnt"></span>
                        @error('apply_amount')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Interest Rate Per Year<span class="required"> *</span></label>
                        <div class="input-group">
                            <input type="text" id="interest_rate" class="form-control float-field" name="interest_rate" value="<?php if (isset($formdata['fintrst'])) {
                                                                                                                                    echo $formdata['fintrst'];
                                                                                                                                } else {
                                                                                                                                    echo old('interest_rate');
                                                                                                                                } ?>">
                            <div class="input-group-append">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                        @error('interest_rate')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-3">

                    <div class="form-group">
                        <label class="control-label">Interest Type<span class="required"> *</span></label>
                        <select class="form-control auto-select" data-selected="fixed_rate" name="interest_type" id="interest_type">
                            <option value="">Select One</option>
                            <option value="flat_rate" {{ isset($formdata['ftype']) && $formdata['ftype'] == 'flat_rate' ? 'selected' : (old('interest_type') == 'flat_rate' ? 'selected' : '') }}>Flat Rate</option>
                            <option value="fixed_rate" {{ isset($formdata['ftype']) && $formdata['ftype'] == 'fixed_rate' ? 'selected' : (old('interest_type') == 'fixed_rate' ? 'selected' : '') }}>Fixed Rate</option>
                            <option value="mortgage" {{ isset($formdata['ftype']) && $formdata['ftype'] == 'mortgage' ? 'selected' : (old('interest_type') == 'mortgage' ? 'selected' : '') }}>Mortgage Amortization</option>
                            <option value="one_time" {{ isset($formdata['ftype']) && $formdata['ftype'] == 'one_time' ? 'selected' : (old('interest_type') == 'one_time' ? 'selected' : '') }}>One-time payment</option>
                        </select>
                    </div>

                    @error('interest_type')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Term<span class="required"> *</span></label>
                        <input type="text" class="form-control" id="term" name="term" value="<?php if (isset($formdata['fterm'])) {
                                                                                                    echo $formdata['fterm'];
                                                                                                } else {
                                                                                                    echo old('term');
                                                                                                } ?>" id="term">
                    </div>
                    @error('term')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="col-md-3">

                    <div class="form-group">
                        <label class="control-label">Term Period<span class="required"> *</span></label>
                        <select class="form-control auto-select" data-selected="+1 year" name="term_period" id="term_period">
                            <option value="">Select One</option>
                            <option value="+1 day" {{ isset($formdata['ftmPriod']) && $formdata['ftmPriod'] == '+1 day' ? 'selected' : (old('term_period') == '+1 day' ? 'selected' : '') }}>Day</option>
                            <option value="+1 week" {{ isset($formdata['ftmPriod']) && $formdata['ftmPriod'] == '+1 week' ? 'selected' : (old('term_period') == '+1 week' ? 'selected' : '') }}>Week</option>
                            <option value="+1 month" {{ isset($formdata['ftmPriod']) && $formdata['ftmPriod'] == '+1 month' ? 'selected' : (old('term_period') == '+1 month' ? 'selected' : '') }}>Month</option>
                            <option value="+1 year" {{ isset($formdata['ftmPriod']) && $formdata['ftmPriod'] == '+1 year' ? 'selected' : (old('term_period') == '+1 year' ? 'selected' : '') }}>Year</option>
                        </select>
                        @error('term_period')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">First Payment date<span class="required"> *</span></label>
                        <input type="date" class="form-control datepicker" name="first_payment_date" id="first_payment_date" value="<?php if (isset($formdata[5])) {
                                                                                                                                        echo $formdata[5];
                                                                                                                                    } else {
                                                                                                                                        echo date('Y-m-d');
                                                                                                                                    } ?>" style="color: black;">
                    </div>
                    @error('first_payment_date')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Late Payment Penalties<span class="required"> *</span></label>
                        <div class="input-group">
                            <input type="text" class="form-control float-field" name="penalties" value="<?php if (isset($formdata['fpnlty'])) {
                                                                                                            echo $formdata['fpnlty'];
                                                                                                        } else {
                                                                                                            if (old('penalties') !== null) {
                                                                                                                echo old('penalties');
                                                                                                            } else {
                                                                                                                echo 0;
                                                                                                            };
                                                                                                        } ?>">
                            {{--<input type="text" class="form-control float-field" name="penalties" value="{{ isset($formdata['fpnlty']) ? $formdata['fpnlty'] : (old('penalties') !== '' ? old('penalties') : 0) }}">--}}

                            {{--<input type="text" class="form-control float-field" name="penalties" value="{{ isset($formdata['fpnlty']) ? $formdata['fpnlty'] : (old('penalties') !== null ? old('penalties') : 0) }}">--}}
                            <div class="input-group-append">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                    </div>
                    @error('penalties')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror

                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block" style="margin-top: 33px;">Calculate</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#interest_type').change(function() {
            let type = $(this).val();
            if (type == 'one_time') {
                $('#term_period').prop('disabled', true);
                $('#term').prop('disabled', true);
            } else {
                $('#term_period').prop('disabled', false);
                $('#term').prop('disabled', false);
            }
        })


    })

    // function validateForm() {
    //     let apply_amount = $('#apply_amount').val();
    //     let interest_rate = $('#interest_rate').val();
    //     let interest_type = $('#interest_type').val();
    //     let term = $('#term').val();
    //     let term_period = $('#term_period').val();
    //     let first_payment_date = $('#first_payment_date').val();
    //     // Getting value using name input name
    //     let penalties = document.forms['myForm']['penalties'].value;
    //     if (apply_amount == '' || interest_rate == '' || interest_type == "" || term == "" || term_period == "" || first_payment_date == "" || penalties == "") {
    //         if (apply_amount == '') {
    //             $('#amnt').html("Amount should not be empty")
    //         }
    //         if (interest_rate == '') {}
    //         if (interest_type == '') {}
    //         if (term == '') {}
    //         if (term_period == '') {}
    //         if (first_payment_date == '') {}
    //         if (penalties == '') {}
    //     } else {
    //         if (interest_type == 'number') {}
    //     }

    //     console.log(apply_amount, interest_rate, interest_type, term, term_period, first_payment_date, penalties);
    // return false;
    // }
</script>