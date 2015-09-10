<?php

namespace App\Application\DTO;

class AddTaskRequest extends TodoListRequest
{
    private $description;

    public function __construct($todoListID, $description)
    {
        parent::__construct($todoListID);
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getTaskDescription()
    {
        return $this->description;
    }
}
