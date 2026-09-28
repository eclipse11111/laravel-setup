<?php
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    setcookie("name", $name, time() + 60 * 60 * 24 * 7);
} elseif (isset($_COOKIE['name'])) {
    $name = $_COOKIE['name'];
}
if (isset($_POST['delete'])) {
    setcookie("name", "", time() - 3600);
    $name = "";
}
?>

<form method="post">
    <input type="text" name="name" placeholder="Ваше ім'я">
    <button type="submit">Зберегти</button>
</form>
<?php
if (isset($name) && $name != "") {
    echo "Привіт, " . $name . "!";
}
?>
<form method="post">
    <button name="delete">Видалити cookie</button>
</form>