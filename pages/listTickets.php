<?php 
    declare(strict_types = 1);

    session_start();

    require_once('../database/connection.db.php');
    require_once('../database/ticket.db.php');
    require_once('../database/user.db.php');
    require_once('../database/status.db.php');
    require_once('../database/hashtag.db.php');
    require_once('../templates/common.tpl.php');
    require_once('../templates/forms.tpl.php');
    require_once('../templates/ticket.tpl.php');

    $user_type = $_SESSION['user_type'];

    $query = "SELECT Ticket.*, TicketStatus.*, Client.*, Department.*, Hashtag.*, Agent.user_id AS AgentID, Agent.user_name AS AgentName, Agent.username AS AgentUsername, Agent.email AS AgentEmail, Agent.user_password AS AgentPassword, Agent.user_type AS AgentType, Agent.user_depart_id AS AgentDepartID FROM Ticket JOIN TicketStatus USING (status_id) JOIN User AS Client ON ticket_user_id = Client.user_id LEFT JOIN Department ON ticket_depart_id = Department.depart_id LEFT JOIN Hashtag USING (hashtag_id) LEFT JOIN User AS Agent ON agent_id = Agent.user_id WHERE 0 = 0";
    $bind = array();

    $filtered = false;

    if (isset($_GET['date_filter']) && $_GET['date_filter'] !== 'all') {
        $filtered = true;
        switch ($_GET['date_filter']) {
          case 'today':
            $today = date('Y-m-d');
            $query .= " AND DATE(created_at) = '$today'";
            break;
          case '7days':
            $sevenDaysAgo = date('Y-m-d H:i:s', strtotime('-7 days'));
            $query .= " AND created_at >= '$sevenDaysAgo'";
            break;
          case '30days':
            $thirtyDaysAgo = date('Y-m-d H:i:s', strtotime('-30 days'));
            $query .= " AND created_at >= '$thirtyDaysAgo'";
            break;
        }
      }
    
    if (isset($_GET['agent_id']) && $_GET['agent_id'] !== 'all') {
        $filtered = true;
        $query .= " AND agent_id = ?";
        $bind[] = intval($_GET['agent_id']);
    }

    if (isset($_GET['status_id']) && $_GET['status_id'] !== 'all') {
        $filtered = true;
        $query .= " AND status_id = ?";
        $bind[] = intval($_GET['status_id']);
    }

    if (isset($_GET['priority']) && $_GET['priority'] !== 'all') {
        $filtered = true;
        $query .= " AND ticket_priority = ?";
        $bind[] = $_GET['priority'];
    }

    if (isset($_GET['hashtag_id']) && $_GET['hashtag_id'] !== 'all') {
        $filtered = true;
        $query .= " AND hashtag_id = ?";
        $bind[] = intval($_GET['hashtag_id']);
    }


    $dbh = getDatabaseConnection();

    $agents = getAllAgents($dbh);
    $statuses = getAllStatus($dbh);
    $hashtags = getAllHashtags($dbh);

    $clientTickets = getAllTicketsByUser($dbh, intval($_SESSION['user_id']));
    if ($user_type === 'Agent') {
        $tickets = getAllTicketsByDepartmentQuery($dbh, $query, $bind, intval($_SESSION['user_depart_id']));
    } else if ($user_type === 'Admin') {
        $tickets = getAllTicketsQuery($dbh, $query, $bind);
    }

    output_header();
    output_listClientTickets($clientTickets, $user_type);
    if ($user_type !== 'Client'){
        if (!empty($tickets) || $filtered) output_filterOptions($agents, $statuses, $hashtags);
        output_listAgentTickets($tickets);
    }
    output_footer();
?>