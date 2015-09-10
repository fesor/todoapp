<?php

namespace App\Domain;

interface TodoListRepository
{
    /**
     * @param TodoList $list
     */
    public function add(TodoList $list);

    /**
     * @return TodoList[]
     */
    public function getAllTodoLists();

    /**
     * @param int $id
     * @return TodoList
     */
    public function getTodoList($id);
}
