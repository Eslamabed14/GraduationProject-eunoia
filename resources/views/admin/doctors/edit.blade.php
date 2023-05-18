@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-center">Edit Doctor</h1>
@endsection

@section('content')
<div>

    <div class="card">
        <div class="card-header">

            <a href="{{route('admin.doctors')}}" class="btn btn-primary float-right"> All Doctors </a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @include('partial.alerts')
            <form action="{{route('admin.doctor.update', $doctor->id)}}" method="post">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" value="{{$doctor->name}}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" value="{{$doctor->email}}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                {{-- <div class="row mb-3">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div> --}}

                <div class="row mb-3">
                    <label for="gender"  class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>

                    <div class="col-md-6">
                        <select name="gender" id="gender" class="form-control">
                            <option value="{{$doctor->gender}}">{{$doctor->gender}}</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="phone_no" class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>

                    <div class="col-md-6">
                        <input id="phone_no" value="{{$doctor->phone_no}}" type="number" class="form-control" name="phone_no"  required >
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="age" class="col-md-4 col-form-label text-md-end">{{ __('Age') }}</label>

                    <div class="col-md-6">
                        <input id="age" type="number" value="{{$doctor->age}}" class="form-control" name="age"  required >
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="description" class="col-md-4 col-form-label text-md-end">{{__('Description')}}</label>
                    <div class="col-md-6">
                        <textarea name="description" id="description" class="form-control" cols="30" rows="5" required>{{$doctor->description}}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="address" class="col-md-4 col-form-label text-md-end">{{__('Address')}}</label>
                    <div class="col-md-6">
                        <textarea name="address" id="address" class="form-control" cols="30" rows="5" required>{{$doctor->address}}</textarea>
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" style="margin-left: 42%; " class="btn btn-success">
                            {{ __('Edit doctor') }}
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
