@extends('layouts.default')

@section('content')
    <div class="content__inner">
        <header class="content__title">
            <h1>Income</h1>
        </header>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="card-title">Income List</h4>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group text-right">
                            <a href="{{ route('incomeCreate') }}" class="btn btn-info">Add New Income</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection