<?php

namespace App\Application\DTO;

abstract class TodoListRequest
{

    /**
     * @var int
     */
    private $todoListID;

    /**
     * @param int $todoListID
     */
    public function __construct($todoListID)
    {
        $this->todoListID = (int) $todoListID;
    }

    /**
     * @return int
     */
    public function getTodoListID()
    {
        return $this->todoListID;
    }

}
