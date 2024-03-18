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

                @if ($errors->has('income'))
                    <div class="alert alert-danger alert-dismissible fade show col-sm-7">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{ $errors->first('income') }}
                    </div>
                @endif

                <form action="{{ route('incomeStore') }}" method="POST">
                    @csrf
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Income Name</label>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <select class="select2" name="income_id" id="incomeId">
                                    @foreach ($incomes as $income)
                                        <option value="{{ $income->id }}">{{ $income->name }}</option>
                                    @endforeach
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
                                <input type="text" name="name" class="form-control" placeholder="New Income Name">
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
                                        <input type="number" name="amount" class="form-control @error('amount') is-invalid  @enderror" placeholder="Income Amount">
                                    </div>
                                </div>
                                @error('amount')
                                    <div class="invalid-feedback text-left">
                                        {{ $message }}
                                    </div>
                                @enderror
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
                                        <input type="text" class="form-control @error('income_date') is-invalid  @enderror" name="income_date" id="datePicker" placeholder="Pick a date">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>
                                @error('income_date')
                                    <div class="invalid-feedback text-left">
                                        {{ $message }}
                                    </div>
                                @enderror
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
    <script>
        var data = {!! json_encode($incomes) !!};
    </script>

    <script src="/js/app/income/create.js"></script>
@endpush