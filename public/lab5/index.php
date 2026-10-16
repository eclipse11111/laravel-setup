<?php
require_once __DIR__ . '/BankAccount.php';
require_once __DIR__ . '/SavingsAccount.php';
echo "ТЕСТУВАННЯ СИСТЕМИ БАНКІВСЬКИХ РАХУНКІВ<br>";

try {
    echo "1. Створення та успішні операції з BankAccount<br>";
    $acc1 = new BankAccount(500, "USD");
    echo "Початковий баланс: " . $acc1->getBalance() . " " . $acc1->getCurrency() . "<br>";

    $acc1->deposit(200);
    echo "Після поповнення на 200: " . $acc1->getBalance() . " " . $acc1->getCurrency() . "<br>";

    $acc1->withdraw(150);
    echo "Після зняття 150: " . $acc1->getBalance() . " " . $acc1->getCurrency() . "<br>";
} catch (Exception $e) {
    echo "Помилка: " . $e->getMessage() . "<br>";
}

try {
    echo "2. Спроба зняти більше ніж є на балансі<br>";
    $acc2 = new BankAccount(100, "UAH");
    echo "Поточний баланс: " . $acc2->getBalance() . " " . $acc2->getCurrency() . "<br>";
    echo "Спроба зняти 500 UAH...<br>";
    $acc2->withdraw(500);
} catch (Exception $e) {
    echo "Помилка: " . $e->getMessage() . "<br>";
}

try {
    echo "3. Спроба поповнення на від'ємну суму<br>";
    $acc3 = new BankAccount(300, "EUR");
    echo "Спроба поповнити на -50 EUR...<br>";
    $acc3->deposit(-50);
} catch (Exception $e) {
    echo "Помилка: " . $e->getMessage() . "<br>";
}

try {
    echo "4. Робота з накопичувальним рахунком SavingsAccount<br>";
    $savings = new SavingsAccount(1000, "USD");
    echo "Початковий накопичувальний баланс: " . $savings->getBalance() . " " . $savings->getCurrency() . "<br>";
    echo "Поточна відсоткова ставка: " . (SavingsAccount::$interestRate * 100) . "%<br>";
    $savings->applyInterest();
    echo "Баланс після нарахування відсотків: " . $savings->getBalance() . " " . $savings->getCurrency() . "<br>";
} catch (Exception $e) {
    echo "Помилка: " . $e->getMessage() . "<br>";
}