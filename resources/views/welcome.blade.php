<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keyboards"
          content="Quinn, quinn, zipse,  Zipse, Quinn Zipse, quinn zipse, quinnzipse, QuinnZipse, SlippedMars9866, software, developer, quinnzipse.dev, .dev, zipse.dev Dev, Programmer, Computers, Quinnzipse.me, zipse.me, QZ, Qzipse, zipsequinn, personal blog, blog">
    <meta name="description"
          content="A peek into the developer life of Quinn Zipse. There isn't really much here, but I hope you enjoy.">

    <title>quinnzipse.dev</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css"
          integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body data-spy="scroll" data-target="#navbar" data-offset="10">
@include('layouts.nav')
<main class="h-100">
    <div class="h-90 bg-primary shadow-lg" id="main">
        <div style="padding-top: 20%">
            <div class="h-20"></div>
            <div class="container d-none d-lg-block">
                <h1 class="text-white font-weight-light" style="font-size:3.7em;">Hi, I'm Quinn Zipse</h1>
                <h4 class="text-info font-weight-light" style="font-size:2em;">Welcome to my website!</h4>
                <br>
                <a href="#about-me" class="text-success font-weight-light" style="font-size: 1.2em; margin-bottom: 15px">Learn
                    More >></a>
            </div>
        </div>
    </div>
    <div class="bg-primary pb-5" id="about-me">
        <div class="container" style="padding-top: 3%">
            <br>
            <h1 class="text-darkerInfo " style="font-family: 'Raleway', sans-serif">About Me</h1>
            <hr class="mb-5 bg-info">

{{--            <!--Mobile version of about-me-->--}}
{{--            <div id="about-me" class="carousel slide d-block d-md-none" data-ride="carousel">--}}
{{--                <div class="carousel-inner">--}}
{{--                    <div class="carousel-item active">--}}
{{--                        <div class="col-md-4">--}}
{{--                            <div class="card h-100">--}}
{{--                                <a href="" class="about-link">--}}
{{--                                    <div class="card-header">--}}
{{--                                        <h5><i class="fas fa-school "> </i> Education</h5>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                                <div class="card-body">--}}
{{--                                    <p class="float-left">Current Senior of Kasson-Mantorville High School</p>--}}
{{--                                    <br>--}}
{{--                                    <br>--}}
{{--                                    <p class="float-left mb-0">Enrolled at <span class="font-weight-normal">Rochester Community and Technical College</span>--}}
{{--                                        through PSEO</p>--}}
{{--                                    <p class="float-right">2017-Present</p>--}}
{{--                                    <br>--}}
{{--                                    <br>--}}
{{--                                    <p class="float-left">Accepted to UW-La Crosse for Computer Science</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="carousel-item">--}}
{{--                        <div class="col-md-4">--}}
{{--                            <div class="card h-100">--}}
{{--                                <a href="" class="about-link">--}}
{{--                                    <div class="card-header">--}}
{{--                                        <h5><i class="fas fa-award"></i> Skills</h5>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                                <div class="card-body">--}}
{{--                                    <p>Languages I have used:</p>--}}
{{--                                    <ul>--}}
{{--                                        <li>PHP</li>--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="https://laravel.com/" class="about-link">Laravel Framework</a>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                        <li>Java</li>--}}
{{--                                        <li>JavaScript</li>--}}
{{--                                        <ul>--}}
{{--                                            <li>--}}
{{--                                                <a href="https://nodejs.org/en/" class="about-link">Node.js</a> & <a--}}
{{--                                                        href="https://reactjs.org/" class="about-link">React</a>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                        <li>Front-end Styling</li>--}}
{{--                                        <ul>--}}
{{--                                            <li>CSS & SCSS</li>--}}
{{--                                            <li><a href="https://getbootstrap.com/" class="about-link">Bootstrap</a> &--}}
{{--                                                <a--}}
{{--                                                        href="https://materializecss.com/" class="about-link">Materialize</a>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="carousel-item">--}}
{{--                        <div class="col-md-4">--}}
{{--                            <div class="card">--}}
{{--                                <a href="" class="about-link">--}}
{{--                                    <div class="card-header">--}}
{{--                                        <h5><i class="fas fa-users"></i> Clubs & Activities</h5>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                                <div class="card-body">--}}
{{--                                    <h6><i class="fas fa-bowling-ball"></i> Bowling</h6>--}}
{{--                                    <p>I was on my high school's bowling team for the 2018-2019 season. Now bowl on my--}}
{{--                                        free time with friends.</p>--}}
{{--                                    <h6><i class="fas fa-robot"></i> FIRST Robotics</h6>--}}
{{--                                    <p>I have been in robotics since 2017 and this will be my last year. I helped--}}
{{--                                        develop our team's <a href="https://team6758.com">website</a> and write code to--}}
{{--                                        operate our robot autonomously and with joystick controls.</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

            <!--Desktop version of about-me-->
            <div class="d-none d-lg-block">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card bg-cardColor text-info pb-7">
                            <div class="card-body pb-5">
                                <h5 class="text-white card-title mb-4"><i class="fas fa-school "> </i> Education</h5>
{{--                                <hr class="bg-success">--}}
                                <p class="float-left card-text">Graduated form Kasson-Mantorville High School <span class="ml-1 text-subtext">- Class of 2019</span></p>
                                <p class="float-left mb-0 card-text">Attended <span class="font-weight-normal">Rochester Community and Technical College</span>
                                    from 2017-2019</p>
                                <br>
                                <p class="float-left mt-3 card-text">Going to UW-La Crosse to Study Computer Science <span
                                            class="text-subtext ml-1">- Class of 2023</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-cardColor text-info pb-6">
                            <div class="card-body">
                                <h5 class="text-white card-title mb-4"><i class="fas fa-award"></i> Skills</h5>
                                <ul>
                                    <li>PHP</li>
                                    <ul>
                                        <li><a href="https://laravel.com/" class="text-info">Laravel Framework</a></li>
                                    </ul>
                                    <li>Java</li>
                                    <li>JavaScript</li>
                                    <li>Front-end Styling</li>
                                    <ul>
                                        <li>
                                            <a href="https://getbootstrap.com/" class="text-info">Bootstrap</a>
                                        </li>
                                        <li>
                                            <a href="https://materializecss.com/" class="text-info">Materialize</a>
                                        </li>
                                    </ul>
                                    <li>SQL & MYSQL</li>
                                    <ul>
                                        <li>DB2</li>
                                    </ul>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-cardColor text-info">
                            <div class="card-body">
                                <h5 class="text-white card-title mb-4"><i class="fas fa-users"></i> Clubs & Activities</h5>
                                <h6 class="text-subtext"><i class="fas fa-bowling-ball"></i> Bowling</h6>
                                <p>I was on my high school's bowling team for the 2018-2019 season. Now I bowl on my
                                    free time with friends.</p>
                                <h6 class="text-subtext"><i class="fas fa-robot"></i> FIRST Robotics</h6>
                                <p class="">I participated in FIRST Robotics since 2017 and just completed my last
                                    year in 2019. During my time, I developed
                                    our team's <a href="https://team6758.com" class="text-info">website</a> and code to operate our
                                    robot, either autonomously or via joystick controls.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex mt-4 mb-10">
                <a href="{{route('about')}}" class="ml-auto mr-auto text-quinn small" style="text-decoration: none">Click here to see my full bio page.</a>
        </div>
    </div>
    @include('layouts.footer')
</main>
</body>

</html>
