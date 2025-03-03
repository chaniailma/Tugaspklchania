<?php

// Variabel
$nama = "Chania";
$umur = 23;
$tinggi = 162;

// Konstanta
define("NEGARA", "Indonesia");

// Tipe Data
$angka = 100; // Integer
$teks = "Halo, Selamat Datang!"; // String
$desimal = 10.5; // Float

// Operator Aritmatika
$a = 10;
$b = 5;
$jumlah = $a + $b;
$kurang = $a - $b;
$kali = $a * $b;
$bagi = $a / $b;
$modulus = $a % $b;

// Operator Logika
$x = true;
$y = false;
$hasil_and = $x && $y;
$hasil_or = $x || $y;
$hasil_not = !$x;

// Struktur Logika IF
if ($umur > 18) {
    echo "Anda sudah dewasa.<br>";
} else {
    echo "Anda masih anak-anak.<br>";
}

// Struktur Logika SWITCH
$hari = "Senin";
switch ($hari) {
    case "Senin":
        echo "Hari ini adalah Senin.<br>";
        break;
    case "Selasa":
        echo "Hari ini adalah Selasa.<br>";
        break;
    default:
        echo "Hari ini bukan Senin atau Selasa.<br>";
}

// Perulangan FOR
for ($i = 1; $i <= 5; $i++) {
    echo "Perulangan ke-$i<br>";
}

// Perulangan FOREACH
$buah = ["Apel", "Mangga", "Jeruk"];
foreach ($buah as $item) {
    echo "Buah: $item<br>";
}

// Perulangan WHILE
$j = 1;
while ($j <= 5) {
    echo "Nilai j: $j<br>";
    $j++;
}

// Penulisan Function
function sapa($nama) {
    return "Halo, $nama!<br>";
}

echo sapa("Chania");

?>
