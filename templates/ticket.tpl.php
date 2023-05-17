<?php 
    declare(strict_types = 1);
?>


<?php function output_listClientTickets($tickets, $user_type) { ?>
  <div class="ticket_container">
      <?php if (empty($tickets)) { 
                if ($user_type === 'Client') { ?> 
                <h2>You don't have any tickets to show</h2>
                <?php } ?>
      <?php } else { ?> 
      <h2 class="table_title">My Tickets</h2>
      <table class="ticket__table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Subject</th>
            <th>Department</th>
            <th>Status</th>
            <th>Created Date</th>
            <th>Last Update</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($tickets as $ticket) { ?>
          <tr>
            <td><a href="../pages/trackTicket.php?id=<?=$ticket['ticket_id']?>" class="ticket_list_link"><?=$ticket['ticket_id']?></a></td>
            <td><?=htmlentities($ticket['ticket_subject'])?></td>
            <td><?=$ticket['depart_name']?></td>
            <td><?=htmlentities($ticket['status_name'])?></td>
            <td><?=htmlentities($ticket['created_at'])?></td>
            <td><?=($ticket['updated_at'])?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
        <?php } ?>
    </div>       
  <?php } ?>

<?php function output_listAgentTickets($tickets) { ?>
  <div class="ticket_container">
      <?php if (empty($tickets)) { ?>
                <h2>You don't have any tickets to manage</h2>
              <?php } else { ?>
      <table class="ticket__table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Subject</th>
            <th>Department</th>
            <th>Status</th>
            <th>Created Date</th>
            <th>Last Update</th>
            <th>Client</th>
            <th>Agent</th>
            <th>Priority</th>
            <th>Hashtag</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($tickets as $ticket) { ?>
          <tr>
            <td><a href="../pages/trackTicket.php?id=<?=$ticket['ticket_id']?>" class="ticket_list_link"><?=$ticket['ticket_id']?></a></td>
            <td><?=htmlentities($ticket['ticket_subject'])?></td>
            <td><?=$ticket['depart_name']?></td>
            <td><?=htmlentities($ticket['status_name'])?></td>
            <td><?=htmlentities($ticket['created_at'])?></td>
            <td><?=($ticket['updated_at'])?></td>
            <td><?=$ticket['user_name']?></td>
            <td><?=$ticket['AgentName']?></td>
            <td><?=$ticket['ticket_priority']?></td>
            <td><?=$ticket['hashtag_name']?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
          <?php } ?>
    </div>       
      <?php } ?>

  <?php function output_trackEditTicket($ticket, $edit, $statuses, $departments, $agents, $hashtags) { ?>
    <?php if ($edit) { ?>
      <div class="container" id="track_ticket">
        <h2>Ticket</h2>
        <form action="../actions/editTicket.action.php" method="post">
          <p><strong>ID:</strong> <?=$ticket['ticket_id']?></p>
          <p><strong>Subject:</strong> <?=htmlentities($ticket['ticket_subject'])?></p>
          <p><strong>Description:</strong> <?=htmlentities($ticket['ticket_description'])?></p>
          <p><strong>Client:</strong> <?=htmlentities($ticket['user_name'])?></p>
          <p><strong>Created At:</strong> <?=htmlentities($ticket['created_at'])?></p>
          <p><strong>Updated At:</strong> <?=$ticket['updated_at']?></p>
          <label for="status">Status:</label>
          <select id="status" name="status">
            <option value="<?=$ticket['status_id']?>" selected><?=htmlentities($ticket['status_name'])?></option>
            <?php foreach ($statuses as $status) {
              if ($ticket['status_id'] != $status['status_id']) { ?>
               <option value="<?=$status['status_id']?>"><?=htmlentities($status['status_name'])?></option>
              <?php } ?>
            <?php } ?>
          </select>
          <label for="department">Department:</label>
          <select id="department" name="department">
            <option value="<?=$ticket['ticket_depart_id']?>" selected><?=$ticket['depart_name']?></option>
            <?php foreach ($departments as $department) {
              if ($department['depart_id'] != $ticket['ticket_depart_id']) { ?>
               <option value="<?=$department['depart_id']?>"><?=htmlentities($department['depart_name'])?></option>
              <?php } ?>
            <?php } ?>
          </select>
          <label for="agent">Assigned To:</label> 
          <select id="agent" name="agent">
            <option value="<?=$ticket['agent_id']?>" selected><?=$ticket['AgentName']?></option>
            <?php foreach ($agents as $agent) {
              if ($agent['user_id'] != $ticket['agent_id']) { ?>
               <option value="<?=$agent['user_id']?>"><?=htmlentities($agent['user_name'])?></option>
              <?php } ?>
            <?php } ?>
          </select> 
          <label for="priority">Priority:</label>
          <select id="priority" name="priority">
            <option value='Low' selected>Low</option>
            <option value='Medium'>Medium</option>
            <option value='High'>High</option>
          </select> 
          <label for="hashtag">Hashtag:</label>
          <input id="hashtag" type="text" id="hashtag" name="hashtag" autocomplete="ON" value="<?=$ticket['hashtag_name']?>">
          <label for="inquiry">Inquiry:</label>
          <textarea id="inquiry" name="inquiry" rows="5" cols="60"></textarea>
          <div class="profile-buttons">
          <input type="submit" value="Save Changes">
            <a href="../pages/trackTicket.php?id=<?=$ticket['ticket_id']?>" class="profile-btn">Cancel</a>
          </div>
        </form>
      </div>
    <?php } else { ?>
    <div class="container" id="track_ticket">
      <h2>Ticket</h2>
      <div class="profile-info">
        <p><strong>ID:</strong> <?=$ticket['ticket_id']?></p>
        <p><strong>Subject:</strong> <?=htmlentities($ticket['ticket_subject'])?></p>
        <p><strong>Description:</strong> <?=htmlentities($ticket['ticket_description'])?></p>
        <p><strong>Client:</strong> <?=htmlentities($ticket['user_name'])?></p>
        <p><strong>Created At:</strong> <?=htmlentities($ticket['created_at'])?></p>
        <p><strong>Updated At:</strong> <?=$ticket['updated_at']?></p>
        <p><strong>Status:</strong> <?=htmlentities($ticket['status_name'])?></p>
        <p><strong>Department:</strong> <?=$ticket['depart_name']?></p>
        <p><strong>Assigned To:</strong> <?=$ticket['AgentName']?></p>
        <p><strong>Priority:</strong> <?=$ticket['ticket_priority']?></p>
        <p><strong>Hashtag:</strong> <?=$ticket['hashtag_name']?></p>
      </div>
      <div class="profile-buttons">
        <a href="../pages/trackTicket.php?id=<?=$ticket['ticket_id']?>&edit" class="profile-btn">Edit Ticket</a>
        <a href="../pages/listTickets.php" class="profile-btn">Back</a>
      </div>
  </div>
    <?php } ?>
  <?php } ?>

<?php function output_trackTicket($ticket) { ?>
  <div class="container" id="track_ticket">
      <h2>Ticket</h2>
      <div class="profile-info">
        <p><strong>ID:</strong> <?=$ticket['ticket_id']?></p>
        <p><strong>Subject:</strong> <?=htmlentities($ticket['ticket_subject'])?></p>
        <p><strong>Description:</strong> <?=htmlentities($ticket['ticket_description'])?></p>
        <p><strong>Status:</strong> <?=htmlentities($ticket['status_name'])?></p>
        <p><strong>Department:</strong> <?=$ticket['depart_name']?></p>
        <p><strong>Created At:</strong> <?=$ticket['created_at']?></p>
        <p><strong>Updated At:</strong> <?=$ticket['updated_at']?></p>
      </div>
      <div class="profile-buttons">
        <a href="../pages/listTickets.php" class="profile-btn">Back</a>
      </div>
  </div>
  <?php } ?>

  <?php

function output_trackTicketQuestions($questions, $answers)
{
    ?>
    <div class="container" id="track_ticket">
        <h2>Ticket Questions</h2>
        <?php if (!empty($answers)) { ?>
            <?php foreach ($questions as $key => $question) { ?>
                <div class="question">
                    <p><strong>Question:</strong> <?= htmlentities($question) ?></p>
                    <?php if (isset($answers[$key])) { ?>
                        <p><strong>Answer:</strong> <?= htmlentities($answers[$key]) ?></p>
                    <?php } ?>
                </div>
            <?php } ?>
        <?php } else { ?>
            <p>No answers available.</p>
        <?php } ?>
    </div>
    <?php
}


