<?php

namespace App\Application;

use App\Domain\Command\AddTaskCommand;
use App\Domain\Command\CreateTodoListCommand;
use App\Domain\Command\MarkTaskDoneCommand;
use App\Domain\Command\RemoveTaskCommand;
use App\Domain\TodoList;
use App\Domain\TodoListRepository;

class TodoListManager
{

    /**
     * @var TodoListRepository
     */
    private $todoListRepository;

    public function __construct(TodoListRepository $todoListRepository)
    {
        $this->todoListRepository = $todoListRepository;
    }

    public function getAllTodoLists()
    {
        return array_map(function (TodoList $list) {

            return $list->toArrayWithTasks();
        }, $this->todoListRepository->getAllTodoLists());
    }

    public function createTodoList(CreateTodoListCommand $command)
    {
        $todoList = new TodoList($command->name);
        $this->todoListRepository->add($todoList);

        return $todoList->toArrayWithTasks();
    }

    public function addTask(AddTaskCommand $command)
    {
        $todoList = $this->getTaskList($command->taskListID);
        $todoList->addTask($command->description);

        return $todoList->toArrayWithTasks();
    }

    public function removeTask(RemoveTaskCommand $command)
    {
        $todoList = $this->getTaskList($command->taskListID);
        $todoList->removeTask($command->taskId);

        return $todoList->toArrayWithTasks();
    }

    public function markTaskAsDone(MarkTaskDoneCommand $command)
    {
        $todoList = $this->getTaskList($command->taskListID);
        $todoList->markTaskDone($command->taskId);

        return $todoList->toArrayWithTasks();
    }

    private function getTaskList(int $taskListID)
    {
        return $this->todoListRepository->getTodoList($taskListID);
    }
}
