# HelpDesk Escolar — Base do projeto avaliativo

Aplicação-base para o Projeto Final de Computação em Nuvem I.

## Arquivos
- `site/index.php`: interface, cadastro, listagem e atualização dos chamados.
- `site/conexao.php`: conexão com MySQL por variáveis de ambiente.
- `site/estilo.css`: apresentação visual.
- `banco/init.sql`: criação inicial da tabela e dados de exemplo.

## Seu desafio
Criar a infraestrutura da aplicação usando Dockerfile, Docker Compose com serviços web, MySQL e phpMyAdmin, rede e volume, publicar imagem no Docker Hub e automatizar build e push pelo GitHub Actions.

## Variáveis esperadas
- `DB_HOST`: endereço/nome do serviço MySQL
- `DB_NAME`: nome do banco
- `DB_USER`: usuário do banco
- `DB_PASSWORD`: senha do banco

**Atenção:** não publique senhas reais no GitHub. A aplicação usa PHP com extensão PDO MySQL. O script de inicialização deve ser executado na criação inicial do banco.

Arquivos de infraestrutura não foram fornecidos porque fazem parte da avaliação.
