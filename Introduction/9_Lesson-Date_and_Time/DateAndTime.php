<?php
echo '<pre>';

date_default_timezone_set('Europe/Vilnius');

/*
1. Išspausdinkite šio momento datą pasinaudodami funkcija 'date'
*/
function exercise1(): void
{
    echo date('Y-m-d H:i:s');
}

exercise1();
echo '<hr>';

/*
2. Išspausdinkite datą '2008-12-15 15:15' pasinaudodami funkcija 'date'
*/
function exercise2(): void
{
    echo date('2008-12-15 15:15');
}

exercise2();
echo '<hr>';

/*
3. Išspausdinkite šio momento datą skirtingais formatais, kurie atitiktų pavyzdžius:
- 1970 Mar 1 15:15:00
- 1970 Mar 01 15:15
- 1970 Mar 1st 11:15:00 PM
- 1970/3/1
- savaites numeris (52 savaitės metuose)
- dienos numeris (365 dienos metuose)
*/
function exercise3(): void
{
    echo date('Y M j H:i:s');
    echo '<br>';
    echo date('Y M d H:i');
    echo '<br>';
    echo date('Y M jS h:i:s A');
    echo '<br>';
    echo date('Y/n/j');
    echo '<br>';
    echo date('W');
    echo '<br>';
    echo date('z');
}

exercise3();
echo '<hr>';

/*
4. Sukurkite datos objektą iš šių tekstinių datų:
- 2000-03-02 15:30:00
- 2000/02/15 08:30:00 PM
- 2000 March 2nd 15:30:00
*/
function exercise4(): void
{
    $firstDate = new DateTime('2000-03-02 15:30:00');
    $secondDate = new DateTime('2000/02/15 08:30:00 PM');
    $thirdDate = DateTime::createFromFormat('Y M jS H:i:s', '2000 March 2nd 15:30:00');

    print_r($firstDate);
    print_r($secondDate);
    print_r($thirdDate);
}

exercise4();
echo '<hr>';

/*
5. Sukurkite datą iš '15th Jan 2021 8:15:01 PM' (data X). Pamodifikuokite, kad gautumėte:
- datą po 2 savaičių nuo datos X
- datą po 10 metų nuo datos X
- datą prieš 5 valandas nuo datos X
- paskutinę mėnesio dieną
- pirmą mėnesio dieną
- ateinantį antradienį
- datą prieš 1 dieną 8 valandas 15 minučių nuo datos X
*/

function exercise5(): void
{
    $date = new DateTime('15th Jan 2021 8:15:01 PM');
    print_r($date);

    print_r((new DateTime('15th Jan 2021 8:15:01 PM'))->modify('+2 weeks'));
    print_r((new DateTime('15th Jan 2021 8:15:01 PM'))->modify('+10 years'));
    print_r((new DateTime('15th Jan 2021 8:15:01 PM'))->modify('-5 hours'));
    print_r((new DateTime('15th Jan 2021 8:15:01 PM'))->modify('last day of this month'));
    print_r((new DateTime('15th Jan 2021 8:15:01 PM'))->modify('first day of this month'));
    print_r((new DateTime('15th Jan 2021 8:15:01 PM'))->modify('next Tue'));
    print_r((new DateTime('15th Jan 2021 8:15:01 PM'))->modify('1 day 8 hours 15 minutes ago'));

}

exercise5();
echo '<hr>';

function exercise6(): void
{
    $products = [
        [
            'name' => 'Wine glass',
            'last_purchase' => '2021 Jan 15 18:34:12',
        ],
        [
            'name' => 'Bread knife',
            'last_purchase' => '2020 Mar 15 23:14:00',
        ],
        [
            'name' => 'Blue chair',
            'last_purchase' => '2019 Dec 02 15:00:12',
        ],
    ];

    /*
    Išspausdinkite produktų paskutinių pirkimų santrauką:
    Wine glass 2021-01-15 18:34:12
    ...
    */
    foreach ($products as $product) {
        echo $product['name'] . ' ' . date_format(date_create_from_format('Y M d H:i:s', $product['last_purchase']), 'Y-m-d H:i:s');;
        echo '<br>';
    }
}
exercise6();
echo '<hr>';

function exercise7($date1, $date2): string
{
    /*
    Palyginkite datas ir grąžinkite atsakymą, kuri data naujesnė.
    Funkcijos kvietimas: exercise7(date_create('2022-01-25 17:13:25'), date_create('2020-01-25 17:13:25'));
    Rezultatas:
    'First date is newer'
    Funkcijos kvietimas: exercise7(date_create('2020-01-25 17:13:25'), date_create('2022-01-25 17:13:25'));
    Rezultatas:
    'Second date is newer'
    */

    if ($date1 > $date2) {
        return 'First date is newer';
    } else {
        return 'Second date is newer';
    }
}

echo exercise7(date_create('2022-01-25 17:13:25'), date_create('2020-01-25 17:13:25'));
echo '<br>';
echo exercise7(date_create('2020-01-25 17:13:25'), date_create('2022-01-25 17:13:25'));
echo '<hr>';

