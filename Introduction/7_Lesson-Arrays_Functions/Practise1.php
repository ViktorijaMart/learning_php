<?php
//Jonas Jonaitis, 42 metų vyras, nevędes, turi 2 vaikus - Petriuką ir Onutę. Petriukui 8 - eri, Onutei 5 - eri. Petriukas turi 2 augintinius - šuniuką Brisius ir pelytę Džeris., Onutė turi vieną augintinį - katiną Tomas.
//Išreiškite šituos duomenys viename masyve "$zmogus".
echo '<pre>';

$person = [
    'name' => 'Jonas',
    'surname' => 'Jonaitis',
    'age' => 42,
    'gender' => 'male',
    'occupation' => 'single',
    'kids' =>
        [
            [
                'name' => 'Petriukas',
                'surname' => 'Jonaitis',
                'age' => 8,
                'pets' =>
                [
                    [
                        'name' => 'Brisius',
                        'type' => 'dog'
                    ],
                    [
                        'name' => 'Dzeris',
                        'type' => 'mouse'
                    ]
                ]
            ],
            [
                'name' => 'Onute',
                'surname' => 'Jonaityte',
                'age' => 5,
                'pets' =>
                [
                    [
                        'name' => 'Tomas',
                        'type' => 'Cat'
                    ]
                ]
            ]
        ]
];

print_r($person);
echo '<hr>';

// 2. Parašykime funkciją , kuri priimtu vieną parametrą - skaičiu $skaicius, sukurtu masyvą iš atsitiktinių skaičių ir gražintu naujai sukurta masyvą kaip rezultatą. Masyvo elementų skaičius turi buti toks - kiek nurodome parametre $skaicius.

function generateNumbersArray(int $number): array
{
    $arrayOfNumbers = [];

    for ($i = 0; $i < $number; $i++) {
        $arrayOfNumbers[] = rand();
    }
  return $arrayOfNumbers;
}

print_r(generateNumbersArray(5));
echo '<hr>';

//Prisiminkite masyvą Jonas.
// 3.  Parašykite funkciją, kuri priimtu vieną parametrą - masyvą $žmogus ir gražintu vidutinį vaikų amžių.

function avgAgeOfKids(array $array): float
{
   $kidsArray = $array['kids'];

   return array_reduce($kidsArray, function($carry, $kidsAge) {return $carry += $kidsAge['age'];}, 0)/count($kidsArray);
}

echo avgAgeOfKids($person);
echo '<hr>';

// 4.  Parašykite funkciją, kuri priimtu vieną parametrą - masyvą $žmogus ir gražintu masyvą su vaikų vardais. Be pavardžių.

function getKidsNames(array $array): ?array
{
    $kidsArray = $array['kids'];
    $kidsNames = [];

    if(!empty($kidsArray)) {
        foreach ($kidsArray as $kid) {
            $kidsNames[] = $kid['name'];
        }
        return $kidsNames;
    }
    return null;
}

print_r(getKidsNames($person));
echo '<hr>';

// 5. Parašykite funkciją, kuri priimtu vieną parametrą - masyvą žmogus ir pridėtu jam dar vieną vaiką - 10 metu Andriu - augintiniu neturi.

function addKidAndrius(array $array): array
{
    $array['kids'][] = [
        'name' => 'Andrius',
        'surname' => 'Jonaitis',
        'age' => 10,
        'pets' => []
    ];
    return $array;
}

$person = addKidAndrius($person);
print_r($person);
echo '<hr>';

// 6. Išveskite į ekraną visus vaikus html lentelėje.

//Duomenys isvesti: Vardas, Pavarde, Amzius, Augintiniu Skaicius
?>

<html >
<style>
   table {
       border: 1px solid black;
       border-spacing: 0;
   }

   th {
       background-color: #cccccc;
   }

   th,
   td{
       border: 1px solid black;
       width: 100px;
       text-align: center;
   }

</style>
<h1>Jonas kids</h1>
<table>
    <tr>
        <th>Name</th>
        <th>Surname</th>
        <th>Age</th>
        <th>Number of pets</th>
    </tr>
    <?php
    array_map(
      function(array $kid): void
      {
          ?>
    <tr>
        <td><?php echo $kid['name'] ?></td>
        <td><?php echo $kid['surname'] ?></td>
        <td><?php echo $kid['age'] ?></td>
        <td><?php echo count($kid['pets']) ?></td>
    </tr>
    <?php
      }, $person['kids'])
      ?>
</table>
</html>
