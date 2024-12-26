<?php

/**
 * Dia 1: Hello World e conceitos básicos do PHP
 * Última atualização: 26/12/2024
 * 
 * Este arquivo serve como um diário de bordo do progresso
 * nos 100 dias de estudo de PHP.
 */

// Configuração do progresso
$config = [
    'dia_atual' => 1,
    'total_dias' => 100,
    'nivel_experiencia' => 1,
    'proxima_conquista' => 'Variáveis e Tipos de Dados'
];

// Conquistas desbloqueadas
$achievements = [
    [
        'icon' => '🎯',
        'titulo' => 'Primeiro Commit',
        'descricao' => 'Iniciou a jornada de 100 dias de PHP',
        'data' => '26/12/2024',
        'desbloqueada' => true
    ],
    [
        'icon' => '💻',
        'titulo' => 'Hello World',
        'descricao' => 'Criou seu primeiro script PHP',
        'data' => '26/12/2024',
        'desbloqueada' => true
    ],
    [
        'icon' => '🚀',
        'titulo' => 'Frontend Integration',
        'descricao' => 'Integrou PHP com HTML, CSS e JavaScript',
        'data' => '26/12/2024',
        'desbloqueada' => true
    ],
    [
        'icon' => '🔒',
        'titulo' => 'Arrays Master',
        'descricao' => 'Dominar manipulação de arrays',
        'data' => null,
        'desbloqueada' => false
    ],
    [
        'icon' => '🔒',
        'titulo' => 'Function Ninja',
        'descricao' => 'Criar funções complexas e reutilizáveis',
        'data' => null,
        'desbloqueada' => false
    ]
];

// Declarando uma variável
$mensagem = "Bem-vindo ao meu estudo de 100 dias de PHP!";
$nome = "Gabriel";
$idade = 23;
$profissao = "Programador";
$tecnologias = ["PHP", "JavaScript", "HTML", "CSS"];

