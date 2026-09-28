<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: form.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<body>
<p>IP: <?= $_SERVER['REMOTE_ADDR'] ?></p>
<p>User-Agent: <?= $_SERVER['HTTP_USER_AGENT'] ?></p>
<p>PHP_SELF: <?= $_SERVER['PHP_SELF'] ?></p>
<p>Метод: <?= $_SERVER['REQUEST_METHOD'] ?></p>
<p>Шлях: <?= $_SERVER['SCRIPT_FILENAME'] ?></p>
</body>
</html>