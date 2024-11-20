<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />


</head>

<body>
    <div class="background-signup"></div>
    <nav class="navbar navbar-expand-sm fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}"><img class="adminsphere_logo"
                    src="{{ asset('/images/adminsphere_logo.png') }}" alt="adminsphere_logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-end" id="collapsibleNavbar"
                style="margin-right: 80px;">
                <a href="{{ url('/') }}" style="color: black;;;"><i class="fa fa-2x fa-home"
                        aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </nav>
    <div class="container mt-3">
        <h2 class="mt-3">Sign Up</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="ul">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Registration form -->
        <form action="{{ route('student.register.submit') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="role">Role:</label>
                <select name="role" id="role" class="form-control" required>
                    <option value="1" {{ old('role') == '1' ? 'selected' : '' }}>Student</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"
                    required>
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
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="form-group">
                <button type="submit" class=" form-control btn btn-primary mb-3 mt-3">Sign Up</button>
            </div>
        </form>
    </div>

    <!-- Add your JavaScript file here -->
    {{-- <script src="{{ asset('js/script.js') }}"></script> --}}
</body>

</html>
