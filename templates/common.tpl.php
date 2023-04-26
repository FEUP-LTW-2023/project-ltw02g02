<?php 
    declare(strict_types = 1);
?>

<?php function output_header() { ?>
    <!DOCTYPE html>
    <html lang="en-US">
        <head>    
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>TV Solution</title>
            <link href="../css/style.css" rel="stylesheet">
            <link href="../css/layout.css" rel="stylesheet">
            <link href="../css/forms.css" rel="stylesheet">
        </head>
        <body>
            <header>
                <h1><a href="/"><span class="title__part1">TV</span> <span class="title__part2">Solution</span></a></h1>
                <nav>
                    <ul class="menu-items">
                    <li><a href="../main/main.html">Home</a></li>
                    <?php if (isset($_SESSION['user_id'])) { ?>
                    <li class="dropdown">
                        <a href="#">Ticket</a>
                        <ul class="dropdown-menu">
                            <li><a href="../pages/createTicket.php">Create</a></li>
                            <li><a href="../pages/listTickets.php">List</a></li>
                        </ul>
                    </li>
                    <?php } ?>
                    <li><a href="../pages/index.php">About</a></li>
                    <li><a href="../pages/index.php">Contact</a></li>
                    <?php if (isset($_SESSION['user_id'])) { ?>
                        <li><a href="../pages/profile.php">Account</a></li>
                        <?php } else { ?>
                        <li><a href="../pages/login.php">Account</a></li>
                        <?php } ?>
                    </ul>
                </nav>
            </header>
            <main>
<?php } ?>

<?php function output_footer() { ?>
        </main>
            <footer class="main-footer">
            <p class="footer__text"> Copyright 2023 &copy; TV Solution</p>   
            <a href="../pages/index.php" class="footer__link">Privacy Policy</a>
			<a href="../pages/index.php" class="footer__link">Terms of Service</a>
            </footer>
        </body>
    </html>
<?php } ?>