<?php

/**
 * Fundamentos do PHP - Operadores
 * 
 * Operadores são símbolos especiais que realizam operações em variáveis e valores.
 * O PHP possui uma grande variedade de operadores que podem ser categorizados por:
 * - Número de operandos que aceitam
 * - Tipo de operação que realizam
 * 
 * Precedência de Operadores:
 * A precedência determina a ordem em que as operações são executadas.
 * Use parênteses para tornar a precedência explícita e o código mais legível.
 * 
 * Baseado na documentação oficial:
 * @see https://www.php.net/manual/pt_BR/language.operators.php
 */

// Função auxiliar para demonstração
function demonstrar($titulo, $expressao, $resultado, $explicacao = '')
{
    echo "<div style='margin: 10px 0; padding: 10px; border: 1px solid #ddd;'>";
    echo "<h3>$titulo</h3>";
    if ($explicacao) {
        echo "<p><em>$explicacao</em></p>";
    }
    echo "<strong>Expressão:</strong> $expressao<br>";
    echo "<strong>Resultado:</strong> ";
    var_dump($resultado);
    echo "</div>";
}

// 1. Operadores Aritméticos
echo "<h2>1. Operadores Aritméticos</h2>";
echo "<p><em>Realizam operações matemáticas básicas entre números</em></p>";

$a = 10;
$b = 3;

demonstrar(
    "Adição (+)",
    "\$a + \$b",
    $a + $b,
    "Soma dois números. Também usado para concatenar strings se um dos operandos for string."
);

demonstrar(
    "Subtração (-)",
    "\$a - \$b",
    $a - $b,
    "Subtrai o segundo número do primeiro."
);

demonstrar(
    "Multiplicação (*)",
    "\$a * \$b",
    $a * $b,
    "Multiplica dois números."
);

demonstrar(
    "Divisão (/)",
    "\$a / \$b",
    $a / $b,
    "Divide o primeiro número pelo segundo. Sempre retorna float."
);

demonstrar(
    "Módulo (%)",
    "\$a % \$b",
    $a % $b,
    "Retorna o resto da divisão do primeiro número pelo segundo."
);

demonstrar(
    "Exponenciação (**)",
    "\$a ** \$b",
    $a ** $b,
    "Eleva o primeiro número à potência do segundo número."
);

// 2. Operadores de Atribuição
echo "<h2>2. Operadores de Atribuição</h2>";
echo "<p><em>Atribuem valores a variáveis, opcionalmente realizando uma operação</em></p>";

$valor = 5;
demonstrar(
    "Atribuição Básica (=)",
    "\$valor = 5",
    $valor,
    "Atribui o valor da direita à variável da esquerda"
);

$valor += 3;
demonstrar(
    "Atribuição com Adição (+=)",
    "\$valor += 3",
    $valor,
    "Adiciona e atribui. Equivalente a: \$valor = \$valor + 3"
);

// 3. Operadores de Comparação
echo "<h2>3. Operadores de Comparação</h2>";
echo "<p><em>Comparam dois valores e retornam um booleano</em></p>";

$x = 5;
$y = "5";

demonstrar(
    "Igual (==)",
    "\$x == \$y",
    $x == $y,
    "Compara valores após conversão de tipo"
);

demonstrar(
    "Idêntico (===)",
    "\$x === \$y",
    $x === $y,
    "Compara valores e tipos"
);

demonstrar(
    "Spaceship (<=>)",
    "\$x <=> \$y",
    $x <=> $y,
    "Retorna -1 (menor), 0 (igual) ou 1 (maior)"
);

// 4. Operadores Lógicos
echo "<h2>4. Operadores Lógicos</h2>";
echo "<p><em>Realizam operações de lógica booleana</em></p>";

$v = true;
$f = false;

demonstrar(
    "AND (&&)",
    "\$v && \$f",
    $v && $f,
    "Verdadeiro se ambos operandos forem verdadeiros"
);

demonstrar(
    "OR (||)",
    "\$v || \$f",
    $v || $f,
    "Verdadeiro se pelo menos um operando for verdadeiro"
);

// 5. Operadores de String
echo "<h2>5. Operadores de String</h2>";
echo "<p><em>Operam sobre strings</em></p>";

$str1 = "Hello";
$str2 = "World";

demonstrar(
    "Concatenação (.)",
    "\$str1 . ' ' . \$str2",
    $str1 . ' ' . $str2,
    "Une duas ou mais strings"
);

// 6. Operadores de Incremento/Decremento
echo "<h2>6. Operadores de Incremento/Decremento</h2>";
echo "<p><em>Incrementam ou decrementam valores numéricos</em></p>";

$i = 5;
demonstrar(
    "Pré-incremento (++\$i)",
    "++\$i",
    ++$i,
    "Incrementa e então retorna"
);

$i = 5;
demonstrar(
    "Pós-incremento (\$i++)",
    "\$i++",
    $i++,
    "Retorna e então incrementa"
);

// 7. Operadores de Tipo
echo "<h2>7. Operadores de Tipo</h2>";
echo "<p><em>Trabalham com tipos de dados</em></p>";

$obj = new stdClass();
demonstrar(
    "instanceof",
    "\$obj instanceof stdClass",
    $obj instanceof stdClass,
    "Verifica se um objeto é instância de uma classe"
);

// 8. Operadores de Controle de Erro
echo "<h2>8. Operadores de Controle de Erro</h2>";
echo "<p><em>Controlam o tratamento de erros</em></p>";

demonstrar(
    "Supressão de erro (@)",
    "@file_get_contents('arquivo_inexistente')",
    @file_get_contents('arquivo_inexistente'),
    "Suprime mensagens de erro para a expressão"
);

// 9. Operadores Nullsafe e Null Coalescing
echo "<h2>9. Operadores Nullsafe e Null Coalescing</h2>";
echo "<p><em>Lidam com valores nulos de forma segura</em></p>";

$array = ["user" => ["name" => "John"]];
demonstrar(
    "Null Coalescing (??)",
    "\$array['user']['name'] ?? 'Anonymous'",
    $array["user"]["name"] ?? "Anonymous",
    "Retorna o primeiro operando se ele existir e não for null, caso contrário retorna o segundo"
);

// Exemplo com operador nullsafe (PHP 8+)
$obj = new stdClass();
$obj->user = new stdClass();
$obj->user->name = "John";
demonstrar(
    "Nullsafe (?.)",
    "\$obj?->user?->name",
    $obj?->user?->name,
    "Acessa propriedades de objetos de forma segura, retornando null se algum elemento da cadeia for null"
);
