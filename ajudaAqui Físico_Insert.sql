DROP DATABASE ajudaAqui;
CREATE database ajudaAqui;
USE ajudaAqui;

CREATE TABLE Clinica(
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(80) NOT NULL,
  cnpj CHAR(14) NOT NULL,
  telefone CHAR(11) NOT NULL,
  cidade VARCHAR(60) NOT NULL,
  Bairro VARCHAR(60) NOT NULL,
  Logradouro VARCHAR(60) NOT NULL,
  complemento VARCHAR(30) NOT NULL,
  numero INT UNSIGNED NOT NULL,
  uf CHAR(2) NOT NULL,
  cep BIGINT NOT NULL,
  nota DOUBLE UNSIGNED NULL,
  PRIMARY KEY (id)
); 

CREATE TABLE Assistente(
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(80) NOT NULL,
  cpf CHAR(11) NOT NULL,
  email VARCHAR(70) NOT NULL,
  nascimento DATE NOT NULL,
  rg CHAR(8) NOT NULL,
  telefone CHAR(11) NOT NULL,
  cidade VARCHAR(60) NOT NULL,
  Bairro VARCHAR(60) NOT NULL,
  Logradouro VARCHAR(60) NOT NULL,
  complemento VARCHAR(30) NOT NULL,
  numero INT UNSIGNED NOT NULL,
  uf CHAR(2) NOT NULL,
  cep VARCHAR(45) NOT NULL,   
  certificado VARCHAR(45) NOT NULL,  
  tipo VARCHAR(45) NOT NULL, /* Não confundir esse tipo do capeta com a informação se o cara é freelancer ou não Esse tipo se refere a especialização dele, ex: Fisioterapeuta ou A Físico */
  Clinica_id INT UNSIGNED NULL, 
  nota INT NULL,
  status BOOLEAN DEFAULT false,
  PRIMARY KEY (id),
  FOREIGN KEY (Clinica_id) REFERENCES Clinica(id)
);


CREATE TABLE Cliente(
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(80) NOT NULL,
  cpf CHAR(11) NOT NULL,
  email VARCHAR(70) NOT NULL,
  nascimento DATE NOT NULL,
  rg CHAR(8) NOT NULL,
  telefone CHAR(11) NOT NULL,
  tipo_deficiencia VARCHAR(45),
  cidade VARCHAR(60) NOT NULL,
  Bairro VARCHAR(60) NOT NULL,
  Logradouro VARCHAR(60) NOT NULL,
  complemento VARCHAR(30) NOT NULL,
  numero INT UNSIGNED NOT NULL,
  uf CHAR(2) NOT NULL,
  cep VARCHAR(45) NOT NULL,   
  PRIMARY KEY (id)
  );

CREATE TABLE Pedido(
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  local VARCHAR(225) NOT NULL,
  data_hora DATETIME NOT NULL,
  status tinyint NOT NULL,
  cliente_id INT UNSIGNED NOT NULL,
  Assistente_id INT UNSIGNED NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (cliente_id)
    REFERENCES Cliente (id),
  FOREIGN KEY (Assistente_id)
    REFERENCES Assistente (id)
 );

