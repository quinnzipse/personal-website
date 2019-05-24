<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keyboards"
          content="Quinn, quinn, zipse,  Zipse, Quinn Zipse, quinn zipse, quinnzipse, QuinnZipse, SlippedMars9866">
    <meta name="description" content="A peek into the life of the developer name Quinn Zipse">

    <title>quinnzipse.me</title>

    <link href="{{"css/app.css"}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css"
          integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <style type="text/css">
        body {
            position: relative;
        }
    </style>
</head>
<body data-spy="scroll" data-target="#navbar" data-offset="10">
<nav class="navbar navbar-expand-lg navbar-light bg-primary" id="navbar" style="position:fixed;top:0;left:0;right:0;">
    <a href="" class="navbar-brand text-white">quinnzipse.me</a>
    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target=".navbar-collapse"
            aria-controls="navbar1" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars text-white" style="font-size: .9em"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav ml-auto">
            @guest
            <li class="nav-item"><a href="{{"login"}}" class="nav-link text-white">Login</a></li>
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link text-white dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Hello, {{ Auth::user()->name }}! <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('home')}}">
                            Dashboard
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>
<main class="h-100">
    <div class="h-100 bg-primary shadow-lg" id="main">
        <div style="padding-top: 25%">
            <div class="h-20"></div>
            <div class="container d-none d-lg-block">
                <h1 class="text-white font-weight-light" style="font-size:3.7em;">Hello, I am Quinn Zipse</h1>
                <h4 class="text-white font-weight-light" style="font-size:2em;">Just your average computer guy.</h4>
                <br>
                <a href="#about-me" class="text-white font-weight-light" style="font-size: 1.2em; margin-bottom: 15px">Learn
                    More >></a>
            </div>
            <div class="d-sm-none container">
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <h1 class="text-white font-weight-light" style="font-size: 2rem">Hello, I am Quinn Zipse</h1>
                <h5 class="text-white font-weight-light">Just your average computer guy.</h5>
                <br>
                <a href="#about-me" class="text-white font-weight-light" style="font-size: 1.2em; margin-bottom: 15px">Learn
                    More >></a>
            </div>
            <div class="container d-none d-sm-block d-lg-none">
                <h1 class="text-white font-weight-light">Hello, I am Quinn Zipse</h1>
                <h4 class="text-white font-weight-light">Programming is what I do.</h4>
                <br>
                <a href="#about-me" class="text-white font-weight-light" style="font-size: 1.2em; margin-bottom: 15px">Learn
                    More >></a>
            </div>
            <div class='mt-5'>
                <br>
                <br>
                <br>
                <br>
            </div>
            <div id="about-me">
                <br>
            </div>
        </div>
    </div>
    </div>
    <div class="h-75">
        <div class="container" style="padding-top: 3%">
            <br>
            <h1 class="text-primary font-weight-light">About Me</h1>
            <hr>
            <br>

            <!--Mobile version of about-me-->
            <div id="about-me" class="carousel slide d-block d-md-none" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="col-md-4">
                            <div class="card h-100">
                                <a href="" class="about-link">
                                    <div class="card-header">
                                        <h5><i class="fas fa-school "> </i> Education</h5>
                                    </div>
                                </a>
                                <div class="card-body">
                                    <p class="float-left">Current Senior of Kasson-Mantorville High School</p>
                                    <br>
                                    <br>
                                    <p class="float-left mb-0">Enrolled at <span class="font-weight-normal">Rochester Community and Technical College</span>
                                        through PSEO</p>
                                    <p class="float-right">2017-Present</p>
                                    <br>
                                    <br>
                                    <p class="float-left">Accepted to UW-La Crosse for Computer Science</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-md-4">
                            <div class="card h-100">
                                <a href="" class="about-link">
                                    <div class="card-header">
                                        <h5><i class="fas fa-award"></i> Skills</h5>
                                    </div>
                                </a>
                                <div class="card-body">
                                    <p>Languages I know include:</p>
                                    <ul>
                                        <li>PHP</li>
                                        <ul>
                                            <li><a href="https://laravel.com/" class="about-link">Laravel Framework</a></li>
                                        </ul>
                                        <li>Java</li>
                                        <li>JavaScript</li>
                                        <ul>
                                            <li>
                                                <a href="https://nodejs.org/en/" class="about-link">Node.js</a> & <a
                                                        href="https://reactjs.org/" class="about-link">React</a>
                                            </li>
                                        </ul>
                                        <li>Front-end Styling</li>
                                        <ul>
                                            <li>CSS & SCSS</li>
                                            <li><a href="https://getbootstrap.com/" class="about-link">Bootstrap</a> & <a
                                                        href="https://materializecss.com/" class="about-link">Materialize</a>
                                            </li>
                                        </ul>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-md-4">
                            <div class="card">
                                <a href="" class="about-link">
                                    <div class="card-header">
                                        <h5><i class="fas fa-users"></i> Clubs & Activities</h5>
                                    </div>
                                </a>
                                <div class="card-body">
                                    <h6><i class="fas fa-bowling-ball"></i> Bowling</h6>
                                    <p>I am currently in my high school's bowling team for the 2018-2019 season.</p>
                                    <h6><i class="fas fa-robot"></i> FIRST Robotics</h6>
                                    <p>I have been in robotics since 2017 and this will be my last year. I helped develop our team's <a href="https://team6758.com">website</a>  and write code to operate our robot autonomously and with joystick controls.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Desktop version of about-me-->
            <div class="d-none d-md-block">
            <div class="row">
                <div class="col-md-4">
                    <div class="card h-100">
                        <a  class="about-link">
                        <div class="card-header">
                            <h5><i class="fas fa-school "> </i> Education</h5>
                        </div>
                        </a>
                        <div class="card-body">
                            <p class="float-left edu-text">Senior at Kasson-Mantorville High School</p>
                            <br>
                            <p class="float-left mb-0 edu-text">Enrolled at <span class="font-weight-normal">Rochester Community and Technical College</span>
                                through PSEO</p>
                            <br>
                            <p class="text-muted mt-0 edu-text">Working on Computer Science credits for transfer</p>
                            <p class="float-left">Accepted to UW-La Crosse for Fall 2019</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <a  class="about-link">
                        <div class="card-header">
                            <h5><i class="fas fa-award"></i> Skills</h5>
                        </div>
                        </a>
                        <div class="card-body">
                            <p>Languages I know include:</p>
                            <ul>
                                <li>PHP</li>
                                <ul>
                                    <li><a href="https://laravel.com/" class="about-link">Laravel Framework</a></li>
                                </ul>
                                <li>Java</li>
                                <li>JavaScript</li>
                                <ul>
                                    <li>
                                        <a href="https://nodejs.org/en/" class="about-link">Node.js</a> & <a
                                                href="https://reactjs.org/" class="about-link">React</a>
                                    </li>
                                </ul>
                                <li>Front-end Styling</li>
                                <ul>
                                    <li>CSS & SCSS</li>
                                    <li><a href="https://getbootstrap.com/" class="about-link">Bootstrap</a> & <a
                                                href="https://materializecss.com/" class="about-link">Materialize</a>
                                    </li>
                                </ul>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <a class="about-link">
                        <div class="card-header">
                            <h5><i class="fas fa-users"></i> Clubs & Activities</h5>
                        </div>
                        </a>
                        <div class="card-body">
                            <h6><i class="fas fa-bowling-ball"></i> Bowling</h6>
                            <p>I am currently in my high school's bowling team for the 2018-2019 season.</p>
                            <h6><i class="fas fa-robot"></i> FIRST Robotics</h6>
                            <p>I have been in robotics since 2017 and this will be my last year. I helped develop our team's <a href="https://team6758.com">website</a>  and write code to operate our robot autonomously and with joystick controls.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        </div>
    </div>
    <div class="bg-primary shadow-lg" style="height: 3%">

    </div>
    <footer class="footer-welcome">
        <span style="margin-left: 1%">© 2018 Quinn Zipse</span>
        <a href="https://www.facebook.com/quinnzipse" class="float-right mr-3 text-white"><i
                    class="fab fa-facebook text-white"></i> Facebook </a>
        <a href="https://www.twitter.com/quinn_zipse" class="float-right mr-3 text-white"><i
                    class="fab fa-twitter text-white"></i> Twitter</a>
    </footer>
</main>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
<script href="{{'js/all.js'}}" type="text/js"></script>
</body>

</html>
