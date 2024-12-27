<?php
$dias = [
    1 => [
        'titulo' => 'Variáveis e Tipos de Dados',
        'descricao' => 'Introdução às variáveis e tipos de dados em PHP',
        'exercicios' => [
            [
                'titulo' => 'Fundamentos de PHP',
                'arquivo' => 'fundamentos/01_hello_world.php',
                'descricao' => 'Introdução ao PHP, comentários e saída de dados'
            ],
            [
                'titulo' => 'Variáveis e Tipos',
                'arquivo' => 'fundamentos/02_variaveis.php',
                'descricao' => 'Declaração de variáveis, tipos de dados e conversões'
            ]
        ],
        'projeto' => [
            'titulo' => 'Sistema de Cadastro',
            'arquivo' => 'projetos/Projeto - Dia 1 - Variaveis e Tipo de Dados/cadastro.php',
            'descricao' => 'Sistema de cadastro demonstrando o uso de diferentes tipos de variáveis'
        ]
    ],
    2 => [
        'titulo' => 'Operadores',
        'descricao' => 'Estudo dos diferentes tipos de operadores em PHP',
        'exercicios' => [
            [
                'titulo' => 'Operadores',
                'arquivo' => 'fundamentos/03_operadores.php',
                'descricao' => 'Operadores aritméticos, de atribuição, comparação e lógicos'
            ],
            [
                'titulo' => 'Arrays',
                'arquivo' => 'fundamentos/04_arrays.php',
                'descricao' => 'Trabalho com arrays indexados e associativos'
            ]
        ],
        'projeto' => [
            'titulo' => 'Calculadora',
            'arquivo' => 'projetos/Projeto - Dia 2 - Operadores/calculadora.php',
            'descricao' => 'Calculadora com operações básicas usando operadores aritméticos'
        ]
    ]
];

