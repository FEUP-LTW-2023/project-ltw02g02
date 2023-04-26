<?php 
    declare(strict_types = 1);
?>

<?php function output_adminControl($clients, $departments, $agents) { ?>
    <div class="admin-container">
        <h2>Upgrade Client</h2>
        <form action="../actions/upgradeClient.action.php" method="post">
            <label for="client_id">Client:</label>
            <select id="client_id" name="client_id" required>
                <option value=""></option>
                <?php foreach ($clients as $client) { ?>
                <option value="<?=$client['user_id']?>"><?=$client['user_name']?></option>
                <?php } ?>
            </select>

            <label for="user_type">User Type:</label>
            <select id="user_type" name="user_type" required>
                <option value=""></option>
                <option value="Agent">Agent</option>
                <option value="Admin">Admin</option>
            </select>

            <input type="submit" value="Upgrade">
        </form>
    </div>

    <div class="admin-container">
        <h2>Add New Entities</h2>
        <form action="../actions/addEntity.action.php" method="post">
            <label for="entity_type">Entity Type:</label>
            <select id="entity_type" name="entity_type" required>
                <option value=""></option>
                <option value="department">Department</option>
                <option value="status">Status</option>
                <option value="hashtag">Hashtag</option>
            </select>

            <label for="entity_name">Entity Name:</label>
            <input type="text" id="entity_name" name="entity_name" required>

            <input type="submit" value="Add">
        </form>
    </div>

    <div class="admin-container">
        <h2>Assign Agents to Departments</h2>
        <form action="../actions/assignAgent.action.php" method="post">
            <label for="department_id">Department:</label>
            <select id="department_id" name="department_id" required>
                <option value=""></option>
                <?php foreach ($departments as $department) { ?>
                <option value="<?=$department['depart_id']?>"><?=$department['depart_name']?></option>
                <?php } ?>
            </select>

            <label for="agent_ids">Agents:</label>
            <select multiple id="agent_ids" name="agent_ids[]" required>
            <?php foreach ($agents as $agent) { 
                if ($agent['user_type'] != 'Admin') { ?>
                <option value="<?=$agent['user_id']?>"><?=$agent['user_name']?></option>
                <?php } ?>
            <?php } ?>
            </select>

            <input type="submit" value="Assign">
        </form>
    </div>
    
<?php } ?>
