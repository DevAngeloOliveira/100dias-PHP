<?php

/**
 * Fundamentos do PHP - Aula 1: Introdução e Hello World
 * 
 * Nesta aula, aprenderemos:
 * 1. O que é PHP
 * 2. Como escrever código PHP
 * 3. Comentários
 * 4. Saída de dados
 */

// Este é um comentário de linha única

/*
Este é um comentário
de múltiplas linhas
*/

// 1. Echo - Exibe uma ou mais strings
echo "Olá, Mundo!<br>";

// 2. Print - Exibe uma string
print "Bem-vindo ao PHP!<br>";

// 3. Concatenação de strings com ponto (.)
echo "PHP " . "é " . "incrível!<br>";

// 4. Tags HTML podem ser incluídas
echo "<h1>Título em H1</h1>";
echo "<p>Este é um parágrafo em HTML.</p>";

// 5. Informações sobre o PHP
echo "<h2>Informações do PHP:</h2>";
echo "Versão do PHP: " . PHP_VERSION . "<br>";
echo "Sistema Operacional: " . PHP_OS . "<br>";

// 6. phpinfo() - Mostra todas as informações do PHP (comentado por segurança)
// phpinfo();

// 7. Variável especial $_SERVER
echo "<h2>Informações do Servidor:</h2>";
echo "Nome do Servidor: " . $_SERVER['SERVER_NAME'] . "<br>";
echo "Software do Servidor: " . $_SERVER['SERVER_SOFTWARE'] . "<br>";

// 8. Data e Hora atual
echo "<h2>Data e Hora:</h2>";
echo "Data atual: " . date('d/m/Y') . "<br>";
echo "Hora atual: " . date('H:i:s') . "<br>";
