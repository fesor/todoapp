<?php

namespace App\Api\EventListener;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class RequestDeserializerListener
{

    public function onRequest(GetResponseEvent $event)
    {
        if (!$event->isMasterRequest()) return;

        $request = $event->getRequest();
        if ('json' !== $request->getContentType()) {
            return;
        }

        if ($content = $request->getContent()) {
            $requestData = json_decode($content, true);
            if (null === $requestData && JSON_ERROR_NONE !== json_last_error()) {
                $event->setResponse(new JsonResponse([
                    'error' => true,
                    'message' => json_last_error_msg()
                ], Response::HTTP_BAD_REQUEST));
            }

            $request->request->add($requestData);
        }
    }

}
