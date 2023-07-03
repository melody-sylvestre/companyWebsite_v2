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

    public function testFailureValidateFullName_keyNotInArray()
    {
        $testMessageArray = ["randomKey" => "JaneDoe"];
        $this->expectException(Exception::class);
        ContactMessageValidator::validateFullName($testMessageArray);
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

    public function testSuccessValidateEmailAddress()
    {
        $testMessageArray = ["EmailAddress" => "jane.doe@email.com"];
        $expectedOutput = true;
        $actualOutput = ContactMessageValidator::validateEmailAddress($testMessageArray);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testFailureValidateEmailAddress_keyNotInArray()
    {
        $testMessageArray = ["randomKey" =>  "jane.doe@email.com"];
        $this->expectException(Exception::class);
        ContactMessageValidator::validateEmailAddress($testMessageArray);
    }

    public function testFailureValidateEmailAddress_wrongFormat()
    {
        $testMessageArray = ["EmailAddress" => "jane.doeemail.com"];
        $this->expectException(Exception::class);
        ContactMessageValidator::validateEmailAddress($testMessageArray);
    }

    public function testSuccessValidatePhoneNumber1_NoSpaces()
    {
        $testMessageArray = ["PhoneNumber1" => "+44123456789"];
        $expectedOutput = true;
        $actualOutput = ContactMessageValidator::validatePhoneNumber1($testMessageArray);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testSuccessValidatePhoneNumber1_WithSpaces()
    {
        $testMessageArray = ["PhoneNumber1" => "+44 123 456 789"];
        $expectedOutput = true;
        $actualOutput = ContactMessageValidator::validatePhoneNumber1($testMessageArray);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testFailureValidatePhoneNumber1_keyNotInArray()
    {
        $testMessageArray = ["randomKey" => "+44 123 456 789"];
        $this->expectException(Exception::class);
        ContactMessageValidator::validatePhoneNumber1($testMessageArray);
    }

    public function testFailureValidatePhoneNumber1_EmptyString()
    {
        $testMessageArray = ["PhoneNumber1" => ""];
        $this->expectException(Exception::class);
        ContactMessageValidator::validatePhoneNumber1($testMessageArray);
    }

    public function testFailureValidatePhoneNumber1_NoPrefix()
    {
        $testMessageArray = ["PhoneNumber1" => "0123456789"];
        $this->expectException(Exception::class);
        ContactMessageValidator::validatePhoneNumber1($testMessageArray);
    }

    public function testFailureValidatePhoneNumber1_NumberIsTooLong()
    {
        $testMessageArray = ["PhoneNumber1" => "+59012345678912374496"];
        $this->expectException(Exception::class);
        ContactMessageValidator::validatePhoneNumber1($testMessageArray);
    }

    public function testSuccessValidateAdditionalPhoneNumber_Empty()
    {
        $testString = "";
        $expectedOutput = true;
        $actualOutput = ContactMessageValidator::validateAdditionalPhoneNumber($testString);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testSuccessValidateAdditionalPhoneNumber_NoSpaces()
    {
        $testString = "+44123456789";
        $expectedOutput = true;
        $actualOutput = ContactMessageValidator::validateAdditionalPhoneNumber($testString);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testSuccessValidateAdditionalPhoneNumber_WithSpaces()
    {
        $testString = "+44 123 456 789";
        $expectedOutput = true;
        $actualOutput = ContactMessageValidator::validateAdditionalPhoneNumber($testString);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testFailureValidateAdditionalPhoneNumber_NoPrefix()
    {
        $testString = "0123456789";
        $this->expectException(Exception::class);
        ContactMessageValidator::validateAdditionalPhoneNumber($testString);
    }

    public function testFailureValidateAdditionalPhoneNumber_NumberIsTooLong()
    {
        $testString = "+59012345678912374496";
        $this->expectException(Exception::class);
        ContactMessageValidator::validateAdditionalPhoneNumber($testString);
    }

    public function testSuccessValidateMessageText()
    {
        $testMessageArray = ["MessageText" => "This is a valid test message."];

        $expectedOutput = true;
        $actualOutput = ContactMessageValidator::validateMessageText($testMessageArray);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testFailureValidateMessageText_KeyNotInArray()
    {
        $testMessageArray = ["randomKey" => "One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections."];
        $this->expectException(Exception::class);
        ContactMessageValidator::validateMessageText($testMessageArray);
    }

    public function testFailureValidateMessageText_EmptyMessage()
    {
        $testMessageArray = ["MessageText" => ""];

        $this->expectException(Exception::class);
        ContactMessageValidator::validateMessageText($testMessageArray);
    }

    public function testFailureValidateMessageText_MessageIsTooLong()
    {
        $testMessageArray = ["MessageText" => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. Fusce vulputate eleifend sapien. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan lorem in dui. Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In ac dui quis mi consectetuer lacinia. Nam pretium turpis et arcu. Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Sed aliquam ultrices mauris. Integer ante arcu, accumsan a, consectetuer eget, posuere ut, mauris. Praesent adipiscing. Phasellus ullamcorper ipsum rutrum nunc. Nunc nonummy metus. Vestibulum volutpat pretium libero. Cras id dui. Aenean ut eros et nisl sagittis vestibulum. Nullam nulla."];

        $this->expectException(Exception::class);
        ContactMessageValidator::validateMessageText($testMessageArray);
    }

    public function testSuccessValidatebIncludeAddressDetails_0()
    {
        $testMessageArray = ["bIncludeAddressDetails" => 0];
        $expectedOutput = true;
        $actualOutput = ContactMessageValidator::validatebIncludeAddressDetails($testMessageArray);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testSuccessValidatebIncludeAddressDetails_1()
    {
        $testMessageArray = ["bIncludeAddressDetails" => 1];
        $expectedOutput = true;
        $actualOutput = ContactMessageValidator::validatebIncludeAddressDetails($testMessageArray);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testFailureValidateBIncludeAddressDetails_KeyNotInArray()
    {
        $testMessageArray = ["randomKey" => 0];
        $this->expectException(Exception::class);
        ContactMessageValidator::validatebIncludeAddressDetails($testMessageArray);
    }

    public function testFailureValidatebIncludeAddressDetails_otherValue()
    {
        $testMessageArray = ["bIncludeAddressDetails" => 100];
        $this->expectException(Exception::class);
        ContactMessageValidator::validatebIncludeAddressDetails($testMessageArray);
    }

    public function testSuccessValidateMandatoryAddressField_Empty_bIncludeAddressDetails_Is_0()
    {
        $testMessageArray =
            [
                "bIncludeAddressDetails" => 0,
                "AddressField" => ""
            ];
        $fieldToValidate = "AddressField";

        $expectedOutput = true;
        $actualOutput = ContactMessageValidator::validateMandatoryAddressField($testMessageArray, $fieldToValidate);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testFailureValidateMandatoryAddressField_KeyNotInArray()
    {
        $testMessageArray =
            [
                "randomKey" => "0",
                "bIncludeAddressDetails" => 1
            ];
        $fieldToValidate = "AddressLine1";
        $this->expectException(Exception::class);
        ContactMessageValidator::validateMandatoryAddressField($testMessageArray, $fieldToValidate);
    }

    public function testFailureValidateMandatoryAddressField_Empty_bIncludeAddressDetails_Is_1()
    {
        $testMessageArray =
            [
                "bIncludeAddressDetails" => 1,
                "AddressField" => ""
            ];

        $this->expectException(Exception::class);
        ContactMessageValidator::validateMandatoryAddressField($testMessageArray, "AddressField");
    }

    public function testSuccessValidateMandatoryAddressField_ValidLine_bIncludeAddressDetails_Is_1()
    {
        $testMessageArray =
            [
                "bIncludeAddressDetails" => 1,
                "AddressField" => "15 Sesame Street"
            ];

        $expectedOutput = true;
        $actualOutput = ContactMessageValidator::validateMandatoryAddressField($testMessageArray, "AddressField");
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testFailureValidateMandatoryAddressField_ValidLine_bIncludeAddressDetails_Is_0()
    {
        $testMessageArray =
            [
                "bIncludeAddressDetails" => 0,
                "AddressField" => "15 Sesame Street"
            ];
        $this->expectException(Exception::class);
        ContactMessageValidator::validateMandatoryAddressField($testMessageArray, "AddressField");
    }

    public function testFailureValidateMandatoryAddressField_SpecialChar_bIncludeAddressDetails_Is_1()
    {
        $testMessageArray =
            [
                "bIncludeAddressDetails" => 1,
                "AddressField" => "15 Ses@me Street"
            ];
        $this->expectException(Exception::class);
        ContactMessageValidator::validateMandatoryAddressField($testMessageArray, "AddressField");
    }

    public function testFailureValidateMandatoryAddressField_TooLong_bIncludeAddressDetails_Is_1()
    {
        $testMessageArray =
            [
                "bIncludeAddressDetails" => 1,
                "AddressField" => "15 Lorem ipsum dolor sit amet, consectetuer adipiscing elit"
            ];
        $this->expectException(Exception::class);
        ContactMessageValidator::validateMandatoryAddressField($testMessageArray, "AddressField");
    }

    public function testSuccessValidateOptionalAddressField_Empty_bIncludeAddressDetails_Is_0()
    {
        $testMessageArray =
            [
                "bIncludeAddressDetails" => 0,
                "AddressField" => ""
            ];

        $expectedOutput = true;
        $actualOutput = ContactMessageValidator::validateOptionalAddressField($testMessageArray, "AddressField");
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testSuccessValidateOptionalAddressField_Empty_bIncludeAddressDetails_Is_1()
    {
        $testMessageArray =
            [
                "bIncludeAddressDetails" => 1,
                "AddressField" => ""
            ];

        $expectedOutput = true;
        $actualOutput = ContactMessageValidator::validateOptionalAddressField($testMessageArray, "AddressField");
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testFailureValidateOptionalAddressField_KeyNotInArray()
    {
        $testMessageArray =
            [
                "randomKey" => "0",
                "bIncludeAddressDetails" => 1
            ];
        $fieldToValidate = "AddressLine2";
        $this->expectException(Exception::class);
        ContactMessageValidator::validateOptionalAddressField($testMessageArray, $fieldToValidate);
    }

    public function testSuccessValidateOptionalAddressField_ValidLine_bIncludeAddressDetails_Is_1()
    {
        $testMessageArray =
            [
                "bIncludeAddressDetails" => 1,
                "AddressLine2" => "Flat 15"
            ];

        $expectedOutput = true;
        $actualOutput = ContactMessageValidator::validateOptionalAddressField($testMessageArray, "AddressLine2");
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testFailureValidateOptionalAddressField_ValidLine_bIncludeAddressDetails_Is_0()
    {
        $testMessageArray =
            [
                "bIncludeAddressDetails" => 0,
                "AddressLine2" => "15 Sesame Street"
            ];
        $this->expectException(Exception::class);
        ContactMessageValidator::validateOptionalAddressField($testMessageArray, "AddressLine2");
    }

    public function testFailureValidateOptionalAddressField_SpecialChar_bIncludeAddressDetails_Is_1()
    {
        $testMessageArray =
            [
                "bIncludeAddressDetails" => 1,
                "AddressLine2" => "Fl@t 15,"
            ];
        $this->expectException(Exception::class);
        ContactMessageValidator::validateOptionalAddressField($testMessageArray, "AddressLine2");
    }

    public function testFailureValidateOptionalAddressField_TooLong_bIncludeAddressDetails_Is_1()
    {
        $testMessageArray =
            [
                "bIncludeAddressDetails" => 1,
                "AddressField" => "15 Lorem ipsum dolor sit amet, consectetuer adipiscing elit"
            ];
        $this->expectException(Exception::class);
        ContactMessageValidator::validateOptionalAddressField($testMessageArray, "AddressField");
    }
}
