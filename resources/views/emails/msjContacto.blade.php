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
		<li> Recibiste un mensaje de: {{ $mensaje['nombre'] }} </li>

		<li>Su email es: {{ $mensaje ['email'] }} </li>

		<li>Motivo: {{ $mensaje['motivo']}} </li>
	
		<li>Mensaje: {{ $mensaje['mensaje']}} </li>
	</ul>

	

</body>
</html>