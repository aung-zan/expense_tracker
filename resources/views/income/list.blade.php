@extends('layouts.default')

@push('css-library')
    <link rel="stylesheet" href="/css/library/flatpickr/flatpickr.min.css" />
    <link rel="stylesheet" href="/css/library/flatpickr/plugins/monthSelect/monthSelect.css" />
@endpush

@push('css')
    <link rel="stylesheet" href="/css/app/income/list.css">
@endpush

@section('content')
    <div class="content__inner">
        <header class="content__title">
            <h1>Income</h1>
        </header>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Income List</h4>
                <div class="row">
                    <div class="col-6 col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                            <div class="form-group">
                                <input type="text" class="form-control" name="income_date" value="{{ $date }}"
                                    id="datePicker" placeholder="Pick a date">
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-md-8">
                        <div class="form-group text-right">
                            <a href="{{ route('incomeCreate') }}" class="btn btn-info">Add New Income</a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table" id="table">
                        <thead>
                            <tr>
                                <th>Income name</th>
                                <th>Income amount</th>
                                <th>Income date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($incomeAmounts as $incomeAmount)
                                <tr>
                                    <td>{{ $incomeAmount['name'] }}</td>
                                    <td>{{ $incomeAmount['amount'] }}</td>
                                    <td>{{ $incomeAmount['income_date'] }}</td>
                                    <td class="table-button-center">
                                        <a href="{{ route('incomeEdit', $incomeAmount['id']) }}"
                                            class="btn btn-warning btn--icon-text mr-2">
                                            <i class="zmdi zmdi-edit"></i>
                                            Edit
                                        </a>
                                        <button type="button" class="btn btn-danger btn--icon-text delete"
                                            data-id="{{ $incomeAmount['id'] }}">
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
                        <input type="hidden" value="{{ route('incomeDelete', '###') }}" id="delete-url">
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
    <script src="/js/app/income/list.js"></script>
@endpush
