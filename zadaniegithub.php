<?php

function SUMA($a, $b)
{
    echo "Suma: " . ($a + $b);
}

if (isset($_POST["suma"])) {
    $a = (int)$_POST["suma_a"];
    $b = (int)$_POST["suma_b"];

    SUMA($a, $b);
}


function PODSTAWY($a, $b)
{
    echo "Różnica: " . ($a - $b) . "<br>";
    echo "Iloczyn: " . ($a * $b) . "<br>";

    if ($b != 0) {
        echo "Iloraz: " . ($a / $b);
    } else {
        echo "Nie można dzielić przez zero";
    }
}

if (isset($_POST["podstawy"])) {
    $a = (int)$_POST["podstawy_a"];
    $b = (int)$_POST["podstawy_b"];

    PODSTAWY($a, $b);
}


function KALKULATOR($a, $b, $dzialanie)
{
    if ($dzialanie == "suma") {
        $wynik = $a + $b;
    } elseif ($dzialanie == "roznica") {
        $wynik = $a - $b;
    } elseif ($dzialanie == "iloczyn") {
        $wynik = $a * $b;
    } elseif ($dzialanie == "iloraz") {
        if ($b == 0) {
            $wynik = "Nie można dzielić przez zero";
        } else {
            $wynik = $a / $b;
        }
    } else {
        $wynik = "Nieprawidłowe działanie";
    }

    echo "Wynik: " . $wynik;
}

if (isset($_POST["kalkulator"])) {
    $a = (float)$_POST["kalkulator_a"];
    $b = (float)$_POST["kalkulator_b"];
    $dzialanie = $_POST["dzialanie"];

    KALKULATOR($a, $b, $dzialanie);
}


function MAKS($a, $b, $c)
{
    echo "Największa liczba: " . max($a, $b, $c);
}

if (isset($_POST["maks"])) {
    $a = (int)$_POST["maks_a"];
    $b = (int)$_POST["maks_b"];
    $c = (int)$_POST["maks_c"];

    MAKS($a, $b, $c);
}


function WZROST($wzrost)
{
    if ($wzrost < 150) {
        echo "Niski";
    } elseif ($wzrost > 180) {
        echo "Wysoki";
    } else {
        echo "Średni";
    }
}

if (isset($_POST["wzrost_sprawdz"])) {
    $wzrost = (int)$_POST["wzrost"];

    WZROST($wzrost);
}


function BMI($wzrost, $waga)
{
    if ($wzrost <= 0) {
        echo "Wzrost musi być większy od 0";
        return;
    }

    if ($waga <= 0) {
        echo "Waga musi być większa od 0";
        return;
    }

    $bmi = $waga / (($wzrost / 100) * ($wzrost / 100));

    echo "BMI: " . round($bmi, 2) . "<br>";

    if ($bmi < 18.5) {
        echo "BMI < 18,5: za mało!";
    } elseif ($bmi > 25) {
        echo "BMI > 25: za dużo!";
    } else {
        echo "pomiędzy: OK!";
    }
}

if (isset($_POST["bmi"])) {
    $wzrost = (float)$_POST["bmi_wzrost"];
    $waga = (float)$_POST["bmi_waga"];

    BMI($wzrost, $waga);
}


function STARSZY($data1, $data2)
{
    $d1 = new DateTime($data1);
    $d2 = new DateTime($data2);

    if ($d1 < $d2) {
        echo "Osoba 1 jest starsza";
    } elseif ($d2 < $d1) {
        echo "Osoba 2 jest starsza";
    } else {
        echo "Osoby są w tym samym wieku";
    }
}

if (isset($_POST["starszy"])) {
    $data1 = $_POST["data1"];
    $data2 = $_POST["data2"];

    STARSZY($data1, $data2);
}


function PRZESTEPNY($rok)
{
    if (($rok % 400 == 0) || ($rok % 4 == 0 && $rok % 100 != 0)) {
        echo "Rok $rok jest przestępny";
    } else {
        echo "Rok $rok nie jest przestępny";
    }
}

if (isset($_POST["przestepny"])) {
    $rok = (int)$_POST["rok"];

    PRZESTEPNY($rok);
}


