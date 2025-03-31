<!-- resources/views/login.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión - Trincket Place</title>
</head>
<body>
    <h1>Iniciar sesión</h1>

    <form action="{{ route('usuario.login') }}" method="POST">
        @csrf
        <label for="email">Correo electrónico:</label>
        <input type="email" name="email" id="email" required>
        <br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>
        <br>

        <button type="submit">Iniciar sesión</button>
    </form>

    <a href="{{ route('register') }}">¿No tienes cuenta? Regístrate</a>
</body>
</html>
