@extends('layouts.admin')
@section('title')Dashboard | {{ config('app.name') }} @endsection
@section('content')
    @include('templates.header')
    @include('templates.admin.templates.side-bar',['activeParent' => 'dashboard'])
    @include('templates.admin.templates.navbar')
    <div class="content-wrapper">
    @include('templates.admin.templates.breadcrumb', ['active' => 'dashboard','breadcrumb'=>'Приборная панель'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header border-0">
                               <h5>
                                   <i class="fa fa-users" aria-hidden="true"></i>
                                   {{_('Статистика по пользователям')}}
                               </h5>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">
                                    Всего пользователей в системе: <strong>{{$usersCount ?? '0'}}</strong>
                                    <i class="fa fa-user" aria-hidden="true"></i>

                                </h5>

                            </div>
                            <div class="card-body">
                                <h5 class="card-title mr-1">
                                    Зарегистрировалось за последние сутки: <strong>{{$todayRegistrations ?? '0'}}</strong>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header border-0">
                                <h5>
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    {{_('Статистика по квартирам')}}
                                </h5>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">
                                    Всего объектов в системе: <strong>{{$countFlats ?? '0'}}</strong>
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                </h5>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">
                                    Активные в данный момент: <strong>{{$countActiveFlats ?? '0'}}</strong>
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                </h5>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('templates.footer')
@endsection
