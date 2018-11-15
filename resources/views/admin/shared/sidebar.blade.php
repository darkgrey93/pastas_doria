<div class="col-md-3 left_col menu_fixed">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{route('admin.home')}}" class="site_title"><img src="{{ asset('logo.png') }}" alt="">
                <span>{{ config('app.name') }}</span></a>
        </div>
        <!-- menu profile quick info -->
    @include('admin.shared.menuProfile')
    <!-- /menu profile quick info -->

        <br/>

        <div class="clearfix"></div>
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a href="{{ route('admin.home')}}"><i class="fas fa-home"></i> Home
                        </a>
                    </li>
                    <li><a href="{{ route('admin.usuarios.index')}}"><i class="fas fa-user-tie"></i> Usuarios</a>
                    </li>
                    <li><a href="{{ route('admin.materias.index')}}"><i class="fab fa-product-hunt"></i> Materias primas</a>
                    </li>
                    <li><a href="{{ route('admin.proveedores.index')}}"><i class="fas fa-users"></i> Proveedores</a>
                    </li>
                    <li><a href="{{ route('admin.clientes.index')}}"><i class="fas fa-fire"></i> Clientes</a>
                    </li>
                    <li><a href="{{ route('admin.productos.index')}}"><i class="fas fa-box"></i> Productos</a>
                    </li>
                </ul>
            </div>


        </div>
    </div>
</div>
