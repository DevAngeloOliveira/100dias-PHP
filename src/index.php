<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gabriel - 100 Dias de PHP</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="profile-card">
        <button class="theme-toggle">🌙</button>

        <div class="profile-header">
            <div class="profile-avatar" style="background-image: url('assets/images/user-icon.jpg');"></div>
            <h1 class="profile-name">Dev - Ângelo Oliveira</h1>
            <p class="profile-info">
                Jornada de 100 dias aprendendo PHP: Do básico ao avançado
                <br>
                <small style="opacity: 0.7;">Objetivo: Aprimorar meu conhecimento em PHP</small>
            </p>
        </div>

        <div class="tech-tags">
            <span class="tech-tag" data-tech="php">⚡ PHP</span>
            <span class="tech-tag" data-tech="mysql">🗃️ MySQL</span>
            <span class="tech-tag" data-tech="html">🎨 HTML</span>
            <span class="tech-tag" data-tech="css">🎯 CSS</span>
            <span class="tech-tag" data-tech="javascript">⚙️ JavaScript</span>
            <span class="tech-tag" data-tech="git">📦 Git</span>
        </div>

        <div class="progress-section">
            <h2>Progresso da Jornada</h2>
            <div class="experience-bar">
                <div class="experience-progress"></div>
            </div>
            <div class="day-progress">
                <div class="day-progress-bar"></div>
            </div>
            <p style="text-align: center; font-size: 14px;">
                Dia 1 de 100
                <br>
                <small style="opacity: 0.7;">Próximo objetivo: Estruturas de Controle em PHP</small>
            </p>
        </div>

        <div class="achievements">
            <h2>Conquistas Desbloqueadas</h2>
            <div class="achievement show">
                <div class="achievement-content">
                    <i>🏆</i>
                    <span>Dia 1: Variáveis e Tipos de Dados</span>
                </div>
                <small class="achievement-date">26/12/2023</small>
            </div>
            <div class="achievement locked">
                <div class="achievement-content">
                    <i>🔒</i>
                    <span>Dia 2: Estruturas de Controle</span>
                </div>
                <small class="achievement-date">Em breve</small>
            </div>
            <div class="achievement locked">
                <div class="achievement-content">
                    <i>🔒</i>
                    <span>Dia 3: Arrays e Loops</span>
                </div>
                <small class="achievement-date">Em breve</small>
            </div>
        </div>

        <div class="projects-section">
            <h2>Projetos Desenvolvidos</h2>
            <div class="project-card">
                <a href="projetos/Projeto_Dia1_Variaveis_Tipos_Dados/index.php" style="text-decoration: none; color: inherit;">
                    <div class="project-title">
                        <span class="project-icon">📚</span>
                        Dia 1 - Variáveis e Tipos de Dados
                    </div>
                    <div class="project-description">
                        Primeiro projeto da jornada PHP, focado em aprender os conceitos fundamentais
                        de variáveis e tipos de dados na linguagem PHP.
                    </div>
                    <div class="project-meta">
                        <span class="project-status">
                            <span>✅</span>
                            Concluído
                        </span>
                        <span class="project-date">26/12/2023</span>
                        <div style="flex: 1"></div>
                        <span class="project-tag">PHP</span>
                        <span class="project-tag">Fundamentos</span>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <script src="assets/js/script.js"></script>
</body>

</html>