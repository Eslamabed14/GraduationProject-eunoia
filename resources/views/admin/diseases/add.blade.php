@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-center">Add new Disease</h1>
@endsection

@section('content')
<div>

    <div class="card">
        <div class="card-header">

            <a href="{{route('admin.diseases')}}" class="btn btn-primary float-right"> all diseases </a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @include('partial.alerts')
            <form action="{{route('admin.disease.store')}}" method="post">
                @csrf

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="levels" class="col-md-4 col-form-label text-md-end">{{ __('Level') }}</label>

                    <div class="col-md-6">
                        <input id="levels" type="text" class="form-control" name="levels" value="{{ old('levels') }}" required autocomplete="levels">
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" style="margin-left: 42%; " class="btn btn-success">
                            {{ __('Add Disease') }}
                        </button>
                    </div>
                </div>

            </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->


</div>
@endsection
