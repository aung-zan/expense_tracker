@extends('layouts.default')

@push('css-library')
    <link rel="stylesheet" href="/css/library/flatpickr/flatpickr.min.css" />
    <link rel="stylesheet" href="/css/library/flatpickr/plugins/monthSelect/monthSelect.css" />
@endpush

@push('css')
    <link rel="stylesheet" href="/css/app/income/edit.css">
@endpush

@section('content')
    <div class="content__inner">
        <header class="content__title">
            <h1>Edit Income</h1>
        </header>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Income</h4>

                <form action="{{ route('incomeUpdate', $incomeAmount['id']) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Income Name</label>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control"
                                    value="{{ $incomeAmount['income']['name'] }}" placeholder="New Income Name" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Income Amount</label>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">$</span>
                                    <div class="form-group">
                                        <input type="number" name="amount" class="form-control"
                                            value="{{ $incomeAmount['amount'] }}" placeholder="Income Amount">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <label class="col-sm-2 col-form-label">Income Date</label>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="income_date" id="datePicker"
                                            value="{{ $incomeAmount['income_date'] }}" placeholder="Pick a date">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center mt-5 mb-0">
                        <a href="{{ route('incomeList') }}" class="btn btn-secondary mr-2">Cancel</a>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js-library')
    <script src="/js/library/flatpickr/flatpickr.min.js"></script>
    <script src="/js/library/flatpickr/plugins/monthSelect/monthSelect.js"></script>
@endpush

@push('js')
    <script src="/js/app/income/edit.js"></script>
@endpush