$diasConcluidos = count($dias);
$progressoTotal = ($diasConcluidos / 100) * 100;
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>100 Dias de PHP</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Estilos CSS -->
    <link rel="stylesheet" href="assets/css/variables.css">
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <link rel="stylesheet" href="assets/css/dark-theme.css">

    <style>
        /* Hero Section */
        .hero {
            position: relative;
            padding: var(--spacing-2xl) 0;
            background: var(--gradient-primary);
            overflow: hidden;
            text-align: center;
            color: var(--text-white);
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('data:image/svg+xml,<svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><circle cx="1" cy="1" r="1" fill="rgba(255,255,255,0.1)"/></svg>');
            background-size: 20px 20px;
            opacity: 0.3;
            animation: backgroundSlide 20s linear infinite;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 800px;
            margin: 0 auto;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: var(--spacing-md);
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .hero-subtitle {
            font-size: var(--font-size-xl);
            opacity: 0.9;
            margin-bottom: var(--spacing-xl);
        }

        .hero-cta {
            display: inline-flex;
            align-items: center;
            gap: var(--spacing-sm);
            padding: var(--spacing-md) var(--spacing-xl);
            background: var(--text-white);
            color: var(--primary-color);
            border-radius: var(--border-radius-full);
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition-normal);
            box-shadow: var(--shadow-lg);
        }

        .hero-cta:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-xl);
            color: var(--primary-color);
        }

        /* Progress Section */
        .progress-section {
            margin-top: calc(-1 * var(--spacing-xl));
            position: relative;
            z-index: 1;
        }

        .progress-card {
            background: var(--bg-secondary);
            border-radius: var(--border-radius-lg);
            padding: var(--spacing-xl);
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--bg-accent);
            text-align: center;
        }

        .progress-info {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: var(--spacing-md);
        }

        .progress-stat {
            text-align: center;
        }

        .progress-number {
            font-size: var(--font-size-2xl);
            font-weight: 700;
            color: var(--primary-color);
        }

        .progress-label {
            color: var(--text-secondary);
            font-size: var(--font-size-sm);
        }

        .progress-bar-container {
            height: 8px;
            background: var(--bg-accent);
            border-radius: var(--border-radius-full);
            overflow: hidden;
            margin: var(--spacing-md) 0;
        }

        .progress-bar-fill {
            height: 100%;
            background: var(--gradient-success);
            border-radius: var(--border-radius-full);
            transition: width 1s ease-out;
        }

        /* Day Cards */
        .day-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: var(--spacing-xl);
            margin-top: var(--spacing-2xl);
        }

        .day-card {
            background: var(--bg-secondary);
            border-radius: var(--border-radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--bg-accent);
            transition: var(--transition-normal);
        }

        .day-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .day-header {
            background: var(--gradient-primary);
            padding: var(--spacing-lg);
            color: var(--text-white);
        }

        .day-content {
            padding: var(--spacing-lg);
        }

        .content-section {
            margin-bottom: var(--spacing-lg);
        }

        .content-section:last-child {
            margin-bottom: 0;
        }

        .content-title {
            font-size: var(--font-size-lg);
            color: var(--text-primary);
            margin-bottom: var(--spacing-md);
            display: flex;
            align-items: center;
            gap: var(--spacing-sm);
        }

        .content-title i {
            color: var(--primary-color);
        }

        .content-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: var(--spacing-md);
        }

        .content-card {
            background: var(--bg-accent);
            padding: var(--spacing-lg);
            border-radius: var(--border-radius-md);
            transition: var(--transition-normal);
        }

        .content-card:hover {
            background: var(--bg-secondary);
            box-shadow: var(--shadow-md);
        }

        .content-card h4 {
            color: var(--primary-color);
            margin-bottom: var(--spacing-sm);
        }

        .content-card p {
            font-size: var(--font-size-sm);
            color: var(--text-secondary);
            margin-bottom: var(--spacing-md);
        }

        .content-card .action-button {
            width: 100%;
            text-align: center;
        }

        /* Animations */
        @keyframes backgroundSlide {
            0% {
                background-position: 0 0;
            }

            100% {
                background-position: 40px 40px;
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .floating {
            animation: float 3s ease-in-out infinite;
        }
    </style>
</head>

<body>
    <!-- Botões Flutuantes -->
    <div class="floating-buttons">
        <button id="theme-toggle" class="theme-toggle" aria-label="Alternar tema">
            <i class="fas fa-sun"></i>
        </button>
        <a href="templates/profile.php" class="profile-button" aria-label="Ver perfil">
            <i class="fas fa-user-circle"></i>
        </a>
    </div>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">
                    <i class="fab fa-php floating"></i><br>
                    100 Dias de PHP
                </h1>
                <p class="hero-subtitle">Uma jornada de aprendizado e desenvolvimento em PHP</p>
                <a href="templates/profile.php" class="hero-cta">
                    <i class="fas fa-user-circle"></i>
                    Ver Meu Progresso
                </a>
            </div>
        </div>
    </section>

    <!-- Conteúdo Principal -->
    <main class="container">
        <!-- Progresso -->
        <section class="progress-section">
            <div class="progress-card">
                <div class="progress-info">
                    <div class="progress-stat">
                        <div class="progress-number"><?php echo $diasConcluidos; ?></div>
                        <div class="progress-label">Dias Concluídos</div>
                    </div>
                    <div class="progress-stat">
                        <div class="progress-number">100</div>
                        <div class="progress-label">Dias Total</div>
                    </div>
                    <div class="progress-stat">
                        <div class="progress-number"><?php echo $progressoTotal; ?>%</div>
                        <div class="progress-label">Concluído</div>
                    </div>
                </div>
                <div class="progress-bar-container">
                    <div class="progress-bar-fill" style="width: <?php echo $progressoTotal; ?>%"></div>
                </div>
            </div>
        </section>

        <!-- Dias -->
        <section class="days-section">
            <div class="day-grid">
                <?php foreach ($dias as $dia => $conteudo): ?>
                    <div class="day-card fade-in">
                        <div class="day-header">
                            <h3 class="day-title">
                                <i class="fas fa-calendar-day"></i>
                                Dia <?php echo $dia; ?> - <?php echo $conteudo['titulo']; ?>
                            </h3>
                            <p><?php echo $conteudo['descricao']; ?></p>
                        </div>

                        <div class="day-content">
                            <!-- Exercícios -->
                            <div class="content-section">
                                <h4 class="content-title">
                                    <i class="fas fa-code"></i>
                                    Exercícios
                                </h4>
                                <div class="content-grid">
                                    <?php foreach ($conteudo['exercicios'] as $exercicio): ?>
                                        <div class="content-card">
                                            <h4><?php echo $exercicio['titulo']; ?></h4>
                                            <p><?php echo $exercicio['descricao']; ?></p>
                                            <a href="<?php echo $exercicio['arquivo']; ?>" class="action-button exercicio">
                                                <i class="fas fa-external-link-alt"></i> Ver Exercício
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <!-- Projeto -->
                            <div class="content-section">
                                <h4 class="content-title">
                                    <i class="fas fa-project-diagram"></i>
                                    Projeto
                                </h4>
                                <div class="content-card">
                                    <h4><?php echo $conteudo['projeto']['titulo']; ?></h4>
                                    <p><?php echo $conteudo['projeto']['descricao']; ?></p>
                                    <a href="<?php echo $conteudo['projeto']['arquivo']; ?>" class="action-button projeto">
                                        <i class="fas fa-external-link-alt"></i> Ver Projeto
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
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