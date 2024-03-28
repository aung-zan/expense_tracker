@extends('layouts.default')

@push('css-library')
    <link rel="stylesheet" href="/css/library/flatpickr/flatpickr.min.css" />
    <link rel="stylesheet" href="/css/library/flatpickr/plugins/monthSelect/monthSelect.css" />
@endpush

@push('css')
    <link rel="stylesheet" href="/css/app/expense/list.css">
@endpush

@section('content')
    <div class="content__inner">
        <header class="content__title">
            <h1>Expense</h1>
        </header>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Expense List</h4>

                <div class="row">
                    <div class="col-6 col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                            <div class="form-group">
                                <input type="text" class="form-control" name="expense_date" value="{{ $date }}"
                                    id="datePicker" placeholder="Pick a date">
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-md-8">
                        <div class="form-group text-right">
                            <a href="{{ route('expenseCreate') }}" class="btn btn-info">Add New Expense</a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table" id="table">
                        <thead>
                            <tr>
                                <th>Expense name</th>
                                <th>Expense amount</th>
                                <th>Expense date</th>
                                <th>Expense type</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($expenses as $expense)
                                <tr>
                                    <td>{{ $expense['name'] }}</td>
                                    <td>{{ $expense['amount'] }}</td>
                                    <td>{{ $expense['expense_date'] }}</td>
                                    <td>{{ $expense['type'] }}</td>
                                    <td class="table-button-center">
                                        <a href="{{ route('expenseEdit', $expense['id']) }}"
                                            class="btn btn-warning btn--icon-text mr-2">
                                            <i class="zmdi zmdi-edit"></i>
                                            Edit
                                        </a>
                                        <button type="button" class="btn btn-danger btn--icon-text delete"
                                            data-id="{{ $expense['id'] }}">
                                            <i class="zmdi zmdi-delete"></i>
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <form action="#" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" value="{{ route('expenseDelete', '###') }}" id="delete-url">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js-library')
    <script src="/js/library/flatpickr/flatpickr.min.js"></script>
    <script src="/js/library/flatpickr/plugins/monthSelect/monthSelect.js"></script>
    <script src="/js/library/jquery.dataTables.min.js"></script>
@endpush

@push('js')
    <script src="/js/app/expense/list.js"></script>
@endpush