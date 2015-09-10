<?php

namespace App\Application;

use App\Application\DTO\AddTaskRequest;
use App\Application\DTO\CreateTodoListRequest;
use App\Application\DTO\MarkTaskDoneRequest;
use App\Application\DTO\RemoveTaskRequest;
use App\Application\DTO\TodoListRequest;
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

    public function createTodoList(CreateTodoListRequest $request)
    {
        $todoList = new TodoList($request->getName());
        $this->todoListRepository->add($todoList);

        return $todoList->toArrayWithTasks();
    }

    public function addTask(AddTaskRequest $request)
    {
        $todoList = $this->getTaskList($request);;
        $todoList->addTask($request->getTaskDescription());

        return $todoList->toArrayWithTasks();
    }

    public function removeTask(RemoveTaskRequest $request)
    {
        $todoList = $this->getTaskList($request);;
        $todoList->removeTask($request->getTaskId());

        return $todoList->toArrayWithTasks();
    }

    public function markTaskAsDone(MarkTaskDoneRequest $request)
    {
        $todoList = $this->getTaskList($request);

        return $todoList->toArrayWithTasks();
    }

    private function getTaskList(TodoListRequest $request)
    {
        return $this->todoListRepository->getTodoList($request->getTodoListId());
    }
}
