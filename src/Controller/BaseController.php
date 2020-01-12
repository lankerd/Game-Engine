<?php

namespace App\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations\Post;
use Lankerd\GroundworkBundle\Handler\DataHandler;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @author Julian Lankerd <julian@corephp.com>
 */
class BaseController extends AbstractFOSRestController
{
    protected $dataHandler;

    public function __construct(DataHandler $dataHandler) {
        /**
         * Initialize GroundworkBundle object handler into the controller.
         */
        $this->dataHandler = $dataHandler;
    }


    /**
     * @Post("/manage/data")
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return JsonResponse
     */
    public function manageData(Request $request): JsonResponse
    {
        return $this->json($this->dataHandler->requestHandler($request));
    }
}
