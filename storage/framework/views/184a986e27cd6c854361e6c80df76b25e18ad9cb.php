<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Mensaje Recibido</title>
</head>
<body>
	<p><strong> Hola <?php echo e($usuarioCliente->nombre); ?> <?php echo e($usuarioCliente->apellido); ?>, recibes este email porque el tatuador ha cancelado tu turno.
	 Puedes:</strong></p>
	<ul>
		<li> Solicitar un nuevo turno con otro tatuador. </li>
		<li> Realizar una consulta para saber el motivo de su cancelacion. </li>
	</ul>

	<p> Disculpe las molestias.¡Gracias por elegirnos!</p>
	<p>Saludos.</p>
	

	

</body>
</html><?php /**PATH C:\xampp\htdocs\tatuajes_tesis\resources\views/emails/turnoCancelado.blade.php ENDPATH**/ ?>