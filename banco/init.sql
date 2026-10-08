CREATE DATABASE IF NOT EXISTS helpdesk CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE helpdesk;

CREATE TABLE IF NOT EXISTS chamados (
 id INT AUTO_INCREMENT PRIMARY KEY,
 titulo VARCHAR(150) NOT NULL,
 descricao TEXT NOT NULL,
 status ENUM('Aberto','Em andamento','Resolvido') NOT NULL DEFAULT 'Aberto',
 criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO chamados (titulo, descricao, status) VALUES
('Projetor sem imagem', 'Projetor da sala 2 não apresenta imagem.', 'Aberto'),
('Computador não liga', 'Computador do laboratório 1 não inicia.', 'Resolvido');
