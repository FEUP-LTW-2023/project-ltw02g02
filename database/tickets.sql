 DROP TABLE IF EXISTS users;
 DROP TABLE IF EXISTS departments;
 DROP TABLE IF EXISTS tickets;
 DROP TABLE IF EXISTS hashtags;
 DROP TABLE IF EXISTS faqs;



CREATE TABLE users (
  id INTEGER PRIMARY KEY,
  username TEXT NOT NULL,
  name Text NOT NULL,
  email TEXT NOT NULL UNIQUE,
  password TEXT NOT NULL,

);

CREATE TABLE departments (
  id INTEGER PRIMARY KEY,
  nameDepartment TEXT NOT NULL
);

CREATE TABLE tickets (
  id INTEGER PRIMARY KEY,
  user_id INTEGER NOT NULL,
  department_id INTEGER NOT NULL,
  theme TEXT NOT NULL,
  description TEXT NOT NULL,
  status TEXT NOT NULL DEFAULT 'Depend',
  hastag_name TEXT NOT NULL, 
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  
  FOREIGN KEY (user_id) REFERENCES users (id),
  FOREIGN KEY (department_id) REFERENCES departments (id),
  FOREIGN KEY (hastag_name) REFERENCES hastags (name)
);

CREATE TABLE hashtags (
  id INTEGER PRIMARY KEY,
  name TEXT NOT NULL UNIQUE
);

CREATE TABLE faqs (
  id INTEGER PRIMARY KEY,
  question TEXT NOT NULL,
  answer TEXT NOT NULL,
  hashtag_name Text NOT NULL,
  FOREIGN KEY (hashtag_name) REFERENCES hashtags (name)
);

Create Table admin(
    id SERIAL PRIMARY KEY,
    id_user INTEGER NOT NULL,
    FOREIGN KEY (id_user) REFERENCES users(id)

)


Insert INTO users (id,username,name,email,password,admin) VALUES(0,'david2002','David','davidferreira@gmail.com','DaVid');
Insert INTO users (id,username,name,email,password,admin) VALUES(1,'John29233','John','John@gmail.com','JoHn');
Insert INTO users (id,username,name,email,password,admin) VALUES(2,'Carol49359','Carol','Carolo@gmail.com','carolina');
Insert INTO users (id,username,name,email,password,admin) VALUES(3,'Freitas3131','Freitas','Freitas@gmail.com','gatos');
Insert INTO users (id,username,name,email,password,admin) VALUES(4,'Rute10301','Rute','Rute@gmail.com','porto','0');
Insert INTO users (id,username,name,email,password,admin) VALUES(5,'Paulo10193','Paulo','Paulo@gmail.com','bola','0');
Insert INTO users (id,username,name,email,password,admin) VALUES(6,'Monica23921','Monica','Monica@gmail.com','portugal');
Insert INTO users (id,username,name,email,password,admin) VALUES(7,'Leonor298429','Leonor','Leonor@gmail.com','chocolate');
Insert INTO users (id,username,name,email,password,admin) VALUES(8,'Vasco139138','Vasco','Vasco@gmail.com','lisboa');






