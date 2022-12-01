<?php
declare(strict_types=1);

class PasswordValidator
{
    public function validate(string $password): void
    {
        $errorMessage = '';

        if ($this->validateLength($password)) {
            $errorMessage .= 'Password must be at least 10 symbols long' . '<br>';
        }

        if (!$this->validateSpecialCharacters($password)) {
            $errorMessage .= 'Password must contain 2 different special symbols (!@#$%^&*_)' . '<br>';
        }

        if (!$this->validateCasing($password)) {
            $errorMessage .= 'Password mus contain uppercase and lowercase letters' . '<br>';
        }

        if(!$this->validateNumber($password)) {
            $errorMessage .= 'Password must contain at least one number' . '<br>';
        }

        if(empty($errorMessage)) {
            echo 'Password is valid';
        } else {
            throw new Exception($errorMessage);
        }
    }

    // better write separate functions for each validation point than to pu them all in if's in validate function

    private function validateLength(string $password): bool
    {
        return strlen($password) <= 10;
    }

    private function validateSpecialCharacters(string $password): bool
    {
        $specialCharacters = ['!', '@', '#', '$', '%', '^', '&', '*', '_'];
        $specialCharactersCount = 0;

        foreach ($specialCharacters as $specialCharacter) {
            if (str_contains($password, $specialCharacter)) {
                $specialCharactersCount++;
            }
        }

        return $specialCharactersCount >= 2;
    }

    private function validateCasing(string $password): bool
    {
        return preg_match('/[A-Z]/', $password) && preg_match('/[a-z]/', $password);
    }

    private function validateNumber(string $password): bool
    {
        return (bool)preg_match('/\d/', $password);
    }
}

try {
    $passwordValidator = new PasswordValidator();
    $passwordValidator->validate('abc');
} catch (Exception $exception) {
    echo 'Invalid Password: ' . $exception->getMessage();
}

/*
1.1 Parašykite įrankį slaptažodžio stiprumui nustatyti.
Slaptažodis turi:
- būti sudarytas iš ne mažiau 10 simblių
- turi turėti bent 2 skirtingus specialiuosius simbolius (!@#$%^&*_)
- turi turėti ir mažųjų, ir didžiųjų raidžių (aB)
- turi turėti bent vieną skaitmenį (0-9)
Slaptažodžio validavimas turi vykti klasėje PasswordValidator.
Validatorius, atradęs taisyklės pažeidimą, turi mesti exception'ą su žinute (pvz.: "Password must be at least ten symbols long")
Kodas, kviečiantis validatorių turi gaudyti exception'ą ir spausdinti žinutę terminale.
Jeigu slaptažodis atitinka reikalavimus, spausdinkite "Password is valid"
Failo kvietimo pavyzdys:
php -f 1_password_validator.php 123456
Password must be at least 10 symbols long
php -f 1_password_validator.php 123456aBc!@
Password is valid

1.2 Patobulinkite validatoriu. Validatorius turi sukaupti visas klaidas ir jas išspausdinti.
Failo kvietimo pavyzdys:
php -f 1_password_validator.php 123456
Password must be at least 10 symbols long
Password must contain at least 2 special symbols (!@#$%^&*_)
Password must contain uppercase and lowercase letters
*/