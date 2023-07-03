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

        foreach ($requestBody as $fieldName => $fieldValue) {
            if ($fieldName === "bIncludeAddressDetails") {
                $sanitisedContactMessageForm[$fieldName] = $fieldValue;
            } else {
                $sanitisedContactMessageForm[$fieldName] = ContactMessageSanitiser::stringSanitiser($fieldValue);
            }
        }
        try {
            $fullNameIsValid = ContactMessageValidator::validateFullName($sanitisedContactMessageForm);
            $EmailAddresIsValid = ContactMessageValidator::validateEmailAddress($sanitisedContactMessageForm);
            $PhoneNumber1IsValid = ContactMessageValidator::validatePhoneNumber1($sanitisedContactMessageForm);
            $PhoneNumber2IsValid = ContactMessageValidator::validateAdditionalPhoneNumber($sanitisedContactMessageForm["PhoneNumber2"]);
            $PhoneNumber3IsValid = ContactMessageValidator::validateAdditionalPhoneNumber($sanitisedContactMessageForm["PhoneNumber3"]);
            $MessageTextIsValid = ContactMessageValidator::validateMessageText($sanitisedContactMessageForm);
            $bIncludeAddressDetailsIsValid = ContactMessageValidator::validatebIncludeAddressDetails($sanitisedContactMessageForm);

            $mandatoryAddressFields = ["AddressLine1", "CityTown", "Postcode", "Country"];
            $optionalAddressFields = ["AddressLine2", "StateCounty"];

            foreach ($mandatoryAddressFields as $fieldToValidate) {
                $isValid = ContactMessageValidator::validateMandatoryAddressField($sanitisedContactMessageForm, $fieldToValidate);
            }

            foreach ($optionalAddressFields as $fieldToValidate) {
                $isValid = ContactMessageValidator::validateOptionalAddressField($sanitisedContactMessageForm, $fieldToValidate);
            }
        } catch (\Exception $contactMessageException) {
            $message = $contactMessageException->getMessage();
            error_log($message . "\n", 3, '../logs/serverlog.log');
            $responseBody = [
                "Details" => [],
                "Status" => '400',
                "Message" => $message,
            ];
            return $response->withStatus(400)->withJson($responseBody);
        }

        try {
            $this->ContactMessageModel->postContactMessage($sanitisedContactMessageForm);
            $responseBody = [
                "Details" => [],
                "Status" => "200",
                "Message" => "Contact form was successfully sent."
            ];
            return $response->withStatus(200)->withJson($responseBody);
        } catch (\Exception $exception) {
            error_log("Contact form could not be sent due to server error\n", 3, '../logs/serverlog.log');
            $responseBody = [
                "Details" => [],
                "Status" => "500",
                "Message" => "Contact form could not be sent."
            ];
            return $response->withStatus(500)->withJson($responseBody);
        }
    }
}
