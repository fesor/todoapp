<?php

namespace spec\App\Domain;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TodoListSpec extends ObjectBehavior
{
    private $firstTask;

    function let()
    {
        $this->beConstructedWith('example');
        $this->firstTask = $this->addTask('task 1');
    }

    function it_adds_tasks()
    {
        $this->countTasks()->shouldReturn(1);
        $this->addTask('task 2');
        $this->countTasks()->shouldReturn(2);
    }

    function it_removed_tasks_from_list()
    {
        $this->removeTask($this->firstTask->getId());
        $this->countTasks()->shouldReturn(0);
    }

    function it_marks_task_done()
    {
        $this->countPendingTasks()->shouldReturn(1);
        $this->markTaskDone($this->firstTask->getId());
        $this->countPendingTasks()->shouldReturn(0);
    }
}
