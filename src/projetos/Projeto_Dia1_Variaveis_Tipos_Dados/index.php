<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto - Dia 1 - Variáveis e Tipos de Dados</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            line-height: 1.6;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: #f0f2f5;
        }

        .card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .section {
            border-left: 4px solid #4267B2;
            padding-left: 15px;
            margin: 15px 0;
        }

        .code {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 4px;
            font-family: monospace;
            white-space: pre-wrap;
        }

        .result {
            background: #e7f3ff;
            padding: 10px;
            border-radius: 4px;
            margin-top: 10px;
        }

        .type {
            color: #666;
            font-size: 0.9em;
            font-style: italic;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background: #f5f5f5;
        }
    </style>
</head>

<body>
    <?php
    // Variáveis básicas
    $nome = "Gabriel";
    $idade = 23;
    $altura = 1.75;
    $ehProgramador = true;
    $profissao = "Programador";
    $tecnologias = ["PHP", "JavaScript", "HTML", "CSS"];
    $salario = 5000.50;
    $hobbies = null;

    // Conversões de tipo
    $idadeString = (string) $idade;
    $alturaInt = (int) $altura;
    $salarioString = (string) $salario;
    $profissaoArray = (array) $profissao;

    // Operações matemáticas
    $anosExperiencia = 2;
    $salarioAnual = $salario * 12;
    $salarioComBonus = $salario + ($salario * 0.1);
    $idadeDaquiA5Anos = $idade + 5;

    // Operações com strings
    $nomeCompleto = $nome . " Silva";
    $apresentacao = "Olá, me chamo $nome e tenho $idade anos";
    ?>

    <div class="card">
        <h1>Demonstração de Variáveis e Tipos de Dados em PHP</h1>

        <div class="section">
            <h2>1. Tipos Básicos</h2>
            <div class="code">
                $nome = "<?php echo $nome; ?>"; <span class="type">(<?php echo gettype($nome); ?>)</span>
                $idade = <?php echo $idade; ?>; <span class="type">(<?php echo gettype($idade); ?>)</span>
                $altura = <?php echo $altura; ?>; <span class="type">(<?php echo gettype($altura); ?>)</span>
                $ehProgramador = <?php echo $ehProgramador ? 'true' : 'false'; ?>; <span class="type">(<?php echo gettype($ehProgramador); ?>)</span>
                $salario = <?php echo $salario; ?>; <span class="type">(<?php echo gettype($salario); ?>)</span>
                $hobbies = <?php echo var_export($hobbies, true); ?>; <span class="type">(<?php echo gettype($hobbies); ?>)</span>
            </div>
        </div>

        <div class="section">
            <h2>2. Arrays</h2>
            <div class="code">
                $tecnologias = [
                <?php echo implode(",\n    ", array_map(function ($t) {
                    return "\"$t\"";
                }, $tecnologias)); ?>
                ];
            </div>
            <div class="result">
                Tecnologias dominadas: <?php echo implode(", ", $tecnologias); ?>
            </div>
        </div>

        <div class="section">
            <h2>3. Conversões de Tipo</h2>
            <table>
                <tr>
                    <th>Valor Original</th>
                    <th>Conversão</th>
                    <th>Resultado</th>
                </tr>
                <tr>
                    <td>$idade (<?php echo gettype($idade); ?>)</td>
                    <td>(string)</td>
                    <td>"<?php echo $idadeString; ?>" (<?php echo gettype($idadeString); ?>)</td>
                </tr>
                <tr>
                    <td>$altura (<?php echo gettype($altura); ?>)</td>
                    <td>(int)</td>
                    <td><?php echo $alturaInt; ?> (<?php echo gettype($alturaInt); ?>)</td>
                </tr>
                <tr>
                    <td>$salario (<?php echo gettype($salario); ?>)</td>
                    <td>(string)</td>
                    <td>"<?php echo $salarioString; ?>" (<?php echo gettype($salarioString); ?>)</td>
                </tr>
            </table>
        </div>

        <div class="section">
            <h2>4. Operações Matemáticas</h2>
            <div class="code">
                Salário Mensal: R$ <?php echo number_format($salario, 2, ',', '.'); ?>
                Salário Anual: R$ <?php echo number_format($salarioAnual, 2, ',', '.'); ?>
                Salário com Bônus (10%): R$ <?php echo number_format($salarioComBonus, 2, ',', '.'); ?>
                Idade daqui a 5 anos: <?php echo $idadeDaquiA5Anos; ?> anos
            </div>
        </div>

        <div class="section">
            <h2>5. Manipulação de Strings</h2>
            <div class="code">
                Nome Completo: <?php echo $nomeCompleto; ?>
                Apresentação: <?php echo $apresentacao; ?>
                Tamanho do nome: <?php echo strlen($nome); ?> caracteres
                Nome em maiúsculas: <?php echo strtoupper($nome); ?>
            </div>
        </div>

        <div class="section">
            <h2>6. Verificações de Tipo</h2>
            <table>
                <tr>
                    <th>Variável</th>
                    <th>is_string()</th>
                    <th>is_int()</th>
                    <th>is_float()</th>
                    <th>is_bool()</th>
                    <th>is_array()</th>
                    <th>is_null()</th>
                </tr>
                <tr>
                    <td>$nome</td>
                    <td><?php echo is_string($nome) ? '✅' : '❌'; ?></td>
                    <td><?php echo is_int($nome) ? '✅' : '❌'; ?></td>
                    <td><?php echo is_float($nome) ? '✅' : '❌'; ?></td>
                    <td><?php echo is_bool($nome) ? '✅' : '❌'; ?></td>
                    <td><?php echo is_array($nome) ? '✅' : '❌'; ?></td>
                    <td><?php echo is_null($nome) ? '✅' : '❌'; ?></td>
                </tr>
                <tr>
                    <td>$idade</td>
                    <td><?php echo is_string($idade) ? '✅' : '❌'; ?></td>
                    <td><?php echo is_int($idade) ? '✅' : '❌'; ?></td>
                    <td><?php echo is_float($idade) ? '✅' : '❌'; ?></td>
                    <td><?php echo is_bool($idade) ? '✅' : '❌'; ?></td>
                    <td><?php echo is_array($idade) ? '✅' : '❌'; ?></td>
                    <td><?php echo is_null($idade) ? '✅' : '❌'; ?></td>
                </tr>
            </table>
        </div>
    </div>

    <script>
        // Adiciona highlight nos códigos quando clicados
        document.querySelectorAll('.code').forEach(block => {
            block.addEventListener('click', () => {
                block.style.background = '#e7f3ff';
                setTimeout(() => {
                    block.style.background = '#f8f9fa';
                }, 200);
            });
        });
    </script>
</body>

</html>