CREATE TABLE Feedback_cliente (
  cliente_id INT UNSIGNED NOT NULL,
  nota DOUBLE NULL,
  PRIMARY KEY (cliente_id),
  CONSTRAINT fk_Feedback_cliente_Clientes
    FOREIGN KEY (cliente_id)
    REFERENCES Cliente (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
  );

CREATE TABLE Pagamento (
  Pedido_id INT UNSIGNED NOT NULL,
  valor_bruto DOUBLE UNSIGNED NOT NULL,
  valor_liquido DOUBLE UNSIGNED NOT NULL,
  imposto DOUBLE UNSIGNED NOT NULL,
  Feedback_cliente_Cliente_ID INT UNSIGNED NOT NULL,
  FOREIGN KEY (Pedido_id)
    REFERENCES Pedido (id),
  CONSTRAINT fk_Pagamento_Feedback_cliente1
    FOREIGN KEY (Feedback_cliente_Cliente_ID)
      REFERENCES Feedback_cliente (cliente_id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
  );
  
  CREATE TABLE Tipo_Usuario(
  id INT UNSIGNED NOT NULL,
  nome varchar(50) NOT NULL,
  PRIMARY KEY(id)
  );
  
  CREATE TABLE Usuario 
  (
  id INT AUTO_INCREMENT NOT NULL,
  login VARCHAR(40) NOT NULL,
  senha VARCHAR(40) NOT NULL,
  tipo INT UNSIGNED NOT NULL,
  fk INT NOT NULL, -- ASSOCIAÇÃO POLIFÓRMICA... POR FAVOR LEIA OS COMENTÁRIOS ABAIXO
  PRIMARY KEY (id),
  FOREIGN KEY(tipo)
    REFERENCES Tipo_Usuario(id)
  );
  
  /*
  Bem galerinha...
  Temos um problema nessa tabela. No nosso código do PHP seria "Impossivel" usar uma tabela de login para cada tipo de usuário(cliente,assistente,gerente,admin),
  para evitar toda essa dor de cabeça o nosso grande Messias Bernardo criou essa solução na cagada, que mais tarde quando eu fui verificar, era a única solução possivel
  O QUE É ESSA SOLUÇÃO?? voces me perguntam, Uma foreinkey do gang bang, praticamente...
  Ela Encaixa em todo mundo e geral usa ela.
  
  MAS GANG-BANG NÃO É BAGUNÇA
  
  para usar a tabela corretamente vamos seguir o seguinte esquema:
  
  na coluna de TIPO Faremos uma associação tipo assim:
  
  1 - "Gerente da Clínica"
  2 - "Assistente"
  3 - "Cliente"
  
  " — Mas o que é a coluna FK????"
  .....
  
  não sei explicar
  
  ok. to muito loco
  
  */
  
INSERT INTO Clinica(id, nome,cnpj, telefone, cidade, Bairro, Logradouro, complemento, numero, uf, cep, nota)
VALUES(NULL, 'Nenhuma', 00000000000000, 00000000, '', '', '', '', 0, '', 00000000, 0);
INSERT INTO Clinica(id, nome,cnpj, telefone, cidade, Bairro, Logradouro, complemento, numero, uf, cep, nota)
VALUES(NULL, 'Centro Assistencial Carlos Prates', 19197615000188, 32781614, 'Belo Horizonte', 'Carlos Prates', 'Rua Corumbá', 'VAZIO', 224, 'MG', 30710280, 8.5);
INSERT INTO Clinica(id, nome,cnpj, telefone, cidade, Bairro, Logradouro, complemento, numero, uf, cep, nota)
VALUES(NULL, 'Doação de Órtese - Hospital da Baleia', 17200429000125, 32775772, 'Belo Horizonte', 'Saudade', 'Rua Juramento', 'VAZIO', 1464, 'MG', 30285048, 9.5);
INSERT INTO Clinica(id, nome,cnpj, telefone, cidade, Bairro, Logradouro, complemento, numero, uf, cep, nota)
VALUES(NULL, 'Associação Mineira dos Paraplégicos – AMP', 21728746000196 , 32413918, 'Belo Horizonte', 'Santa Efigênia', 'Avenida do Contorno', 'VAZIO', 2655, 'MG', 30110080 , 7.0);
INSERT INTO Clinica(id, nome,cnpj, telefone, cidade, Bairro, Logradouro, complemento, numero, uf, cep, nota)
VALUES(NULL, 'Clínica de Psicologia Infantil – CPI', 19884295000134 , 32923484, 'Belo Horizonte', ' Barro Preto', 'Rua Guajajaras', 'VAZIO', 1607, 'MG', 30180101 , 9.0);


INSERT INTO Assistente(id, nome, certificado, cpf,email,nascimento,rg,telefone,tipo, Clinica_id, cidade, Bairro, Logradouro, complemento, numero, uf, cep, nota)
VALUES(NULL, 'Alberto Fonseca Araujo', 'ABCD12345678', 12345678,'albertin@gmail.com','1996/05/05',12345678,3199434341,'A. Visual', 1, 'Belo Horizonte', 'Carlos Prates', 'Rua Corumbá', 'VAZIO', 224, 'MG', 30710280, 10.0);
INSERT INTO Assistente(id, nome, certificado, cpf,email,nascimento,rg,telefone,tipo, Clinica_id, cidade, Bairro, Logradouro, complemento, numero, uf, cep, nota)
VALUES(NULL, 'Juliana Campos', 'CGYA1343678', 12345678,'jucampos@gmail.com','1988/04/01',12345678,3199434341,'A. Físico', 1, 'Belo Horizonte', 'Rua Juramento', 'Rua Corumbá', 'VAZIO', 1464, 'MG', 30710280, 7.5);
INSERT INTO Assistente(id, nome, certificado, cpf,email,nascimento,rg,telefone,tipo, Clinica_id, cidade, Bairro, Logradouro, complemento, numero, uf, cep, nota)
VALUES(NULL, 'Mauro Fernandes Pinto', 'GRG16545678', 12345678,'mauro@gmail.com','1985/11/15',12345678,3199434341,'A. Físico', 1, 'Belo Horizonte', 'Santa Efigênia', 'Avenida do Contorno', 'VAZIO', 2655, 'MG', 30710280, 8.5);
INSERT INTO Assistente(id, nome, certificado, cpf,email,nascimento,rg,telefone,tipo, Clinica_id, cidade, Bairro, Logradouro, complemento, numero, uf, cep, nota)
VALUES(NULL, 'Fátima Veras de Souza', 'J54451GF45678', 12345678,'neafatimabernardes@gmail.com','1993/05/05',12345678,3199434341,'A. Visual', 1, 'Belo Horizonte', 'Barro Preto', 'Rua Guajajaras', 'VAZIO', 1607, 'MG', 30180101, 9.0);
-- INSERT INTO Assistente(id, nome, certificado, cpf, rg, tipo, Clinica_id, cidade, Bairro, Logradouro, complemento, numero, uf, cep, nota)
-- VALUES(NULL, 'Juliana Campos', 'BCDA87654321', 24681230655, 94545670, 'A. Visual', 2, 'Belo Horizonte', 'Saudade', 'Rua Juramento', 'VAZIO', 1464, 'MG', 30285048, 7.5);
-- INSERT INTO Assistente(id, nome, certificado, cpf, rg, tipo, Clinica_id, cidade, Bairro, Logradouro, complemento, numero, uf, cep, nota)
-- VALUES(NULL, 'Mauro Fernandes Pinto', 'CDAB53812952', 04389240699, 12540083, 'A. Fisico', 3, 'Belo Horizonte', 'Santa Efigênia', 'Avenida do Contorno', 'VAZIO', 2655, 'MG', 30110080 , 8.5);
-- INSERT INTO Assistente(id, nome, certificado, cpf, rg, tipo, Clinica_id, cidade, Bairro, Logradouro, complemento, numero, uf, cep, nota)
-- VALUES(NULL, 'Fatima Veras de Souza', 'DABC87335671', 77340688221, 22047679, 'A. Fisico', 4, 'Belo Horizonte', ' Barro Preto', 'Rua Guajajaras', 'VAZIO', 1607, 'MG', 30180101 , 9.0);
-- Estrutura da tabela mudou, refazer inserts

INSERT INTO Cliente(id, nome, cpf, email, nascimento, rg, telefone, tipo_deficiencia, cidade, Bairro, Logradouro, complemento, numero, uf, cep)
VALUES(NULL, 'Janaina de Araujo Amaral', 11987654321, 'jana21@gmail.com', '1969-10-09', 87654321, 993456754, 'Deficiente Visual', 'Belo Horizonte', 'Gloria', 'Rua Eneida', 'VAZIO', 567, 'MG', 30140008); 
INSERT INTO Cliente(id, nome, cpf, email, nascimento, rg, telefone, tipo_deficiencia, cidade, Bairro, Logradouro, complemento, numero, uf, cep)
VALUES(NULL, 'Felipe Almeida', 99081254007, 'felipeA1@gmail.com', '1976-11-05', 15483750, 9996792099, 'Deficiente Fisico', 'Belo Horizonte', 'Santo Andre', 'Rua Ibia', 'VAZIO', 132, 'MG', 30880428);
INSERT INTO Cliente(id, nome, cpf, email, nascimento, rg, telefone, tipo_deficiencia, cidade, Bairro, Logradouro, complemento, numero, uf, cep)
VALUES(NULL, 'Mariana Ferreira', 23970058729, 'mari_gatinha22@gmail.com', '2000-05-22', 99657211, 997456555, 'Deficiente Fisico', 'Belo Horizonte', 'Estrela Dalva', 'Rua Francisco Manoel', 'Apto 202', 903, 'MG', 30433087);
INSERT INTO Cliente(id, nome, cpf, email, nascimento, rg, telefone, tipo_deficiencia, cidade, Bairro, Logradouro, complemento, numero, uf, cep)
VALUES(NULL, 'Marcello Lessa', 55347612944, 'MLessaAB@gmail.com', '1985-01-29', 83463680, 990012468, 'Deficiente Visual', 'Belo Horizonte', 'Ipanema', 'Rua Poranga', 'VAZIO', 108, 'MG', 38190011);


INSERT INTO Feedback_cliente(cliente_id, nota)
VALUES(1,8.5);
INSERT INTO Feedback_cliente(cliente_id, nota)
VALUES(2,9.5);
INSERT INTO Feedback_cliente(cliente_id, nota)
VALUES(3,10.0);
INSERT INTO Feedback_cliente(cliente_id, nota)
VALUES(4,7.0);

INSERT INTO Pagamento(Pedido_id, valor_bruto, valor_liquido, imposto, Feedback_cliente_Cliente_ID)
VALUES(1, 39.65, 29.65, 10.0, 1);
INSERT INTO Pagamento(Pedido_id, valor_bruto, valor_liquido, imposto, Feedback_cliente_Cliente_ID)
VALUES(2, 25.40, 15.40, 10.0, 2);
INSERT INTO Pagamento(Pedido_id, valor_bruto, valor_liquido, imposto, Feedback_cliente_Cliente_ID)
VALUES(3, 12.00, 2.00, 10.0, 3);
INSERT INTO Pagamento(Pedido_id, valor_bruto, valor_liquido, imposto, Feedback_cliente_Cliente_ID)
VALUES(4, 54.28, 44.28, 10.0, 4);

INSERT INTO Tipo_Usuario(id,nome)
VALUES(1,'Gerente Clinica');
INSERT INTO Tipo_Usuario(id,nome)
VALUES(2,'Assistente');
INSERT INTO Tipo_Usuario(id,nome)
VALUES(3,'Cliente');

INSERT INTO Usuario(id, login, senha,tipo,fk) VALUES (null, 'clinica', '123',1,1);
INSERT INTO Usuario(id, login, senha,tipo,fk) VALUES (null, 'clinica2', '123',1,2);
INSERT INTO Usuario(id, login, senha,tipo,fk) VALUES (null, 'assistente', '123',2,1);
INSERT INTO Usuario(id, login, senha,tipo,fk) VALUES (null, 'cliente', '123',3,1);

-- status de pedido :
-- 0 = criado
-- 1 = aceito
-- 2 = finalizado
-- 3 = pagamento realizado
-- 4 = feedback realizado
