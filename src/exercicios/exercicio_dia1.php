<?php
// Inicializa as variáveis
$nomeAluno = "";
$idade = "";
$notaMedia = "";
$matriculado = false;
$disciplinas = [];
$infoAdicionais = [
    "turma" => "",
    "turno" => "",
    "professor_responsavel" => "",
    "ano_letivo" => "",
    "semestre" => ""
];

// Processa o formulário quando enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta os dados do formulário
    $nomeAluno = $_POST["nome"] ?? "";
    $idade = intval($_POST["idade"] ?? 0);
    $notaMedia = floatval(str_replace(",", ".", $_POST["nota_media"] ?? 0));
    $matriculado = isset($_POST["matriculado"]);
    $disciplinas = $_POST["disciplinas"] ?? [];
    $infoAdicionais = [
        "turma" => $_POST["turma"] ?? "",
        "turno" => $_POST["turno"] ?? "",
        "professor_responsavel" => $_POST["professor"] ?? "",
        "ano_letivo" => $_POST["ano_letivo"] ?? "",
        "semestre" => $_POST["semestre"] ?? ""
    ];

    // Função que verifica se os dados do aluno são válidos
    function validarDados($nome, $idade, $nota)
    {
        $erros = [];

        if (strlen($nome) < 3) {
            $erros[] = "O nome deve ter pelo menos 3 caracteres.";
        }
        if (!preg_match("/^[a-zA-ZÀ-ÿ\s]*$/u", $nome)) {
            $erros[] = "O nome deve conter apenas letras e espaços.";
        }

        if ($idade <= 0) {
            $erros[] = "A idade deve ser um número positivo.";
        }
        if ($idade > 100) {
            $erros[] = "Idade inválida.";
        }

        if ($nota < 0 || $nota > 10) {
            $erros[] = "A nota deve estar entre 0 e 10.";
        }

        return $erros;
    }

    // Valida os dados
    $erros = validarDados($nomeAluno, $idade, $notaMedia);

    // Se não houver erros, prepara os dados para exibição
    if (empty($erros)) {
        $nomeFormatado = ucwords(strtolower($nomeAluno));
        $notaFormatada = number_format($notaMedia, 1, ',', '.');
        $statusMatricula = $matriculado ? "Matriculado" : "Não Matriculado";
        $resultadoAprovacao = [
            "status" => $notaMedia >= 7 ? "Aprovado" : "Reprovado",
            "cor" => $notaMedia >= 7 ? "green" : "red"
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Aluno</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: #f5f5f5;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin: 10px 0;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        button {
            background: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }

        .error {
            color: red;
            padding: 10px;
            border: 1px solid red;
            margin: 10px 0;
            border-radius: 4px;
        }

        .info-item {
            margin: 10px 0;
            padding: 10px;
            border-bottom: 1px solid #eee;
        }

        .disciplinas {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin: 10px 0;
        }

        .disciplina {
            background: #e9ecef;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 0.9em;
        }

        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 15px;
            color: white;
            font-weight: bold;
        }

        .aprovado {
            background-color: #28a745;
        }

        .reprovado {
            background-color: #dc3545;
        }
    </style>
</head>

