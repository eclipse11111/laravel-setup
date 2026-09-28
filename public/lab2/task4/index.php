<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['add'])) {
    $_SESSION['cart'][] = $_POST['add'];
}

if (isset($_POST['delete'])) {
    $index = $_POST['delete'];
    unset($_SESSION['cart'][$index]);
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}

if (isset($_POST['checkout'])) {
    $previous = [];
    if (isset($_COOKIE['previous'])) {
        $previous = json_decode($_COOKIE['previous'], true);
        if (!is_array($previous)) {
            $previous = [];
        }
    }
    $previous = array_merge($previous, $_SESSION['cart']);
    setcookie(
        'previous',
        json_encode($previous),
        time() + 60 * 60 * 24 * 30
    );
    $_SESSION['cart'] = [];
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Кошик</title>
</head>
<body>
<h2>Кошик покупок</h2>
<form method="post">
    <input
        type="text"
        name="add"
        placeholder="Назва товару"
        required
    >
    <button type="submit">
        Додати в кошик
    </button>
</form>
<h3>Кошик:</h3>
<ul>
<?php foreach ($_SESSION['cart'] as $index => $item): ?>
    <li>
        <?= htmlspecialchars($item) ?>
        <form method="post" style="display: inline;">
            <button
                type="submit"
                name="delete"
                value="<?= $index ?>"
            >
                Видалити
            </button>
        </form>
    </li>
<?php endforeach; ?>
</ul>
<?php if (count($_SESSION['cart']) > 0): ?>
    <form method="post">
        <button type="submit" name="checkout">
            Оформити замовлення
        </button>
    </form>
<?php endif; ?>

<h3>Попередні покупки:</h3>
<ul>
<?php
$previous = [];
if (isset($_COOKIE['previous'])) {
    $previous = json_decode($_COOKIE['previous'], true);
    if (!is_array($previous)) {
        $previous = [];
    }
}
foreach ($previous as $item):
?>
    <li>
        <?= htmlspecialchars($item) ?>
    </li>
<?php endforeach; ?>
</ul>
</body>
</html>