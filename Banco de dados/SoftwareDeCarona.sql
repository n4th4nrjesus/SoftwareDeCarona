/* Modelo Fisico do Banco de dados Software de Carona: */

CREATE TABLE Usuario (
    Matricula int PRIMARY KEY,
    Genero char(1) NOT NULL,
    Nome varchar(250) NOT NULL,
    Email varchar(250) NOT NULL,
    Senha varchar(20) NOT NULL,
    CNH varchar(11)
);

CREATE TABLE Carona (
    Cod int PRIMARY KEY,
    DataCriacao date DEFAULT GETDATE(),
    LocalPartida varchar(250) NOT NULL,
    LocalDestino varchar(250) NOT NULL,
    fk_Usuario_Matricula int,
    fk_Usuario_Matricula_ int
);

CREATE TABLE Postagem (
    Cod int PRIMARY KEY,
    DataCriacao date DEFAULT GETDATE(),
    Texto varchar(500),
    UriFoto varchar(500),
    fk_Usuario_Matricula int
);

CREATE TABLE AvaliacaoCarona (
    fk_Usuario_Matricula int,
    fk_Carona_Cod int,
    Cod int PRIMARY KEY,
    Comentario varchar(250),
    Estrelas int(5)
);

CREATE TABLE AvaliacaoPostagem (
    fk_Usuario_Matricula int,
    fk_Postagem_Cod int,
    Cod int PRIMARY KEY,
    Comentario varchar(250),
    Agradecimento tinyint,
    DataCriacao date DEFAULT GETDATE()
);
 
ALTER TABLE Carona ADD CONSTRAINT FK_Carona_2
    FOREIGN KEY (fk_Usuario_Matricula, fk_Usuario_Matricula_)
    REFERENCES Usuario (Matricula, Matricula)
    ON DELETE SET NULL;
 
ALTER TABLE Postagem ADD CONSTRAINT FK_Postagem_2
    FOREIGN KEY (fk_Usuario_Matricula)
    REFERENCES Usuario (Matricula)
    ON DELETE CASCADE;
 
ALTER TABLE AvaliacaoCarona ADD CONSTRAINT FK_AvaliacaoCarona_2
    FOREIGN KEY (fk_Usuario_Matricula)
    REFERENCES Usuario (Matricula)
    ON DELETE RESTRICT;
 
ALTER TABLE AvaliacaoCarona ADD CONSTRAINT FK_AvaliacaoCarona_3
    FOREIGN KEY (fk_Carona_Cod)
    REFERENCES Carona (Cod)
    ON DELETE SET NULL;
 
ALTER TABLE AvaliacaoPostagem ADD CONSTRAINT FK_AvaliacaoPostagem_2
    FOREIGN KEY (fk_Usuario_Matricula)
    REFERENCES Usuario (Matricula)
    ON DELETE SET NULL;
 
ALTER TABLE AvaliacaoPostagem ADD CONSTRAINT FK_AvaliacaoPostagem_3
    FOREIGN KEY (fk_Postagem_Cod)
    REFERENCES Postagem (Cod)
    ON DELETE SET NULL;