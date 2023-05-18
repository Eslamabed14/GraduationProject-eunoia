<!-- start asideBar -->
<aside class="col-md-2">
    <a href="{{route('home')}}"><div class="logo mt-5" data-aos="zoom-in"></div></a>
    <ul class="menu">
        <li data-aos="zoom-in-right" class="item {{ Request::path() ==  'requests' ? 'active' : ''  }} ">
            <a href="{{route('requests')}}">
                <img src="{{ asset('doctor/images/icon/vuesax-outline-more-square.png') }}" alt="">
                <span>Request</span>
            </a>
        </li>
        <li data-aos="zoom-in-right" class="item {{ Request::path() ==  'patients' ? 'active' : ''  }}">
            <a href="{{route('patients')}}">
                <img src="{{ asset('doctor/images/icon/vuesax-outline-people.png') }}" alt="">
                <span>Patients</span>
            </a>
        </li>
        <li data-aos="zoom-in-right" class="item {{ Request::path() ==  'profile/2' ? 'active' : ''  }}">
            <a href="{{route('profile', Auth::guard('webdoctor')->user()->id)}}">
                <img src="{{ asset('doctor/images/icon/vuesax-outline-frame.png') }}" alt="">
                <span>{{Auth::guard('webdoctor')->user()->name}}</span>
            </a>
        </li>

        <li data-aos="zoom-in-right" class="item {{ Request::path() ==  'appointments' ? 'active' : ''  }}">
            <a href="{{route('appointments')}}">
                <img src="{{ asset('doctor/images/icon/vuesax-outline-calendar.png') }}" alt="">
                <span>Appointments</span>
            </a>
        </li>

        <li data-aos="zoom-in-right" class="item">
            <a href="{{route('doctor.logout')}}">
                <img src="{{ asset('doctor/images/icon/vuesax-outline-logout.png') }}" alt="">
                <span>log out</span>
            </a>
        </li>
    </ul><!-- ./menu -->
</aside>
<!-- end asideBar -->
