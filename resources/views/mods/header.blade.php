<header>
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a id="menuBtn" class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                @include('layouts.navigation')
            </li>
        </ul>
    </nav>
    @include('mods.sidebar')
</header>
