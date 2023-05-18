@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-center">Add New Answer</h1>
@endsection

@section('content')
<div>

    <div class="card">
        <div class="card-header">

            <a href="{{route('answers')}}" class="btn btn-primary float-right"> All Answers</a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @include('partial.alerts')
            <form action="{{route('answer.store')}}" method="post">
                @csrf

                <div class="row mb-3">
                    <label for="answer" class="col-md-4 col-form-label text-md-end">{{ __('Answer') }}</label>

                    <div class="col-md-6">
                        <input id="answer" type="text" class="form-control @error('answer') is-invalid @enderror" name="answer" required autofocus>

                        @error('answer')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="weight" class="col-md-4 col-form-label text-md-end">{{ __('Weight') }}</label>

                    <div class="col-md-6">
                        <input id="weight" type="intger"class="form-control" name="weight"  required >
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" style="margin-left: 42%; " class="btn btn-success">
                            {{ __('Add Answer') }}
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
