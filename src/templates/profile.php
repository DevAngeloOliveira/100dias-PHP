<?php
$diasConcluidos = 2;
$progressoTotal = ($diasConcluidos / 100) * 100;

$conquistas = [
    [
        'titulo' => 'Primeiros Passos',
        'descricao' => 'Iniciou sua jornada em PHP',
        'icone' => 'fas fa-flag-checkered',
        'nivel' => 'bronze',
        'xp' => 100
    ],
    [
        'titulo' => 'Fundamentos Dominados',
        'descricao' => 'Completou os exercícios básicos de PHP',
        'icone' => 'fas fa-book',
        'nivel' => 'prata',
        'xp' => 250
    ],
    [
        'titulo' => 'Desenvolvedor Iniciante',
        'descricao' => 'Criou seus primeiros projetos em PHP',
        'icone' => 'fas fa-code',
        'nivel' => 'ouro',
        'xp' => 500
    ]
];

$proximosPassos = [
    [
        'titulo' => 'Estruturas de Controle',
        'descricao' => 'Aprenda a controlar o fluxo do seu código',
        'icone' => 'fas fa-code-branch'
    ],
    [
        'titulo' => 'Funções',
        'descricao' => 'Crie blocos de código reutilizáveis',
        'icone' => 'fas fa-cube'
    ],
    [
        'titulo' => 'Arrays Avançados',
        'descricao' => 'Manipule dados complexos com arrays',
        'icone' => 'fas fa-layer-group'
    ],
    [
        'titulo' => 'Programação Orientada a Objetos',
        'descricao' => 'Organize seu código com classes e objetos',
        'icone' => 'fas fa-cubes'
    ]
];

$estatisticas = [
    'exercicios' => [
        'numero' => 4,
        'texto' => 'Exercícios Completados',
        'icone' => 'fas fa-code',
        'cor' => 'info'
    ],
    'projetos' => [
        'numero' => 2,
        'texto' => 'Projetos Desenvolvidos',
        'icone' => 'fas fa-project-diagram',
        'cor' => 'success'
    ],
    'xp_total' => [
        'numero' => 850,
        'texto' => 'XP Total',
        'icone' => 'fas fa-star',
        'cor' => 'warning'
    ],
    'tempo' => [
        'numero' => 2,
        'texto' => 'Dias de Dedicação',
        'icone' => 'fas fa-clock',
        'cor' => 'primary'
    ]
];

