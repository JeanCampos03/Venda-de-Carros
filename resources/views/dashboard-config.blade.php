@extends('index')

@section('conteudo_marca')
<link rel="stylesheet" href="{{ asset('css/dashs.css') }}">

<div class="profile-settings-wrapper mt-navbar">

    <aside class="sidebar">

        @yield('configs_marcas')
        @yield('configs_modelos')
        @yield('configs_cores')
        @yield('configs_carros')
        @yield('edit_marcas')
        @yield('edit_modelos')
        @yield('edit_cores')
        @yield('edit_veiculo')
       
        


@endsection