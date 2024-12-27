<?php

/**
 * Fundamentos do PHP - Hello World e Sintaxe Básica
 * 
 * Baseado na documentação oficial do PHP:
 * @link https://www.php.net/manual/pt_BR/introduction.php
 * 
 * 1. Tags PHP
 * - <?php ?> (tag padrão)
 * - <?= ?> (tag curta para echo, PHP 5.4+)
 * 
 * 2. Separação de instruções
 * - Cada instrução é terminada com ponto e vírgula (;)
 * 
 * 3. Tipos de saída
 * - echo: Construtor de linguagem para saída
 * - print: Função para saída de string
 * - var_dump: Debug e informações de tipo
 * 
 * @see https://www.php.net/manual/pt_BR/language.basic-syntax.php
 */

// 1. Hello World Básico
echo "Hello World!<br>";

// 2. Saída com HTML
?>
<div style="background: #f0f0f0; padding: 10px; margin: 10px 0;">
    <?php echo "Hello World com HTML!"; ?>
</div>

<?php
// 3. Diferentes tipos de saída
$texto = "PHP";
echo "Usando echo: $texto<br>";
print("Usando print: $texto<br>");
var_dump($texto); // Mostra tipo e comprimento

// 4. Concatenação (.) vs. Interpolação
$versao = PHP_VERSION;
echo '<br>Concatenação: PHP versão ' . $versao . '<br>';
echo "Interpolação: PHP versão $versao<br>";

// 5. Heredoc (com interpretação de variáveis)
$heredoc = <<<EOD
<div style="border: 1px solid #ccc; padding: 10px; margin: 10px 0;">
    Texto com Heredoc
    Versão atual: $versao
</div>
EOD;
echo $heredoc;

// 6. Nowdoc (sem interpretação de variáveis)
$nowdoc = <<<'EOD'
<div style="border: 1px solid #ddd; padding: 10px; margin: 10px 0;">
    Texto com Nowdoc
    Variáveis não são interpretadas: $versao
</div>
EOD;
echo $nowdoc;

// 7. Exemplo prático para web
$titulo = "Minha Primeira Página PHP";
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title><?= $titulo ?></title>
</head>

<body>
    <h1><?= $titulo ?></h1>
    <p>
        <?php echo "Servidor rodando PHP " . PHP_VERSION; ?>
    </p>
</body>

</html>