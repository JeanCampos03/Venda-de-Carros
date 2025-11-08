@extends('index')

@section('conteudo')
<link rel="stylesheet" href="css/profile.css">

<div class="profile-settings-wrapper mt-navbar">

    <aside class="sidebar">
        <div class="user-header">
            <div class="user-avatar">

                <img src="images/profile.jpg" class="rounded-circle p-1" width="110">
            </div>
            <div class="user-info">
                <span class="info-label">Usuário:</span>
                <span class="info-value">{{ Auth::user()->name }}</span>
            </div>
        </div>

        @yield('form_change_user')
        @yield('form_change_passwd')
        @yield('form_delete_user')



        @endsection