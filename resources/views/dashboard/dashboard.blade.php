@extends('layouts.default')

@push('css-library')
    <link rel="stylesheet" href="/css/library/flatpickr/flatpickr.min.css" />
    <link rel="stylesheet" href="/css/library/flatpickr/plugins/monthSelect/monthSelect.css" />
@endpush

@push('css')
    <link rel="stylesheet" href="css/app/dashboard/dashboard.css">
@endpush

@section('content')
    <div class="content__inner">
        <header class="content__title">
            <h1>Dashboard</h1>
        </header>

        <div class="col-sm-3 mb-5">
            <div class="input-group">
                <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                <div class="form-group">
                    <input type="text" name="income_date" id="datePicker"
                        value="2024-03"
                        class="form-control"
                        placeholder="Pick a date"
                    >
                    <i class="form-group__bar"></i>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Overview</h4>

                        <div class="chart">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Income</h4>

                        <div class="listview listview--striped income-listview">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Expense</h4>

                        <div class="listview listview--striped expense-listview">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="listview__item" id="main-list" hidden>
        <div class="widget-past-days__info">
            <h5 class="type">Income Type 1</h5>
        </div>
        <div class="widget-past-days__chart hidden-sm">
            <h5 class="amount">11111</h5>
        </div>
    </div>
@endsection

@push('js-library')
    <script src="/js/library/chart.js"></script>
    <script src="/js/library/flatpickr/flatpickr.min.js"></script>
    <script src="/js/library/flatpickr/plugins/monthSelect/monthSelect.js"></script>
@endpush

@push('js')
    <script>
        var dataURL = {!! json_encode(route("dashboardData")) !!};
    </script>

    <script src="/js/app/dashboard/dashboard.js"></script>
@endpush