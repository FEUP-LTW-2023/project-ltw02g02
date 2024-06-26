CREATE TABLE usuarios (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nome_usuario TEXT UNIQUE NOT NULL,
    email TEXT UNIQUE NOT NULL,
    senha TEXT NOT NULL,
    primeiro_nome TEXT NOT NULL,
    ultimo_nome TEXT NOT NULL,
    funcao INTEGER NOT NULL
, token TEXT, departamento INTEGER);
CREATE TABLE sqlite_sequence(name,seq);
CREATE TABLE departamentos (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nome TEXT UNIQUE NOT NULL
);
CREATE TABLE tickets (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    usuario_id INTEGER NOT NULL,
    departamento_id INTEGER NOT NULL,
    assunto TEXT NOT NULL,
    descricao TEXT NOT NULL,
    status INTEGER NOT NULL DEFAULT 0,
    prioridade INTEGER NOT NULL DEFAULT 0,
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP,
    atualizado_em DATETIME DEFAULT CURRENT_TIMESTAMP, responsavel INTEGER REFERENCES usuarios(id),
    FOREIGN KEY(usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY(departamento_id) REFERENCES departamentos(id)
);
CREATE TABLE hashtags (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nome TEXT UNIQUE NOT NULL
);
CREATE TABLE ticket_hashtags (
    ticket_id INTEGER NOT NULL,
    hashtag_id INTEGER NOT NULL,
    PRIMARY KEY (ticket_id, hashtag_id),
    FOREIGN KEY(ticket_id) REFERENCES tickets(id),
    FOREIGN KEY(hashtag_id) REFERENCES hashtags(id)
);
CREATE TABLE IF NOT EXISTS "perguntas_frequentes" (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    pergunta TEXT UNIQUE NOT NULL);
CREATE TABLE respostas (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    resposta TEXT NOT NULL,
    hora DATETIME DEFAULT CURRENT_TIMESTAMP,
    id_pergunta INTEGER NOT NULL,
    FOREIGN KEY(id_pergunta) REFERENCES "perguntas_frequentes"(id)
);
CREATE TABLE historico_tickets (
 id INTEGER PRIMARY KEY AUTOINCREMENT,
 ticket_id INTEGER NOT NULL,
 usuario_id INTEGER NOT NULL,
 data_hora DATETIME DEFAULT CURRENT_TIMESTAMP,
 campo TEXT NOT NULL,
 valor_antigo TEXT,
 valor_novo TEXT,
 FOREIGN KEY(ticket_id) REFERENCES tickets(id),
 FOREIGN KEY(usuario_id) REFERENCES usuarios(id)
);
CREATE TABLE status_tickets (
    id INTEGER PRIMARY KEY,
    nome TEXT
);
CREATE TABLE IF NOT EXISTS "respostas_tickets" (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    resposta TEXT,
    hora DATETIME DEFAULT CURRENT_TIMESTAMP,
    id_ticket INTEGER NOT NULL,
    id_agent INTEGER NOT NULL,
    faq INTEGER,
    FOREIGN KEY(id_ticket) REFERENCES tickets(id),
    FOREIGN KEY(id_agent) REFERENCES usuarios(id)
);
