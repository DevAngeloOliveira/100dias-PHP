<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - <?= htmlspecialchars($nome) ?></title>
    <link rel="stylesheet" href="/src/assets/css/style.css">
</head>

<body>
    <div class="profile-card">
        <button class="theme-toggle" onclick="toggleTheme()">🌓</button>

        <div class="profile-header">
            <div class="profile-avatar" onclick="animateAvatar(this)">
                <?= strtoupper(substr($nome, 0, 1)) ?>
            </div>
            <h1 class="profile-name"><?= htmlspecialchars($nome) ?></h1>
        </div>

        <div class="profile-info">
            <p><strong>Idade:</strong> <?= htmlspecialchars($idade) ?> anos</p>
            <p><strong>Profissão:</strong> <?= htmlspecialchars($profissao) ?></p>

            <div class="experience-bar">
                <div class="experience-progress"></div>
            </div>
            <p style="text-align: center; font-size: 12px;">Experiência em Desenvolvimento</p>

            <div class="projects-section">
                <h3>Projetos Desenvolvidos:</h3>
                <ul>
                    <li>
                        <a href="/src/projetos/Projeto_Dia1_Variaveis_Tipos_Dados/index.php"
                            style="color: inherit; text-decoration: none;"
                            target="_blank">
                            📚 Dia 1 - Variáveis e Tipos de Dados
                            <small style="display: block; color: #666;">
                                Uma demonstração interativa dos tipos de dados em PHP
                            </small>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="tech-tags">
            <strong style="width: 100%; margin-bottom: 10px;">Tecnologias:</strong>
            <?php foreach ($tecnologias as $tech): ?>
                <span class="tech-tag" onclick="showTechInfo(this)"><?= htmlspecialchars($tech) ?></span>
            <?php endforeach; ?>
        </div>

        <div class="achievements">
            <strong style="width: 100%; display: block; margin-bottom: 10px;">
                Conquistas (<?= count(array_filter($achievements, fn($a) => $a["desbloqueada"])) ?> de <?= count($achievements) ?>):
            </strong>
            <?php foreach ($achievements as $achievement): ?>
                <?php
                $classes = "achievement" . ($achievement["desbloqueada"] ? "" : " locked");
                $icon = $achievement["desbloqueada"] ? $achievement["icon"] : "🔒";
                $date = $achievement["desbloqueada"] ? "<small>{$achievement["data"]}</small>" : "";
                ?>
                <div class="<?= $classes ?>" title="<?= $achievement["descricao"] ?>">
                    <?= $icon ?> <?= $achievement["titulo"] ?> <?= $date ?>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="progress-section">
            <strong style="width: 100%; display: block; margin: 20px 0 10px;">Progresso do Desafio:</strong>
            <div class="day-progress">
                <div class="day-progress-bar" style="width: <?= ($config["dia_atual"] / $config["total_dias"] * 100) ?>%"></div>
            </div>
            <p style="text-align: center; font-size: 12px;">
                Dia <?= $config["dia_atual"] ?> de <?= $config["total_dias"] ?>
                <br>
                <small>Próximo objetivo: <?= $config["proxima_conquista"] ?></small>
            </p>
        </div>
    </div>

    <script src="/src/assets/js/main.js"></script>
</body>

</html>