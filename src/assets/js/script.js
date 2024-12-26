document.addEventListener('DOMContentLoaded', function() {
    // Elementos DOM
    const themeToggle = document.querySelector('.theme-toggle');
    const body = document.body;
    const experienceProgress = document.querySelector('.experience-progress');
    const achievements = document.querySelectorAll('.achievement');
    const dayProgressBar = document.querySelector('.day-progress-bar');

    // Sistema de Tema
    function setTheme(theme) {
        if (theme === 'dark') {
            body.classList.add('dark-mode');
            themeToggle.innerHTML = '🌞';
            localStorage.setItem('theme', 'dark');
            document.documentElement.style.colorScheme = 'dark';
        } else {
            body.classList.remove('dark-mode');
            themeToggle.innerHTML = '🌙';
            localStorage.setItem('theme', 'light');
            document.documentElement.style.colorScheme = 'light';
        }
    }

    // Verificar preferência do sistema
    const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)');
    
    // Verificar tema salvo ou usar preferência do sistema
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme) {
        setTheme(savedTheme);
    } else {
        setTheme(prefersDarkScheme.matches ? 'dark' : 'light');
    }

    // Alternar tema com animação suave
    themeToggle.addEventListener('click', function() {
        const isDark = body.classList.contains('dark-mode');
        setTheme(isDark ? 'light' : 'dark');
        
        // Adicionar classe para animação
        themeToggle.classList.add('theme-toggle-spin');
        setTimeout(() => {
            themeToggle.classList.remove('theme-toggle-spin');
        }, 500);
    });

    // Observar mudanças na preferência do sistema
    prefersDarkScheme.addEventListener('change', (e) => {
        if (!localStorage.getItem('theme')) {
            setTheme(e.matches ? 'dark' : 'light');
        }
    });

    // Animação da barra de progresso
    if (experienceProgress) {
        setTimeout(() => {
            experienceProgress.style.width = '10%'; // 10% para o primeiro dia concluído
        }, 500);
    }

    // Animação das conquistas com delay progressivo
    if (achievements.length > 0) {
        achievements.forEach((achievement, index) => {
            setTimeout(() => {
                achievement.classList.add('show');
            }, 200 * (index + 1));
        });
    }

    // Animação da barra de progresso dos dias
    if (dayProgressBar) {
        setTimeout(() => {
            dayProgressBar.style.width = '1%'; // 1% para o primeiro dia
        }, 500);
    }

    // Função para atualizar o progresso
    function updateProgress(daysCompleted) {
        const totalDays = 100;
        const progress = (daysCompleted / totalDays) * 100;
        
        if (experienceProgress) {
            experienceProgress.style.width = `${progress}%`;
        }
        
        if (dayProgressBar) {
            dayProgressBar.style.width = `${progress}%`;
        }
    }

    // Inicializar tooltips para conquistas bloqueadas
    const lockedAchievements = document.querySelectorAll('.achievement.locked');
    lockedAchievements.forEach(achievement => {
        achievement.title = 'Complete mais desafios para desbloquear';
    });

    // Atualizar progresso inicial
    updateProgress(1); // 1 dia concluído
}); 