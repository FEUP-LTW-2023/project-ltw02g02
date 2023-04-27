<?php
declare(strict_types = 1);

class User {
    public int $id;
    public string $name;
    public string $username;
    public string $email;
    public string $type;
    public string $department;

    public function __construct($id, $name, $username, $email) {
        $this->id = $id;
        $this->name = $name;
        $this->username = $username;
        $this->email = $email;
      }
}
?>