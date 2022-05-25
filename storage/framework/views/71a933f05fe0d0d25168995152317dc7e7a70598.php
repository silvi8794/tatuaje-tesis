<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Mensaje Recibido</title>
</head>
<body>
	<p><strong>Estos son los datos del usuario que solicita una respuesta a la brevedad.</strong></p>
	<ul>
		<li> Recibiste un mensaje de: <?php echo e($mensaje['nombre']); ?> </li>

		<li>Su email es: <?php echo e($mensaje ['email']); ?> </li>

		<li>Motivo: <?php echo e($mensaje['motivo']); ?> </li>
	
		<li>Mensaje: <?php echo e($mensaje['mensaje']); ?> </li>
	</ul>

	

</body>
</html><?php /**PATH C:\xampp\htdocs\tatuajes_tesis\resources\views/emails/msjContacto.blade.php ENDPATH**/ ?>