@extends('layout.teacherLayout')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div>
        <div class="container-fluid mt-4" style="padding-left: 30px;">
            <h2><b>DASHBOARD</b></h2>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-4 col-sm-12 col-12">
                <a class="container-a" href="{{route('teacher.course-materials')}}"">
                    <div class="container-fluid container-card" style=" background-color:aliceblue;">
                        <div class="row">
                            <div class="col-7">
                                <ul>
                                    <li>
                                        <h4><b>Course Materials</b></h4>
                                    </li>
                                    <li>
                                        <h5>Total Materials:</h5>
                                    </li>
                                </ul>

                            </div>
                            <div class="col-5 text-end mb-2">

                                <div class="c-item">
                                    <img src="{{asset('images/library.png')}}" alt="material">
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-12 col-lg-4 col-sm-12 col-12">
                <a class="container-a" href="{{route('teacher.grade-assignments')}}">
                    <div class="container-fluid container-card" style=" background-color:beige;">
                        <div class="row">
                            <div class="col-7">
                                <ul>
                                    <li>
                                        <h4><b>Grade <br> Assignments</b></h4>
                                    </li>
                                    <li>
                                        <h5>Total Assignments: 5</h5>
                                    </li>
                                </ul>

                            </div>
                            <div class="col-5 text-end mb-2">

                                <div class="c-item">
                                    <img src=" {{asset('images/school.png')}}" alt="material">
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-12 col-lg-4 col-sm-12 col-12">
                <a class="container-a" href="{{route('teacher.submit-assignments')}}">
                    <div class="container-fluid container-card" style=" background-color:darkgrey;">
                        <div class="row">
                            <div class="col-7">
                                <ul>
                                    <li>
                                        <h4><b>Submit <br> Assignments</b></h4>
                                    </li>
                                    <li>
                                        <h5>Total Assignments:</h5>
                                    </li>
                                </ul>

                            </div>
                            <div class="col-5 text-end">

                                <div class="c-item mt-2">
                                    <img src="{{ asset('images/submit.png')}}" alt="material">
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    @endsection
