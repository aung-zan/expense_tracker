@extends('layouts.default')

@push('css-library')
    <link rel="stylesheet" href="/css/library/select2.min.css">
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

                @error('income')
                    <div class="alert alert-danger alert-dismissible fade show col-sm-7">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{ $message }}
                    </div>
                @enderror

                <form action="{{ route('incomeUpdate', $income['id']) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Income Type</label>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <select class="select2" name="income_type_id" id="income-type-id">
                                    <option value="">---</option>
                                    @foreach ($incomeTypes as $incomeType)
                                        <option value="{{ $incomeType['id'] }}"
                                            {{ $incomeType['id'] == old('income_type_id', $income['income_type_id']) ? 'selected' : '' }}>
                                            {{ $incomeType['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('income_type_id')
                                    <div class="invalid-feedback text-left">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <label class="col-sm-2 col-form-label">Income Amount</label>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">$</span>
                                    <div class="form-group">
                                        <input type="number" name="amount" value="{{ old('amount', $income['amount']) }}"
                                            class="form-control" placeholder="Income Amount">
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
                                        <input type="text" name="income_date"
                                            value="{{ old('income_date', $income['income_date']) }}" class="form-control"
                                            id="datePicker" placeholder="Pick a date">
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
                        <button type="submit" class="btn btn-success">Update</button>
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
    <script src="/js/app/income/edit.js"></script>
@endpush
