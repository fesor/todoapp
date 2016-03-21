<?php


namespace Todoapp\Entity\TaskList;

class TaskList
{

    private $name;
    private $tasks;

    public function __construct($name)
    {
        $this->name = $name;
        $this->tasks = [];
    }

    public function addTask(string $name, string $description, string $priority = 'none')
    {
        $this->tasks[] = Task::create($name, $description, $priority);
    }

    public function countPendingTasks()
    {
        return count($this->tasks);
    }

    public function getTasks()
    {
        $tasks = $this->tasks;
        usort($tasks, function (Task $a, Task $b) {
            return $a->comparePriority($b);
        });

        return $tasks;
    }


}
