<?php

namespace spec\Todoapp\Entity\TaskList;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Todoapp\Entity\TaskList\Task;

class TaskListSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('work');
    }

    function it_allows_to_add_tasks()
    {
        $this->addTask('name', 'description');
        $this->countPendingTasks()->shouldReturn(1);
    }

    function it_allows_only_certain_priorities()
    {
        $this->shouldThrow()->duringAddTask('name', 'description', 'super urgent!');
    }

    function it_sorts_tasks_by_priority()
    {
        $this->addTask('task 1', 'description', 'low');
        $this->addTask('task 2', 'description', 'high');

        $this->countPendingTasks()->shouldReturn(2);
        $this->getTasks()->shouldReturnOrderedTasks([
            'task 2', 'task 1'
        ]);
    }

    function getMatchers()
    {
        return [
            'returnOrderedTasks' => function ($tasks, $expectedNames) {
                $names = array_map(function (Task $task) {
                    return $task->getName();
                }, $tasks);

                return $names == $expectedNames;
            }
        ];
    }
}
