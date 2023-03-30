# LTW Project 22/23 - Trouble Tickets Website

> - David Ferreira (upXXX)
> - Luiz Queiroz (upXXX)
> - Pedro Camargo (up202102365)

## Objective
Develop a website to streamline and manage trouble tickets effectively. The system should enable users to submit, track, and resolve tickets promptly and efficiently. Additionally, the website should have intuitive user interfaces and reporting functionalities to provide real-time insights into ticket status and performance metrics. In order the create the website, we had to:
- Create an SQLite database that stores information about users, tickets, departments, hashtags, and frequently asked questions (FAQ).
- Create documents using HTML and CSS representing the application's web pages.
- Use PHP to generate those web pages after retrieving/changing data from the database.
- Use Javascript to enhance the user experience (for example, using Ajax).

The minimum expected set of requirements were the following:
- All users should be able to (users can simultaneously be clients and agents):
  - Register a new account
  - Login and Logout
  - Edit their profile (at least name, username, password, and e-mail)

- Clients should be able to:
  - Submit a new ticket optionally choosing a department (e.g., "Accounting")
  - List and track tickets they have submitted
  - Reply to inquiries (e.g., the agent asks for more details) about their tickets and add more information to already submitted tickets

- Agents should be able to (they are also clients):
  - List tickets from their departments (e.g., "Accounting"), and filter them in different ways (e.g., by date, by assigned agent, by status, by priority, by hashtag)
  - Change the department of a ticket (e.g., the client chose the wrong department)
  - Assign a ticket to themselves or someone else
  - Change the status of a ticket. Tickets can have many statuses (e.g., open, assigned, closed); some may change automatically (e.g., ticket changes to "assigned" after being assigned to an agent)
  - Edit ticket hashtags easily (just type hashtag to add (with autocomplete), and click to remove)
  - List all changes done to a ticket (e.g., status changes, assignments, edits)
  - Manage the FAQ and use an answer from the FAQ to answer a ticket

- Admins should be able to (they are also agents):
  - Upgrade a client to an agent or an admin
  - Add new departments, statuses, and other relevant entities
  - Assign agents to departments
  - Control the whole system

## Suggested additional requirements
- Tickets can have documents attached to them (both by clients and agents)
- Admins should be able to see key performance indicators and other statistics (e.g., number of tickets closed by agent, number of open tickets per day)
- Agents can belong to more than one department
- Agents can see a client's history
- Agents can watch tickets not assigned to them (e.g., when transferring a ticket, the agent can check a box stating that he still wants to follow the ticket)
- Tickets can be merged together or marked as duplicates from another ticket
- Tickets can have to-do lists that must be completed before the ticket is closed
- Tasks can also be assigned to agents

## Technologies used
- HTML, CSS, PHP, Javascript, Ajax/JSON, PDO/SQL (using sqlite)
