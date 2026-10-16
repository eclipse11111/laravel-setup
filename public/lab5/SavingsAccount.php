<?php
require_once __DIR__ . '/BankAccount.php';
class SavingsAccount extends BankAccount
{
    public static float $interestRate = 0.05;
    public function applyInterest(): void
    {
        $interest = $this->balance * self::$interestRate;
        $this->deposit($interest);
    }
}