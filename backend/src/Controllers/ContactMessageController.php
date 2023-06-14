<?php

namespace App\Controllers;

use Slim\Http\Response as Response;
use Slim\Http\ServerRequest as Request;

use App\Models\ContactMessageModel;

class ContactMessageController{

    private ContactMessageModel $ContactMessageModel;

    public function __construct(ContactMessageModel $contactMessageModel)
    {
        $this->ContactMessageModel = $contactMessageModel;
    }

    public function __invoke (Request $request, Response $response, $args) 
    {
        $requestBody = $request->getParsedBody();
        // echo $requestBody;
        //sanitise & validate

        $validContactMessage = $requestBody;

        //post request and return code
        $this->ContactMessageModel->postContactMessage($validContactMessage);
        
        //generate response with the right format
        return $response->withStatus(200)->withJson($validContactMessage);

        // error handling
        
    }
}