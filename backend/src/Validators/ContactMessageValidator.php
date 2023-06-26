<?php

namespace App\Validators;

class ContactMessageValidator 
{
    const MAX_STRING_LENGTH = 50;
    const MAX_MESSAGE_LENGTH = 2000;

    public static function validateFullName (array $contactMessage) : bool
    {
        if($contactMessage["FullName"]!=="" && strlen($contactMessage["FullName"])<= self::MAX_STRING_LENGTH) {
           return true; 
        } else {
            throw new \Exception("Invalid FullName"); 
        }
    }

    public static function validateEmailAddress (array $contactMessage) : bool
    {
        if(filter_var($contactMessage["EmailAddress"], FILTER_VALIDATE_EMAIL)){
            return true;
        } else {
            throw new \Exception("Invalid EmailAddress"); 
        }       
    }

    public static function validatePhoneNumber1 (array $contactMessage) : bool
    {
        $phoneNumberRegex = "/^\+(?:[0-9]\x20?){6,14}[0-9]$/";
        if(preg_match($phoneNumberRegex, $contactMessage["PhoneNumber1"])){
            return true;
        } else {
            throw new \Exception("Invalid PhoneNumber1"); 
        }       
    }
    
    public static function validateAdditionalPhoneNumber (string $phoneNumber) : bool
    {
        if($phoneNumber === ""){
            return true;
        } else {
            $phoneNumberRegex = "/^\+(?:[0-9]\x20?){6,14}[0-9]$/";
            if(preg_match($phoneNumberRegex,$phoneNumber)){
                return true;
            } else {
                throw new \Exception("Invalid additional phone number"); 
            }     
        }
    }

    public static function validateMessageText (array $contactMessage) : bool
    {

        if( strlen($contactMessage["MessageText"]) > 0 && strlen($contactMessage["MessageText"]) <= self::MAX_MESSAGE_LENGTH) {
            return true;
        } else {
            throw new \Exception("Invalid MessageText");   
        } 
    }

    public static function validatebIncludeAddressDetails (array $contactMessage) : bool
    {
        if ($contactMessage["bIncludeAddressDetails"] == "0" || $contactMessage["bIncludeAddressDetails"] == "1"){
            return true;
        } else {
            throw new \Exception("Invalid bIncludeAddressDetails");
        }
    }

    public static function validateAddressLine1(array $contactMessage): bool
    {
        if($contactMessage["bIncludeAddressDetails"] === "0") {
        
            if( strlen($contactMessage["AddressLine1"])=== 0 ) {
                return true;
            
            } else {
                throw new \Exception("Invalid bIncludeAddressDetails or AddressLine1");   
            
            }         
        } else {
            #checking that there are no special characters and no punctuations
            if(strlen($contactMessage["AddressLine1"]) > 0 && strlen($contactMessage["AddressLine1"]) <= self::MAX_STRING_LENGTH && !preg_match("/[^a-zA-Z\d\s]/", $contactMessage["AddressLine1"])) {
                return true;
            
            } else {
                throw new \Exception("Invalid AddressLine1");   
            }      
        }                
    }
    

    public static function validateAddressLine2 (array $contactMessage): bool
    {
        if($contactMessage["bIncludeAddressDetails"] === "0") {
        
            if( strlen($contactMessage["AddressLine2"]) !== 0 ) {
                throw new \Exception("Invalid bIncludeAddressDetails or AddressLine2");    
            
            } else {
                return true;
            
            }  
            
        } else {
            if (strlen($contactMessage["AddressLine2"]) === 0) {
             return true; 
            
            } else if (strlen($contactMessage["AddressLine2"]) <= self::MAX_STRING_LENGTH && !preg_match("/[^a-zA-Z\d\s]/", $contactMessage["AddressLine1"])) {
                return true;
            
            } else {
                throw new \Exception("Invalid AddressLine2");
            }
                  
        }         
    }

    public static function validateCityTown (array $contactMessage): bool
    {
        if($contactMessage["bIncludeAddressDetails"] === "0") {
        
            if( strlen($contactMessage["CityTown"])=== 0 ) {
                return true;
            
            } else {
                throw new \Exception("Invalid bIncludeAddressDetails or CityTown");   
            
            }         
        } else {
            // checking that City/Town field does not contain digits or special characters except -
            if(strlen($contactMessage["CityTown"]) > 0 && strlen($contactMessage["CityTown"]) <= self::MAX_STRING_LENGTH && !preg_match("/[^a-zA-z\s\-]/", $contactMessage["CityTown"])) {
                return true;
            
            } else {
                throw new \Exception("Invalid CityTown");   
            }      
        }
    }

    public static function validateStateCounty (array $contactMessage): bool
    {
        if($contactMessage["bIncludeAddressDetails"] === "0") {
        
            if( strlen($contactMessage["StateCounty"])=== 0 ) {
                return true;
            
            } else {
                throw new \Exception("Invalid bIncludeAddressDetails or StateCounty");   
            
            }         
        } else {
            // checking that State/County field does not contain any digit or special character except -
            if(strlen($contactMessage["StateCounty"]) > 0 && strlen($contactMessage["StateCounty"]) <= self::MAX_STRING_LENGTH && !preg_match("/[^a-zA-z\s\-]/", $contactMessage["StateCounty"])) {
                return true;
            
            } else {
                throw new \Exception("Invalid StateCounty");   
            }      
        }
    }

    public static function validatePostcode (array $contactMessage): bool 
    {
        if($contactMessage["bIncludeAddressDetails"] === "0") {
        
            if( strlen($contactMessage["Postcode"])=== 0 ) {
                return true;
            
            } else {
                throw new \Exception("Invalid bIncludeAddressDetails or Postcode");   
            
            }         
        } else {
            // checking that State/County field does not contain any special characters except -
            if(strlen($contactMessage["Postcode"]) > 0 && strlen($contactMessage["Postcode"]) <= self::MAX_STRING_LENGTH && !preg_match("/[^a-zA-Z\d\s\-]/", $contactMessage["Postcode"])) {
                return true;
            
            } else {
                throw new \Exception("Invalid Postcode");   
            }      
        }   
    }

    public static function validateCountry (array $contactMessage): bool
    {
        if($contactMessage["bIncludeAddressDetails"] === "0") {
        
            if( strlen($contactMessage["Country"])=== 0 ) {
                return true;
            
            } else {
                throw new \Exception("Invalid bIncludeAddressDetails or Country");   
            
            }         
        } else {
            // checking that Country field does not contain digits or special characters except -
            if(strlen($contactMessage["Country"]) > 0 && strlen($contactMessage["Country"]) <= self::MAX_STRING_LENGTH && !preg_match("/[^a-zA-z\s\-]/", $contactMessage["Country"])) {
                return true;
            
            } else {
                throw new \Exception("Invalid Country");   
            }      
        }
    }
}