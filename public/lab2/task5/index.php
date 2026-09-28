<?php
session_start();
if (isset($_SESSION['last_activity'])) {
    if (time() - $_SESSION['last_activity'] > 300) {
        session_unset();
        session_destroy();
        session_start();
        echo "Сесію завершено через 5 хвилин неактивності";
    }
}
$_SESSION['last_activity'] = time();
?>
<h2>Сесія активна</h2>
<p>Остання активність:</p>
<?php
echo date("H:i:s", $_SESSION['last_activity']);
?>