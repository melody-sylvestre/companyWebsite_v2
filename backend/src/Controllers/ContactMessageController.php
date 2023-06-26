<?php

namespace App\Controllers;

use Slim\Http\Response as Response;
use Slim\Http\ServerRequest as Request;

use App\Models\ContactMessageModel;
use App\Sanitisers\ContactMessageSanitiser;
use App\Validators\ContactMessageValidator;

class ContactMessageController
{

    private ContactMessageModel $ContactMessageModel;

    public function __construct(ContactMessageModel $contactMessageModel)
    {
        $this->ContactMessageModel = $contactMessageModel;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        $requestBody = $request->getParsedBody();
        $sanitisedContactMessageForm = [];

        foreach ($requestBody as $fieldName => $fieldValue){
            $sanitisedContactMessageForm[$fieldName] = ContactMessageSanitiser::stringSanitiser($fieldValue);
        }
        try {
            $fullNameIsValid = ContactMessageValidator::validateFullName($sanitisedContactMessageForm);
            $EmailAddresIsValid = ContactMessageValidator::validateEmailAddress($sanitisedContactMessageForm);
            $PhoneNumber1IsValid = ContactMessageValidator::validatePhoneNumber1($sanitisedContactMessageForm);
            $PhoneNumber2IsValid = ContactMessageValidator::validateAdditionalPhoneNumber($sanitisedContactMessageForm["PhoneNumber2"]);
            $PhoneNumber3IsValid = ContactMessageValidator::validateAdditionalPhoneNumber($sanitisedContactMessageForm["PhoneNumber3"]);
            $MessageTextIsValid = ContactMessageValidator::validateMessageText($sanitisedContactMessageForm);
            $bIncludeAddressDetailsIsValid = ContactMessageValidator::validatebIncludeAddressDetails($sanitisedContactMessageForm);
            $AddressLine1IsValid = ContactMessageValidator::validateAddressLine1($sanitisedContactMessageForm);
            $AddressLine2IsValid = ContactMessageValidator::validateAddressLine2($sanitisedContactMessageForm);
            $CityTownIsValid = ContactMessageValidator::validateCityTown($sanitisedContactMessageForm);
            $StateCountyIsValid = ContactMessageValidator::validateStateCounty($sanitisedContactMessageForm);
            $PostcodeIsValid = ContactMessageValidator::validatePostcode($sanitisedContactMessageForm);
            $CountryIsValid = ContactMessageValidator::validateCountry($sanitisedContactMessageForm);
        } catch (\Exception $contactMessageException) {
            error_log($contactMessageException -> getMessage() . "\n", 3, 'logs/serverlog.log'); 
            return $response->withStatus(400);
        }
        
        //post request and return code
        try {
            $this->ContactMessageModel->postContactMessage($sanitisedContactMessageForm);
            return $response->withStatus(200);

        } catch (\Exception $exception) {
            return $response->withStatus(500);
        }
               
    }
}