// Função principal de saudação com HTML e CSS
function saudacao($nome, $idade, $profissao, $tecnologias, $config, $achievements)
{
    echo '
    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Perfil - ' . htmlspecialchars($nome) . '</title>
        <style>
            body {
                font-family: "Segoe UI", Arial, sans-serif;
                line-height: 1.6;
                margin: 0;
                padding: 20px;
                background: #f0f2f5;
                transition: background-color 0.3s;
            }
            body.dark-mode {
                background: #18191a;
            }
            .profile-card {
                max-width: 600px;
                margin: 40px auto;
                background: white;
                border-radius: 10px;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
                padding: 30px;
                transition: all 0.3s ease;
                position: relative;
            }
            .dark-mode .profile-card {
                background: #242526;
                box-shadow: 0 2px 10px rgba(0,0,0,0.3);
            }
            .profile-header {
                text-align: center;
                margin-bottom: 30px;
            }
            .profile-avatar {
                width: 120px;
                height: 120px;
                border-radius: 60px;
                background: #4267B2;
                color: white;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 48px;
                margin: 0 auto 20px;
                cursor: pointer;
                transition: transform 0.3s ease;
            }
            .profile-avatar:hover {
                transform: scale(1.1);
            }
            .profile-name {
                font-size: 24px;
                color: #1a1a1a;
                margin: 10px 0;
                transition: color 0.3s;
            }
            .dark-mode .profile-name {
                color: #e4e6eb;
            }
            .profile-info {
                color: #65676b;
                margin: 10px 0;
                transition: color 0.3s;
            }
            .dark-mode .profile-info {
                color: #b0b3b8;
            }
            .tech-tags {
                display: flex;
                flex-wrap: wrap;
                gap: 10px;
                margin-top: 20px;
            }
            .tech-tag {
                background: #e4e6eb;
                padding: 5px 15px;
                border-radius: 20px;
                font-size: 14px;
                color: #050505;
                cursor: pointer;
                transition: all 0.3s ease;
            }
            .dark-mode .tech-tag {
                background: #3a3b3c;
                color: #e4e6eb;
            }
            .tech-tag:hover {
                transform: translateY(-2px);
                box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            }
            .theme-toggle {
                position: absolute;
                top: 20px;
                right: 20px;
                background: none;
                border: none;
                font-size: 24px;
                cursor: pointer;
                padding: 5px;
                border-radius: 50%;
                transition: background-color 0.3s;
            }
            .theme-toggle:hover {
                background-color: rgba(0,0,0,0.1);
            }
            .dark-mode .theme-toggle:hover {
                background-color: rgba(255,255,255,0.1);
            }
            .experience-bar {
                background: #e4e6eb;
                height: 6px;
                border-radius: 3px;
                margin: 15px 0;
                position: relative;
                overflow: hidden;
            }
            .dark-mode .experience-bar {
                background: #3a3b3c;
            }
            .experience-progress {
                position: absolute;
                left: 0;
                top: 0;
                height: 100%;
                background: #4267B2;
                width: 0%;
                transition: width 1s ease-out;
            }
            .achievements {
                margin-top: 20px;
                padding-top: 20px;
                border-top: 1px solid #e4e6eb;
                transition: border-color 0.3s;
            }
            .dark-mode .achievements {
                border-color: #3a3b3c;
            }
            .achievement {
                display: inline-block;
                margin: 5px;
                padding: 8px 15px;
                background: #e4e6eb;
                border-radius: 15px;
                font-size: 12px;
                color: #050505;
                opacity: 0;
                transform: translateY(20px);
                transition: all 0.3s ease;
            }
            .dark-mode .achievement {
                background: #3a3b3c;
                color: #e4e6eb;
            }
            .achievement.show {
                opacity: 1;
                transform: translateY(0);
            }
            .progress-section {
                margin-top: 20px;
                padding-top: 20px;
                border-top: 1px solid #e4e6eb;
            }
            .dark-mode .progress-section {
                border-color: #3a3b3c;
            }
            .day-progress {
                height: 8px;
                background: #e4e6eb;
                border-radius: 4px;
                overflow: hidden;
                margin: 10px 0;
            }
            .dark-mode .day-progress {
                background: #3a3b3c;
            }
            .day-progress-bar {
                height: 100%;
                background: linear-gradient(90deg, #4267B2, #00C6FF);
                transition: width 1s ease-out;
            }
            .achievement.locked {
                opacity: 0.5;
                cursor: help;
            }
            .achievement small {
                opacity: 0.7;
                margin-left: 5px;
                font-size: 10px;
            }
        </style>
    </head>
    <body>
        <div class="profile-card">
            <button class="theme-toggle" onclick="toggleTheme()">🌓</button>
            
            <div class="profile-header">
                <div class="profile-avatar" onclick="animateAvatar(this)">
                    ' . strtoupper(substr($nome, 0, 1)) . '
                </div>
                <h1 class="profile-name">' . htmlspecialchars($nome) . '</h1>
            </div>
            
            <div class="profile-info">
                <p><strong>Idade:</strong> ' . htmlspecialchars($idade) . ' anos</p>
                <p><strong>Profissão:</strong> ' . htmlspecialchars($profissao) . '</p>
                
                <div class="experience-bar">
                    <div class="experience-progress"></div>
                </div>
                <p style="text-align: center; font-size: 12px;">Experiência em Desenvolvimento</p>
            </div>

            <div class="tech-tags">
                <strong style="width: 100%; margin-bottom: 10px;">Tecnologias:</strong>
                ';
    foreach ($tecnologias as $tech) {
        echo '<span class="tech-tag" onclick="showTechInfo(this)">' . htmlspecialchars($tech) . '</span>';
    }
    echo '
            </div>

            <div class="achievements">
                <strong style="width: 100%; display: block; margin-bottom: 10px;">
                    Conquistas (' . count(array_filter($achievements, fn($a) => $a["desbloqueada"])) . ' de ' . count($achievements) . '):
                </strong>';

    foreach ($achievements as $achievement) {
        $classes = "achievement" . ($achievement["desbloqueada"] ? "" : " locked");
        $icon = $achievement["desbloqueada"] ? $achievement["icon"] : "🔒";
        $date = $achievement["desbloqueada"] ? "<small>{$achievement["data"]}</small>" : "";

        echo "<div class=\"{$classes}\" title=\"{$achievement["descricao"]}\">
                {$icon} {$achievement["titulo"]} {$date}
              </div>";
    }

    echo '
            </div>

            <div class="progress-section">
                <strong style="width: 100%; display: block; margin: 20px 0 10px;">Progresso do Desafio:</strong>
                <div class="day-progress">
                    <div class="day-progress-bar" style="width: ' . ($config["dia_atual"] / $config["total_dias"] * 100) . '%"></div>
                </div>
                <p style="text-align: center; font-size: 12px;">
                    Dia ' . $config["dia_atual"] . ' de ' . $config["total_dias"] . '
                    <br>
                    <small>Próximo objetivo: ' . $config["proxima_conquista"] . '</small>
                </p>
            </div>
        </div>

        <script>
            // Animação inicial
            document.addEventListener("DOMContentLoaded", function() {
                // Animar barra de experiência
                setTimeout(() => {
                    document.querySelector(".experience-progress").style.width = "25%";
                }, 500);

                // Animar conquistas
                document.querySelectorAll(".achievement").forEach((achievement, index) => {
                    setTimeout(() => {
                        achievement.classList.add("show");
                    }, 1000 + (index * 200));
                });
            });

            // Alternar tema claro/escuro
            function toggleTheme() {
                document.body.classList.toggle("dark-mode");
                localStorage.setItem("dark-mode", document.body.classList.contains("dark-mode"));
            }

            // Verificar tema salvo
            if (localStorage.getItem("dark-mode") === "true") {
                document.body.classList.add("dark-mode");
            }

            // Animação do avatar
            function animateAvatar(element) {
                element.style.transform = "scale(0.8) rotate(360deg)";
                setTimeout(() => {
                    element.style.transform = "";
                }, 300);
            }

            // Informações das tecnologias
            function showTechInfo(element) {
                const tech = element.textContent;
                const messages = {
                    "PHP": "Backend Development 🖥️",
                    "JavaScript": "Frontend & Backend 🌐",
                    "HTML": "Structure & Semantics 📝",
                    "CSS": "Styling & Design 🎨"
                };
                
                // Criar tooltip
                const tooltip = document.createElement("div");
                tooltip.style.cssText = `
                    position: absolute;
                    background: ${document.body.classList.contains("dark-mode") ? "#3a3b3c" : "#fff"};
                    color: ${document.body.classList.contains("dark-mode") ? "#e4e6eb" : "#1a1a1a"};
                    padding: 8px 12px;
                    border-radius: 6px;
                    font-size: 12px;
                    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
                    z-index: 1000;
                    top: ${element.offsetTop - 40}px;
                    left: ${element.offsetLeft}px;
                    transition: opacity 0.3s;
                `;
                tooltip.textContent = messages[tech] || tech;
                
                document.body.appendChild(tooltip);
                
                // Remover tooltip após 2 segundos
                setTimeout(() => {
                    tooltip.style.opacity = "0";
                    setTimeout(() => tooltip.remove(), 300);
                }, 2000);
            }

            // Animação da barra de progresso dos dias
            document.addEventListener("DOMContentLoaded", function() {
                const progressBar = document.querySelector(".day-progress-bar");
                progressBar.style.width = "0%";
                
                setTimeout(() => {
                    progressBar.style.width = progressBar.getAttribute("style").split(":")[1];
                }, 500);
            });
        </script>
    </body>
    </html>
    ';
}

// Função que chama a função saudacao
function Saudacao2($saudacao, $nome, $idade, $profissao, $tecnologias)
{
    global $config, $achievements;
    saudacao($nome, $idade, $profissao, $tecnologias, $config, $achievements);
}

function exibirSaudacao($saudacao, $saudacao2, $nome, $idade, $profissao, $tecnologias)
{
    Saudacao2($saudacao, $nome, $idade, $profissao, $tecnologias);
}

exibirSaudacao("Olá, mundo!", "Olá, mundo!", $nome, $idade, $profissao, $tecnologias);
