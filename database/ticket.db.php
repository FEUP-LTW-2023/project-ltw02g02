<?php
    declare(strict_types = 1);

    function createTicket(PDO $dbh, $ticket) {
        try {
            $stmt = $dbh->prepare('INSERT INTO Ticket (ticket_subject, ticket_description, ticket_depart_id, ticket_user_id) VALUES (:ticket_subject, :ticket_description, :ticket_depart_id, :ticket_user_id)');

            $stmt->bindParam(':ticket_subject', $ticket->subject);
            $stmt->bindParam(':ticket_description', $ticket->description);
            $stmt->bindParam(':ticket_depart_id', $ticket->depart_id);
            $stmt->bindParam(':ticket_user_id', $ticket->user_id);
            
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit(0);
        }

        return true;
    }

    function getTicket($dbh, $ticket_id) {
        try {
            $stmt = $dbh->prepare('SELECT * FROM Ticket WHERE ticket_id = ?');

            $stmt->execute(array($ticket_id));

            $ticket = $stmt->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $ticket;
    }

    function getAllTicketsByUser(PDO $dbh, $user_id) {
        try {
            $stmt = $dbh->prepare('SELECT * FROM Ticket JOIN TicketStatus USING (status_id) WHERE user_id = ?');

            $stmt->execute(array($user_id));

            $tickets = $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $tickets;
    }

    function getAllTicketsByDepartment(PDO $dbh, $depart_id) {
        try {
            $stmt = $dbh->prepare('SELECT * FROM Ticket LEFT JOIN Department ON ticket_depart_id = depart_id WHERE ticket_depart_id = ?');

            $stmt->execute(array($depart_id));

            $tickets = $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $tickets;
    }

    function getAllTickets(PDO $dbh) {
        try {
            $stmt = $dbh->prepare('SELECT Ticket.*, TicketStatus.*, Client.*, Department.*, Hashtag.*, Agent.user_id AS AgentID, Agent.user_name AS AgentName, Agent.username AS AgentUsername, Agent.email AS AgentEmail, Agent.user_password AS AgentPassword, Agent.user_type AS AgentType, Agent.user_depart_id AS AgentDepartID FROM Ticket JOIN TicketStatus USING (status_id) JOIN User AS Client ON ticket_user_id = Client.user_id LEFT JOIN Department ON ticket_depart_id = Department.depart_id LEFT JOIN Hashtag USING (hashtag_id) LEFT JOIN User AS Agent ON agent_id = Agent.user_id');

            $stmt->execute();

            $tickets = $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $tickets;
    }

?>