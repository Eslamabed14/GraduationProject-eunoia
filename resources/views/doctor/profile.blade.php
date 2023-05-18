<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- custom bootstrap4 link  and css-->
    <link rel="stylesheet" href="{{ asset('doctor/css/bootstrap.css') }}">
    <!-- home page css style file -->
    <link rel="stylesheet" href="{{ asset('doctor/css/profile.css') }}">
    <!-- font awesome file -->
    <link rel="stylesheet" href="{{ asset('doctor/css/font-awesome.min.css') }}">
    <!-- aos animation file -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <title>Profile</title>
</head>

<body>

    <!-- start asideBar -->
    @include('doctor.side')
    <!-- end asideBar -->

    <!-- main section -->
    <section class="container-content col-md-8 col-9">
        <div class="profile-img ">
            <img class="w-100 h-100" src="{{ asset('doctor/images/Mental health-amico.png') }}" alt="profile-img">
        </div>

        <form method="POST" action=" {{route('webdoctor.update', $doctor->id ) }} " class="m-auto text-center">
            @csrf
            @method('PUT')

            <div class="form-group text-left">
                <input type="text" value="{{$doctor->name}}" name="name" id="name" required >
                <img src="{{ asset('doctor/images/icon/vuesax-outline-edit-2.png') }}" alt="edit">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>

            <div class="form-group text-left">
                <input type="email" value="{{$doctor->email}}" name="email" id="email" required>
                <img src="{{ asset('doctor/images/icon/vuesax-outline-edit-2.png') }}" alt="edit">
            </div>

            <div class="form-group text-left">
                <input class="password" type="password" name="password" id="password" required>
                <img class="showPassword" src="{{ asset('doctor/images/icon/vuesax-outline-eye-slash.png') }}" alt="slash">
            </div>

            <div class="form-group text-left">
                <input id="phone_no" value="{{$doctor->phone_no}}" type="intger" class="form-control" name="phone_no"  required >
                <img src="{{ asset('doctor/images/icon/vuesax-outline-edit-2.png') }}" alt="edit">
            </div>
            <div class="form-group text-left">
                <input type="text" value="{{$doctor->address}}" name="address" id="address" required>
                <img src="{{ asset('doctor/images/icon/vuesax-outline-edit-2.png') }}" alt="edit">
            </div>

            <button type="submit" class="btn">Save</button>
        </form>
    </section>
    <!-- main section -->






    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('doctor/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('doctor/js/popper.min.js') }}"></script>
    <script src="{{ asset('doctor/js/bootstrap.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('doctor/js/main.js') }}"></script>
</body>

</html>
