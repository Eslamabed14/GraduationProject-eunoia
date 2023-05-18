@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-center">Edit art</h1>
@endsection

@section('content')
<div>

    <div class="card">
        <div class="card-header">

            <a href="{{route('admin.arts')}}" class="btn btn-primary float-right"> All arts </a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @include('partial.alerts')
            <form action="{{route('admin.art.update', $art->id)}}" method="post">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Video Title') }}</label>

                    <div class="col-md-6">
                        <input id="title" type="text" value="{{$art->title}}" class="form-control" name="title" value="{{ old('title') }}" required autocomplete="link" autofocus>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="link" class="col-md-4 col-form-label text-md-end">{{ __('Video Link') }}</label>

                    <div class="col-md-6">
                        <input id="link" type="text" value="{{$art->link}}" class="form-control" name="link" value="{{ old('link') }}" required autocomplete="link" autofocus>
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
