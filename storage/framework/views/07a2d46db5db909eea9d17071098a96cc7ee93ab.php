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
        <li>Nombre y Apellido: <?php echo e($usuarioTatuador->nombre); ?>, <?php echo e($usuarioTatuador->apellido); ?></li>
        <li>Email: <?php echo e($usuario->email); ?></li>
        <li>Contraseña: <?php echo e($usuario->pass); ?></li>
        <li>DNI: <?php echo e($usuarioTatuador->dni); ?></li>
    </ul>
    <ul>
        <li>
            <a href="<?php echo e(url($url)); ?>">
                Acceso al sistema
            </a>
        </li>
    </ul>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\tatuajes_tesis\resources\views/emails/bienvenido_usuario.blade.php ENDPATH**/ ?>