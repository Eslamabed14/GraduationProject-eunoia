@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-center">Edit move</h1>
@endsection

@section('content')
<div>

    <div class="card">
        <div class="card-header">

            <a href="{{route('admin.moves')}}" class="btn btn-primary float-right"> All moves </a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @include('partial.alerts')
            <form action="{{route('admin.move.update', $move->id)}}" method="post">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Video Title') }}</label>

                    <div class="col-md-6">
                        <input id="title" type="text" value="{{$move->title}}" class="form-control" name="title" value="{{ old('title') }}" required autocomplete="link" autofocus>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="link" class="col-md-4 col-form-label text-md-end">{{ __('Video Link') }}</label>

                    <div class="col-md-6">
                        <input id="link" type="text" value="{{$move->link}}" class="form-control" name="link" value="{{ old('link') }}" required autocomplete="link" autofocus>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                    <div class="col-md-6">
                        <textarea name="description" id="description" cols="30" rows="10" required autocomplete="description" class="form-control">{{$move->description}}</textarea>
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" style="margin-left: 42%; " class="btn btn-success">
                            {{ __('Edit Video') }}
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
