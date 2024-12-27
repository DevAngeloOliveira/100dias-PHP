<?php

/**
 * Fundamentos do PHP - Variáveis e Tipos de Dados
 * 
 * Variáveis no PHP são containers para armazenar informações.
 * São representadas por um cifrão ($) seguido por um nome.
 * O PHP é uma linguagem dinamicamente tipada, o que significa que
 * uma variável pode conter diferentes tipos de valores em diferentes momentos.
 * 
 * Regras para nomes de variáveis:
 * 1. Deve começar com uma letra ou underscore
 * 2. Pode conter apenas caracteres alfanuméricos e underscore
 * 3. É case-sensitive ($nome é diferente de $NOME)
 * 
 * Baseado na documentação oficial:
 * @see https://www.php.net/manual/pt_BR/language.variables.php
 * @see https://www.php.net/manual/pt_BR/language.types.php
 */

// Função auxiliar para demonstração
function demonstrarVariavel($titulo, $variavel, $explicacao = '')
{
    echo "<div style='margin: 10px 0; padding: 10px; border: 1px solid #ddd;'>";
    echo "<h3>$titulo</h3>";
    if ($explicacao) {
        echo "<p><em>$explicacao</em></p>";
    }
    echo "Valor: ";
    var_dump($variavel);
    echo "<br>Tipo: " . gettype($variavel);
    echo "</div>";
}

// 1. Tipos Escalares
echo "<h2>1. Tipos Escalares (Tipos Básicos)</h2>";

// Boolean
$verdadeiro = true;
$falso = false;
demonstrarVariavel(
    "Boolean (bool)",
    $verdadeiro,
    "Representa um valor verdadeiro ou falso. Útil para controle de fluxo e condições lógicas."
);

// Integer
$inteiro = 42;
$inteiro_negativo = -17;
$inteiro_octal = 0755; // Octal (começa com 0)
$inteiro_hex = 0xFF;   // Hexadecimal (começa com 0x)
demonstrarVariavel(
    "Integer (int)",
    $inteiro,
    "Número inteiro. Pode ser decimal, octal (0), ou hexadecimal (0x)."
);

// Float (Double)
$float = 3.14;
$cientifico = 2.5e3; // 2500
demonstrarVariavel(
    "Float/Double",
    $float,
    "Número de ponto flutuante (decimal). Pode usar notação científica."
);

// String
$string_simples = 'Texto com aspas simples';
$string_dupla = "Texto com aspas duplas e variável: $inteiro";
demonstrarVariavel(
    "String",
    $string_dupla,
    "Sequência de caracteres. Aspas duplas interpretam variáveis, aspas simples não."
);

// 2. Tipos Compostos
echo "<h2>2. Tipos Compostos</h2>";

// Array
$array = [
    'numeros' => [1, 2, 3],
    'texto' => 'abc'
];
demonstrarVariavel(
    "Array",
    $array,
    "Estrutura de dados ordenada que pode armazenar múltiplos valores"
);

// Object
class ExemploClasse
{
    public $propriedade = "valor";
}
$objeto = new ExemploClasse();
demonstrarVariavel(
    "Object",
    $objeto,
    "Instância de uma classe, encapsulando dados e comportamentos"
);

// 3. Tipos Especiais
echo "<h2>3. Tipos Especiais</h2>";

// NULL
$nulo = null;
demonstrarVariavel(
    "NULL",
    $nulo,
    "Representa uma variável sem valor. Útil para inicialização e verificações"
);

// Resource
$arquivo = fopen(__FILE__, 'r');
demonstrarVariavel(
    "Resource",
    $arquivo,
    "Referência especial para recursos externos (arquivos, conexões DB, etc)"
);
fclose($arquivo);

// 4. Coerção de Tipos
echo "<h2>4. Coerção de Tipos</h2>";

// Coerção Automática
$numero_string = "42";
$resultado = $numero_string + 8; // PHP converte automaticamente para int
demonstrarVariavel(
    "Coerção Automática",
    $resultado,
    "PHP converte tipos automaticamente quando necessário (Type Juggling)"
);

// Type Casting Explícito
$numero = 3.14;
$inteiro = (int)$numero;
demonstrarVariavel(
    "Type Casting",
    $inteiro,
    "Conversão explícita de tipos usando (tipo) ou funções de conversão"
);

// 5. Escopo de Variáveis
echo "<h2>5. Escopo de Variáveis</h2>";

$global = "Variável Global";

function exemploEscopo()
{
    global $global;    // Acessando variável global
    $local = "Variável Local";

    echo "<div style='margin: 10px 0; padding: 10px; border: 1px solid #ddd;'>";
    echo "<h3>Escopo de Variáveis</h3>";
    echo "<p><em>Demonstração de variáveis globais e locais</em></p>";
    echo "Global: $global<br>";
    echo "Local: $local<br>";
    echo "</div>";
}

exemploEscopo();

// 6. Variáveis Predefinidas
echo "<h2>6. Variáveis Predefinidas</h2>";
?>

<div style='margin: 10px 0; padding: 10px; border: 1px solid #ddd;'>
    <h3>Superglobais</h3>
    <p><em>Variáveis predefinidas disponíveis em todos os escopos</em></p>
    <ul>
        <li>$_SERVER['PHP_SELF']: <?= htmlspecialchars($_SERVER['PHP_SELF']) ?></li>
        <li>$_SERVER['SERVER_SOFTWARE']: <?= htmlspecialchars($_SERVER['SERVER_SOFTWARE']) ?></li>
        <li>$_GET: Array para parâmetros de URL</li>
        <li>$_POST: Array para dados de formulário POST</li>
        <li>$_SESSION: Array para dados de sessão</li>
    </ul>
</div>

<?php
// 7. Constantes
echo "<h2>7. Constantes</h2>";

// Definindo constantes
define('CONFIG_NOME', 'Minha Aplicação');
const CONFIG_VERSAO = '1.0.0';

echo "<div style='margin: 10px 0; padding: 10px; border: 1px solid #ddd;'>";
echo "<h3>Constantes</h3>";
echo "<p><em>Valores que não podem ser alterados durante a execução</em></p>";
echo "define(): " . CONFIG_NOME . "<br>";
echo "const: " . CONFIG_VERSAO . "<br>";
echo "Constante Mágica __LINE__: " . __LINE__ . "<br>";
echo "</div>";
