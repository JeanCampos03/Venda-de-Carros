<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>Glassmorphism login Form Tutorial in html css</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link href="{{asset('css/login.css') }}" rel="stylesheet">
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="{{ route('login-store') }}" method="POST">
        @csrf
        <h3>Login</h3>

        <label for="username">Nome</label>
        <input type="text" placeholder="Email or Phone" id="username">

        <label for="password">Senha</label>
        <input type="password" placeholder="Password" id="password">

        <button>Entrar</button>
        <div class="btn-container">
            <a class="back-home" href="home">
            <i class="fa fa-angle-double-left"></i> Voltar
            </a>

            <a class="new-register" href="register">
            <i class="fa fa-plus-square"></i> Register
            </a>
        </div>
    </form>
</body>
</html>
