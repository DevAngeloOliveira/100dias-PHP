<?php

// Um array é uma estrutura de dados que armazena uma coleção de valores. 
// Em um array indexado, cada valor é associado a um índice numérico, começando do 0.
$array = [1, 2, 3, 4, 5];

// Acessando e exibindo cada elemento do array usando seu índice numérico.
echo $array[0], "<br>"; // Exibe o primeiro valor do array, que é 1.
echo $array[1], "<br>"; // Exibe o segundo valor do array, que é 2.
echo $array[2], "<br>"; // Exibe o terceiro valor do array, que é 3.
echo $array[3], "<br>"; // Exibe o quarto valor do array, que é 4.
echo $array[4], "<br>"; // Exibe o quinto valor do array, que é 5.

// Um array associativo é uma estrutura de dados onde cada valor é associado a uma chave única.
// As chaves são strings que permitem acessar os valores de forma mais intuitiva.
$arrayAssociativo = [
    "nome" => "Gabriel",
    "idade" => 23,
    "profissao" => "Programador",
    "tecnologias" => ["PHP", "JavaScript", "HTML", "CSS"] // Este é um array dentro de um array associativo, representando uma lista de tecnologias.
];

// Acessando e exibindo valores do array associativo usando suas chaves.
echo $arrayAssociativo["nome"], "<br>"; // Exibe o valor associado à chave "nome", que é "Gabriel".
echo $arrayAssociativo["idade"], "<br>"; // Exibe o valor associado à chave "idade", que é 23.
echo $arrayAssociativo["profissao"], "<br>"; // Exibe o valor associado à chave "profissao", que é "Programador".
echo join(", ", $arrayAssociativo["tecnologias"]), "<br>"; // Exibe os valores do array associado à chave "tecnologias", separados por vírgulas.
