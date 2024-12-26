<?php

// Um array é uma estrutura de dados que armazena uma coleção de valores. 
// Em um array indexado, cada valor é associado a um índice numérico, começando do 0.
$array = [1, 2, 3, 4, 5];

// Acessando e exibindo cada elemento do array usando seu índice numérico.
echo "Índice 0: " . $array[0] . "<br>"; // Exibe o primeiro valor do array, que é 1.
echo "Índice 1: " . $array[1] . "<br>"; // Exibe o segundo valor do array, que é 2.
echo "Índice 2: " . $array[2] . "<br>"; // Exibe o terceiro valor do array, que é 3.
echo "Índice 3: " . $array[3] . "<br>"; // Exibe o quarto valor do array, que é 4.
echo "Índice 4: " . $array[4] . "<br>"; // Exibe o quinto valor do array, que é 5.

// Um array associativo é uma estrutura de dados onde cada valor é associado a uma chave única.
// As chaves são strings que permitem acessar os valores de forma mais intuitiva.
$arrayAssociativo = [
    "nome" => "Gabriel",
    "idade" => 23,
    "profissao" => "Programador",
    "tecnologias" => ["PHP", "JavaScript", "HTML", "CSS"] // Este é um array dentro de um array associativo, representando uma lista de tecnologias.
];

// Acessando e exibindo valores do array associativo usando suas chaves.
echo "Nome: " . $arrayAssociativo["nome"] . "<br>"; // Exibe o valor associado à chave "nome", que é "Gabriel".
echo "Idade: " . $arrayAssociativo["idade"] . "<br>"; // Exibe o valor associado à chave "idade", que é 23.
echo "Profissão: " . $arrayAssociativo["profissao"] . "<br>"; // Exibe o valor associado à chave "profissao", que é "Programador".
echo "Tecnologias: " . join(", ", $arrayAssociativo["tecnologias"]) . "<br>"; // Exibe os valores do array associado à chave "tecnologias", separados por vírgulas.

// Exemplos de operadores
$a = 10;
$b = 5;

// Operadores aritméticos
echo "Soma: " . ($a + $b) . "<br>";
echo "Subtração: " . ($a - $b) . "<br>";
echo "Multiplicação: " . ($a * $b) . "<br>";
echo "Divisão: " . ($a / $b) . "<br>";
echo "Módulo: " . ($a % $b) . "<br>";

// Operadores de comparação
echo "Igual: " . ($a == $b ? 'true' : 'false') . "<br>";
echo "Diferente: " . ($a != $b ? 'true' : 'false') . "<br>";
echo "Maior que: " . ($a > $b ? 'true' : 'false') . "<br>";
echo "Menor que: " . ($a < $b ? 'true' : 'false') . "<br>";

// Operadores lógicos
$verdadeiro = true;
$falso = false;
echo "E lógico: " . ($verdadeiro && $falso ? 'true' : 'false') . "<br>";
echo "Ou lógico: " . ($verdadeiro || $falso ? 'true' : 'false') . "<br>";
echo "Negação: " . (!$verdadeiro ? 'true' : 'false') . "<br>";
