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
    <title>Sistema de Cadastro - 100 Dias de PHP</title>

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
        .form-container {
            max-width: 600px;
            margin: 0 auto;
        }

        .success-message {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success-color);
            padding: var(--spacing-md);
            border-radius: var(--border-radius-lg);
            margin-bottom: var(--spacing-lg);
            text-align: center;
            font-weight: 500;
        }

        .error-message {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger-color);
            padding: var(--spacing-md);
            border-radius: var(--border-radius-lg);
            margin-bottom: var(--spacing-lg);
            text-align: center;
            font-weight: 500;
        }

        .registration-form {
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

        .hobbies-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: var(--spacing-md);
            margin-bottom: var(--spacing-lg);
        }

        .hobby-option {
            display: flex;
            align-items: center;
            gap: var(--spacing-sm);
            padding: var(--spacing-sm);
            border: 1px solid var(--bg-accent);
            border-radius: var(--border-radius-md);
            cursor: pointer;
            transition: var(--transition-normal);
        }

        .hobby-option:hover {
            background: var(--bg-accent);
        }

        .hobby-option input[type="checkbox"] {
            width: auto;
        }

        .newsletter-option {
            display: flex;
            align-items: center;
            gap: var(--spacing-sm);
            margin-bottom: var(--spacing-lg);
        }

        .newsletter-option input[type="checkbox"] {
            width: auto;
        }

        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: var(--spacing-md);
        }

        .form-footer button {
            flex: 1;
        }

        .form-footer button[type="reset"] {
            background: var(--gradient-danger);
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
                    <i class="fas fa-user-plus"></i> Sistema de Cadastro
                </h1>
                <p class="header-subtitle">Projeto do Dia 1 - Variáveis e Tipos de Dados</p>
            </div>
        </div>
    </header>

    <!-- Conteúdo Principal -->
    <main class="container">
        <div class="form-container mt-4">
            <?php if ($mensagem): ?>
                <div class="success-message fade-in">
                    <i class="fas fa-check-circle"></i> <?php echo $mensagem; ?>
                </div>
            <?php endif; ?>

            <?php if ($erro): ?>
                <div class="error-message fade-in">
                    <i class="fas fa-exclamation-circle"></i> <?php echo $erro; ?>
                </div>
            <?php endif; ?>

            <form method="POST" class="registration-form fade-in">
                <div class="form-group">
                    <label for="nome">Nome Completo</label>
                    <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($nome); ?>" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
                </div>

                <div class="form-group">
                    <label for="idade">Idade</label>
                    <input type="number" id="idade" name="idade" value="<?php echo htmlspecialchars($idade); ?>" min="0">
                </div>

                <div class="form-group">
                    <label for="altura">Altura (em metros)</label>
                    <input type="number" id="altura" name="altura" value="<?php echo htmlspecialchars($altura); ?>" step="0.01" min="0">
                </div>

                <div class="form-group">
                    <label>Hobbies</label>
                    <div class="hobbies-grid">
                        <?php foreach ($hobbies_disponiveis as $valor => $label): ?>
                            <label class="hobby-option">
                                <input type="checkbox" name="hobbies[]" value="<?php echo $valor; ?>"
                                    <?php echo in_array($valor, $hobbies) ? 'checked' : ''; ?>>
                                <?php echo $label; ?>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>

                <label class="newsletter-option">
                    <input type="checkbox" name="newsletter" <?php echo $newsletter ? 'checked' : ''; ?>>
                    Desejo receber a newsletter
                </label>

                <div class="form-footer">
                    <button type="submit">
                        <i class="fas fa-save"></i> Cadastrar
                    </button>
                    <button type="reset">
                        <i class="fas fa-undo"></i> Limpar
                    </button>
                </div>
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
        });
    </script>
</body>

</html>