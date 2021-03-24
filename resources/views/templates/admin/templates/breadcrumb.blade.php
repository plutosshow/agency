<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{$breadcrumb}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>
                    <li class="breadcrumb-item {{($active ?? "" == 'dashboard') ? 'active' : ''}}">
                        @if(!($active ?? ''))
                            <a href="{{route('dashboard')}}">Приборная панель</a>
                        @else
                            Приборная панель
                        @endif
                    </li>
                    @if($breadcrumb != 'Приборная панель')
                        <li class="breadcrumb-item active">
                           {{$breadcrumb}}
                        </li>
                    @endif
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