<body>
    <div class="card">
        <h2>Cadastro de Aluno</h2>

        <?php if (!empty($erros)): ?>
            <div class="error">
                <strong>Erros encontrados:</strong><br>
                <?php foreach ($erros as $erro): ?>
                    - <?php echo $erro; ?><br>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ($_SERVER["REQUEST_METHOD"] != "POST" || !empty($erros)): ?>
            <form method="POST">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($nomeAluno); ?>" required>
                </div>

                <div class="form-group">
                    <label for="idade">Idade:</label>
                    <input type="number" id="idade" name="idade" value="<?php echo $idade; ?>" required>
                </div>

                <div class="form-group">
                    <label for="nota_media">Nota Média:</label>
                    <input type="text" id="nota_media" name="nota_media" value="<?php echo str_replace(".", ",", $notaMedia); ?>" required>
                </div>

                <div class="form-group">
                    <label>
                        <input type="checkbox" name="matriculado" <?php echo $matriculado ? 'checked' : ''; ?>>
                        Matriculado
                    </label>
                </div>

                <div class="form-group">
                    <label>Disciplinas:</label>
                    <div class="checkbox-group">
                        <?php
                        $todasDisciplinas = ["Português", "Matemática", "História", "Geografia", "Ciências"];
                        foreach ($todasDisciplinas as $disciplina):
                        ?>
                            <label class="checkbox-item">
                                <input type="checkbox" name="disciplinas[]" value="<?php echo $disciplina; ?>"
                                    <?php echo in_array($disciplina, $disciplinas) ? 'checked' : ''; ?>>
                                <?php echo $disciplina; ?>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="turma">Turma:</label>
                    <input type="text" id="turma" name="turma" value="<?php echo htmlspecialchars($infoAdicionais['turma']); ?>">
                </div>

                <div class="form-group">
                    <label for="turno">Turno:</label>
                    <select id="turno" name="turno">
                        <option value="">Selecione...</option>
                        <option value="Manhã" <?php echo $infoAdicionais['turno'] == 'Manhã' ? 'selected' : ''; ?>>Manhã</option>
                        <option value="Tarde" <?php echo $infoAdicionais['turno'] == 'Tarde' ? 'selected' : ''; ?>>Tarde</option>
                        <option value="Noite" <?php echo $infoAdicionais['turno'] == 'Noite' ? 'selected' : ''; ?>>Noite</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="professor">Professor Responsável:</label>
                    <input type="text" id="professor" name="professor" value="<?php echo htmlspecialchars($infoAdicionais['professor_responsavel']); ?>">
                </div>

                <div class="form-group">
                    <label for="ano_letivo">Ano Letivo:</label>
                    <input type="text" id="ano_letivo" name="ano_letivo" value="<?php echo htmlspecialchars($infoAdicionais['ano_letivo']); ?>">
                </div>

                <div class="form-group">
                    <label for="semestre">Semestre:</label>
                    <select id="semestre" name="semestre">
                        <option value="">Selecione...</option>
                        <option value="1º" <?php echo $infoAdicionais['semestre'] == '1º' ? 'selected' : ''; ?>>1º</option>
                        <option value="2º" <?php echo $infoAdicionais['semestre'] == '2º' ? 'selected' : ''; ?>>2º</option>
                    </select>
                </div>

                <button type="submit">Cadastrar Aluno</button>
            </form>
        <?php else: ?>
            <h2>Informações do Aluno</h2>

            <div class="info-item">
                <strong>Nome:</strong> <?php echo $nomeFormatado; ?>
            </div>

            <div class="info-item">
                <strong>Idade:</strong> <?php echo $idade; ?> anos
            </div>

            <div class="info-item">
                <strong>Nota Média:</strong> <?php echo $notaFormatada; ?>
                <span class="status <?php echo strtolower($resultadoAprovacao['status']); ?>">
                    <?php echo $resultadoAprovacao['status']; ?>
                </span>
            </div>

            <div class="info-item">
                <strong>Status da Matrícula:</strong> <?php echo $statusMatricula; ?>
            </div>

            <div class="info-item">
                <strong>Disciplinas Cursadas:</strong>
                <div class="disciplinas">
                    <?php foreach ($disciplinas as $disciplina): ?>
                        <span class="disciplina"><?php echo $disciplina; ?></span>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="info-item">
                <strong>Informações Adicionais:</strong>
                <ul>
                    <?php foreach ($infoAdicionais as $chave => $valor): ?>
                        <li><strong><?php echo ucfirst(str_replace('_', ' ', $chave)); ?>:</strong> <?php echo $valor; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <button onclick="window.location.href=''" style="margin-top: 20px;">Cadastrar Novo Aluno</button>
        <?php endif; ?>
    </div>
</body>

</html>