@extends('layout.studentLayout')


@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div>
        <div class="container-fluid mt-4">
            <h2><b>DASHBOARD</b></h2>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-4 col-sm-12 col-12">
                <a class="container-a" href="{{ route('student.course-materials') }}">
                    <div class="container-fluid container-card" id="container-card1">
                        <div class="row">
                            <div class="col-7">
                                <ul>
                                    <li>
                                        <h4><b>Course Materials</b></h4>
                                    </li>
                                    <li>
                                        <h5>Total Materials: 5</h5>
                                    </li>
                                </ul>

                            </div>
                            <div class="col-5 text-end mb-2">

                                <div class="c-item">
                                    <img src="{{ asset('images/library.png') }}" alt="material">
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-12 col-lg-4 col-sm-12 col-12">
                <a class="container-a" href="{{ route('student.submit-assignment') }}" >
                    <div class="container-fluid container-card" id="container-card2">
                        <div class="row">
                            <div class="col-7">
                                <ul>
                                    <li>
                                        <h4><b>Submit <br> Assignment</b></h4>
                                    </li>
                                    <li>
                                        <h5>Total Pending: 5</h5>
                                    </li>
                                </ul>

                            </div>
                            <div class="col-5 text-end mb-2">

                                <div class="c-item">
                                    <img src="{{ asset('images/school.png') }}" alt="material">
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-12 col-lg-4 col-sm-12 col-12">
                <a class="container-a" href="{{ route('student.access-grades') }}">
                    <div class="container-fluid container-card" id="container-card3">
                        <div class="row">
                            <div class="col-7">
                                <ul>
                                    <li>
                                        <h4><b>Access <br> Grades</b></h4>
                                    </li>
                                    <li>
                                        <h5>Current GPA: 5</h5>
                                    </li>
                                </ul>

                            </div>
                            <div class="col-5 text-end">

                                <div class="c-item mt-2">
                                    <img src="{{ asset('images/grade.png') }}" alt="material">
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-12 col-lg-4 col-sm-12 col-12">
                <a class="container-a" href="{{ route('student.financial-status') }}">
                <div class="container-fluid
                    container-card" id="container-card4">
                    <div class="row">
                        <div class="col-7">
                            <ul>
                                <li>
                                    <h4><b>Financial <br> Status</b></h4>
                                </li>
                                <li>
                                    <h5>Status: 5</h5>
                                </li>
                            </ul>

                        </div>
                        <div class="col-5 text-end">

                            <div class="c-item mt-2">
                                <img src="{{asset('images/financial.png')}}" alt="material">
                            </div>
                        </div>
                    </div>
            </div>
            </a>
        </div>



    </div>
@endsection
