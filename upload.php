<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['dibujo'])) {
    $target_dir = __DIR__ . "/uploads/";  // dentro de la carpeta del proyecto

    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($_FILES["dibujo"]["name"]);

    if (move_uploaded_file($_FILES["dibujo"]["tmp_name"], $target_file)) {
        // ruta accesible vía navegador
        $fileWebPath = "uploads/" . basename($_FILES["dibujo"]["name"]);
        $link = "http://localhost:8080/PAINT_ALAN/paint.html?image=" . urlencode($fileWebPath);

        echo "✅ Archivo subido correctamente.<br>";
        echo "Link para niños: <a href='$link'>$link</a>";
    } else {
        echo "❌ Error al subir el archivo.";
    }
}
?>

<form method="post" enctype="multipart/form-data">
    <label>📂 Sube dibujo lineal (SVG/PNG/JPG):</label>
    <input type="file" name="dibujo" accept=".svg,.png,.jpg,.jpeg">
    <input type="submit" value="Subir">
</form>
