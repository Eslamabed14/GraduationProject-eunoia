@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-center">Settings</h1>
@endsection

@section('content')
<div>

    <div class="card">

        <!-- /.card-header -->
        <div class="card-body">
            @include('partial.alerts')
            <form action="{{route('admin.settings.update', $settings->id)}}" method="post">
                @csrf

                <div class="row mb-3">
                    <label for="contact_us" class="col-md-4 col-form-label text-md-end">{{ __('Contact Us') }}</label>

                    <div class="col-md-6">
                        <textarea name="contact_us" id="contact_us" class="form-control" cols="30" rows="5" autofocus>{{$settings->contact_us}}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="terms" class="col-md-4 col-form-label text-md-end">{{ __('Terms') }}</label>

                    <div class="col-md-6">
                        <textarea name="terms" id="terms" class="form-control" cols="30" rows="10">{{$settings->terms}}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="policies" class="col-md-4 col-form-label text-md-end">{{ __('Policies') }}</label>

                    <div class="col-md-6">
                        <textarea name="policies" id="policies" class="form-control" cols="30" rows="10">{{$settings->policies}}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="about_us" class="col-md-4 col-form-label text-md-end">{{ __('About Us') }}</label>

                    <div class="col-md-6">
                        <textarea name="about_us" id="about_us" class="form-control" cols="30" rows="10">{{$settings->about_us}}</textarea>
                    </div>
                </div>



                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" style="margin-left: 42%; " class="btn btn-success">
                            {{ __('Update') }}
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
