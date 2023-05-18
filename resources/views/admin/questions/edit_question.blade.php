@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-center">Edit Question</h1>
@endsection

@section('content')
<div>

    <div class="card">
        <div class="card-header">

            <a href="{{route('questions')}}" class="btn btn-primary float-right"> All Question </a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @include('partial.alerts')
            <form action="{{route('question.update',$question->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label for="question" class="col-md-4 col-form-label text-md-end">{{ __('question') }}</label>

                    <div class="col-md-6">
                        <input id="question" type="text" value="{{$question->question}}" class="form-control @error('question') is-invalid @enderror" name="question" required>

                        @error('question')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="survey_id" class="col-md-4 col-form-label text-md-end">{{ __('Survey Id') }}</label>
                    <div class="col-md-6">
                    <select name="survey_id" id="survey_id" class="form-control">
                        @foreach ( $surveys as $survey )
                        <option value="{{$survey->id}}">{{$survey->name}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" style="margin-left: 42%; " class="btn btn-success">
                            {{ __('Edit Question') }}
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
