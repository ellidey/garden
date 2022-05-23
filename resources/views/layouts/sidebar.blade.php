<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ route('root') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('assets/images/logo-sm.png') }}" alt="" height="40">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('assets/images/logo-dark.png') }}" alt="" height="35">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('root') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('assets/images/logo-sm.png') }}" alt="" height="40">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('assets/images/logo-light.png') }}" alt="" height="35">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span >Меню сайта</span></li>
                @php ($categories = \App\Models\Category::get())
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse"
                           role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                            <i class="ri-shopping-bag-line"></i> <span>Магазин</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarDashboards">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('root') }}" class="nav-link"> Все </a>
                                </li>

                                @foreach ($categories as $category)
                                    <li class="nav-item">
                                        <a href="{{ route('category', $category->id) }}" class="nav-link"> {{ $category->name }} </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                @if (Auth::user())
                    @if (Auth::user()->role_id == 1)
                        <li class="menu-title"><i class="ri-more-fill"></i> <span >Админ панель</span></li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ route('users.index') }}">
                                <i class="ri-user-line"></i> <span >Пользователи</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ route('categories.index') }}">
                                <i class="ri-filter-2-line"></i> <span>Категории</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ route('items.index') }}">
                                <i class="ri-shopping-cart-line"></i> <span>Позиции</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ route('orders.index') }}">
                                <i class="ri-shopping-cart-2-fill"></i> <span>Заказы</span>
                            </a>
                        </li>
                    @elseif (Auth::user()->role_id == 2)
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ route('orders.index') }}">
                                <i class="ri-shopping-cart-2-fill"></i> <span>Заказы</span>
                            </a>
                        </li>
                    @endif
                @else
                    <a class="nav-link menu-link" href="{{ route('login') }}">
                        <i class="ri-login-box-line"></i> <span>Авторизация</span>
                    </a>

                    <a class="nav-link menu-link" href="{{ route('register') }}">
                        <i class="ri-key-line"></i> <span>Регистрация</span>
                    </a>
                @endif
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
