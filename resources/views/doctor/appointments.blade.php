<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- custom bootstrap4 link  and css-->
        <link rel="stylesheet" href="{{ asset('doctor/css/bootstrap.css') }}">

        <!-- time table css style file  -->
        <link rel="stylesheet" href="{{ asset('doctor/css/time_table.css') }}">

        <!-- font awesome file -->
        <link rel="stylesheet" href="{{ asset('doctor/css/font-awesome.min.css') }}">
         <!-- aos animation file -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        <title>Appointments</title>
    </head>
    <body>

        <!-- start asideBar -->
        @include('doctor.side')
        <!-- end asideBar -->

        <!-- main section -->
        <section class="container-content col-md-8 col-9">
            <h1 class="title mb-5">My Appointments</h1>
                <div class="row justify-content-start align-items-center">



                    <div class="time_table_wrapper">

                        @foreach ($appointments as $appointment)
                        <div class="table_item">
                            <div class="table_date" >{{$appointment->date}}</div>
                            <div class="table_content">
                                <div class="patient" >
                                    <h3 class="patient_name">patient : {{$appointment->users->name}}</h3>
                                    <span class="patient_date">Email : {{$appointment->users->email}}</span> <br> <br>
                                    <span class="patient_date">Time : {{$appointment->time}}</span> <br>
                                    <span class="patient_date">Session duration : 1 Hour</span>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div><!-- ./time_table_wrapper -->

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
