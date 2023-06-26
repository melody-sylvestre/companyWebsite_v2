<?php
declare(strict_types=1);

use Slim\App;
use Slim\Http\Response as Response;
use Slim\Http\ServerRequest as Request;

use App\Models\BannerImageModel;
use App\Controllers\ContactMessageController;

return function (App $app) {
    $container = $app->getContainer();

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

};
