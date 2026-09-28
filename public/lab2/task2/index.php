<?php
session_start();
if (isset($_POST['login']) && isset($_POST['password'])) {

    if ($_POST['login'] == "admin" && $_POST['password'] == "1234") {
        $_SESSION['user'] = $_POST['login'];
    } else {
        $error = "Неправильний логін або пароль";
    }
}
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();

    header("Location: index.php");
    exit;
}
?>
<?php if (isset($_SESSION['user'])): ?>

    <h2>Привіт, <?php echo $_SESSION['user']; ?>!</h2>

    <form method="post">
        <button name="logout">Вихід</button>
    </form>
<?php else: ?>
    <form method="post">
        <input type="text" name="login" placeholder="Логін: admin">
        <input type="password" name="password" placeholder="Пароль: 1234">
        <button type="submit">Увійти</button>
    </form>
    <?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
<?php endif; ?>