<?php

namespace App\Sanitisers;

class ContactMessageSanitiser 
{
    public static function stringSanitiser(string $formAnswers) : string
    {    
            $cleanFormAnswers = trim($formAnswers);
            $cleanFormAnswers = htmlspecialchars($cleanFormAnswers);   
            return $cleanFormAnswers;
    }
}

