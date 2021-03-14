<header class="site-header sticky-top">
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0 d-flex justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">ГЛАВНАЯ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">О НАС</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            УСЛУГИ
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">ПОКУПКА</a></li>
                            <li><a class="dropdown-item" href="#">ПРОДАЖА</a></li>
{{--                            <li><hr class="dropdown-divider"></li>--}}
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ВХОД</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">РЕГИСТРАЦИЯ</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
</header>



