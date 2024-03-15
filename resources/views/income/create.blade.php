@extends('layouts.default')

@push('css-library')
    <link rel="stylesheet" href="/css/library/select2.min.css">
    <link rel="stylesheet" href="/css/library/flatpickr/flatpickr.min.css" />
    <link rel="stylesheet" href="/css/library/flatpickr/plugins/monthSelect/monthSelect.css" />
@endpush

@push('css')
    <link rel="stylesheet" href="/css/app/income/create.css">
@endpush

@section('content')
    <div class="content__inner">
        <header class="content__title">
            <h1>New Income</h1>
        </header>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Income</h4>

                <form action="{{ route('incomeStore') }}" method="POST">
                    @csrf
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Income Name</label>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <select class="select2" name="incomeId" id="incomeId">
                                    <option value="1">Subaru</option>
                                    <option value="2">Mitsubishi</option>
                                    <option value="3">Scion</option>
                                    <option value="4">Daihatsu</option>
                                    <option value="5">Hino</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <button type="button" class="btn btn-light btn--icon" id="newIncome">
                                    <i class="zmdi zmdi-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <input type="text" name="incomeName" class="form-control" placeholder="New Income Name">
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <button type="button" class="btn btn-light btn--icon" id="removeNewIncome">
                                    <i class="zmdi zmdi-minus"></i>
                                </button>
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
                                        <input type="number" name="amount" class="form-control" placeholder="Income Name">
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
                                        <input type="text" class="form-control" name="date" id="datePicker" placeholder="Pick a date">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center mt-5 mb-0">
                        <a href="{{ route('incomeList') }}" class="btn btn-secondary mr-2">Cancel</a>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js-library')
    <script src="/js/library/select2.full.min.js"></script>
    <script src="/js/library/flatpickr/flatpickr.min.js"></script>
    <script src="/js/library/flatpickr/plugins/monthSelect/monthSelect.js"></script>
@endpush

@push('js')
    <script src="/js/app/income/create.js"></script>
@endpush