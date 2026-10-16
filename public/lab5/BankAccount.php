<?php
require_once __DIR__ . '/AccountInterface.php';
class BankAccount implements AccountInterface
{
    public const MIN_BALANCE = 0.0;
    protected float $balance;
    protected string $currency;

    public function __construct(float $initialBalance = 0.0, string $currency = "USD")
    {
        if ($initialBalance < self::MIN_BALANCE) {
            throw new Exception("Початковий баланс не може бути меншим за " . self::MIN_BALANCE);
        }
        $this->balance = $initialBalance;
        $this->currency = $currency;
    }

    public function deposit(float $amount): void
    {
        if ($amount <= 0) {
            throw new Exception("Сума поповнення повинна бути більшою за нуль");
        }
        $this->balance += $amount;
    }

    public function withdraw(float $amount): void
    {
        if ($amount <= 0) {
            throw new Exception("Сума для зняття повинна бути більшою за нуль");
        }

        if (($this->balance - $amount) < self::MIN_BALANCE) {
            throw new Exception("Недостатньо коштів");
        }
        $this->balance -= $amount;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }
}