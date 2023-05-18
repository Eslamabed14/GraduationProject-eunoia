<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- custom bootstrap4 link  and css-->
    <link rel="stylesheet" href="{{ asset('doctor/css/bootstrap.css') }}">

    <!-- font awesome file -->
    <link rel="stylesheet" href="{{ asset('doctor/css/font-awesome.min.css') }}">
    <!-- aos animation file -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- home page css style file -->
    <link rel="stylesheet" href="{{ asset('doctor/css/patient_details.css') }}">

    <title>Patient Details</title>
</head>

<body>

    <!-- start asideBar -->
    @include('doctor.side')
    <!-- end asideBar -->

    <!-- main section -->
    <section class="container-content col-md-8 col-9">
        <h1 class="title mb-5">Good Morning,</h1>

        <div class="patient_details_wrapper">

            <div class="patient_profile">
                <div class="img">
                    <img src="{{ asset('doctor/images/Mental health-amico.png') }}" alt="patient_image_profile">
                </div>
                <div class="patient_info">
                    <h3 class="name">{{ $user->name }}</h3>
                    <span class="email">{{ $user->email }}</span>
                </div>
            </div><!-- ./patient_profile -->

            <div class="more_details">
                <div>
                    <h3>Age</h3>
                    <span>{{ $user->age }}</span>
                </div>
                <div>

                    <h3>Disease</h3>

                    @isset($user->diseases->name)
                        <span>{{ $user->diseases->name }}</span>
                    @else
                        <span>Not defined</span>
                    @endisset


                </div>
                <div>
                    <h3>Doctor</h3>
                    <span>{{ Auth::guard('webdoctor')->user()->name }}</span>
                </div>
                <div>

                    <h3>Survey Score</h3>

                    @isset($user->survey_score)
                        <span>{{ $user->survey_score }}</span>
                    @else
                        <span>Not defined</span>
                    @endisset


                </div>

            </div><!-- ./more_details -->


            <div class="cart_details">

                <div class="cart_item">
                    <div class="d-flex align-items-center">
                        <div class="mr-3 icon">
                            <img src="{{ asset('doctor/images/icon/rating.png') }}" alt="">
                        </div>
                        <div class="desc">
                            <span>Daily</span>
                            <h3>Mood</h3>
                        </div>
                    </div>
                    <div class="rating">

                        {{ $user->user_mode }}

                        {{-- Sad |
                        Sick |
                        Smile |
                        Luaghing |
                        Angry |
                        Thinking --}}
                    </div>
                </div>


                <div class="cart_item">
                    <div class="d-flex align-items-center">
                        <div class="mr-3 icon">
                            <img src="{{ asset('doctor/images/icon/rating-5.png') }}" alt="">
                        </div>
                        <div class="desc">
                            <span>note</span>
                            <h3>Status</h3>
                        </div>
                    </div>
                    <div class="rating">{{$Sentiment->status}}</div>
                </div>


                <div class="cart_item">
                    <div class="d-flex align-items-center">
                        <div class="mr-3 icon">
                            <img src="{{ asset('doctor/images/icon/rating-1.png') }}" alt="">
                        </div>
                        <div class="desc">
                            <span>art</span>
                            <h3>Drawing</h3>
                        </div>
                    </div>
                    <div class="rating">
                        <?php
                        $max = count($arts);
                        $score = ($user->track_art / $max) * 100;
                        echo floor($score) . '%';
                        ?>
                    </div>
                </div>

                <div class="cart_item">
                    <div class="d-flex align-items-center">
                        <div class="mr-3 icon">
                            <img src="{{ asset('doctor/images/icon/water.png') }}" alt="">
                        </div>
                        <div class="desc">
                            <span>Lifestyle</span>
                            <h3>Water</h3>
                        </div>
                    </div>
                    <div class="rating">
                        @isset($lifestyle)
                            {{ $lifestyle->water }}
                        @else
                            not defined yet
                        @endisset

                    </div>
                </div>

                <div class="cart_item">
                    <div class="d-flex align-items-center">
                        <div class="mr-3 icon">
                            <img src="{{ asset('doctor/images/icon/rating-2.png') }}" alt="">
                        </div>
                        <div class="desc">
                            <span>Activity</span>
                            <h3>Movement</h3>
                        </div>
                    </div>
                    <div class="rating">
                        <?php
                        $max = count($moves);
                        $score = ($user->track_move / $max) * 100;
                        echo floor($score) . '%';
                        ?>
                    </div>
                </div>


                <div class="cart_item">
                    <div class="d-flex align-items-center">
                        <div class="mr-3 icon">
                            <img src="{{ asset('doctor/images/icon/sleeping.png') }}" alt="">
                        </div>
                        <div class="desc">
                            <span>Lifestyle</span>
                            <h3>Sleeping</h3>
                        </div>
                    </div>
                    <div class="rating">
                        @isset($lifestyle)
                            {{ $lifestyle->sleep }}
                        @else
                            not defined yet
                        @endisset
                    </div>
                </div>


            </div><!-- ./patient_details_wrapper -->


            <div class="next_appointment">
                <h2 class="title mb-4">Next appointments</h2>
                @foreach ($appointments as $appointment)
                    <div class="d-flex next-parent ">
                        <div class="next_appointment_item">
                            <span class="date date-day">date</span>
                            <div class="date-box">
                                <span>{{ $appointment->date }}</span>
                                <span><img src="{{ asset('doctor/images/icon/vuesax-outline-calendar-2.png') }}"
                                        alt=""></span>
                            </div>
                        </div>

                        <div class="next_appointment_item">
                            <span class="date date-hour">Hour</span>
                            <div class="date-box">
                                <span>{{ $appointment->time }}</span>
                                <span><img src="{{ asset('doctor/images/icon/vuesax-outline-clock.png') }}"
                                        alt=""></span>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div><!-- ./next_appointment -->


            <div class="nots">
                <h2 class="title mb-4">note</h2>

                <form action="{{ route('updatenote', $user->id) }}" method="POST">
                    @csrf

                    <textarea name="doctor_note" class="form-control" id="doctor_note" cols="30" rows="5">{{ $user->doctor_note }}</textarea>

                    <button type="submit" class="done mt-3">Done</button>
                </form>
            </div>
        </div><!-- ./patient_details_wrapper -->
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
