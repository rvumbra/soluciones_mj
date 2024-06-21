<aside class="main-sidebar elevation-4" style="overflow-x:hidden">
    <p class="mt-3 mb-3 text-white text-center test-title">
        PRUEBA TÉCNICA
    </p>
    <hr>
    <p class="mt-3 mb-3 text-white text-center">
        SOLUCIONES INFORMÁTICAS MJ
    </p>
    <hr>
    <!-- Sidebar -->
    <div class="mt-4 sidebar os-host os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition"><div class="os-resize-observer-host"><div class="os-resize-observer observed" style="left: 0px; right: auto;"></div></div><div class="os-size-auto-observer" style="height: calc(100% + 1px); float: left;"><div class="os-resize-observer observed"></div></div><div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 684px;"></div><div class="os-padding"><div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll; right: 0px; bottom: 0px;"><div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
        <p class="text-white">MENU</p>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
                @php 
                    $endpoint = request()->segment(1);
                @endphp
                {{--Home--}}
                <li class="nav-item list-item {{$endpoint === 'home' ? 'active' : ''}}">
                    <a href="{{url('/home')}}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Inicio</p>
                    </a>
                </li>
                {{--Días festivos--}}
                <li class="nav-item list-item {{$endpoint === 'fest-days' ? 'active' : ''}}">
                    <a href="{{url('/')}}" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-calendar-minus"></i>
                        <p>Dias Festivos</p>
                    </a>
                </li>
                {{--Lista de usuarios--}}
                <li class="nav-item list-item {{$endpoint === 'list-users' ? 'active' : ''}}">
                    <a href="{{url('/list-users')}}" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-users"></i>
                        <p>Usuarios</p>
                    </a>
                </li>
            </ul>
        </nav>
  </aside>
