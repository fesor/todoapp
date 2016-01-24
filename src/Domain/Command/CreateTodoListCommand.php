<?php

namespace App\Domain\Command;

class CreateTodoListCommand
{
    public $name;

    /**
     * CreateTodoListCommand constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }
}
