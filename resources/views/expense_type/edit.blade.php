@extends('layouts.default')

@section('content')
    <div class="content__inner">
        <header class="content__title">
            <h1>Edit Expense Type</h1>
        </header>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Expense Type</h4>

                <form action="{{ route('expenseTypeUpdate', $expenseType['id']) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-sm-2 col-form-label">Expense Type Name</div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid  @enderror"
                                    placeholder="New Expense Type"
                                    value="{{ old('name', $expenseType['name']) }}"
                                >
                                @error('name')
                                    <div class="invalid-feedback text-left">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center mt-5 mb-0">
                        <a href="{{ route('expenseTypeList') }}" class="btn btn-secondary mr-2">Cancel</a>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
