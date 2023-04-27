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

    function editTicket($dbh, $ticket) {
        try {
            $stmt = $dbh->prepare('UPDATE Ticket SET status_id = :status_id, ticket_depart_id = :ticket_depart_id, agent_id = :agent_id, ticket_priority = :ticket_priority, hashtag_id = :hashtag_id, updated_at = :updated_at WHERE ticket_id = :ticket_id');

            $stmt->bindParam(':ticket_id', $ticket->ticket_id);
            $stmt->bindParam(':status_id', $ticket->status_id);
            $stmt->bindParam(':ticket_depart_id', $ticket->depart_id);
            $stmt->bindParam(':agent_id', $ticket->agent_id);
            $stmt->bindParam(':ticket_priority', $ticket->priority);
            $stmt->bindParam(':hashtag_id', $ticket->hashtag_id);
            $stmt->bindParam(':updated_at', $ticket->updated_at->format('Y-m-d H:i:s'));

            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit(0);
        }

        return true;
    }

    function getTicket($dbh, $ticket_id) {
        try {
            $stmt = $dbh->prepare('SELECT Ticket.*, TicketStatus.*, Client.*, Department.*, Hashtag.*, Agent.user_id AS AgentID, Agent.user_name AS AgentName, Agent.username AS AgentUsername, Agent.email AS AgentEmail, Agent.user_password AS AgentPassword, Agent.user_type AS AgentType, Agent.user_depart_id AS AgentDepartID FROM Ticket JOIN TicketStatus USING (status_id) JOIN User AS Client ON ticket_user_id = Client.user_id LEFT JOIN Department ON ticket_depart_id = Department.depart_id LEFT JOIN Hashtag USING (hashtag_id) LEFT JOIN User AS Agent ON agent_id = Agent.user_id WHERE ticket_id = ?');

            $stmt->execute(array($ticket_id));

            $ticket = $stmt->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $ticket;
    }

    function getAllTicketsByUser(PDO $dbh, $user_id) {
        try {
            $stmt = $dbh->prepare('SELECT Ticket.*, TicketStatus.*, Client.*, Department.*, Hashtag.*, Agent.user_id AS AgentID, Agent.user_name AS AgentName, Agent.username AS AgentUsername, Agent.email AS AgentEmail, Agent.user_password AS AgentPassword, Agent.user_type AS AgentType, Agent.user_depart_id AS AgentDepartID FROM Ticket JOIN TicketStatus USING (status_id) JOIN User AS Client ON ticket_user_id = Client.user_id LEFT JOIN Department ON ticket_depart_id = Department.depart_id LEFT JOIN Hashtag USING (hashtag_id) LEFT JOIN User AS Agent ON agent_id = Agent.user_id WHERE ticket_user_id = ?');

            $stmt->execute(array($user_id));

            $tickets = $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $tickets;
    }

    function getAllTicketsByDepartment(PDO $dbh, ?int $user_depart_id) {
        try {
            $stmt = $dbh->prepare('SELECT Ticket.*, TicketStatus.*, Client.*, Department.*, Hashtag.*, Agent.user_id AS AgentID, Agent.user_name AS AgentName, Agent.username AS AgentUsername, Agent.email AS AgentEmail, Agent.user_password AS AgentPassword, Agent.user_type AS AgentType, Agent.user_depart_id AS AgentDepartID FROM Ticket JOIN TicketStatus USING (status_id) JOIN User AS Client ON ticket_user_id = Client.user_id LEFT JOIN Department ON ticket_depart_id = Department.depart_id LEFT JOIN Hashtag USING (hashtag_id) LEFT JOIN User AS Agent ON agent_id = Agent.user_id WHERE ticket_depart_id = ? OR ticket_depart_id IS NULL');
                
            $stmt->execute(array($user_depart_id));

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

    function getAllTicketsQuery(PDO $dbh, $query, $bind) {
        try {
            $stmt = $dbh->prepare($query);

            $stmt->execute($bind);

            $tickets = $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $tickets;
    }

    function getAllTicketsByDepartmentQuery(PDO $dbh, $query, $bind, ?int $user_depart_id) {
        try {
            $query .= " AND (ticket_depart_id = ? OR ticket_depart_id IS NULL)";
            $bind[] = $user_depart_id;

            $stmt = $dbh->prepare($query);
                
            $stmt->execute($bind);

            $tickets = $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $tickets;
    }

    function getTicketPriority(PDO $dbh) {
        try {
            $stmt = $dbh->prepare('SELECT DISTINCT ticket_priority FROM Ticket');

            $stmt->execute();

            $tickets = $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $tickets;
    }
?>
