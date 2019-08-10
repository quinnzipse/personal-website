@extends('layouts.main')

@section('content')
    <div class="container">

        <div class="row d-inline">
            <h2 class="text-darkerInfo mt-5">Bio</h2>
            <hr class="bg-white border-white">
            <p class="text-faint"></p>
        </div>
        <div class="row d-inline">
            <h2 class="text-darkerInfo mt-4">Education</h2>
            <hr class="bg-white">
            <a data-toggle="collapse" class="edu-text" href="#KM_collapse" style="text-decoration: none">
                <h5 class="text-faint w-100 mt-3">Kasson-Mantorville High School <span class="float-right text-faint">Class of 2019</span>
                </h5>
            </a>
            <div class="container-fluid collapse" id="KM_collapse">
                <br>
                <p class="text-subtext">
                    I always wanted to become a programmer. Finally, I got the chance sophomore year my high school
                    started a FIRST Robotics Club.
                    This fueled my knowledge and passion for programming. I was a part of the club from sophomore year
                    to senior year. It was also
                    one of the only important things I did here since I attended RCTC the last two years I was enrolled
                    there.
                </p>
            </div>

            <a data-toggle="collapse" class="edu-text" href="#RCTC_collapse" style="text-decoration: none">
                <h5 class="edu-text text-faint mt-4 w-100">
                    Rochester Community and Technical College <span class="float-right">2017-2019</span>
                </h5>
            </a>
            <div class="container-fluid collapse" id="RCTC_collapse">
                <br>
                <p class="text-subtext">The last two years of my high school career were spent participating in <a
                            class="text-subtext" title="Post Secondary Enrollment Options"
                            href="https://education.mn.gov/MDE/fam/dual/pseo/" target="_blank"
                            style="text-decoration: none">PSEO</a>
                    at my local community college in pursuit of knowledge in CS. Accomplishing this helped me get a good
                    base in programming concepts and
                    gave me a head start on my college career earning 58 college credits before graduating high school
                    in 2019.
                </p>
                <p class="text-subtext">After high school, I decided to transfer my earned credits to UWL for further
                    education.</p>
            </div>
            <a data-toggle="collapse" class="edu-text" href="#UWL_collapse" style="text-decoration: none">
                <h5 class="edu-text text-faint mt-4 w-100">
                    University of Wisconsin - La Crosse <span class="float-right">Present</span>
                </h5>
            </a>
            <div class="container-fluid collapse" id="UWL_collapse">
                <br>
                <p class="text-subtext">After high school, I decided to transfer my earned credits to UWL for further
                    education. I am currently attending UWL and working on earning a Bachelor's degree in Computer
                    Science.</p>
            </div>
        </div>
        <div class="row d-inline">
            <h2 class="text-darkerInfo mt-5">Work Experience</h2>
            <hr class="bg-white">
            <h5 class="text-faint mt-5 w-100">
                AgVantage Software Inc. - Intern<span class="float-right">May 2019 - Present</span>
            </h5>
        </div>
    </div>
@endsection