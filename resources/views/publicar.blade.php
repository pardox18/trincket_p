<!-- resources/views/publicar.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicar Producto - Trincket Place</title>
</head>
<body>
    <h1>Publicar un nuevo producto</h1>

    <form action="{{ route('producto.publicar') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="nombre">Nombre del producto:</label>
        <input type="text" name="nombre" id="nombre" required>
        <br>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" required></textarea>
        <br>

        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio" required>
        <br>

        <label for="imagen">Imagen del producto:</label>
        <input type="file" name="imagen" id="imagen" required>
        <br>

        <button type="submit">Publicar Producto</button>
    </form>

    <a href="{{ route('index') }}">Volver al inicio</a>
</body>
</html>
