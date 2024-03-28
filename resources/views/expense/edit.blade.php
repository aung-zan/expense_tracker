@extends('layouts.default')

@push('css-library')
    <link rel="stylesheet" href="/css/library/select2.min.css">
    <link rel="stylesheet" href="/css/library/flatpickr/flatpickr.min.css" />
    <link rel="stylesheet" href="/css/library/flatpickr/plugins/monthSelect/monthSelect.css" />
@endpush

@push('css')
    <link rel="stylesheet" href="/css/app/expense/edit.css">
@endpush

@section('content')
    <div class="content__inner">
        <header class="content__title">
            <h1>Edit Expense</h1>
        </header>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Expense</h4>

                @error('expense')
                    <div class="alert alert-danger alert-dismissible fade show col-sm-7">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{ $message }}
                    </div>
                @enderror

                <form action="{{ route('expenseUpdate', $expense['id']) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Expense Category</label>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <select class="select2 @error('expense_type_id') is-invalid  @enderror"
                                    name="expense_type_id" id="expense_type_id">
                                    @foreach ($expenseCategory as $item)
                                        <option value="{{ $item['id'] }}"
                                            {{ $item['id'] == $expense['expense_type_id'] ? 'selected' : '' }}
                                        >
                                            {{ $item['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('expense_type_id')
                                    <div class="invalid-feedback text-left">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <label class="col-sm-2 col-form-label">Expense Name</label>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid  @enderror" placeholder="Expense Name"
                                    value="{{ old('name', $expense['name']) }}">
                                @error('amount')
                                    <div class="invalid-feedback text-left">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <label class="col-sm-2 col-form-label">Expense Amount</label>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">$</span>
                                    <div class="form-group">
                                        <input type="number" name="amount"
                                            class="form-control @error('amount') is-invalid  @enderror"
                                            placeholder="Expense Amount" value="{{ old('amount', $expense['amount']) }}">
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
                        <label class="col-sm-2 col-form-label">Expense Date</label>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                    <div class="form-group">
                                        <input type="text"
                                            class="form-control @error('expense_date') is-invalid  @enderror"
                                            name="expense_date" id="datePicker" placeholder="Pick a date"
                                            value="{{ old('expense_date', $expense['expense_date']) }}">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>
                                @error('expense_date')
                                    <div class="invalid-feedback text-left">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center mt-5 mb-0">
                        <a href="{{ route('expenseList') }}" class="btn btn-secondary mr-2">Cancel</a>
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
    <script src="/js/app/expense/edit.js"></script>
@endpush
