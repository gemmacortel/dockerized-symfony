<?php
declare(strict_types=1);

namespace App\UI\Rest;

use App\Application\Exceptions\MissingParameterException;
use App\Application\GetMassageHandler;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class GetMassageController
{
    /**
     * @var GetMassageHandler
     */
    private $getMassageHandler;

    public function __construct(GetMassageHandler $getMassageHandler)
    {

        $this->getMassageHandler = $getMassageHandler;
    }

    /**
     * @throws MissingParameterException
     */
    public function __invoke(Request $request): Response
    {

        try{
            $list = $this->getMassageHandler->execute();
            return new Response($list,Response::HTTP_OK);
        } catch(Throwable $exception){
            return new Response('Error', Response::HTTP_INTERNAL_SERVER_ERROR);
        }


    }

}