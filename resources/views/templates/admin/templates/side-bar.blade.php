<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-purple elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel mt-3 pb-1 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    {{_('') }}
                </a>
            </div>
        </div>
        <div class="user-panel mt-3 pb-1 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    {{Auth::user()->name }}
                </a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link {{($active == 'dashboard') ? "active" : ""}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{_('Приборная панель')}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{($active == 'forms') ? "active" : ""}}">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            {{_('Формы')}}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route("admin.form.request")}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{_('Запрос на звонок')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            {{_('Таблицы')}}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/tables/simple.html" class="nav-link">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <p>{{_('Пользователи')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/tables/simple.html" class="nav-link">
                                <i class="fa fa-home" aria-hidden="true"></i>
                                <p>{{_('Квартиры')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="pages/gallery.html" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            {{_('Галерея')}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            {{_('Страницы')}}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/examples/invoice.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{_('Главная')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/invoice.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{_('О нас')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
