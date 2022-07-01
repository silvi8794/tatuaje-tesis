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
        <li>Nombre y Apellido: <?php echo e($usuarioCliente->nombre); ?>, <?php echo e($usuarioCliente->apellido); ?></li>
        <li>Email: <?php echo e($usuario->email); ?></li>
        <li>Contraseña: <?php echo e($password); ?></li>
        <li>DNI: <?php echo e($usuarioCliente->dni); ?></li>
    </ul>
    <ul>
        <li>
            <a href='<?php echo e(url($url)); ?>'>
                Acceso al sistema y validacion
            </a>
        </li>
    </ul>
</body>
</html>

<?php /**PATH C:\laragon\www\tatuaje-tesis\resources\views/emails/bienvenido_cliente.blade.php ENDPATH**/ ?>