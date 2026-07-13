<!DOCTYPE html>
<html>
<head>
    <title>Inspect Images</title>
    <style>
        body { font-family: sans-serif; background: #eee; padding: 20px; }
        .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px; }
        .card { background: white; padding: 10px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); text-align: center; }
        img { max-width: 100%; max-height: 200px; object-fit: contain; display: block; margin: 0 auto 10px; background: #ccc; }
        .info { font-size: 12px; word-break: break-all; font-weight: bold; }
    </style>
</head>
<body>
    <h1>Tasty Food Image Assets</h1>
    <div class="grid">
        <?php
        $dir = __DIR__ . '/ASET';
        $files = scandir($dir);
        foreach ($files as $file) {
            if ($file === '.' || $file === '..') continue;
            $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            if (in_array($ext, ['png', 'jpg', 'jpeg', 'webp', 'gif'])) {
                echo '<div class="card">';
                echo '<img src="/ASET/' . htmlspecialchars($file) . '" alt="">';
                echo '<div class="info">' . htmlspecialchars($file) . '<br>(' . round(filesize($dir . '/' . $file)/1024, 1) . ' KB)</div>';
                echo '</div>';
            }
        }
        ?>
    </div>
</body>
</html>
