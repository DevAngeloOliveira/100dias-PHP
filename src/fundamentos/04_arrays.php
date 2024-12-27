<?php

/**
 * Fundamentos do PHP - Aula 4: Arrays
 * 
 * Nesta aula, aprenderemos:
 * 1. Arrays indexados
 * 2. Arrays associativos
 * 3. Arrays multidimensionais
 * 4. Funções de array
 * 5. Iteração em arrays
 */

// 1. Arrays Indexados
echo "<h2>Arrays Indexados:</h2>";
$frutas = ["Maçã", "Banana", "Laranja", "Uva"];

// Acessando elementos
echo "Primeira fruta: " . $frutas[0] . "<br>";
echo "Segunda fruta: " . $frutas[1] . "<br>";

// Adicionando elementos
$frutas[] = "Morango"; // Adiciona ao final do array

// Contando elementos
echo "Total de frutas: " . count($frutas) . "<br>";

// Iterando sobre o array
echo "Lista de frutas:<br>";
foreach ($frutas as $fruta) {
    echo "- $fruta<br>";
}

// 2. Arrays Associativos
echo "<h2>Arrays Associativos:</h2>";
$pessoa = [
    "nome" => "Maria",
    "idade" => 30,
    "profissao" => "Desenvolvedora",
    "cidade" => "São Paulo"
];

// Acessando elementos
echo "Nome: " . $pessoa["nome"] . "<br>";
echo "Idade: " . $pessoa["idade"] . "<br>";

// Iterando sobre array associativo
foreach ($pessoa as $chave => $valor) {
    echo "$chave: $valor<br>";
}

// 3. Arrays Multidimensionais
echo "<h2>Arrays Multidimensionais:</h2>";
$alunos = [
    ["nome" => "João", "notas" => [8, 7, 9]],
    ["nome" => "Ana", "notas" => [9, 8, 10]],
    ["nome" => "Pedro", "notas" => [7, 8, 8]]
];

// Acessando elementos
echo "Primeira nota do João: " . $alunos[0]["notas"][0] . "<br>";

// Iterando sobre array multidimensional
foreach ($alunos as $aluno) {
    echo "Aluno: " . $aluno["nome"] . "<br>";
    echo "Notas: " . implode(", ", $aluno["notas"]) . "<br>";
    echo "Média: " . array_sum($aluno["notas"]) / count($aluno["notas"]) . "<br><br>";
}

// 4. Funções de Array
echo "<h2>Funções de Array:</h2>";

// Sort - Ordena array indexado
$numeros = [5, 2, 8, 1, 9];
sort($numeros);
echo "Array ordenado: " . implode(", ", $numeros) . "<br>";

// Asort - Ordena array associativo mantendo índices
$idades = ["João" => 25, "Maria" => 20, "Pedro" => 30];
asort($idades);
echo "Idades ordenadas:<br>";
foreach ($idades as $nome => $idade) {
    echo "$nome: $idade<br>";
}

// Array_push - Adiciona elementos ao final
array_push($frutas, "Pera", "Abacaxi");
echo "Frutas após push: " . implode(", ", $frutas) . "<br>";

// Array_pop - Remove último elemento
$ultimo = array_pop($frutas);
echo "Elemento removido: $ultimo<br>";

// Array_shift - Remove primeiro elemento
$primeiro = array_shift($frutas);
echo "Primeiro elemento removido: $primeiro<br>";

// Array_unshift - Adiciona elementos no início
array_unshift($frutas, "Kiwi", "Manga");
echo "Frutas após unshift: " . implode(", ", $frutas) . "<br>";

// 5. Funções Úteis
echo "<h2>Funções Úteis de Array:</h2>";

// In_array - Verifica se elemento existe
echo "Tem banana? " . (in_array("Banana", $frutas) ? "Sim" : "Não") . "<br>";

// Array_key_exists - Verifica se chave existe
echo "Tem idade? " . (array_key_exists("idade", $pessoa) ? "Sim" : "Não") . "<br>";

// Array_merge - Combina arrays
$array1 = [1, 2, 3];
$array2 = [4, 5, 6];
$combinado = array_merge($array1, $array2);
echo "Arrays combinados: " . implode(", ", $combinado) . "<br>";

// Array_filter - Filtra elementos
$numeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$pares = array_filter($numeros, function ($n) {
    return $n % 2 == 0;
});
echo "Números pares: " . implode(", ", $pares) . "<br>";

// Array_map - Transforma elementos
$dobro = array_map(function ($n) {
    return $n * 2;
}, $numeros);
echo "Dobro dos números: " . implode(", ", $dobro) . "<br>";

// Array_reduce - Reduz array a um valor
$soma = array_reduce($numeros, function ($carry, $n) {
    return $carry + $n;
}, 0);
echo "Soma dos números: $soma<br>";
