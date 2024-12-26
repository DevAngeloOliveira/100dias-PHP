# 100 Dias de PHP
Durante 100 dias irei estudar PHP

## Como Iniciar o Servidor

Para iniciar o servidor de desenvolvimento PHP, abra o terminal na pasta do projeto e execute:

```bash
# Na pasta raiz do projeto
php -S localhost:8000 -t src/

# Ou para um diretório específico (exemplo: fundamentos)
php -S localhost:8000 -t src/fundamentos/
```

Após iniciar o servidor:
1. Abra seu navegador
2. Acesse: http://localhost:8000
3. Para acessar um arquivo específico: http://localhost:8000/nome_do_arquivo.php

## Estrutura do Projeto

```
src/
├── fundamentos/     # Conceitos básicos de PHP
├── intermediario/   # Tópicos intermediários
├── avancado/       # Tópicos avançados
├── projetos/       # Projetos práticos
├── exercicios/     # Exercícios diários
└── recursos/       # Materiais complementares
```

### Organização do Estudo

1. **Fundamentos (Dias 1-30)**
   - Sintaxe básica
   - Variáveis e tipos de dados
   - Operadores
   - Estruturas de controle
   - Arrays e loops
   - Funções
   - Manipulação de strings
   - Formulários e POST/GET

2. **Intermediário (Dias 31-60)**
   - POO (Programação Orientada a Objetos)
   - Namespaces
   - Composer e autoload
   - Manipulação de arquivos
   - Banco de dados (MySQL)
   - Sessões e cookies
   - APIs REST
   - Tratamento de erros

3. **Avançado (Dias 61-90)**
   - Design Patterns
   - Framework Laravel
   - Testes unitários (PHPUnit)
   - Segurança e boas práticas
   - Cache e otimização
   - Websockets
   - Docker
   - CI/CD

4. **Projetos Práticos (Dias 91-100)**
   - Desenvolvimento de aplicações completas
   - Integração com APIs
   - Deployment

### Como Usar

1. Cada dia de estudo deve ter seu próprio arquivo na pasta correspondente
2. Nomear arquivos de forma descritiva (ex: `01_variaveis.php`)
3. Comentar o código para referência futura
4. Criar pequenos projetos práticos para fixar o conhecimento

### Recursos Úteis

- [PHP.net - Documentação Oficial](https://www.php.net/docs.php)
- [PHP The Right Way](https://phptherightway.com/)
- [Laravel Documentation](https://laravel.com/docs)
- [PHP-FIG](https://www.php-fig.org/)

### Objetivos

- Dominar a sintaxe e recursos do PHP
- Desenvolver aplicações web robustas
- Aprender boas práticas de programação
- Criar um portfólio de projetos
- Preparar-se para o mercado de trabalho

_Lembre-se: Consistência é a chave para o aprendizado. Dedique pelo menos 1 hora por dia aos estudos._