function SILA($haslo)
{
    $dlugosc = strlen($haslo);

    $cyfra = preg_match('/[0-9]/', $haslo);
    $duza = preg_match('/[A-Z]/', $haslo);
    $mala = preg_match('/[a-z]/', $haslo);
    $specjalny = preg_match('/[^a-zA-Z0-9]/', $haslo);

    if ($dlugosc <= 4) {
        echo "Do 4 znaków - hasło słabe<br>";
    } elseif ($dlugosc <= 8) {
        echo "Do 8 znaków - hasło średnie<br>";
    } else {
        echo "8 lub więcej znaków - hasło mocne<br>";
    }

    if (!$cyfra) {
        echo "Brak cyfry - hasło słabe<br>";
    }

    if (!$duza) {
        echo "Brak dużej litery - hasło słabe<br>";
    }

    if (!$mala) {
        echo "Brak małej litery - hasło słabe<br>";
    }

    if (!$specjalny) {
        echo "Brak znaku specjalnego - hasło słabe<br>";
    }
}

if (isset($_POST["sila"])) {
    $haslo = $_POST["haslo"];

    SILA($haslo);
}


function TROJKAT($a, $b, $c)
{
    if (
        $a > 0 &&
        $b > 0 &&
        $c > 0 &&
        $a + $b > $c &&
        $a + $c > $b &&
        $b + $c > $a
    ) {
        echo "Można utworzyć trójkąt";
    } else {
        echo "Nie można utworzyć trójkąta";
    }
}

if (isset($_POST["trojkat"])) {
    $a = (int)$_POST["trojkat_a"];
    $b = (int)$_POST["trojkat_b"];
    $c = (int)$_POST["trojkat_c"];

    TROJKAT($a, $b, $c);
}

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Zadania PHP</title>
</head>

<body>

<h2>1. SUMA</h2>

<form method="post">
    <input type="number" name="suma_a" required>
    <input type="number" name="suma_b" required>
    <input type="submit" name="suma" value="Oblicz">
</form>


<h2>2. PODSTAWY</h2>

<form method="post">
    <input type="number" name="podstawy_a" required>
    <input type="number" name="podstawy_b" required>
    <input type="submit" name="podstawy" value="Oblicz">
</form>


<h2>3. KALKULATOR</h2>

<form method="post">

    <input type="number" step="any" name="kalkulator_a" required>
    <input type="number" step="any" name="kalkulator_b" required>

    <select name="dzialanie">
        <option value="suma">Suma</option>
        <option value="roznica">Różnica</option>
        <option value="iloczyn">Iloczyn</option>
        <option value="iloraz">Iloraz</option>
    </select>

    <input type="submit" name="kalkulator" value="Oblicz">

</form>


<h2>4. MAKS</h2>

<form method="post">

    <input type="number" name="maks_a" required>
    <input type="number" name="maks_b" required>
    <input type="number" name="maks_c" required>

    <input type="submit" name="maks" value="Sprawdź">

</form>


<h2>5. WZROST</h2>

<form method="post">

    <input type="number" name="wzrost" required>

    <input type="submit" name="wzrost_sprawdz" value="Sprawdź">

</form>


<h2>6. BMI</h2>

<form method="post">

    <input type="number" step="any" name="bmi_wzrost" placeholder="Wzrost w cm" required>

    <input type="number" step="any" name="bmi_waga" placeholder="Waga w kg" required>

    <input type="submit" name="bmi" value="Oblicz BMI">

</form>


<h2>7. STARSZY</h2>

<form method="post">

    <input type="date" name="data1" required>
    <input type="date" name="data2" required>

    <input type="submit" name="starszy" value="Sprawdź">

</form>


<h2>8. PRZESTĘPNY</h2>

<form method="post">

    <input type="number" name="rok" required>

    <input type="submit" name="przestepny" value="Sprawdź">

</form>


<h2>9. SIŁA HASŁA</h2>

<form method="post">

    <input type="password" name="haslo" required>

    <input type="submit" name="sila" value="Sprawdź">

</form>


<h2>10. TROJKAT</h2>

<form method="post">

    <input type="number" name="trojkat_a" required>
    <input type="number" name="trojkat_b" required>
    <input type="number" name="trojkat_c" required>

    <input type="submit" name="trojkat" value="Sprawdź">

</form>


<h2>11. SZYFR</h2>

<input type="text" id="tekst" placeholder="Wpisz tekst">

<input type="text" id="szyfr" placeholder="Zaszyfrowany tekst" readonly>


<script>

document.getElementById("tekst").addEventListener("keydown", function(event) {

    let znak = event.key;

    if (znak.length != 1) {
        return;
    }

    let kod = znak.charCodeAt(0);

    if (kod >= 97 && kod <= 122) {
        let nowyKod = ((kod - 97 + 2) % 26) + 97;

        document.getElementById("szyfr").value += String.fromCharCode(nowyKod);
    }

    if (kod >= 65 && kod <= 90) {
        let nowyKod = ((kod - 65 + 2) % 26) + 65;

        document.getElementById("szyfr").value += String.fromCharCode(nowyKod);
    }

});

</script>

</body>
</html>