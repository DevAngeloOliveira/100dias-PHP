<?php
// Funções de validação e cálculo
function validarNumero($numero)
{
    return is_numeric($numero);
}

function calcular($num1, $num2, $operacao)
{
    switch ($operacao) {
        case 'soma':
            return $num1 + $num2;
        case 'subtracao':
            return $num1 - $num2;
        case 'multiplicacao':
            return $num1 * $num2;
        case 'divisao':
            return $num2 != 0 ? $num1 / $num2 : "Erro: Divisão por zero!";
        default:
            return "Operação inválida";
    }
}

// Processamento do formulário
$resultado = '';
$num1 = '';
$num2 = '';
$operacao = '';
$erro = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST['num1'] ?? '';
    $num2 = $_POST['num2'] ?? '';
    $operacao = $_POST['operacao'] ?? '';

    if (validarNumero($num1) && validarNumero($num2)) {
        $resultado = calcular((float)$num1, (float)$num2, $operacao);
        if (is_numeric($resultado)) {
            $resultado = number_format($resultado, 2, ',', '.');
        }
    } else {
        $erro = "Por favor, insira números válidos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora - 100 Dias de PHP</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Estilos CSS -->
    <link rel="stylesheet" href="../../assets/css/variables.css">
    <link rel="stylesheet" href="../../assets/css/base.css">
    <link rel="stylesheet" href="../../assets/css/components.css">
    <link rel="stylesheet" href="../../assets/css/dark-theme.css">

    <style>
        .calculator-container {
            max-width: 500px;
            margin: 0 auto;
        }

        .result-display {
            background: var(--bg-secondary);
            padding: var(--spacing-lg);
            border-radius: var(--border-radius-lg);
            margin-bottom: var(--spacing-lg);
            text-align: center;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--bg-accent);
        }

        .result-display h3 {
            color: var(--primary-color);
            margin-bottom: var(--spacing-sm);
        }

        .result-value {
            font-size: var(--font-size-3xl);
            font-weight: 700;
            color: var(--success-color);
        }

        .calculator-form {
            background: var(--bg-secondary);
            padding: var(--spacing-xl);
            border-radius: var(--border-radius-lg);
            box-shadow: var(--shadow-md);
            border: 1px solid var(--bg-accent);
        }

        .form-group {
            margin-bottom: var(--spacing-lg);
        }

        .form-group label {
            display: block;
            margin-bottom: var(--spacing-sm);
            color: var(--text-secondary);
            font-weight: 500;
        }

        .operation-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: var(--spacing-md);
            margin-bottom: var(--spacing-lg);
        }

        .operation-option {
            padding: var(--spacing-md);
            border: 2px solid var(--bg-accent);
            border-radius: var(--border-radius-md);
            cursor: pointer;
            text-align: center;
            transition: var(--transition-normal);
        }

        .operation-option:hover {
            border-color: var(--primary-color);
            background: var(--bg-accent);
        }

        .operation-option input[type="radio"] {
            display: none;
        }

        .operation-option.selected {
            border-color: var(--primary-color);
            background: var(--bg-accent);
        }

        .operation-option i {
            font-size: var(--font-size-xl);
            color: var(--primary-color);
            margin-bottom: var(--spacing-sm);
        }

        .error-message {
            color: var(--danger-color);
            background: rgba(239, 68, 68, 0.1);
            padding: var(--spacing-sm) var(--spacing-md);
            border-radius: var(--border-radius-md);
            margin-bottom: var(--spacing-md);
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- Botões Flutuantes -->
    <div class="floating-buttons">
        <button id="theme-toggle" class="theme-toggle" aria-label="Alternar tema">
            <i class="fas fa-sun"></i>
        </button>
        <a href="../../index.php" class="profile-button" aria-label="Voltar para início">
            <i class="fas fa-home"></i>
        </a>
    </div>

    <!-- Header -->
    <header class="main-header">
        <div class="container">
            <div class="header-content">
                <h1 class="header-title">
                    <i class="fas fa-calculator"></i> Calculadora PHP
                </h1>
                <p class="header-subtitle">Projeto do Dia 2 - Operadores</p>
            </div>
        </div>
    </header>

    <!-- Conteúdo Principal -->
    <main class="container">
        <div class="calculator-container mt-4">
            <?php if ($resultado !== ''): ?>
                <div class="result-display fade-in">
                    <h3>Resultado</h3>
                    <div class="result-value"><?php echo $resultado; ?></div>
                </div>
            <?php endif; ?>

            <?php if ($erro !== ''): ?>
                <div class="error-message fade-in">
                    <i class="fas fa-exclamation-circle"></i> <?php echo $erro; ?>
                </div>
            <?php endif; ?>

            <form method="POST" class="calculator-form fade-in">
                <div class="form-group">
                    <label for="num1">Primeiro Número</label>
                    <input type="text" id="num1" name="num1" value="<?php echo htmlspecialchars($num1); ?>" required>
                </div>

                <div class="form-group">
                    <label for="num2">Segundo Número</label>
                    <input type="text" id="num2" name="num2" value="<?php echo htmlspecialchars($num2); ?>" required>
                </div>

                <div class="form-group">
                    <label>Operação</label>
                    <div class="operation-grid">
                        <label class="operation-option" data-operation="soma">
                            <input type="radio" name="operacao" value="soma" <?php echo $operacao === 'soma' ? 'checked' : ''; ?> required>
                            <i class="fas fa-plus"></i>
                            <div>Adição</div>
                        </label>
                        <label class="operation-option" data-operation="subtracao">
                            <input type="radio" name="operacao" value="subtracao" <?php echo $operacao === 'subtracao' ? 'checked' : ''; ?>>
                            <i class="fas fa-minus"></i>
                            <div>Subtração</div>
                        </label>
                        <label class="operation-option" data-operation="multiplicacao">
                            <input type="radio" name="operacao" value="multiplicacao" <?php echo $operacao === 'multiplicacao' ? 'checked' : ''; ?>>
                            <i class="fas fa-times"></i>
                            <div>Multiplicação</div>
                        </label>
                        <label class="operation-option" data-operation="divisao">
                            <input type="radio" name="operacao" value="divisao" <?php echo $operacao === 'divisao' ? 'checked' : ''; ?>>
                            <i class="fas fa-divide"></i>
                            <div>Divisão</div>
                        </label>
                    </div>
                </div>

                <button type="submit" class="w-full">
                    <i class="fas fa-equals"></i> Calcular
                </button>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="mt-4 mb-4">
        <div class="container text-center">
            <p>
                Desenvolvido com <i class="fas fa-heart" style="color: var(--danger-color);"></i> durante o desafio 100 Dias de PHP
            </p>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        // Função para alternar o tema
        function toggleTheme() {
            const body = document.body;
            const themeToggle = document.getElementById('theme-toggle');
            const icon = themeToggle.querySelector('i');

            if (body.getAttribute('data-theme') === 'dark') {
                body.removeAttribute('data-theme');
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');
                localStorage.setItem('theme', 'light');
            } else {
                body.setAttribute('data-theme', 'dark');
                icon.classList.remove('fa-sun');
                icon.classList.add('fa-moon');
                localStorage.setItem('theme', 'dark');
            }
        }

        // Verificar tema salvo
        document.addEventListener('DOMContentLoaded', () => {
            const savedTheme = localStorage.getItem('theme');
            const themeToggle = document.getElementById('theme-toggle');
            const icon = themeToggle.querySelector('i');

            if (savedTheme === 'dark') {
                document.body.setAttribute('data-theme', 'dark');
                icon.classList.remove('fa-sun');
                icon.classList.add('fa-moon');
            }

            // Adicionar evento de clique
            themeToggle.addEventListener('click', toggleTheme);

            // Adicionar eventos para as opções de operação
            document.querySelectorAll('.operation-option').forEach(option => {
                const radio = option.querySelector('input[type="radio"]');

                if (radio.checked) {
                    option.classList.add('selected');
                }

                option.addEventListener('click', () => {
                    document.querySelectorAll('.operation-option').forEach(op => {
                        op.classList.remove('selected');
                    });
                    option.classList.add('selected');
                });
            });
        });
    </script>
</body>

</html>