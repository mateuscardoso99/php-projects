CREATE TABLE users(
	id bigint UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name varchar(255) NOT NULL,
	email varchar(255) NOT NULL UNIQUE,
	password varchar(255) NOT NULL,
	email_verified_at date NULL,
	email_verification_token varchar(255) NULL,
	remember_token varchar(255) NULL,
	created_at timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE password_resets(
	email varchar(255) NOT NULL,
	token varchar(255) NOT NULL,
	expiration_date datetime NOT NULL,
	INDEX (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE turmas(
	id bigint UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	codigo varchar(255) NOT NULL,
	disciplina varchar(255) NOT NULL,
	user_id bigint UNSIGNED NOT NULL,
	created_at timestamp NOT NULL,
    updated_at timestamp NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE alunos(
	id bigint UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	nome varchar(255) NOT NULL,
	matricula varchar(255) NOT NULL,
	turma_id bigint UNSIGNED NOT NULL,
	created_at timestamp NOT NULL,
    updated_at timestamp NOT NULL,
    FOREIGN KEY (turma_id) REFERENCES turmas (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;