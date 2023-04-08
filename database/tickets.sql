CREATE TABLE users (
  id AUTOINCREMENT PRIMARY KEY,
  name TEXT NOT NULL,
  username TEXT NOT NULL UNIQUE,
  password TEXT NOT NULL,
  email TEXT NOT NULL UNIQUE,
  role TEXT NOT NULL
);

CREATE TABLE departments (
  id AUTOINCREMENT PRIMARY KEY,
  name TEXT NOT NULL
);

CREATE TABLE hashtags (
  id AUTOINCREMENT PRIMARY KEY,
  name TEXT NOT NULL UNIQUE
);

CREATE TABLE tickets (
  id AUTOINCREMENT PRIMARY KEY,
  subject TEXT NOT NULL,
  description TEXT NOT NULL,
  status TEXT NOT NULL,
  priority TEXT NOT NULL,
  department_id INTEGER NOT NULL,
  user_id INTEGER NOT NULL,
  agent_id INTEGER,
  created_at TEXT NOT NULL,
  updated_at TEXT NOT NULL,
  FOREIGN KEY (department_id) REFERENCES departments (id),
  FOREIGN KEY (user_id) REFERENCES users (id),
  FOREIGN KEY (agent_id) REFERENCES users (id)
);

CREATE TABLE ticket_hashtags (
  ticket_id INTEGER NOT NULL,
  hashtag_id INTEGER NOT NULL,
  PRIMARY KEY (ticket_id, hashtag_id),
  FOREIGN KEY (ticket_id) REFERENCES tickets (id),
  FOREIGN KEY (hashtag_id) REFERENCES hashtags (id)
);

CREATE TABLE faqs (
  id AUTOINCREMENT PRIMARY KEY,
  question TEXT NOT NULL UNIQUE,
  answer TEXT NOT NULL
);

