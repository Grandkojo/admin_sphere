@extends('layout.adminLayout')


@section('content')
    <div class="admin-container">
        <div class="container-fluid mt-4">
            <h2><b>CREATE NEW STUDENT</b></h2>
        </div>
        <div class="student-container">

            <div class="add-student row">

                <form class="add-student" action="{{ route('admin.students.new') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"
                            required autocomplete="true">
                    </div>

                    <div class="form-group mb-3">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}"
                            required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="gender">Gender:</label>
                        <select name="gender" id="gender" class="form-control" required>
                            <option value="">Select Gender</option>
                            <option value="M" {{ old('gender') == 'M' ? 'selected' : '' }}>Male</option>
                            <option value="F" {{ old('gender') == 'F' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="department_id">Department:</label>
                        <select name="department_id" id="department_id" class="form-control" required>
                            <option value="">Select Department</option>

                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}"
                                    {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                    {{ $department->department_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <h5>Note: this would be a temporary password</h5>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class=" form-control btn btn-primary mb-3 mt-3">Create</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
