<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Un nuevo mensaje desde contacto!</title>
</head>
<body>
    <p>Un nuevo cliente ha escrito a través de la página web de contacto.</p>
    <h1>Datos del contacto</h1>
    <p>Nombre: {{$contactoData["nombre"]}}</p>
    <p>Email: {{$contactoData["email"]}}</p>
    <p>Mensaje: {{$contactoData["mensaje"]}}</p>
    <br>
    <p>Por favor responda este email lo más pronto posible.</p>
    <br>
    <p>que tenga un gran día!</p>
</body>
</html>