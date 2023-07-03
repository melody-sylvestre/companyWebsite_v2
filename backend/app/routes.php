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
    
        try {
            $bannerImages = $bannerImageModel->getAllImages();
            $responseBody = 
            [
                "Details" => $bannerImages, 
                "Status" => "200",
                "Message" => "Banner content was successfully retrieved"
            ];

            return $response->withJson($responseBody)->withStatus(200);
        } catch (Exception $exception) {
            error_log("Banner content could not be retrieved due to server error\n", 3, '../logs/serverlog.log');
            $responseBody = 
            [
                "Details" => [], 
                "Status" => "500",
                "Message" => "Internal server error"
            ];

            return $response->withJson($responseBody)->withStatus(500);

        }

    });
    $app->post('/contact-us', ContactMessageController::class);
    $app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function ($request, $response) {
        throw new HttpNotFoundException($request);
    });
};
