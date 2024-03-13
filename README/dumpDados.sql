CREATE DATABASE IF NOT EXISTS painel_monitoramento;
USE painel_monitoramento;

CREATE TABLE IF NOT EXISTS ramais(
	numero_ramal VARCHAR(5) NOT NULL PRIMARY KEY COMMENT 'Numero do ramal',
	nome VARCHAR(25) NOT NULL COMMENT 'Nome do usuario do ramal',
	host VARCHAR(15) NOT NULL DEFAULT '(Unspecified)' COMMENT 'Host do ramal',
	status_ramal VARCHAR(15) NOT NULL DEFAULT 'Unavailable' COMMENT 'Status atual do ramal',
	dt_hr_criacao DATETIME NOT NULL DEFAULT NOW() COMMENT 'Data e hora de criacao',
	dt_hr_alteracao DATETIME NULL COMMENT 'Data e hora de alteracao'
);