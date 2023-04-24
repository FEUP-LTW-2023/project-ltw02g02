<?php 
    declare(strict_types = 1);
?>


<?php function output_listTickets($tickets) { ?>
    <div class="ticket_container">
      <h2 class="main__heading">My Tickets</h2>
      <table class="ticket__table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Subject</th>
            <th>Department</th>
            <th>Status</th>
            <th>Create Date</th>
            <th>Last Update</th>
            <th>Priority</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($tickets as $ticket) { ?>
          <tr>
            <td><?=$ticket['ticket_id']?></td>
            <td><a href="../pages/ticket.php?id=<?=$ticket['ticket_id']?>"><?=htmlentities($ticket['ticket_subject'])?></a></td>
            <td><?=$ticket['depart_name']?></td>
            <td><?=htmlentities($ticket['status_name'])?></td>
            <td><?=htmlentities($ticket['created_at'])?></td>
            <td><?=($ticket['updated_at'])?></td>
            <td><?=$ticket['ticket_priority']?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <?php } ?>

  <?php function output_ticket($ticket, $edit) { ?>
    <?php if (isset($edit)) { ?>
      <div class="container">
        <h2>Ticket</h2>
        <form action="../actions/editTicket.action.php" method="post">
          <p><strong>ID:</strong> <?=$ticket['ticket_id']?></p>
          <p><strong>Subject:</strong> <?=htmlentities($ticket['ticket_subject'])?></p>
          <p><strong>Description:</strong> <?=htmlentities($ticket['ticket_description'])?></p>
          <label for="status_id">Status:</label>
          <input type="text" id="status_id" name="status_id" value=<?=$ticket['status_id']?>>
          <label for="department">Department:</label>
          <input type="text" id="department" name="department" value=<?=$ticket['ticket_id']?>>
          <label for="agent_id">Assigned:</label>
          <input type="text" id="agent_id" name="agent_id" value=<?=$ticket['ticket_id']?>>
          <label for="hashtag_id">Hashtag:</label>
          <input type="text" id="hashtag_id" name="hashtag_id" value=<?=$ticket['ticket_id']?> autocomplete="on">
    
          <div class="profile-buttons">
          <input type="submit" value="Save Changes">
            <a href="../pages/ticket.php?id=<?=$ticket['ticket_id']?>" class="profile-btn">Cancel</a>
          </div>
        </form>
      </div>
    <?php } else { ?>
    <div class="container">
      <h2>Ticket</h2>
      <div class="profile-info">
        <p><strong>ID:</strong> <?=$ticket['ticket_id']?></p>
        <p><strong>Subject:</strong> <?=htmlentities($ticket['ticket_subject'])?></p>
        <p><strong>Description:</strong> <?=htmlentities($ticket['ticket_description'])?></p>
        <p><strong>Status:</strong> <?=$ticket['status_id']?></p>
        <p><strong>Department:</strong> <?=$ticket['ticket_id']?></p>
        <p><strong>Assigned:</strong> <?=$ticket['ticket_id']?></p>
        <p><strong>Hashtag:</strong> <?=$ticket['ticket_id']?></p>
      </div>
      <div class="profile-buttons">
        <a href="../pages/ticket.php?id=<?=$ticket['ticket_id']?>&edit" class="profile-btn">Edit Ticket</a>
        <a href="../pages/listTickets.php" class="profile-btn">Back</a>
      </div>
    </div>
    <?php } ?>
  <?php } ?>