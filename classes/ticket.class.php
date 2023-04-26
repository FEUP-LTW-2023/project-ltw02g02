<?php
declare(strict_types = 1);

class Ticket {
    public ?int $ticket_id;
    public ?string $subject;
    public ?string $description;
    public ?string $priority;
    public ?int $status_id;
    public ?string $hashtag;
    public ?int $depart_id;
    public ?int $user_id;
    public ?int $agent_id;
    public ?DateTime $created_at;
    public ?DateTime $updated_at;

    public function __construct($ticket_id = null, $subject = null, $description = null, $status_id = null, $depart_id = null, $user_id = null, $agent_id = null, $priority = null, $hashtag = null, $created_at = null, $updated_at = null) {
        $this->subject = $subject;
        $this->description = $description;
        $this->depart_id = $depart_id;
        $this->user_id = $user_id;
        $this->ticket_id = $ticket_id;
        $this->status_id = $status_id;
        $this->depart_id = $depart_id;
        $this->agent_id = $agent_id;
        $this->priority = $priority;
        $this->hashtag = $hashtag;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }
}