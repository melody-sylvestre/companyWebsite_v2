<?php

namespace App\Validators;

use App\Validators\ContactMessageValidator;
use Exception;
use Tests\TestCase;

class ContactMessageValidatorTest extends TestCase
{
    public function testSuccessValidateFullName()
    {
        $testMessageArray = 
        [
            "FullName" => "Jane Doe", 
        ];
        $expectedOutput = true;
        $actualOutput = ContactMessageValidator::validateFullName($testMessageArray);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testFailureValidateFullName_EmptyName()
    {
        $testMessageArray = 
        [
            "FullName" => "", 
        ];
        $this->expectException(Exception::class);
        ContactMessageValidator::validateFullName($testMessageArray);   
    }

    public function testFailureValidateFullName_TooLongName()
    {
        $testMessageArray = 
        [
            "FullName" => "Penelope Jemina Marie-Antoinette Chateau de la Vieille Pendule", 
        ];
        $this->expectException(Exception::class);
        ContactMessageValidator::validateFullName($testMessageArray);   
    }

    public function testFailureValidateFullName_InvalidCharacters()
    {
        $testMessageArray = 
        [
            "FullName" => "J@ne D0e&", 
        ];
        $this->expectException(Exception::class);
        ContactMessageValidator::validateFullName($testMessageArray);   
    }
}

