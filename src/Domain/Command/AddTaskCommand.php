<?php

namespace App\Domain\Command;

class AddTaskCommand
{
    public $taskListID;
    public $description;

    /**
     * AddTaskCommand constructor.
     * @param int $taskListID
     * @param string $description
     */
    public function __construct(int $taskListID, string $description)
    {
        $this->taskListID = $taskListID;
        $this->description = $description;
    }

}
