@extends('layouts.default')

@section('content')
    <div class="content__inner">
        <header class="content__title">
            <h1>Expense Type</h1>
        </header>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <h4 class="card-title">Expense Type List</h4>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group text-right">
                            <a href="{{ route('expenseTypeCreate') }}" class="btn btn-info">Add New Expense Type</a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table" id="table">
                        <thead>
                            <tr>
                                <th>Expense Type Name</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($expenseTypes as $item)
                                <tr>
                                    <td>{{ $item['name'] }}</td>
                                    <td>
                                        <a href="{{ route('expenseTypeEdit', $item['id']) }}"
                                            class="btn btn-warning btn--icon-text"
                                        >
                                            <i class="zmdi zmdi-edit"></i>
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js-library')
    <script src="/js/library/jquery.dataTables.min.js"></script>
@endpush

@push('js')
    <script src="/js/app/expense_type/list.js"></script>
@endpush
