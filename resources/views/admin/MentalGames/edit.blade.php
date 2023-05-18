@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-center">Edit Game</h1>
@endsection

@section('content')
<div>

    <div class="card">
        <div class="card-header">

            <a href="{{route('admin.games')}}" class="btn btn-primary float-right"> All games </a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @include('partial.alerts')
            <form action="{{route('admin.game.update', $game->id)}}" method="post">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                    <div class="col-md-6">
                        <input id="title" type="text" value="{{$game->title}}" class="form-control" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                    <div class="col-md-6">
                        <textarea name="description" id="description" class="form-control" cols="30" rows="10" required>{{$game->description}}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="answer" class="col-md-4 col-form-label text-md-end">{{ __('Answer') }}</label>

                    <div class="col-md-6">
                        <textarea name="answer" id="answer" class="form-control" cols="30" rows="10">>{{$game->answer}}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>

                    <div class="col-md-6">
                        <input id="image" type="text" value="{{$game->image}}" class="form-control" name="image" value="{{ old('image') }}" autocomplete="image">
                    </div>
                </div>

                {{-- <div class="row mb-3">
                    <label for="link" class="col-md-4 col-form-label text-md-end">{{ __('Link') }}</label>

                    <div class="col-md-6">
                        <input id="link" type="text" value="{{$game->link}}" class="form-control" name="link" value="{{ old('link') }}" autocomplete="link">
                    </div>
                </div> --}}

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" style="margin-left: 42%; " class="btn btn-success">
                            {{ __('Edit Game') }}
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
