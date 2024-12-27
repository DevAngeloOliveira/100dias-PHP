<?php

/**
 * Fundamentos do PHP - Aula 2: Variáveis e Tipos de Dados
 * 
 * Nesta aula, aprenderemos:
 * 1. Declaração de variáveis
 * 2. Tipos de dados básicos
 * 3. Conversão de tipos
 * 4. Constantes
 */

// 1. Declaração de variáveis
// Em PHP, variáveis começam com $
$nome = "João";
$idade = 25;
$altura = 1.75;
$ehEstudante = true;

// 2. Tipos de dados básicos
echo "<h2>Tipos de Dados Básicos:</h2>";

// String
echo "String: $nome<br>";
echo 'String com aspas simples: $nome<br>'; // Não interpreta variáveis

// Integer (número inteiro)
echo "Integer: $idade<br>";

// Float/Double (número decimal)
echo "Float: $altura<br>";

// Boolean
echo "Boolean: " . ($ehEstudante ? 'true' : 'false') . "<br>";

// NULL
$variavelNula = null;
echo "Null: " . var_export($variavelNula, true) . "<br>";

// 3. Verificação de tipos
echo "<h2>Verificação de Tipos:</h2>";
echo "Tipo de \$nome: " . gettype($nome) . "<br>";
echo "Tipo de \$idade: " . gettype($idade) . "<br>";
echo "Tipo de \$altura: " . gettype($altura) . "<br>";
echo "Tipo de \$ehEstudante: " . gettype($ehEstudante) . "<br>";

// 4. Conversão de tipos (Type Casting)
echo "<h2>Conversão de Tipos:</h2>";

// String para número
$numero = "123";
$numeroConvertido = (int)$numero;
echo "String para número: " . gettype($numeroConvertido) . " - Valor: $numeroConvertido<br>";

// Número para string
$numeroString = (string)456;
echo "Número para string: " . gettype($numeroString) . " - Valor: $numeroString<br>";

// 5. Constantes
// Constantes são definidas usando define() ou const
define('PI', 3.14159);
const VERSAO = "1.0.0";

echo "<h2>Constantes:</h2>";
echo "PI: " . PI . "<br>";
echo "VERSÃO: " . VERSAO . "<br>";

// 6. Variáveis variáveis
echo "<h2>Variáveis Variáveis:</h2>";
$animal = "cachorro";
$$animal = "Rex"; // Cria uma variável $cachorro
echo "Nome do $animal: " . $$animal . "<br>";

// 7. Escopo de variáveis
echo "<h2>Escopo de Variáveis:</h2>";

function testeEscopo()
{
    global $nome; // Usando variável global
    $variavelLocal = "Apenas dentro da função";
    echo "Dentro da função - Nome global: $nome<br>";
    echo "Variável local: $variavelLocal<br>";
}

testeEscopo();
echo "Fora da função - Nome: $nome<br>";
// echo $variavelLocal; // Isso causaria erro pois a variável é local à função

// 8. Variáveis superglobais
echo "<h2>Variáveis Superglobais:</h2>";
echo "Servidor: " . $_SERVER['SERVER_SOFTWARE'] . "<br>";
echo "PHP_SELF: " . $_SERVER['PHP_SELF'] . "<br>";
