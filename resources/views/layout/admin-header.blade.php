<!-- Header Layout -->
<div>
    <nav class="navbar fixed-top">
        <div class="container">
            <h3 class="welcomeMessage">Welcome, {{ Auth::user()->name }}</h3>
            {{-- <span class="navbar-brand mb-0 h1"><img src="{{ asset('images/adminsphere_logo.png') }}" alt="adminsphere_icon" class="def_size"></span> --}}
        </div>
    </nav>
</div>  