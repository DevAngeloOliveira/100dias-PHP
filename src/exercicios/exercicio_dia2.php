<?php

/**
 * Dia 2: Operadores em PHP
 * 
 * Neste exercício, vamos praticar o uso dos diferentes tipos de operadores em PHP:
 * - Operadores Aritméticos
 * - Operadores de Atribuição
 * - Operadores de Comparação
 * - Operadores Lógicos
 * - Operadores de String
 */

// 1. Operadores Aritméticos
echo "1. Operadores Aritméticos\n";
$a = 10;
$b = 3;

echo "Adição: " . ($a + $b) . "\n";         // 13
echo "Subtração: " . ($a - $b) . "\n";      // 7
echo "Multiplicação: " . ($a * $b) . "\n";   // 30
echo "Divisão: " . ($a / $b) . "\n";        // 3.3333...
echo "Módulo: " . ($a % $b) . "\n";         // 1
echo "Exponenciação: " . ($a ** $b) . "\n"; // 1000

// 2. Operadores de Atribuição
echo "\n2. Operadores de Atribuição\n";
$x = 5;
$x += 3;  // $x = $x + 3
echo "Após += 3: $x\n";  // 8

$x *= 2;  // $x = $x * 2
echo "Após *= 2: $x\n";  // 16

// 3. Operadores de Comparação
echo "\n3. Operadores de Comparação\n";
$num1 = 5;
$num2 = "5";

var_dump($num1 == $num2);   // true (comparação de valor)
var_dump($num1 === $num2);  // false (comparação de valor e tipo)
var_dump($num1 != $num2);   // false
var_dump($num1 <> $num2);   // false (alternativa para !=)
var_dump($num1 !== $num2);  // true

// 4. Operadores Lógicos
echo "\n4. Operadores Lógicos\n";
$verdadeiro = true;
$falso = false;

var_dump($verdadeiro && $falso);  // false (AND)
var_dump($verdadeiro || $falso);  // true (OR)
var_dump(!$verdadeiro);           // false (NOT)

// 5. Operadores de String
echo "\n5. Operadores de String\n";
$nome = "PHP";
$saudacao = "Olá ";
echo $saudacao . $nome . "!\n";  // Concatenação
$saudacao .= $nome;              // Concatenação com atribuição
echo $saudacao . "\n";

// Exercício Prático
echo "\nExercício Prático:\n";
$numero1 = 15;
$numero2 = 5;

// TODO: Calcule e imprima:
// 1. A soma dos números
$soma = $numero1 + $numero2;
echo "Soma: $soma\n";

// 2. A diferença entre eles
$diferenca = $numero1 - $numero2;
echo "Diferença: $diferenca\n";

// 3. Verifique se são iguais
$saoIguais = $numero1 === $numero2;
echo "São iguais? " . ($saoIguais ? "Sim" : "Não") . "\n";

// 4. Verifique se o primeiro é maior que o segundo
$ehMaior = $numero1 > $numero2;
echo "Primeiro é maior? " . ($ehMaior ? "Sim" : "Não") . "\n";

// Desafio: Crie suas próprias expressões usando diferentes operadores! 