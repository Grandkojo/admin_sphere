<!-- Header Layout -->
<style>
    @media (max-width: 768px) {
        .navbar-brand.mb-0.h1 {
            display: none;

        }

        .welcomeMessage {
            margin-right: 15%;
        }

    }
</style>
<div>
    <nav class="navbar" style="background-color: beige;">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <h3 class="welcomeMessage">Welcome, {{ Auth::user()->name }}</h3>
            <span class="navbar-brand mb-0 h1"><img src="{{ asset('images/adminsphere_logo.png') }}" alt="adminsphere_icon" class="def_size"></span>
        </div>
    </nav>
</div>