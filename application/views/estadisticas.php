<!DOCTYPE html>
<html>
<head>
    <title>Tu página</title>
</head>
<body>
    <!-- Verificar si la variable $eventos está definida -->
    <?php if (isset($eventos)) : ?>
        <!-- Utilizar la variable $eventos -->
        <?php foreach ($eventos as $evento) : ?>
            <p><?php echo $evento; ?></p>
        <?php endforeach; ?>
    <?php else : ?>
        <p>No se encontraron eventos.</p>
    <?php endif; ?>
</body>
</html>
