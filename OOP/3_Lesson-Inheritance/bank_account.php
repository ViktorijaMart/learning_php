<?php
declare(strict_types=1);

class BankAccount
{
    protected float $balance;

    public function __construct(float $balance = 0)
    {
        if ($balance < 0) {
            $this->balance = 0;
            die('Balance cannot be less than 0');
        }
        $this->balance = $balance;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function spend(float $amount): void
    {
        if ($amount > $this->balance) {
            die('Cannot spend more than you have');
        }

        if ($amount <= 0) {
            die('Can only spend a positive amount');
        }

        $this->balance = $this->balance - $amount;
    }

    public function deposit(float $amount): void
    {
        $amount = $this->applyFees($amount);

        if ($amount > 0) {
            $this->balance = $this->balance + $amount;
        }
    }

    protected function applyFees(float $amount): float
    {
        return round($amount - $amount * 0.01);
    }
}

$account = new BankAccount(1000);
$account->deposit(1000);
echo $account->getBalance();
echo '<hr>';

/*
Sukurkite išvestines klases, kurios paveldėtų klasę BankAccount:
- klasė StudentAccount - Ši klasė turi netaikyti jokių mokesčių depozitams.
*/

class StudentAccount extends BankAccount
{
    public function deposit(float $amount): void
    {
        if ($amount > 0) {
            $this->balance = $this->balance + $amount;
        }
    }
}

$studentAccount = new StudentAccount(1000);
$studentAccount->deposit(1000);
echo $studentAccount->getBalance();
echo '<hr>';

/*
- klasė ChildAccount - Ši klasė neturi leisti per vieną kartą išleisti daugiau nei 10eur.
*/

class ChildAccount extends BankAccount
{
    public function spend(float $amount): void
    {
        if ($amount > 10) {
            die('Cannot spend more than 10 euros at a time');
        }
        parent::spend();
    }
}

$childAccount = new ChildAccount(1000);
//$childAccount->spend(11);
echo '<hr>';

/*
- klasė CreditAccount - Ši klasė turi leisti balansui nukristi iki -X sumos ($maxCreditAmount).
T.y. balansas gali buti neigiamas. $maxCreditAmount yra teigiama integer tipo reikšmė.
Jeigu $maxCreditAmount yra 100, tai reiškia, kad balansas negali kristi žemiau -100.
Ši suma ($maxCreditAmount) turi būti paduodama per konstruktorių.
Pavyzdys:
$account = new CreditAccount(1000, 100);
*/

class CreditAccount extends BankAccount
{
    protected float $maxCreditAmount;

    public function __construct(float $balance = 0, float $maxCreditAmount = 0)
    {
        parent::__construct($balance);

        if($maxCreditAmount < 0) {
            die('Max credit amount must be above 0');
        }
        $this->maxCreditAmount = $maxCreditAmount;
    }

    public function spend(float $amount): void
    {
        if ($amount > $this->balance + $this->maxCreditAmount) {
            die('Cannot spend more than you have');
        }

        if ($amount <= 0) {
            die('Can only spend a positive amount');
        }

        $this->balance = $this->balance - $amount;
    }
}

$newCreditAccount = new CreditAccount(1000, 100);
echo $newCreditAccount->getBalance();
$newCreditAccount->spend(1050);
echo '<br>';
echo $newCreditAccount->getBalance();
echo '<hr>';

/*
- klasė SavingsAccount. Ši klasė turi suteikti galimybę padidinti sąskaitos balansą tam tikru procentu.
T.y. - ji gali turėti public metodą 'addInterest', kurį iškvietus su X procentu (pvz.: 0.05), balansas padidėtų tuo procentu
Įsivaizduokite, kad šis metodas būtų kviečiamas kas metus ir sąskaita tokiu būdu augtų.
Prie balanso pridedamas palūkanas verskite į int tipą.
Pavyzdys:
$account = new SavingsAccount(1000);
$account->addInterest(0.05);
*/

class SavingsAccount extends BankAccount
{
    public function addInterest(float $percent): void
    {
        $this->balance += $this->balance * $percent;
    }
}

$savingsAccount = new SavingsAccount(1000);
echo $savingsAccount->getBalance();
$savingsAccount->addInterest(0.05);
echo '<br>';
echo $savingsAccount->getBalance();