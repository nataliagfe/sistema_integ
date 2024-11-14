CREATE DATABASE sis_inte;


CREATE TABLE Usuario(
                      Cod_usuario Int Primary key,
                      Nome_usuario Varchar(50),
                      Login Varchar(40),
                      Senha Varchar(40)
                    );

CREATE TABLE Turma(
                    Cod_turma Int Primary key auto_increment,
                    Num_turma Int
);

CREATE TABLE Aluno(
                    Cod_aluno Int Primary key auto_increment,
                    Nome_aluno Varchar(80),
                    Serie Char(2),
                    Cod_turma Int,
                    FOREIGN Key (Cod_turma) references Turma(Cod_turma)
);



CREATE TABLE Presenca (
    Cod_presenca INT PRIMARY KEY AUTO_INCREMENT,
    Presenca CHAR(2),   
    Cod_aluno INT,
    Data_presenca DATETIME,
    FOREIGN KEY (Cod_aluno) REFERENCES Aluno(Cod_aluno),
    Cod_materia Int,
    FOREIGN Key (Cod_materia) references Materia(Cod_materia)
);

CREATE TABLE Materia(
                      Cod_materia Int Primary key auto_increment,
                      Nome_materia Varchar(20)
);

CREATE TABLE Nota(
                  Cod_nota Int Primary key auto_increment,
                  Nota Varchar(3),
                  Cod_aluno Int,
                  FOREIGN Key (Cod_aluno) references Aluno(Cod_aluno),
                  Cod_turma Int,
                  FOREIGN key (Cod_turma) references Turma(Cod_turma),
                  Cod_materia Int,
                  FOREIGN Key (Cod_materia) references Materia(Cod_materia)
);



INSERT INTO usuario
VALUES (2, 'Prof', 'Professor', '123');


INSERT INTO usuario
VALUES (3, 'Alun', 'Aluno', '456');

INSERT INTO Turma (Num_turma) VALUES (101);
INSERT INTO Turma (Num_turma) VALUES (102);


INSERT INTO Aluno (Nome_aluno, Serie, Cod_turma) 
VALUES ('Ana Silva', '1A', 1),
('Carlos Souza', '1A', 1),
('Fernanda Costa', '1A', 1),
('Gabriel Oliveira', '1A', 1),
('Juliana Pereira', '1A', 1),
('Lucas Almeida', '1A', 1),
('Mariana Rocha', '1A', 1),
('Pedro Martins', '1A', 1),
('Roberta Mendes', '1A', 1),
('Thiago Lima', '1A', 1);


INSERT INTO Aluno (Nome_aluno, Serie, Cod_turma) 
VALUES ('Amanda Ferreira', '1B', 2),
('Bruno Santos', '1B', 2),
('Clara Barbosa', '1B', 2),
('Daniela Oliveira', '1B', 2),
('Eduardo Silva', '1B', 2),
('Felipe Costa', '1B', 2),
('Gustavo Rodrigues', '1B', 2),
('Isabela Almeida', '1B', 2),
('João Henrique', '1B', 2),
('Kátia Martins', '1B', 2);


INSERT INTO Materia (Nome_materia) VALUES ('Matematica');
INSERT INTO Materia (Nome_materia) VALUES ('Portugues');
INSERT INTO Materia (Nome_materia) VALUES ('Historia');
INSERT INTO Materia (Nome_materia) VALUES ('Geografia');
INSERT INTO Materia (Nome_materia) VALUES ('Ciencias');

