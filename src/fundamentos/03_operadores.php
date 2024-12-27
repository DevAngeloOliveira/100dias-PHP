<?php

/**
 * Fundamentos do PHP - Aula 3: Operadores
 * 
 * Nesta aula, aprenderemos:
 * 1. Operadores Aritméticos
 * 2. Operadores de Atribuição
 * 3. Operadores de Comparação
 * 4. Operadores Lógicos
 * 5. Operadores de String
 * 6. Operadores de Array
 * 7. Operadores de Tipo
 */

// 1. Operadores Aritméticos
echo "<h2>Operadores Aritméticos:</h2>";
$a = 10;
$b = 3;

echo "Valores: a = $a, b = $b<br>";
echo "Adição: " . ($a + $b) . "<br>";
echo "Subtração: " . ($a - $b) . "<br>";
echo "Multiplicação: " . ($a * $b) . "<br>";
echo "Divisão: " . ($a / $b) . "<br>";
echo "Módulo (resto): " . ($a % $b) . "<br>";
echo "Exponenciação: " . ($a ** $b) . "<br>";

// 2. Operadores de Atribuição
echo "<h2>Operadores de Atribuição:</h2>";
$x = 5;
echo "Valor inicial: $x<br>";

$x += 3;  // $x = $x + 3
echo "Após += 3: $x<br>";

$x -= 2;  // $x = $x - 2
echo "Após -= 2: $x<br>";

$x *= 4;  // $x = $x * 4
echo "Após *= 4: $x<br>";

$x /= 2;  // $x = $x / 2
echo "Após /= 2: $x<br>";

// 3. Operadores de Comparação
echo "<h2>Operadores de Comparação:</h2>";
$num1 = 5;
$num2 = "5";

echo "Valores: num1 = $num1 (integer), num2 = '$num2' (string)<br>";
echo "Igual (==): " . var_export($num1 == $num2, true) . "<br>";
echo "Idêntico (===): " . var_export($num1 === $num2, true) . "<br>";
echo "Diferente (!=): " . var_export($num1 != $num2, true) . "<br>";
echo "Não idêntico (!==): " . var_export($num1 !== $num2, true) . "<br>";
echo "Maior que (>): " . var_export($num1 > $num2, true) . "<br>";
echo "Menor que (<): " . var_export($num1 < $num2, true) . "<br>";
echo "Maior ou igual (>=): " . var_export($num1 >= $num2, true) . "<br>";
echo "Menor ou igual (<=): " . var_export($num1 <= $num2, true) . "<br>";

// 4. Operadores Lógicos
echo "<h2>Operadores Lógicos:</h2>";
$verdadeiro = true;
$falso = false;

echo "AND (&&): " . var_export($verdadeiro && $falso, true) . "<br>";
echo "OR (||): " . var_export($verdadeiro || $falso, true) . "<br>";
echo "NOT (!): " . var_export(!$verdadeiro, true) . "<br>";
echo "XOR: " . var_export($verdadeiro xor $falso, true) . "<br>";

// 5. Operadores de String
echo "<h2>Operadores de String:</h2>";
$str1 = "Olá";
$str2 = "Mundo";

echo "Concatenação (.) : " . $str1 . " " . $str2 . "<br>";
$str1 .= " " . $str2;  // Concatenação com atribuição
echo "Após .= : $str1<br>";

// 6. Operadores de Array
echo "<h2>Operadores de Array:</h2>";
$arr1 = ["a" => 1, "b" => 2];
$arr2 = ["c" => 3, "d" => 4];

echo "Array 1: ";
print_r($arr1);
echo "<br>Array 2: ";
print_r($arr2);
echo "<br>";

// União de arrays
$uniao = $arr1 + $arr2;
echo "União (+): ";
print_r($uniao);
echo "<br>";

// 7. Operadores de Tipo
echo "<h2>Operadores de Tipo:</h2>";
$valor = 42;
echo "Valor: $valor<br>";
echo "É inteiro? " . var_export(is_int($valor), true) . "<br>";
echo "É string? " . var_export(is_string($valor), true) . "<br>";
echo "É numérico? " . var_export(is_numeric($valor), true) . "<br>";
echo "É booleano? " . var_export(is_bool($valor), true) . "<br>";

// 8. Operador Ternário
echo "<h2>Operador Ternário:</h2>";
$idade = 20;
$podeBeber = ($idade >= 18) ? "Sim" : "Não";
echo "Idade: $idade<br>";
echo "Pode beber? $podeBeber<br>";

// 9. Operador Null Coalescing
echo "<h2>Operador Null Coalescing:</h2>";
$nome = null;
$nomeExibir = $nome ?? "Visitante";
echo "Nome a exibir: $nomeExibir<br>";
