<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminSphere</title>
    <link rel="icon" href="images/adminsphere_icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{ asset('css/indexBlade.css') }}">
    <link rel="stylesheet" href="{{ asset('js/indexBlade.js') }}">


</head>

<body>

    @auth
        <nav class="navbar navbar-expand-sm fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}"><img class="adminsphere_logo"
                        src="{{asset('images/adminsphere_logo.png')}}" alt="adminsphere_logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse d-flex justify-content-end" id="collapsibleNavbar"
                    style="margin-right: 80px;">
                    <a href="{{ url('/') }}">Yeeeeee</a>
                </div>
            </div>
        </nav>
        <div style="margin-top: 90px;">
            <h3>You're logged in ,yaay</h3>
            <a href="{{ route('user.logout')}}">logout</a>
        </div>
    @else
        <nav class="navbar navbar-expand-sm fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}"><img class="adminsphere_logo"
                        src="{{ asset('images/adminsphere_logo.png') }}" alt="adminsphere_logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse d-flex justify-content-end" id="collapsibleNavbar"
                    style="margin-right: 80px;">
                    <ul class="navbar-nav">
                        <a href="{{ url('/login') }}" role='button' style="width:90px; font-size:20px"><b>Login</b></a>

                    </ul>
                    {{-- <ul class="navbar-nav">
                        <a  href="{{url('student/signup/')}}" role="button" style="width:90px; font-size:20px"><b>Sign Up</b></a>

                    </ul> --}}
                </div>
            </div>
        </nav>


        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                    <img src="{{ asset('images/education.jpg') }}" class="d-block w-100" alt="Slide 2">
                </div>
                <div class="carousel-item active">
                    <img src="{{ asset('images/education2.png') }}" class="d-block w-100" alt="Slide 1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/education.png') }}" class="d-block w-100" alt="Slide 3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <main style="margin-bottom: 80px;">
            <div class="container-fluid d-flex justify-content-center align-items-center p-5">
                <p style="font-size: 20px">AdminSphere aims to bridge the gap between students, teachers as well as
                    administrators.</p>
            </div>

            <div class="container-fluid d-flex justify-content-center align-items-center">
                <div style="margin-right: 120px; margin-left:100px;">
                    <a href="{{ url('/login') }}"><img class="def_size_1" src="{{ asset('images/homework.png') }}"
                            alt="student">
                    </a>
                    <p style="white-space: pre-line;">
                        Access your grades,
                        submit assignments,
                        check results and
                        more when you login.
                    </p>
                </div>
                <div style="margin-right: 120px; margin-left:120px">
                    <a href="{{ url('login') }}"><img class="def_size_1" src="{{ asset('images/lecture.png') }}"
                            alt="lecture"></a>
                    <p style="white-space: pre-line;">
                        Upload course material,
                        monitor students,
                        and grade students.
                    </p>
                </div>
                <div style="margin-right: 120px; margin-left:120px"">
                    <a href=""><img class=" def_size_1" src="{{ asset('images/administrator.png') }}"
                            alt="administrator"></a>
                    <p style="white-space: pre-line;">
                        Generate reports
                        and analysis.
                    </p>
                </div>
            </div>
        </main>
    @endauth

    <footer>
        <div class="container-fluid d-flex justify-content-center align-items-center">
            <h3 style="color: black;"><b>© Adminsphere 2024<b></h3>
        </div>
        <div class="container-fluid d-flex justify-content-center align-items-center">
            <a href="#"><img class="def_size" src="{{ asset('images/twitter.png') }}" alt="twitter_icon"></a>
            <a href="#"><img class="def_size" src="{{ asset('images/linkedin.png') }}"
                    alt="linkedin_icon"></a>
            <a href="#"><img class="def_size" src="{{ asset('images/discord.png') }}" alt="discord_icon"></a>
        </div>
    </footer>



    <script></script>

</body>

</html>
