<?php

namespace App\Sanitisers;

use App\Sanitisers\ContactMessageSanitiser;
use Tests\TestCase;

class ContactMessageSanitiserTest extends TestCase
{
    
    public function testSuccessStringSanitiser_whiteSpaces() 
    {
        $testString = ' abc ';
        $expectedOutput = 'abc';
        $actualOutput = ContactMessageSanitiser::stringSanitiser($testString);
        $this->assertEquals($expectedOutput, $actualOutput);
    }
    
    public function testSuccessStringSanitiser_HTMLSpecialChar()
    {
        $testString = '<marquee>';
        $expectedOutput = '&lt;marquee&gt;';
        $actualOutput = ContactMessageSanitiser::stringSanitiser($testString);
        $this->assertEquals($expectedOutput, $actualOutput);
    }
}
