<?php

namespace App\Models;
use PDO;

class ContactMessageModel {
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function postContactMessage(array $contactMessage):void 
    {
            $query = $this->db->prepare('INSERT INTO ContactMessages (FullName, EmailAddress, PhoneNumber1, PhoneNumber2, PhoneNumber3, MessageText, bIncludeAddressDetails, AddressLine1, AddressLine2, CityTown, StateCounty, Postcode, Country) VALUES (:FullName, :EmailAddress, :PhoneNumber1, :PhoneNumber2, :PhoneNumber3, :MessageText, :bIncludeAddressDetails, :AddressLine1, :AddressLine2, :CityTown, :StateCounty, :Postcode, :Country)');     
         
        $query->execute($contactMessage);
    }
}