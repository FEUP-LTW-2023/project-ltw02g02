<?php
declare(strict_types = 1);

class Ticket {
    public int $ticket_id;
    public string $subject;
    public string $description;
    public ?string $priority;
    public ?int $status_id;
    public ?int $hashtag_id;
    public ?int $depart_id;
    public int $user_id;
    public ?int $agent_id;
    public ?DateTime $create_at;
    public ?DateTime $update_at;

    public function __construct($subject, $description, $depart_id, $user_id) {
        $this->subject = $subject;
        $this->description = $description;
        $this->depart_id = $depart_id;
        $this->user_id = $user_id;
    }
}