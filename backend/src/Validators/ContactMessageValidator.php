<?php

namespace App\Validators;

use phpDocumentor\Reflection\Types\Boolean;

class ContactMessageValidator 
{
    const MAX_STRING_LENGTH = 50;
    const MAX_MESSAGE_LENGTH = 2000;

    // validators either return true or throw invalidFormException
    public static function validateFullName (array $contactMessage) : boolean
    {
        // check if FullName is not empty and < max_string_length
    }

    public static function validateEmailAddress (array $contactMessage) : boolean
    {
        // check if email address is valid
    }

    public static function validatePhoneNumber1 (array $contactMessage) : boolean
    {
        // if phoneNumber is not empty -  check if valid (only a set numbers of digits  including prefix - 10max?)
    }
    
    public static function validatePhoneNumber2 (array $contactMessage) : boolean
    {
        // if phoneNumber is not empty -  check if valid (only a set numbers of digits  including prefix - 10max?)
    }

    public static function validatePhoneNumber3 (array $contactMessage) : boolean
    {
        // if phoneNumber is not empty -  check if valid (only a set numbers of digits  including prefix - 10max?)
    }

    public static function validateMessageText (array $contactMessage) : boolean
    {
        // should not be empty and should be less than set Length
    }

    public static function validatebIncludeAddressDetails (array $contactMessage) : boolean
    {
        //should be 0 or 1
    }

    public static function validateAddressLine1(array $contactMessage): boolean 
    {
        // check that bIncludeAddressDetails is true
        // should not be empty
        // check that AddressLine1 contains only alpha numeric characters
    }

    public static function validateAddressLine2 (array $contactMessage): boolean 
    {
        // check that bIncludeAddressDetails is true
        // check that if non empty AddressLine2 contains only alpha numeric characters
    }

    public static function validateCityTown (array $contactMessage): boolean 
    {
        // check that bIncludeAddressDetails is true
        //should be non empty, only letters and not longert than set Length
    }

    public static function validateStateCounty (array $contactMessage): boolean 
    {
        // check that bIncludeAddressDetails is true
        //if non empty, should be only letters and not longerthan set Length
    }

    public static function validatePostcode (array $contactMessage): boolean 
    {
        // check that bIncludeAddressDetails is true
        //should not be empty, should be only letters and digits and not longer than set Length
    }

    public static function validateCountry (array $contactMessage): boolean 
    {
        // check that bIncludeAddressDetails is true
        // should not be empty, should be only letters and not longer than set Length
    }
}