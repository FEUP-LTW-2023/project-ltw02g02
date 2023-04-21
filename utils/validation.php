<?php  

    function name_validation(string $name): bool {
        $min_length = 2;
        $max_length = 50;

        $allowed_chars = '/^[a-zA-Z\s]+$/';
        $username = trim($name);

        $length = strlen($name);
        if ($length < $min_length || $length > $max_length) {
          return false;
        }

        if (!preg_match($allowed_chars, $name)) {
            return false;
        }

        return true;
    }

    function username_validation(string $username): bool {
        $min_length = 3;
        $max_length = 20;

        $allowed_chars = '/^[a-z][a-z0-9_]*$/';

        $length = strlen($username);
        if ($length < $min_length || $length > $max_length) {
          return false;
        }

        if (!preg_match($allowed_chars, $username)) {
            return false;
        }

        return true;
    }

    function email_validation(string $email): bool {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }

        return false;
    }

    function password_validation(string $password): bool {
        if (strlen($password) < 8) {
            return false;
        }

        /*if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).+$/', $password)) {
            return false;
        }*/

        return true;
    }

    function upgrade_validation(string $user_type): bool {

    }

    function department_validation(string $department): bool {

    }

    function ticketStatus_validation(string $status): bool {

    }

    function hashtag_validation(string $hashtag): bool {

    }

?>