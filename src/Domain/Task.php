<?php

namespace App\Domain;

use EndyJasmi\Cuid;

class Task
{
    const STATUS_PENDING = 'pending';

    const STATUS_DONE = 'done';

    private $id;

    private $todoList;

    private $description;

    private $createdAt;

    private $status;

    public function __construct(TodoList $todoList, string $description)
    {
        $this->id = Cuid::slug();
        $this->todoList = $todoList;
        $this->description = $description;
        $this->createdAt = new \DateTime();
        $this->status = self::STATUS_PENDING;
    }

    public function getId() : string
    {
        return $this->id;
    }

    public function isPending() : bool
    {
        return $this->status === self::STATUS_PENDING;
    }

    public function isDone() : bool
    {
        return $this->status === self::STATUS_DONE;
    }

    public function done()
    {
        $this->status = self::STATUS_DONE;
    }

    public function toArray() : array
    {
        return [
            'id' => $this->id,
            'description' => $this->description,
            'created_at' => clone $this->createdAt,
            'status' => $this->status
        ];
    }

}
