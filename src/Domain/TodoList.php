<?php

namespace App\Domain;

use App\Domain\Criteria\PendingTaskCriteria;
use App\Domain\Criteria\TaskByIDCriteria;
use App\Domain\Exception\NotFoundException;
use Doctrine\Common\Collections\ArrayCollection;

class TodoList
{
    private $id;

    private $name;

    private $tasks;

    public function __construct($name)
    {
        $this->name = $name;
        $this->tasks = new ArrayCollection();
    }

    public function addTask($description)
    {
        $task = new Task($this, $description);
        $this->tasks->add($task);

        return $task;
    }

    public function markTaskDone($id)
    {
        $task = $this->getTaskByID($id);
        $task->done();
    }

    public function removeTask($id)
    {
        $task = $this->getTaskByID($id);
        $this->tasks->removeElement($task);
    }

    public function countTasks()
    {
        return $this->tasks->count();
    }

    public function countPendingTasks()
    {
        return $this->tasks->matching(new PendingTaskCriteria())->count();
    }

    public function toArrayWithTasks()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'tasks' => array_map(function (Task $task) {

                return $task->toArray();
            }, $this->tasks->toArray())
        ];
    }

    private function getTaskByID($id)
    {
        $task = $this->tasks->matching(new TaskByIDCriteria($id))->first();
        if (false === $task) {
            throw new NotFoundException(sprintf('Task with id "%d" not found in todo list', $id));
        }

        return $task;
    }

}