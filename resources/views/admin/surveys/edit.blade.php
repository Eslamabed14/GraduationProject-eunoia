@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-center">Edit Survey</h1>
@endsection

@section('content')
<div>

    <div class="card">
        <div class="card-header">

            <a href="{{route('surveys')}}" class="btn btn-primary float-right"> All Surveys </a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @include('partial.alerts')
            <form action="{{route('survey.update',$survey->id)}}" method="post">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" value ="{{$survey->name}}" class="form-control @error('name') is-invalid  @enderror" name="name" required>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="type" class="col-md-4 col-form-label text-md-end">{{ __('Survey Type') }}</label>

                    <div class="col-md-6">
                        <input id="survey_type" type="text" value="{{$survey->survey_type}}" class="form-control @error('survey_type') is-invalid @enderror" name="survey_type" required>

                        @error('survey_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="disease_id" class="col-md-4 col-form-label text-md-end">{{ __('Disease Id') }}</label>

                    <div class="col-md-6">
                        <input id="disease_id" type="intger" value="{{$survey->disease_id}}" class="form-control" name="disease_id"  required >

                        @error('Disease Id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>


                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" style="margin-left: 42%; " class="btn btn-success">
                            {{ __('Edit Survey') }}
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
