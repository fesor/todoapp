<?php

namespace App\Domain;

class Task
{
    const STATUS_PENDING = 'pending';

    const STATUS_DONE = 'done';

    private $id;

    private $todoList;

    private $description;

    private $createdAt;

    private $status;

    public function __construct(TodoList $todoList, $description)
    {
        $this->todoList = $todoList;
        $this->description = $description;
        $this->createdAt = new \DateTime();
        $this->status = self::STATUS_PENDING;
    }

    public function done()
    {
        $this->status = self::STATUS_DONE;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'description' => $this->description,
            'created_at' => clone $this->createdAt,
            'status' => $this->status
        ];
    }

}