function exercise8($date): void
{
    /*
    Išspausdinkite paduotos datos skirtumą nuo dabartinio momento žodžiais.
    Funkcijos kvietimas: exercise8(date_create('2020-01-25 17:13:25'));
    Rezultatas:
    Supplied date was 891 days ago
    Funkcijos kvietimas: exercise8(date_create('2023-01-25 17:13:25'));
    Rezultatas:
    Supplied date is in the future
    */
    $dateNow = new DateTime();
    $interval = $dateNow->diff($date);

    if ($date < $dateNow) {
        echo 'Supplied date was ' . $interval->days . ' days ago';
    } else {
        echo 'Supplied date is in the future';
    }
}
exercise8(date_create('2020-01-25 17:13:25'));
echo '<br>';
exercise8(date_create('2023-01-25 17:13:25'));
echo '<hr>';

function exercise9($date): void
{
    /*
    Išspausdinkite datų skirtumą žodžiais.
    Funkcijos kvietimas: exercise9(date_create('2020-01-25 17:13:25'));
    Rezultatas:
    Supplied date was 2 years 1 months 11 days
    Funkcijos kvietimas: exercise9(date_create('2023-01-25 17:13:25'));
    Rezultatas:
    Supplied date is in the future
    */
    $dateNow = new DateTime();
    $interval = $dateNow->diff($date);


    if ($date < $dateNow) {
        print_r($interval);
//        echo 'Supplied date was ' . $interval->y . ' years ' . $interval->m . ' months ' . $interval->d . ' days ago.';
        echo $interval->format('Supplied date was %y years %m months %d days ago.');
    } else {
        echo 'Supplied date is in the future';
    }
}

exercise9(date_create('2020-01-25 17:13:25'));
echo '<br>';
exercise9(date_create('2023-01-25 17:13:25'));
echo '<hr>';

function exercise10(): array
{
    $products = [
        [
            'name' => 'Wine glass',
            'last_purchase' => '2022 Jan 15 18:34:12',
        ],
        [
            'name' => 'Bread knife',
            'last_purchase' => '2020 Mar 15 23:14:00',
        ],
        [
            'name' => 'Blue chair',
            'last_purchase' => '2019 Dec 12 15:00:12',
        ],
        [
            'name' => 'Cutting board',
            'last_purchase' => '2022 Feb 1 03:15:01',
        ],
    ];

    /*
    Grąžinkite iš funkcijos masyvą tik su tais produktais, kurie paskutinį kartą buvo pirkti einamaisiais metais.
    Ši funkcija turėtų veikti ir bet kuriais ateinančiais metais (2023, 2024 ir t.t.)
    */
    $thisYearsFirstDay = (new DateTime())->modify('first day of January this year today');
    $purchasedCurrentYear = [];

    foreach ($products as $product) {
        $lastPurchaseDate = DateTime::createFromFormat('Y M j H:i:s', $product['last_purchase']);

        if($lastPurchaseDate > $thisYearsFirstDay) {
            $purchasedCurrentYear[] = $product;
        }
    }

    return $purchasedCurrentYear;
}
print_r(exercise10());
echo '<hr>';

function exercise11(bool $showOnlyDays): void
{
    $products = [
        [
            'name' => 'Wine glass',
            'last_purchase' => '2022 Jan 15 18:34:12',
        ],
        [
            'name' => 'Bread knife',
            'last_purchase' => '2020 Mar 15 23:14:00',
        ],
        [
            'name' => 'Blue chair',
            'last_purchase' => '2019 Dec 12 15:00:12',
        ],
        [
            'name' => 'Cutting board',
            'last_purchase' => '2022 Feb 1 03:15:01',
        ],
    ];

    /*
    Išspausdinkite paskutinių pirkimų santrauką. Jeigu $showOnlyDays yra true, tuomet rodykite tik dienas.
    Funkcijos kvietimas: exercise11(false)
    Rezultatas:
    Last purchased:
    Wine glass 0 years 1 month 23 days ago
    ...
    Funkcijos kvietimas: exercise11(true)
    Rezultatas:
    Last purchased:
    Wine glass 51 days ago
    ...
    */

    $currentDate = new DateTime();
    $string = 'Last purchased: <br>';

    foreach ($products as $product) {
        $lastPurchase = DateTime::createFromFormat('Y M j H:i:s', $product['last_purchase']);
        $interval = $currentDate->diff($lastPurchase);

        if ($showOnlyDays) {
            $string .= $product['name'] . ' ' . $interval->days . ' days ago <br>';
        } else {
            $string .= $product['name'] . ' ' . $interval->y . ' years ' . $interval->m . ' months ' . $interval->d . ' days ago <br>';
        }
    }

    echo $string;
}

exercise11(false);
echo '<br>';
exercise11(true);
echo '<hr>';

function exercise12(int $numberOfCycles = 1000000): void
{
    /*
    Išspausdinkite kiek laiko trunka prasukti tuščią ciklą nurodytą kiekį kartų ($numberOfCycles).
    Trukmę apvalinkite iki milisekundžių.
    Pridėkite parametrui $numberOfCycles numatytąją reikšmę 1000000.
    */

    $start = hrtime(true);

    for ($i = 0; $i < $numberOfCycles; ++$i) {}

    $end = hrtime(true);

    echo round(($end - $start)/1000000);
}

exercise12();