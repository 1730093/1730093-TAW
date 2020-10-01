<?php

$texto = filter_input(INPUT_POST, 'texto');

if ($texto === false || $texto === NULL || $texto === '') {
    header('Location: index.html');
    exit();
}
$aleatorio = rand(1, 30);

echo 'Caja de texto: '.$texto. "<br />";
echo "<br />".'Select aleatorio: '.$aleatorio;
echo " "."<br />"."Imprime";
echo " "."<br />";

for ($i = 1; $i <= $aleatorio; $i++) {
    echo $texto. "<br />";
}

echo " "."<br />"."Inverso";
echo " "."<br />";

for ($i = 1; $i <= $aleatorio; $i++) {
    echo strrev($texto). "<br />";
}
