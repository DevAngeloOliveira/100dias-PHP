<?php
// Array de hobbies disponíveis
$hobbies_disponiveis = [
    'leitura' => 'Leitura',
    'esportes' => 'Esportes',
    'musica' => 'Música',
    'viagem' => 'Viagens',
    'tecnologia' => 'Tecnologia',
    'culinaria' => 'Culinária'
];

// Inicialização das variáveis
$nome = '';
$email = '';
$idade = '';
$altura = '';
$hobbies = [];
$newsletter = false;
$mensagem = '';
$erro = '';

// Processamento do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura dos dados do formulário
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $idade = $_POST['idade'] ?? '';
    $altura = $_POST['altura'] ?? '';
    $hobbies = $_POST['hobbies'] ?? [];
    $newsletter = isset($_POST['newsletter']);

    // Validação dos dados
    $erros = [];

    if (empty($nome)) {
        $erros[] = "Nome é obrigatório";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erros[] = "Email inválido";
    }

    if (!empty($idade) && (!is_numeric($idade) || $idade < 0)) {
        $erros[] = "Idade inválida";
    }

    if (!empty($altura) && (!is_numeric($altura) || $altura <= 0)) {
        $erros[] = "Altura inválida";
    }

    // Se não houver erros, processa o cadastro
    if (empty($erros)) {
        $mensagem = "Cadastro realizado com sucesso!";
    } else {
        $erro = implode("<br>", $erros);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Cadastro</title>

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
        .form-container {
            max-width: 600px;
            margin: 2rem auto;
            padding: var(--spacing-lg);
            background: var(--bg-secondary);
            border-radius: var(--border-radius-lg);
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--bg-accent);
        }

        .form-grid {
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

        .input-group input,
        .input-group textarea {
            width: 100%;
            padding: var(--spacing-sm);
            border: 1px solid var(--bg-accent);
            border-radius: var(--border-radius-md);
            background: var(--bg-primary);
            color: var(--text-primary);
            transition: var(--transition-normal);
        }

        .input-group input:focus,
        .input-group textarea:focus {
            border-color: var(--primary-color);
            box-shadow: var(--shadow-sm);
        }

        .input-group textarea {
            min-height: 100px;
            resize: vertical;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: var(--spacing-sm);
            margin: var(--spacing-md) 0;
        }

        .checkbox-group input[type="checkbox"] {
            width: auto;
            margin-right: var(--spacing-xs);
        }

        .checkbox-group label {
            margin: 0;
            color: var(--text-primary);
            cursor: pointer;
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

        .success-message {
            margin-top: var(--spacing-lg);
            padding: var(--spacing-md);
            background: rgba(34, 197, 94, 0.1);
            border-radius: var(--border-radius-md);
            color: var(--success-color);
            text-align: center;
        }

        .error-message {
            margin-top: var(--spacing-lg);
            padding: var(--spacing-md);
            background: rgba(239, 68, 68, 0.1);
            border-radius: var(--border-radius-md);
            color: var(--danger-color);
            text-align: center;
        }

        .user-data {
            margin-top: var(--spacing-xl);
            padding: var(--spacing-lg);
            background: var(--bg-accent);
            border-radius: var(--border-radius-lg);
        }

        .user-data h3 {
            color: var(--text-primary);
            margin-bottom: var(--spacing-md);
            text-align: center;
        }

        .data-grid {
            display: grid;
            gap: var(--spacing-md);
        }

        .data-item {
            display: flex;
            justify-content: space-between;
            padding: var(--spacing-sm);
            background: var(--bg-secondary);
            border-radius: var(--border-radius-md);
            border: 1px solid var(--bg-accent);
        }

        .data-label {
            font-weight: 600;
            color: var(--text-primary);
        }

        .data-value {
            color: var(--text-secondary);
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
                <h1 class="hero-title">Sistema de Cadastro</h1>
                <p class="hero-subtitle">Projeto do Dia 1 - Variáveis e Tipos de Dados</p>
            </div>
        </div>
    </section>

    <!-- Conteúdo Principal -->
    <main class="container">
        <div class="form-container fade-in">
            <form method="POST" class="form-grid">
                <div class="input-group">
                    <label for="nome">Nome Completo</label>
                    <input type="text" id="nome" name="nome" required>
                </div>

                <div class="input-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="input-group">
                    <label for="idade">Idade</label>
                    <input type="number" id="idade" name="idade" min="0" required>
                </div>

                <div class="input-group">
                    <label for="altura">Altura (em metros)</label>
                    <input type="number" id="altura" name="altura" step="0.01" min="0" required>
                </div>

                <div class="input-group">
                    <label for="hobbies">Hobbies</label>
                    <textarea id="hobbies" name="hobbies" required></textarea>
                </div>

                <div class="checkbox-group">
                    <input type="checkbox" id="newsletter" name="newsletter">
                    <label for="newsletter">Desejo receber a newsletter</label>
                </div>

                <button type="submit" class="submit-button">
                    <i class="fas fa-user-plus"></i>
                    Cadastrar
                </button>
            </form>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nome = $_POST["nome"];
                $email = $_POST["email"];
                $idade = $_POST["idade"];
                $altura = $_POST["altura"];
                $hobbies = $_POST["hobbies"];
                $newsletter = isset($_POST["newsletter"]) ? "Sim" : "Não";

                $erro = false;
                $mensagemErro = "";

                // Validações
                if (empty($nome) || empty($email) || empty($idade) || empty($altura) || empty($hobbies)) {
                    $erro = true;
                    $mensagemErro = "Todos os campos são obrigatórios!";
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $erro = true;
                    $mensagemErro = "E-mail inválido!";
                } elseif ($idade < 0) {
                    $erro = true;
                    $mensagemErro = "Idade inválida!";
                } elseif ($altura <= 0) {
                    $erro = true;
                    $mensagemErro = "Altura inválida!";
                }

                if (!$erro) {
                    echo "<div class='success-message'>
                            <i class='fas fa-check-circle'></i>
                            Cadastro realizado com sucesso!
                          </div>";

                    echo "<div class='user-data'>
                            <h3>Dados Cadastrados</h3>
                            <div class='data-grid'>
                                <div class='data-item'>
                                    <span class='data-label'>Nome:</span>
                                    <span class='data-value'>{$nome}</span>
                                </div>
                                <div class='data-item'>
                                    <span class='data-label'>E-mail:</span>
                                    <span class='data-value'>{$email}</span>
                                </div>
                                <div class='data-item'>
                                    <span class='data-label'>Idade:</span>
                                    <span class='data-value'>{$idade} anos</span>
                                </div>
                                <div class='data-item'>
                                    <span class='data-label'>Altura:</span>
                                    <span class='data-value'>{$altura}m</span>
                                </div>
                                <div class='data-item'>
                                    <span class='data-label'>Hobbies:</span>
                                    <span class='data-value'>{$hobbies}</span>
                                </div>
                                <div class='data-item'>
                                    <span class='data-label'>Newsletter:</span>
                                    <span class='data-value'>{$newsletter}</span>
                                </div>
                            </div>
                          </div>";
                } else {
                    echo "<div class='error-message'>
                            <i class='fas fa-exclamation-circle'></i>
                            {$mensagemErro}
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