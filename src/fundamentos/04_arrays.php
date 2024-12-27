<?php

/**
 * Fundamentos do PHP - Arrays
 * 
 * Arrays no PHP são estruturas de dados ordenadas que podem armazenar
 * múltiplos valores de qualquer tipo em uma única variável.
 * 
 * Baseado na documentação oficial:
 * @see https://www.php.net/manual/pt_BR/language.types.array.php
 * @see https://www.php.net/manual/pt_BR/ref.array.php
 */

// Função auxiliar para demonstração
function demonstrarArray($titulo, $array, $explicacao = '')
{
    echo "<div style='margin: 10px 0; padding: 10px; border: 1px solid #ddd;'>";
    echo "<h3>$titulo</h3>";
    if ($explicacao) {
        echo "<p><em>$explicacao</em></p>";
    }
    echo "<pre>";
    var_dump($array);
    echo "</pre></div>";
}

// 1. Sintaxe e Criação de Arrays
echo "<h2>1. Sintaxe e Criação de Arrays</h2>";

// Sintaxe curta (recomendada)
$array1 = ['maçã', 'banana', 'laranja'];
demonstrarArray(
    "Array com sintaxe curta []",
    $array1,
    "A sintaxe curta foi introduzida no PHP 5.4 e é a forma moderna de criar arrays"
);

// Sintaxe com array()
$array2 = array('maçã', 'banana', 'laranja');
demonstrarArray(
    "Array com função array()",
    $array2,
    "Sintaxe tradicional usando a construção array(). Ainda válida, mas menos comum em código moderno"
);

// 2. Tipos de Arrays
echo "<h2>2. Tipos de Arrays</h2>";

// Arrays Indexados Numericamente
$frutas = ['maçã', 'banana', 'laranja'];
demonstrarArray(
    "Array Indexado Numericamente",
    $frutas,
    "Arrays indexados usam números inteiros como chaves, começando por padrão do índice 0"
);

// Arrays Associativos
$pessoa = [
    'nome' => 'Maria',
    'idade' => 30,
    'profissao' => 'Desenvolvedora'
];
demonstrarArray(
    "Array Associativo",
    $pessoa,
    "Arrays associativos usam strings como chaves, permitindo uma associação significativa entre chave e valor"
);

// Arrays Multidimensionais
$matriz = [
    'frutas' => ['maçã', 'banana'],
    'verduras' => ['alface', 'couve'],
    'pessoa' => [
        'nome' => 'João',
        'contatos' => ['email' => 'joao@email.com']
    ]
];
demonstrarArray(
    "Array Multidimensional",
    $matriz,
    "Arrays podem conter outros arrays, criando estruturas de dados complexas"
);

// 3. Operações Básicas com Arrays
echo "<h2>3. Operações Básicas com Arrays</h2>";

// Adicionando elementos
$numeros = [1, 2, 3];
$numeros[] = 4;        // Append ao final
$numeros[5] = 6;       // Índice específico
array_push($numeros, 7, 8); // Múltiplos valores
demonstrarArray(
    "Adicionando Elementos",
    $numeros,
    "Existem várias formas de adicionar elementos a um array no PHP"
);

// 4. Funções Essenciais de Array
echo "<h2>4. Funções Essenciais de Array</h2>";

// Manipulação de Arrays
$array = ['a', 'b', 'c', 'd', 'e'];

// Slice - Extraindo parte do array
$slice = array_slice($array, 1, 2);
demonstrarArray(
    "array_slice()",
    $slice,
    "Extrai uma parte do array sem modificar o original. Parâmetros: array, início, comprimento"
);

// Splice - Modificando o array
$splice = array_splice($array, 1, 2, ['x', 'y']);
demonstrarArray(
    "array_splice()",
    $array,
    "Modifica o array original, removendo/substituindo elementos. Útil para modificações in-place"
);

// 5. Operações Avançadas
echo "<h2>5. Operações Avançadas</h2>";

// Map, Filter, Reduce
$numeros = range(1, 5);

// Map - Transformação
$dobro = array_map(fn($n) => $n * 2, $numeros);
demonstrarArray(
    "array_map()",
    $dobro,
    "Aplica uma função a cada elemento do array, retornando um novo array com os resultados"
);

// Filter - Filtragem
$pares = array_filter($numeros, fn($n) => $n % 2 === 0);
demonstrarArray(
    "array_filter()",
    $pares,
    "Filtra elementos do array baseado em uma função de callback que retorna true/false"
);

// Reduce - Redução
$soma = array_reduce($numeros, fn($acc, $n) => $acc + $n, 0);
echo "<div style='margin: 10px 0; padding: 10px; border: 1px solid #ddd;'>";
echo "<h3>array_reduce()</h3>";
echo "<p><em>Reduz um array a um único valor aplicando uma função de callback</em></p>";
echo "Soma dos números: $soma";
echo "</div>";

// 6. Ordenação de Arrays
echo "<h2>6. Ordenação de Arrays</h2>";

$desordenado = [3, 1, 4, 1, 5];
sort($desordenado);
demonstrarArray(
    "sort()",
    $desordenado,
    "Ordena um array indexado em ordem crescente"
);

$associativo = ['c' => 3, 'a' => 1, 'b' => 2];
asort($associativo);
demonstrarArray(
    "asort()",
    $associativo,
    "Ordena um array associativo pelos valores, mantendo as associações de índices"
);

// 7. Verificações Úteis
echo "<h2>7. Verificações Úteis</h2>";

$array = ['a' => 1, 'b' => null, 'c' => 3];

echo "<div style='margin: 10px 0; padding: 10px; border: 1px solid #ddd;'>";
echo "<h3>Funções de Verificação</h3>";
echo "<ul>";
echo "<li>isset(\$array['a']): " . (isset($array['a']) ? 'true' : 'false') . " - Verifica se índice existe e não é null</li>";
echo "<li>array_key_exists('b', \$array): " . (array_key_exists('b', $array) ? 'true' : 'false') . " - Verifica se índice existe, mesmo se null</li>";
echo "<li>in_array(1, \$array): " . (in_array(1, $array) ? 'true' : 'false') . " - Verifica se valor existe no array</li>";
echo "</ul></div>";
