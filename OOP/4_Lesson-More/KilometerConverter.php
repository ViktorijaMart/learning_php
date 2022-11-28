<?php
declare(strict_types=1);

class KilometerConverter
{
    private const KILOMETERS_IN_NAUTICAL_MILE = 1.852;
    private const KILOMETERS_IN_MILE = 1.60934;
    private const KILOMETERS_IN_YARD = 0.0009144;
    private const KILOMETERS_IN_CENTIMETER = 0.00001;

    private float $kilometers;

    public function __construct(float $kilometers)
    {
        $this->kilometers = $kilometers;
    }

    public function convertToNauticalMiles(): float
    {
        return $this->kilometers / self::KILOMETERS_IN_NAUTICAL_MILE;
    }

    public function convertToMiles(): float
    {
        return $this->kilometers / self::KILOMETERS_IN_MILE;
    }

    public function convertToYards(): float
    {
        return $this->kilometers / self::KILOMETERS_IN_YARD;
    }

    public function convertToCentimeters(): float
    {
        return $this->kilometers / self::KILOMETERS_IN_CENTIMETER;
    }

    public static function getConversionRates(): array
    {
        return [
            'nautical_mile' => self::KILOMETERS_IN_NAUTICAL_MILE,
            'mile' => self::KILOMETERS_IN_MILE,
            'yard' => self::KILOMETERS_IN_YARD,
            'centimeter' => self::KILOMETERS_IN_CENTIMETER
        ];
    }
}

echo '<pre>';
print_r(KilometerConverter::getConversionRates());
echo '<hr>';

$a = new KilometerConverter(55);
echo $a->convertToNauticalMiles() . '<br>';
echo $a->convertToMiles() . '<br>';
echo $a->convertToYards() . '<br>';
echo $a->convertToCentimeters() . '<br>';
echo '<hr>';

/*
1.1
Parašykite klasę KilometerConverter
Į konstruktorių turi būti paduodamas atstumas kilometrais (float).
Klasė turi turėti metodus, kuriuos būtų galima kviesti iš klasės išorės:
- convertToNauticalMiles()
- convertToMiles()
- convertToYards()
- convertToCentimeters()
Svarbu: Konvertavimo matmenys (pvz nautical mile = 1.852) turi būti saugomi klasės konstantose.
$a = new KilometerConverter(55);
echo $a->convertToCentimeters();
1.2 Klasei KilometerConverter pridėkite statinį metodą, kuris gali būti kviečiamas iš klasės išorės:
- getConversionRates(). Šis metodas turi grąžinti masyvą su visais konvertavimo matmenimis:
Šio metodo kvietimo rezultatas turetų būti:
[
    'nautical_mile' => 1.852,
    'mile' => 1.60934,
    'yard' => 0.0009144,
    'centimeter' => 1.0E-5,
]
Svarbu: naudokite klasės konstantas.
1.3
Įgyvendinkite konvertavimo logiką panaudojant abstrakčią klasę.
Sukurkite abstrakčią klasę AbstractKilometerConverter. Ši klasė turės vieną metodą: convert().
Iš šios klasės sukurkite 4 išvestines klases, kurių kiekviena implementuotų metodą convert()
ir atliktų tik tai klasei pavestą konversiją:
- NauticalMileConverter
- MileConverter
- YardConverter
- CentimeterConverter
Pavyzdys:
$centimeterConverter = new CentimeterConverter(100);
echo $centimeterConverter->convert();
*/

abstract class AbstractKilometerConverter
{
    protected float $kilometers;

    public function __construct(float $kilometers)
    {
        $this->kilometers = $kilometers;
    }

    abstract public function convert(): float;
}

class NauticalMileConverter extends AbstractKilometerConverter
{
    private const KILOMETERS_IN_NAUTICAL_MILE = 1.852;

    public function convert(): float
    {
        return $this->kilometers / self::KILOMETERS_IN_NAUTICAL_MILE;
    }
}

$nauticalMileConverter = new NauticalMileConverter(100);
echo $nauticalMileConverter->convert();
echo '<hr>';

class MileConverter extends AbstractKilometerConverter
{
    private const KILOMETERS_IN_MILE = 1.60934;

    public function convert(): float
    {
        return $this->kilometers / self::KILOMETERS_IN_MILE;
    }
}

$mileConverter = new MileConverter(100);
echo $mileConverter->convert();
echo '<hr>';

class YardConverter extends AbstractKilometerConverter
{
    private const KILOMETERS_IN_YARD = 0.0009144;

    public function convert(): float
    {
        return $this->kilometers / self::KILOMETERS_IN_YARD;
    }
}

$yardConverter = new YardConverter(100);
echo $yardConverter->convert();
echo '<hr>';

class centimeterConverter extends AbstractKilometerConverter
{
    private const KILOMETERS_IN_CENTIMETER = 0.00001;

    public function convert(): float
    {
        return $this->kilometers / self::KILOMETERS_IN_CENTIMETER;
    }
}

$centimeterConverter = new centimeterConverter(100);
echo $centimeterConverter->convert();
echo '<hr>';



