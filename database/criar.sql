PRAGMA foreign_keys = ON;

DROP TABLE IF EXISTS User;
DROP TABLE IF EXISTS Department;
DROP TABLE IF EXISTS Hashtag;
DROP TABLE IF EXISTS Ticket;
DROP TABLE IF EXISTS TicketStatus;
DROP TABLE IF EXISTS TicketInquiry;
DROP TABLE IF EXISTS Faq;


CREATE TABLE User (
  user_id INTEGER PRIMARY KEY,
  user_name TEXT NOT NULL,
  username TEXT NOT NULL UNIQUE,
  email TEXT NOT NULL UNIQUE,
  user_password TEXT NOT NULL,
  user_type TEXT NOT NULL CHECK (user_type IN ('Client', 'Agent', 'Admin')),
  user_depart_id INTEGER REFERENCES Department(depart_id) 
          ON DELETE SET NULL
          ON UPDATE CASCADE
          CHECK (user_type <> 'Client' OR user_depart_id IS NULL)
);

CREATE TABLE Department (
  depart_id INTEGER PRIMARY KEY,
  depart_name TEXT NOT NULL UNIQUE
);

CREATE TABLE Hashtag (
  hashtag_id INTEGER PRIMARY KEY,
  hashtag_name TEXT NOT NULL UNIQUE
);

CREATE TABLE TicketStatus (
  status_id INTEGER PRIMARY KEY,
  status_name TEXT NOT NULL UNIQUE
);

CREATE TABLE Ticket (
  ticket_id INTEGER PRIMARY KEY,
  ticket_subject TEXT NOT NULL,
  ticket_description TEXT NOT NULL,
  ticket_priority TEXT DEFAULT 'Low' CHECK (ticket_priority IN ('High', 'Medium', 'Low')),
  status_id INTEGER NOT NULL DEFAULT 1 REFERENCES TicketStatus (status_id)
          ON DELETE SET DEFAULT
          ON UPDATE CASCADE,
  hashtag_id INTEGER REFERENCES Hashtag (hashtag_id)
          ON DELETE SET NULL
          ON UPDATE CASCADE,
  ticket_depart_id INTEGER REFERENCES Department (depart_id)
          ON DELETE SET NULL
          ON UPDATE CASCADE,
  ticket_user_id INTEGER NOT NULL REFERENCES User (user_id)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
  agent_id INTEGER REFERENCES User (user_id)
          ON DELETE SET NULL
          ON UPDATE CASCADE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
  updated_at TIMESTAMP
);

CREATE TABLE TicketInquiry (
  inquiry_id INTEGER PRIMARY KEY,
  inquiry_ticket_id INTEGER NOT NULL REFERENCES Ticket (ticket_id),
  inquiry_user_id INTEGER NOT NULL REFERENCES User (user_id),
  comment TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
);

CREATE TABLE Faq (
  faq_id INTEGER PRIMARY KEY,
  question TEXT NOT NULL UNIQUE,
  answer TEXT NOT NULL
);

CREATE TABLE TicketFAQ (
  ticket_faq_id INTEGER PRIMARY KEY,
  ticket_id INTEGER NOT NULL REFERENCES Ticket (ticket_id),
  faq_id INTEGER NOT NULL REFERENCES Faq (faq_id)
);








CREATE TRIGGER check_agent_id_insert
BEFORE INSERT ON Ticket
FOR EACH ROW
BEGIN
  SELECT RAISE(ABORT, 'Client cannot be assigned to a ticket')
  WHERE (SELECT user_type FROM User WHERE user_id = NEW.agent_id) = 'Client';
END;

CREATE TRIGGER check_agent_id_update
BEFORE UPDATE ON Ticket
FOR EACH ROW
BEGIN
  SELECT RAISE(ABORT, 'Client cannot be assigned to a ticket')
  WHERE (SELECT user_type FROM User WHERE user_id = NEW.agent_id) = 'Client';
END;

