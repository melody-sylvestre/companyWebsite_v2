<?php
declare(strict_types=1);

use Slim\App;
use Slim\Http\Response as Response;
use Slim\Http\ServerRequest as Request;
use Slim\Exception\HttpNotFoundException;

use App\Models\BannerImageModel;
use App\Controllers\ContactMessageController;

return function (App $app) {
    $container = $app->getContainer();
    
    $app->options('/{routes:.+}', function ($request, $response, $args) {
        return $response;
    });
    
    $app->add(function ($request, $handler) {
        $response = $handler->handle($request);
        return $response
                ->withHeader('Access-Control-Allow-Origin', 'http://localhost:3000')
                ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
                ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    });
    

    $app->get('/banner-details',function (Request $request, Response $response, $args) use ($container) {
        $bannerImageModel = $container->get(BannerImageModel::class);
    
        $bannerImages = $bannerImageModel->getAllImages();
        $responseBody = 
        [
            "Details" => $bannerImages, 
            "Status" => "1",
            "Errors" => []
        ];

        return $response->withJson($responseBody)->withStatus(200)->withHeader("Access-Control-Allow-Origin", "*");
        //add error handling for server error (500)
    });
    $app->post('/contact-us', ContactMessageController::class);
    $app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function ($request, $response) {
        throw new HttpNotFoundException($request);
    });
};
