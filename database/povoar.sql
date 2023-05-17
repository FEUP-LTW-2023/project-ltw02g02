INSERT INTO Department (depart_id, depart_name) VALUES (1, 'Accounting');

INSERT INTO Hashtag (hashtag_id, hashtag_name) VALUES (1, 'Repair');

INSERT INTO TicketStatus (status_id, status_name) VALUES (1, 'Open');
INSERT INTO TicketStatus (status_id, status_name) VALUES (2, 'Assigned');
INSERT INTO TicketStatus (status_id, status_name) VALUES (3, 'Closed');

INSERT INTO User (user_id, user_name, username, email, user_password, user_type) VALUES (1, 'João', 'joao', 'joao@gmail.com', '$2y$10$Lu9Y9/oXS6qjQYCHgNkBnedMk4VOE1GR41JUgVy2rNXO3WZgMqeUG', 'Client');
INSERT INTO User (user_id, user_name, username, email, user_password, user_type, user_depart_id) VALUES (2, 'Pedro', 'pedro', 'pedro@gmail.com', '$2y$10$Lu9Y9/oXS6qjQYCHgNkBnedMk4VOE1GR41JUgVy2rNXO3WZgMqeUG', 'Agent', 1); 
INSERT INTO User (user_id, user_name, username, email, user_password, user_type) VALUES (3, 'Luiz', 'luiz', 'luiz@gmail.com', '$2y$10$Lu9Y9/oXS6qjQYCHgNkBnedMk4VOE1GR41JUgVy2rNXO3WZgMqeUG', 'Admin'); 
INSERT INTO User (user_name, username, email, user_password, user_type) VALUES ('David', 'david', 'david@gmail.com', '$2y$10$Lu9Y9/oXS6qjQYCHgNkBnedMk4VOE1GR41JUgVy2rNXO3WZgMqeUG', 'Agent');

INSERT INTO Ticket (ticket_id, ticket_subject, ticket_description, ticket_priority, status_id, hashtag_id, ticket_user_id) VALUES (1, 'Product Repair', 'My device does not turn on', 'Low', 1, 1, 1);

--INSERT INTO TicketInquiry (inquiry_id, ticket_id, user_id, comment, created_at) VALUES ();

INSERT INTO TicketFAQ (ticket_faq_id,ticket_id,faq_id) VALUES (1,1,1);


INSERT into Faq(faq_id,question,answer) Values (1,"Alguem viu","Sim eu vi ");

