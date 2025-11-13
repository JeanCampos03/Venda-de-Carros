<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>Registrar</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link href="{{asset('css/register.css') }}" rel="stylesheet">
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="{{ route('register-store') }}" method="post">
        @csrf
        <h3>Novo Registro</h3>

        <label for="name">Nome</label>
        <input type="text" placeholder="Seu nome completo" id="name" name="name">

        <label for="email">E-mail</label>
        <input type="email" placeholder="email@email.com" id="email" name="email">

        <label for="password">Senha</label>
        <input type="password" placeholder="*******" id="password" name="password">

        <label for="password_confirmation">Confirme a senha</label>
        <input type="password" placeholder="*******" id="password_confirmation" name="password_confirmation">

        <button>Registrar</button>
        <div class="btn-container">
            <a class="back-home" href="{{ route('home') }}">
            <i class="fa fa-angle-double-left"></i> Voltar
            </a>

            <a class="new-register" href="login">
            <i class="fas fa-sign-in-alt"></i> Log in
            </a>
        </div>
    </form>
</body>
</html>
