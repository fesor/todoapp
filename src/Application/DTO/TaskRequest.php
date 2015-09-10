<?php

namespace App\Application\DTO;

class TaskRequest extends TodoListRequest
{
    private $taskID;

    public function __construct($todoListID, $taskID)
    {
        $this->taskID = (int) $taskID;
        parent::__construct($todoListID);
    }

    /**
     * @return int
     */
    public function getTaskID()
    {
        return $this->taskID;
    }
}
