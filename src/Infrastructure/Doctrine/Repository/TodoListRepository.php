<?php

namespace App\Infrastructure\Doctrine\Repository;

use App\Domain\Exception\NotFoundException;
use App\Domain\TodoList;
use Doctrine\ORM\EntityManagerInterface;
use \App\Domain\TodoListRepository as TodoListRepositoryInterface;

class TodoListRepository implements TodoListRepositoryInterface
{
    private $em;

    /**
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @param TodoList $list
     */
    public function add(TodoList $list)
    {
        $this->em->persist($list);
    }

    /**
     * @param int $id
     * @return TodoList
     */
    public function getTodoList($id)
    {
        $todoList = $this->em->find(TodoList::class, $id);
        if (!$todoList) {
            throw new NotFoundException(sprintf('Todo List with ID %d not found', $id));
        }

        return $todoList;
    }

    public function getAllTodoLists()
    {
        return $this->em->getRepository(TodoList::class)->findAll();
    }
}
