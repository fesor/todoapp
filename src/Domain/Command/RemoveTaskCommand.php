<?php

namespace App\Domain\Command;

class RemoveTaskCommand
{
    public $taskListID;

    public $taskId;

    /**
     * RemoveTaskCommand constructor.
     * @param string $taskId
     */
    public function __construct(int $taskListID, string $taskId)
    {
        $this->taskListID = $taskListID;
        $this->taskId = $taskId;
    }


}
