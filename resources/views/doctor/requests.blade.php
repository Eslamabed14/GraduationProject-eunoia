<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- custom bootstrap4 link  and css-->
        <link rel="stylesheet" href="{{ asset('doctor/css/bootstrap.css') }}">


        <!-- home page css style file -->
        <link rel="stylesheet" href="{{ asset('doctor/css/home.css') }}">
        <!-- font awesome file -->
        <link rel="stylesheet" href="{{ asset('doctor/css/font-awesome.min.css') }}">
         <!-- aos animation file -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        <title>Requests</title>
    </head>
    <body>

        <!-- start asideBar -->
        @include('doctor.side')
        <!-- end asideBar -->

        <!-- main section -->
        <section class="container-content col-md-8 col-9">
            <h1 class="title mb-5">Requests</h1>
                <div class="row justify-content-start  align-items-center">

                    @foreach ($appointments as $appointment)

                    <div class="col-sm-6 col-xl-4 col-md-6  col-12" data-aos="fade-up" data-aos-duration="800">
                        <div class="card-item"><!-- card-item -->
                            <div class="info d-flex align-items-center">
                                <div class="photo">
                                    <img src="{{ asset('doctor/images/logo regala (Y).png') }}" alt="">
                                </div>
                                <div class="title">
                                    <h6>{{$appointment->Users->name}}</h6>
                                    <span>{{$appointment->Users->email}}</span>
                                </div>
                            </div>

                            <div class="time_date">
                                <span class="time mr-5">{{$appointment->time}}</span>
                                <span class="date">{{$appointment->date}}</span>
                            </div>

                            <div class="control">

                                <form action="{{ route('appointment.status', ['id'=>$appointment->id]) }}" method="POST">
                                    @csrf
                                    <span class="tick-circle mr-5">
                                        <input type="submit" name="status" value="accept" class="btn btn-primary">
                                    </span>
                                    <span class="close-circle">
                                        <input type="submit" name="status" value="reject" class="btn btn-danger float-right">
                                    </span>
                                </form>

                            </div>
                        </div><!-- ./card-item -->
                    </div>

                    @endforeach

                </div><!-- ./row -->
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
