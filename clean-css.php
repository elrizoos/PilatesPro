<?php

// Recorrer el directorio 'resources/views' para encontrar todos los archivos .blade.php
$directory = new RecursiveDirectoryIterator('resources/views');
$iterator = new RecursiveIteratorIterator($directory);
$regex = new RegexIterator($iterator, '/^.+\.blade\.php$/i', RecursiveRegexIterator::GET_MATCH);

foreach ($regex as $file) {
    $filePath = $file[0];
    $content = file_get_contents($filePath);

    // Eliminar todas las clases CSS de las etiquetas HTML
    $content = preg_replace('/\s*class\s*=\s*"[^\"]*"/i', '', $content);
    file_put_contents($filePath, $content);

    echo "Processed: $filePath\n";
}

echo "All classes removed from Blade templates.\n";
