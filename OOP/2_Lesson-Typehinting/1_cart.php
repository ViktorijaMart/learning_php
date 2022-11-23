<?php
declare(strict_types=1);

/*
Sukurkite klasių hierarchiją, skirtą valdyti kliento prekių krepšelį. Reikalingos klasės - Cart, CartItem, CartDiscount, Customer.

Customer metodai:
__construct(string $name, string $surname, string $level)
getFullName()
getLevel() - gali būti 'A', 'B' arba 'C'

CartItem metodai:
__construct(string $name, int $price)
getName() - prekės pavadinimas pvz.: 'Iphone 13'
getPrice() - prekė kaina pvz.: 1300 (naudokite int)

CartDiscount metodai:
__construct(int $percent, string $userLevel)
getDiscountPercent() - nuolaidos procentas pvz.: 15
getCustomerLevel() - gali būti 'A', 'B' arba 'C'

Cart metodai:
__construct(Customer $customer)
addItem(CartItem $cartItem) - turi leisti pridėti CartItem objektą. Galite saugoti CartItem'us masyve.
addDiscount(CartDiscount $cartDiscount) - turi leisti pridėti CartDiscount objektus
getTotal() - turi grąžinti visą krepšelio sumą su pritaikytomis nuolaidomis.
Suapvalinkite iki 2 skaičių po kablelio
Skaičiuojant total nuolaidos sumuojasi. Turi būti pritaikomos tik tos nuolaidos,
kurių customerLevel sutampa su krepšelio kliento leveliu.

Kaip turėtų būti kviečiamas kodas:
$customer = new Customer('John', 'Smith', 'A');
$cart = new Cart($customer);
$iphone = new CartItem('Iphone 13', 1300);
$airpods = new CartItem('Airpods Pro', 200);
$cart->addItem($iphone);
$cart->addItem($airpods);
$cartDiscount1 = new CartDiscount(15, 'A');
$cart->addDiscount($cartDiscount1);
$cartDiscount2 = new CartDiscount(2, 'A');
$cart->addDiscount($cartDiscount2);
$cartDiscount3 = new CartDiscount(20, 'B');
$cart->addDiscount($cartDiscount2);
$total = $cart->getTotal();
var_dump($total); // 1249.5
*/

class Customer
{
    private string $name;
    private string $surname;
    private string $level;

    public function __construct(string $name, string $surname, string $level)
    {
        $levels = ['A', 'B', 'C'];
        $levelUpperCase = strtoupper($level);

        $this->name = $name;
        $this->surname = $surname;
        if(in_array($levelUpperCase, $levels)) {
            $this->level = $levelUpperCase;
        }
    }

    public function getFullName(): string
    {
        return $this->name . ' ' . $this->surname;
    }

    public function getLevel(): string
    {
        return $this->level;
    }

}

class CartItem
{
    private string $name;
    private int $price;

    public function __construct(string $name, int $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): int
    {
        return $this->price;
    }
}

class CartDiscount
{
    private int $percent;
    private string $userLevel;

    public function __construct(int $percent, string $userLevel)
    {
        $levels = ['A', 'B', 'C'];
        $levelUpperCase = strtoupper($userLevel);

        $this->percent = $percent;
        if(in_array($levelUpperCase, $levels)) {
            $this->userLevel = $levelUpperCase;
        }
    }

    public function getPercent(): int
    {
        return $this->percent;
    }

    public function getUserLevel(): string
    {
        return $this->userLevel;
    }
}

class Cart
{
    private Customer $customer;
    private array $cartItems = [];
    private array $cartDiscounts = [];

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function addItem(CartItem $cartItem): void
    {
        $this->cartItems[] = $cartItem;
    }

    public function addDiscount(CartDiscount $cartDiscount): void
    {
        $this->cartDiscounts[] = $cartDiscount;
    }

    public function getTotal(): float
    {
        $total = 0;

        foreach ($this->cartItems as $cartItem) {
            $total += $cartItem->getPrice();
        }

        foreach ($this->cartDiscounts as $cartDiscount) {
            if ($cartDiscount->getUserLevel() === $this->customer->getLevel()) {
                $total *= (100 - $cartDiscount->getPercent()) * 0.01;
            }
        }

        return $total;
    }
}

$customer = new Customer('John', 'Smith', 'A');
$cart = new Cart($customer);
$iphone = new CartItem('Iphone 13', 1300);
$airpods = new CartItem('Airpods Pro', 200);
$cart->addItem($iphone);
$cart->addItem($airpods);
$cartDiscount1 = new CartDiscount(15, 'A');
$cart->addDiscount($cartDiscount1);
$cartDiscount2 = new CartDiscount(2, 'A');
$cart->addDiscount($cartDiscount2);
$cartDiscount3 = new CartDiscount(20, 'B');
$cart->addDiscount($cartDiscount3);
$total = $cart->getTotal();
var_dump($total); // 1249.5