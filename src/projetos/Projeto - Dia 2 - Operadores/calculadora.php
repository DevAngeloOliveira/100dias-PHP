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
    <title>Calculadora PHP</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Estilos CSS -->
    <link rel="stylesheet" href="../../assets/css/variables.css">
    <link rel="stylesheet" href="../../assets/css/base.css">
    <link rel="stylesheet" href="../../assets/css/components.css">
    <link rel="stylesheet" href="../../assets/css/dark-theme.css">

    <style>
        .calculator-container {
            max-width: 400px;
            margin: 2rem auto;
            padding: var(--spacing-lg);
            background: var(--bg-secondary);
            border-radius: var(--border-radius-lg);
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--bg-accent);
        }

        .calculator-form {
            display: grid;
            gap: var(--spacing-md);
        }

        .input-group {
            margin-bottom: var(--spacing-md);
        }

        .input-group label {
            display: block;
            margin-bottom: var(--spacing-xs);
            color: var(--text-primary);
            font-weight: 500;
        }

        .input-group input[type="number"] {
            width: 100%;
            padding: var(--spacing-sm);
            border: 1px solid var(--bg-accent);
            border-radius: var(--border-radius-md);
            background: var(--bg-primary);
            color: var(--text-primary);
            transition: var(--transition-normal);
        }

        .input-group input[type="number"]:focus {
            border-color: var(--primary-color);
            box-shadow: var(--shadow-sm);
        }

        .operations {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: var(--spacing-sm);
            margin: var(--spacing-md) 0;
        }

        .operation-option {
            position: relative;
            padding: var(--spacing-sm);
            border: 1px solid var(--bg-accent);
            border-radius: var(--border-radius-md);
            background: var(--bg-primary);
            cursor: pointer;
            transition: var(--transition-normal);
        }

        .operation-option:hover {
            border-color: var(--primary-color);
            background: var(--bg-secondary);
        }

        .operation-option input[type="radio"] {
            position: absolute;
            opacity: 0;
        }

        .operation-option label {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: var(--spacing-sm);
            cursor: pointer;
            color: var(--text-primary);
        }

        .operation-option i {
            color: var(--primary-color);
        }

        .operation-option input[type="radio"]:checked+label {
            color: var(--primary-color);
            font-weight: 600;
        }

        .submit-button {
            width: 100%;
            padding: var(--spacing-md);
            background: var(--gradient-primary);
            color: var(--text-white);
            border: none;
            border-radius: var(--border-radius-md);
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition-normal);
        }

        .submit-button:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .result {
            margin-top: var(--spacing-lg);
            padding: var(--spacing-md);
            background: var(--bg-accent);
            border-radius: var(--border-radius-md);
            text-align: center;
        }

        .result h3 {
            color: var(--text-primary);
            margin-bottom: var(--spacing-sm);
        }

        .result p {
            color: var(--text-secondary);
            font-size: var(--font-size-lg);
        }

        .error {
            color: var(--danger-color);
            background: rgba(239, 68, 68, 0.1);
            padding: var(--spacing-sm);
            border-radius: var(--border-radius-md);
            margin-top: var(--spacing-md);
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
        <a href="../../index.php" class="back-button" aria-label="Voltar">
            <i class="fas fa-home"></i>
        </a>
    </div>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">Calculadora PHP</h1>
                <p class="hero-subtitle">Projeto do Dia 2 - Operadores</p>
            </div>
        </div>
    </section>

    <!-- Conteúdo Principal -->
    <main class="container">
        <div class="calculator-container fade-in">
            <form class="calculator-form" method="POST">
                <div class="input-group">
                    <label for="num1">Primeiro Número</label>
                    <input type="number" id="num1" name="num1" required step="any">
                </div>

                <div class="input-group">
                    <label for="num2">Segundo Número</label>
                    <input type="number" id="num2" name="num2" required step="any">
                </div>

                <div class="operations">
                    <div class="operation-option">
                        <input type="radio" id="soma" name="operacao" value="soma" required>
                        <label for="soma">
                            <i class="fas fa-plus"></i>
                            Soma
                        </label>
                    </div>

                    <div class="operation-option">
                        <input type="radio" id="subtracao" name="operacao" value="subtracao">
                        <label for="subtracao">
                            <i class="fas fa-minus"></i>
                            Subtração
                        </label>
                    </div>

                    <div class="operation-option">
                        <input type="radio" id="multiplicacao" name="operacao" value="multiplicacao">
                        <label for="multiplicacao">
                            <i class="fas fa-times"></i>
                            Multiplicação
                        </label>
                    </div>

                    <div class="operation-option">
                        <input type="radio" id="divisao" name="operacao" value="divisao">
                        <label for="divisao">
                            <i class="fas fa-divide"></i>
                            Divisão
                        </label>
                    </div>
                </div>

                <button type="submit" class="submit-button">
                    <i class="fas fa-calculator"></i>
                    Calcular
                </button>
            </form>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $num1 = $_POST["num1"];
                $num2 = $_POST["num2"];
                $operacao = $_POST["operacao"];
                $resultado = 0;
                $erro = false;

                switch ($operacao) {
                    case "soma":
                        $resultado = $num1 + $num2;
                        $simbolo = "+";
                        break;
                    case "subtracao":
                        $resultado = $num1 - $num2;
                        $simbolo = "-";
                        break;
                    case "multiplicacao":
                        $resultado = $num1 * $num2;
                        $simbolo = "×";
                        break;
                    case "divisao":
                        if ($num2 != 0) {
                            $resultado = $num1 / $num2;
                            $simbolo = "÷";
                        } else {
                            $erro = true;
                        }
                        break;
                }

                if (!$erro) {
                    echo "<div class='result'>
                            <h3>Resultado</h3>
                            <p>{$num1} {$simbolo} {$num2} = {$resultado}</p>
                          </div>";
                } else {
                    echo "<div class='error'>
                            <p>Erro: Divisão por zero não é permitida!</p>
                          </div>";
                }
            }
            ?>
        </div>
    </main>

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const themeToggle = document.getElementById('theme-toggle');
            const body = document.body;
            const html = document.documentElement;

            // Função para aplicar o tema
            function applyTheme(theme) {
                if (theme === 'dark') {
                    body.setAttribute('data-theme', 'dark');
                    html.setAttribute('data-theme', 'dark');
                    themeToggle.querySelector('i').classList.remove('fa-sun');
                    themeToggle.querySelector('i').classList.add('fa-moon');
                } else {
                    body.removeAttribute('data-theme');
                    html.removeAttribute('data-theme');
                    themeToggle.querySelector('i').classList.remove('fa-moon');
                    themeToggle.querySelector('i').classList.add('fa-sun');
                }
            }

            // Verifica o tema salvo ou preferência do sistema
            const savedTheme = localStorage.getItem('theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            const initialTheme = savedTheme || (prefersDark ? 'dark' : 'light');

            // Aplica o tema inicial
            applyTheme(initialTheme);

            // Função para alternar o tema
            function toggleTheme() {
                const currentTheme = body.getAttribute('data-theme');
                const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

                applyTheme(newTheme);
                localStorage.setItem('theme', newTheme);
            }

            // Adiciona o evento de clique
            themeToggle.addEventListener('click', toggleTheme);
        });
    </script>
</body>

</html>