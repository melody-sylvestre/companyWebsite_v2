<?php

namespace App\Validators;

use Exception;

class ContactMessageValidator
{
    const MAX_STRING_LENGTH = 50;
    const MAX_MESSAGE_LENGTH = 2000;

    public static function validateFullName(array $contactMessage): bool
    {
        // does not support diacritic characters

        if (!array_key_exists("FullName", $contactMessage)) {
            throw new Exception("contactMessage array must include the key FullName");
        } else {
            if ($contactMessage["FullName"] !== "" && strlen($contactMessage["FullName"]) <= self::MAX_STRING_LENGTH && !preg_match("/[^a-zA-z\s\-]/", $contactMessage["FullName"])) {
                return true;
            } else {
                throw new \Exception("Invalid FullName");
            }
        }
    }

    public static function validateEmailAddress(array $contactMessage): bool
    {
        if (!array_key_exists("EmailAddress", $contactMessage)) {
            throw new Exception("contactMessage array must include the key EmailAddress");
        } else {
            if (filter_var($contactMessage["EmailAddress"], FILTER_VALIDATE_EMAIL)) {
                return true;
            } else {
                throw new \Exception("Invalid EmailAddress");
            }
        }
    }

    public static function validatePhoneNumber1(array $contactMessage): bool
    {
        if (!array_key_exists("PhoneNumber1", $contactMessage)) {
            throw new Exception("contactMessage array must include the key PhoneNumber1");
        } else {
            $phoneNumberRegex = "/^\+(?:[0-9]\x20?){6,14}[0-9]$/";
            if (preg_match($phoneNumberRegex, $contactMessage["PhoneNumber1"])) {
                return true;
            } else {
                throw new \Exception("Invalid PhoneNumber1");
            }
        }
    }

    public static function validateAdditionalPhoneNumber(string $phoneNumber): bool
    {
        if ($phoneNumber === "") {
            return true;
        } else {
            $phoneNumberRegex = "/^\+(?:[0-9]\x20?){6,14}[0-9]$/";
            if (preg_match($phoneNumberRegex, $phoneNumber)) {
                return true;
            } else {
                throw new \Exception("Invalid additional phone number");
            }
        }
    }

    public static function validateMessageText(array $contactMessage): bool
    {
        if (!array_key_exists("MessageText", $contactMessage)) {
            throw new Exception("contactMessage array must include the key MessageText");
        } else {
            if (strlen($contactMessage["MessageText"]) > 0 && strlen($contactMessage["MessageText"]) <= self::MAX_MESSAGE_LENGTH) {
                return true;
            } else {
                throw new \Exception("Invalid MessageText");
            }
        }
    }

    public static function validatebIncludeAddressDetails(array $contactMessage): bool
    {
        if (!array_key_exists("bIncludeAddressDetails", $contactMessage)) {
            throw new Exception("contactMessage array must include the key bIncludeAddressDetails");
        } else {
            if ($contactMessage["bIncludeAddressDetails"] == "0" || $contactMessage["bIncludeAddressDetails"] == "1") {
                return true;
            } else {
                throw new \Exception("Invalid bIncludeAddressDetails");
            }
        }
    }

    public static function validateMandatoryAddressField(array $contactMessage, string $fieldToValidate): bool
    {
        if (!array_key_exists($fieldToValidate, $contactMessage)) {
            throw new Exception("contactMessage array must include the key $fieldToValidate");
        } else {
            if ($contactMessage["bIncludeAddressDetails"] === "0") {
                if (strlen($contactMessage[$fieldToValidate]) === 0) {
                    return true;
                } else {
                    throw new \Exception('Invalid bIncludeAddressDetails or ' . $fieldToValidate);
                }
            } else {
                #checking that there are no special characters and no punctuations
                if (strlen($contactMessage[$fieldToValidate]) > 0 && strlen($contactMessage[$fieldToValidate]) <= self::MAX_STRING_LENGTH && !preg_match("/[^a-zA-Z\d\s\-]/", $contactMessage[$fieldToValidate])) {
                    return true;
                } else {
                    throw new \Exception('Invalid ' . $fieldToValidate);
                }
            }
        }
    }


    public static function validateOptionalAddressField(array $contactMessage, $fieldToValidate): bool
    {
        if (!array_key_exists($fieldToValidate, $contactMessage)) {
            throw new Exception("contactMessage array must include the key $fieldToValidate");
        } else {

            if ($contactMessage["bIncludeAddressDetails"] === "0") {

                if (strlen($contactMessage[$fieldToValidate]) !== 0) {
                    throw new \Exception('Invalid bIncludeAddressDetails or ' . $fieldToValidate);
                } else {
                    return true;
                }
            } else {
                if (strlen($contactMessage[$fieldToValidate]) === 0) {
                    return true;
                } else if (strlen($contactMessage[$fieldToValidate]) <= self::MAX_STRING_LENGTH && !preg_match("/[^a-zA-Z\d\s\-]/", $contactMessage[$fieldToValidate])) {
                    return true;
                } else {
                    throw new \Exception('Invalid ' . $fieldToValidate);
                }
            }
        }
    }
}
