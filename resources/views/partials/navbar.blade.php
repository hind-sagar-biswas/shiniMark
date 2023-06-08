<nav class="navbar navbar-expand-lg navbar-light bg-light  justify-content-between">
    <a class="navbar-brand" href="/"><img src="/images/logo.png" alt="ShiniMark logo" width="170px"></a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler bg-danger btn-danger" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <!-- <span class="navbar-toggler-icon text-white"></span> -->
        <i class="fas fa-grip-horizontal text-white"></i>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
            
            {{-- <li class="nav-item navigator" id="all-websites">
                <a target="_blank" href="/websites">
                    <button class="nav-link btn navigator-items">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                </a>
            </li> --}}
        </ul>

        <ul class="nav nav-pills ">
            @auth
                <li class="nav-item">
                    <a href="#" type="button" class="nav-link btn text-dark navigator">
                        <b>HELLO, {{auth()->user()->name}}</b>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/websites" type="button" class="nav-link btn text-danger navigator" id="all-websites">
                        <i class="fas fa-globe"></i>
                    </a>
                </li>
                <li class="nav-item" id="logout-button-container">
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="nav-link btn text-danger navigator" id="logout-button">
                            <i class="fas fa-power-off"></i>
                        </button>
                    </form>
                </li>
            @else
                <li class="nav-item" id="login-button-container">
                    <a href="/login" type="button" class="nav-link btn text-danger navigator">
                        <i class="fas fa-sign-in-alt"></i>
                    </a>
                </li>
            @endauth
        </ul>
    </div>
</nav>
<br>