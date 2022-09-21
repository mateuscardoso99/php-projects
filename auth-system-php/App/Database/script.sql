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
	created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE alunos(
	id bigint UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	nome varchar(255) NOT NULL,
	matricula varchar(255) NOT NULL,
	turma_id bigint UNSIGNED NOT NULL,
	user_id bigint UNSIGNED NOT NULL,
	created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (turma_id) REFERENCES turmas (id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO users (id,name,email,password,email_verified_at,email_verification_token,remember_token,created_at) VALUES (1,'joao','joao@gmail.com','$2y$10$8ZWcUFyFg59tt4CA/VowT.QQ.sJiS4ip3ocRtstpXgkNJDY7W88hy','2022-08-08',null,null,'2022-08-08');
INSERT INTO turmas (id,codigo,disciplina,user_id,created_at,updated_at) VALUES (1,'40505','Matemática',1,'2022-08-08','2022-08-08');
INSERT INTO turmas (id,codigo,disciplina,user_id,created_at,updated_at) VALUES (2,'23656','História',1,'2022-08-08','2022-08-08');
INSERT INTO alunos (id,nome,matricula,turma_id,user_id,created_at,updated_at) VALUES (1,'Carlos','49300294',1,1,'2022-08-08','2022-08-08');
INSERT INTO alunos (id,nome,matricula,turma_id,user_id,created_at,updated_at) VALUES (2,'Maria','2055949',2,1,'2022-08-08','2022-08-08');
INSERT INTO alunos (id,nome,matricula,turma_id,user_id,created_at,updated_at) VALUES (3,'Silvio','599330',1,1,'2022-08-08','2022-08-08');