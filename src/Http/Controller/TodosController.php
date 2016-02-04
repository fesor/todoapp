<?php

namespace App\Http\Controller;

use App\Domain\Command\AddTaskCommand;
use App\Domain\Command\CreateTodoListCommand;
use App\Domain\Command\MarkTaskDoneCommand;
use App\Domain\Command\RemoveTaskCommand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class TodosController extends Controller
{

    /**
     * @Route("todos")
     * @Method("GET")
     */
    public function getTodoListsAction()
    {
        return $this->view(
            $this->todoListManager()->getAllTodoLists(),
            200
        );
    }

    /**
     * @Route("todos")
     * @Method("POST")
     */
    public function createTodoListAction(Request $request)
    {
        $response = $this->todoListManager()->createTodoList(
            new CreateTodoListCommand(
                $request->get('name')
            )
        );

        $this->flush();

        return $this->view($response, 201);
    }

    /**
     * @Route("todos/{todoListID}/tasks")
     * @Method("POST")
     */
    public function addTaskAction(Request $request, $todoListID)
    {

        $response = $this->todoListManager()->addTask(new AddTaskCommand(
            $todoListID,
            $request->get('description')
        ));

        $this->flush();

        return $this->view($response, 201);
    }

    /**
     * @Route("todos/{todoListID}/tasks/{taskID}")
     * @Method("DELETE")
     */
    public function removeTaskAction($todoListID, $taskID)
    {
        $result = $this->todoListManager()->removeTask(new RemoveTaskCommand(
            $todoListID, $taskID
        ));

        $this->flush();

        return $this->view($result, 200);
    }

    /**
     * This is a little more like JSON RPC method... sorry
     *
     * @Route("todos/{todoListID}/tasks/{taskID}/done")
     * @Method("POST")
     */
    public function markTaskDoneAction(int $todoListID, string $taskID)
    {
        $response = $this->todoListManager()->markTaskAsDone(new MarkTaskDoneCommand(
            $todoListID, $taskID
        ));

        $this->flush();

        return $this->view($response, 200);
    }

    private function view($data, $status)
    {
        return new JsonResponse($data, $status);
    }

    private function flush()
    {
        $this->get('doctrine.orm.entity_manager')->flush();
    }

    private function todoListManager()
    {
        return $this->get('todo_list_manager');
    }
}
