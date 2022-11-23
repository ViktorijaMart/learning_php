<?php
// Check Password

$password = '   pass   ';

function checkPasswordLength(string $password, int $requiredPasswordLength): void
{
    $correctedpassword = trim($password);

    if (strlen($correctedpassword) >= $requiredPasswordLength) {
        echo 'Password is valid';
    } else {
        echo sprintf('Password is too short. Required min password length is %d', $requiredPasswordLength);
    }
}

checkPasswordLength($password, 5);
echo '<hr>';

////////////////////////////////////////////////////////////////////
/// 2. Parašykite funkcija sutvarkytiSakini, kuri priimtu vieną argumentą "$sakinys". Sakinyje visas dydžiasias raidęs paverstu mažosiomis ir paliktu/padarytu tik pirmą raidę didžiają. Sugeneruota rezultata funkcija turėtu gražinti. Į ekraną nėko išvedinėti nereikia (nebent testavimo metu, bet poto ištrinam).(Hint: strtolower, ucfirst)
//3. Parašykite funkcija cenzura, kuri priimtu vieną argumentą "$sakinys". Sakinyje keiksmažodžius "blin, jofana, mulkis, bomžas" pakeistu simboliais "!@$^!" ir gražintu gauta rezultatą. Į ekraną nėko išvedinėti nereikia (nebent testavimo metu, bet poto ištrinam). (Hint: strreplace)
//4. Parašykite funkcija nukirpti, kuri priimtu vieną argumentą "$sakinys". Jeigu sakinys prasideda keiksmažodžiu "blin, jofana, mulkis"(tuos pačius kaip ir užduotyje 3) tiesiog jį pašalintu. Į ekraną nėko išvedinėti nereikia (nebent testavimo metu, bet poto ištrinam). (Hint: ltrim)
//5. Pasinaudodami funkcijomis is 2 , 3, 4 užduočių, Sutvarkykite i išveskite į ekraną sekančius sakinius:
//"Blin koks gražus tas GYVENIMAS!"
//"Jofana kažkoks MULKIS vos manęs nepartrenkė!"
//"nuėjau išnešti šiukšlių, O TEN BOMŽAS MIEGA!"
//Rezultatas turėtu gautis sekantis:
//"Koks gražus tas gyvenimas!"
//"Kažkoks !@$^! vos manęs nepartrenkė!"
//"Nuėjau išnešti šiukšlių, o ten !@$^! miega!"
//PS. Didžiosos ir mažosios raidės - tai skirtingi simboliai.


$sentence1 =  "Blin koks gražus tas GYVENIMAS!";
$sentence2 = "Jofana kažkoks MULKIS vos manęs nepartrenkė!";
$sentence3 = "nuėjau išnešti šiukšlių, O TEN BOMŽAS MIEGA!";

function fixCase(string $sentence): string
{

    return ucfirst(mb_strtolower($sentence));
}

function censorSwearWords(string $sentence): string
{
    $swearWords = ['blin', 'jofana', 'mulkis', 'bomžas'];

    return str_replace($swearWords, "!@$^!", mb_strtolower($sentence));
}

function removeFirstSwearWord(string $sentence): string
{
    if (str_starts_with($sentence, "!@$^!")) {
        return substr($sentence, strlen("!@$^!") + 1);
    } else {
        return $sentence;
    }
}

function fixSentence(string $sentence): string
{
    return fixCase(removeFirstSwearWord(censorSwearWords($sentence)));
}

echo $sentence1;
echo '<br>';
echo fixSentence($sentence1);
echo '<hr>';
echo $sentence2;
echo '<br>';
echo fixSentence($sentence2);
echo '<hr>';
echo $sentence3;
echo '<br>';
echo fixSentence($sentence3);
