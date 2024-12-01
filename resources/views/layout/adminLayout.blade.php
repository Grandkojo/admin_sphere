<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>AdminSphere | Admin</title>
    <link rel="icon" href="{{ asset('images/adminsphere_icon.png') }}">
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" /> --}}
    <link rel="stylesheet" href="{{ asset('css/adminNavbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/adminIndexBlade.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/adminStudents.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/adminTableTemplate.css')}}">
</head>

<body>
    @include('admin.sidebar')
    @include('layout.admin-header')
    <div class="background"></div>


    <div>
        @yield('content')
    </div>

    



    {{-- <script>
        // Close the offcanvas when a link inside is clicked (for smaller screens)
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', () => {
                let offcanvasElement = document.querySelector('#offcanvasSidebar');
                let offcanvas = bootstrap.Offcanvas.getInstance(offcanvasElement);
                if (offcanvas) offcanvas.hide(); // Hide the offcanvas for smaller screens

                // Tab switching logic
                // Remove 'active' class from all tabs and contents
                document.querySelectorAll('.nav-link').forEach(tab => tab.classList.remove('active'));
                document.querySelectorAll('.tab-content').forEach(content => content.classList.remove(
                    'active'));

                // Add 'active' class to the clicked tab and corresponding content
                link.classList.add('active');
                const selectedTab = link.getAttribute('data-tab');
                document.getElementById(selectedTab).classList.add('active');
            });
        });
    </script> --}}
</body>

<script src="{{ asset('js/adminTable.js')}}"></script>
</html>