$nivel_atual = [
    'nome' => 'Iniciante',
    'nivel' => 2,
    'xp_atual' => 850,
    'xp_proximo' => 1000,
    'porcentagem' => 85
];
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - 100 Dias de PHP</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Estilos CSS -->
    <link rel="stylesheet" href="../assets/css/variables.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/components.css">
    <link rel="stylesheet" href="../assets/css/dark-theme.css">

    <style>
        /* Estilos específicos do perfil */
        .profile-header {
            position: relative;
            padding: var(--spacing-2xl) 0;
            background: var(--gradient-primary);
            overflow: hidden;
        }

        .profile-header::before {
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

        .profile-info {
            position: relative;
            z-index: 1;
            text-align: center;
            color: var(--text-white);
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin: 0 auto var(--spacing-md);
            background: var(--gradient-info);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: var(--font-size-3xl);
            color: var(--text-white);
            box-shadow: var(--shadow-lg);
        }

        .level-info {
            background: var(--bg-secondary);
            border-radius: var(--border-radius-lg);
            padding: var(--spacing-lg);
            margin-top: calc(-1 * var(--spacing-xl));
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--bg-accent);
        }

        .level-progress {
            height: 8px;
            background: var(--bg-accent);
            border-radius: var(--border-radius-full);
            margin: var(--spacing-sm) 0;
            overflow: hidden;
        }

        .level-progress-bar {
            height: 100%;
            background: var(--gradient-warning);
            border-radius: var(--border-radius-full);
            transition: width 0.5s ease-out;
        }

        .level-details {
            display: flex;
            justify-content: space-between;
            color: var(--text-secondary);
            font-size: var(--font-size-sm);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: var(--spacing-md);
            margin: var(--spacing-xl) 0;
        }

        .stat-card {
            background: var(--bg-secondary);
            border-radius: var(--border-radius-lg);
            padding: var(--spacing-lg);
            text-align: center;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--bg-accent);
            transition: var(--transition-normal);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .stat-number {
            font-size: var(--font-size-3xl);
            font-weight: 700;
            margin: var(--spacing-sm) 0;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .stat-card.info .stat-number {
            background: var(--gradient-info);
            -webkit-background-clip: text;
        }

        .stat-card.success .stat-number {
            background: var(--gradient-success);
            -webkit-background-clip: text;
        }

        .stat-card.warning .stat-number {
            background: var(--gradient-warning);
            -webkit-background-clip: text;
        }

        .stat-card.primary .stat-number {
            background: var(--gradient-primary);
            -webkit-background-clip: text;
        }

        .achievements-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: var(--spacing-lg);
        }

        .achievement-card {
            position: relative;
            background: var(--bg-secondary);
            border-radius: var(--border-radius-lg);
            padding: var(--spacing-lg);
            box-shadow: var(--shadow-md);
            border: 1px solid var(--bg-accent);
            transition: var(--transition-normal);
            overflow: hidden;
        }

        .achievement-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient-primary);
        }

        .achievement-card.bronze::before {
            background: linear-gradient(135deg, #CD7F32, #8B4513);
        }

        .achievement-card.prata::before {
            background: linear-gradient(135deg, #C0C0C0, #808080);
        }

        .achievement-card.ouro::before {
            background: linear-gradient(135deg, #FFD700, #DAA520);
        }

        .achievement-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .achievement-icon {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: var(--bg-accent);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: var(--spacing-md);
            color: var(--primary-color);
            font-size: var(--font-size-xl);
        }

        .achievement-xp {
            position: absolute;
            top: var(--spacing-md);
            right: var(--spacing-md);
            background: var(--bg-accent);
            padding: var(--spacing-xs) var(--spacing-sm);
            border-radius: var(--border-radius-full);
            font-size: var(--font-size-sm);
            color: var(--text-secondary);
        }

        .next-steps {
            margin-top: var(--spacing-2xl);
        }

        .step-card {
            display: flex;
            align-items: center;
            gap: var(--spacing-lg);
            background: var(--bg-secondary);
            border-radius: var(--border-radius-lg);
            padding: var(--spacing-lg);
            margin-bottom: var(--spacing-md);
            box-shadow: var(--shadow-md);
            border: 1px solid var(--bg-accent);
            transition: var(--transition-normal);
        }

        .step-card:hover {
            transform: translateX(10px);
            box-shadow: var(--shadow-lg);
        }

        .step-icon {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: var(--bg-accent);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            font-size: var(--font-size-xl);
            flex-shrink: 0;
        }

        .step-info {
            flex-grow: 1;
        }

        .step-info h4 {
            margin-bottom: var(--spacing-xs);
        }

        .step-info p {
            color: var(--text-secondary);
            margin: 0;
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
        <a href="../index.php" class="profile-button" aria-label="Voltar para início">
            <i class="fas fa-home"></i>
        </a>
    </div>

    <!-- Header do Perfil -->
    <header class="profile-header">
        <div class="container">
            <div class="profile-info">
                <div class="profile-avatar floating">
                    <i class="fas fa-user-ninja"></i>
                </div>
                <h1 class="header-title">Desenvolvedor PHP</h1>
                <p class="header-subtitle">Nível <?php echo $nivel_atual['nivel']; ?> - <?php echo $nivel_atual['nome']; ?></p>
            </div>
        </div>
    </header>

    <!-- Conteúdo Principal -->
    <main class="container">
        <!-- Informações de Nível -->
        <div class="level-info">
            <div class="level-progress">
                <div class="level-progress-bar" style="width: <?php echo $nivel_atual['porcentagem']; ?>%"></div>
            </div>
            <div class="level-details">
                <span><?php echo $nivel_atual['xp_atual']; ?> XP</span>
                <span><?php echo $nivel_atual['xp_proximo']; ?> XP para o próximo nível</span>
            </div>
        </div>

        <!-- Estatísticas -->
        <div class="stats-grid">
            <?php foreach ($estatisticas as $stat): ?>
                <div class="stat-card <?php echo $stat['cor']; ?> fade-in">
                    <i class="<?php echo $stat['icone']; ?> fa-2x"></i>
                    <div class="stat-number"><?php echo $stat['numero']; ?></div>
                    <div class="stat-text"><?php echo $stat['texto']; ?></div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Conquistas -->
        <section class="achievements">
            <h2>Conquistas Desbloqueadas</h2>
            <div class="achievements-grid">
                <?php foreach ($conquistas as $conquista): ?>
                    <div class="achievement-card <?php echo $conquista['nivel']; ?> fade-in">
                        <div class="achievement-icon">
                            <i class="<?php echo $conquista['icone']; ?>"></i>
                        </div>
                        <div class="achievement-xp">+<?php echo $conquista['xp']; ?> XP</div>
                        <h4><?php echo $conquista['titulo']; ?></h4>
                        <p><?php echo $conquista['descricao']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Próximos Passos -->
        <section class="next-steps">
            <h2>Próximos Passos</h2>
            <?php foreach ($proximosPassos as $passo): ?>
                <div class="step-card fade-in">
                    <div class="step-icon">
                        <i class="<?php echo $passo['icone']; ?>"></i>
                    </div>
                    <div class="step-info">
                        <h4><?php echo $passo['titulo']; ?></h4>
                        <p><?php echo $passo['descricao']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
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