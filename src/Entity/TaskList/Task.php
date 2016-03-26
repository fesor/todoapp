<?php

namespace Todoapp\Entity\TaskList;

use Todoapp\Entity\TaskList\TaskPriority;

class Task
{
    private $name;
    private $description;
    private $priority;

    private function __construct(string $name, string $description, TaskPriority $priority)
    {
        $this->name = $name;
        $this->description = $description;
        $this->priority = $priority;
    }

    public static function create(string $name, string $description, string $priority = 'none')
    {
        return new static(
            $name,
            $description,
            TaskPriority::fromString($priority)
        );
    }

    public function getName() : string
    {
        return $this->name;
    }

    public static function comparePriority(Task $a, Task $b)
    {
        return TaskPriority::compare($b->priority, $a->priority);
    }
}
