<?php

namespace App\Domain\Command;

class MarkTaskDoneCommand
{
    public $taskListID;

    public $taskId;

    public function __construct(int $taskListID, string $taskId)
    {
        $this->taskListID = $taskListID;
        $this->taskId = $taskId;
    }


}
