<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Tatuaje Tesis</title>
</head>
<body>
    <p>Bienvenido al sistema de administracion y gestion de tatuajes.</p>
    <p>Estos son sus datos de usuario para acceder al sistema:</p>
    <ul>
        <li>Nombre y Apellido: {{ $usuarioTatuador->nombre }}, {{ $usuarioTatuador->apellido }}</li>
        <li>Email: {{ $usuario->email }}</li>
        <li>Contraseña: {{ $usuario->pass }}</li>
        <li>DNI: {{ $usuarioTatuador->dni }}</li>
    </ul>
    <ul>
        <li>
            <a href="{{ url($url) }}">
                Acceso al sistema
            </a>
        </li>
    </ul>
</body>
</html>
