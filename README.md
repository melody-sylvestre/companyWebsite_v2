# companyWebsite_v2

## Backend for Company website 

This application uses the latest Slim 4 with Slim PSR-7 implementation and PHP-DI container implementation along with the PHP-View template renderer. It also uses the Monolog logger.

This skeleton application was built for Composer. 

## Install the Application

One cloned, you must install the slim components by running:

```bash
cd backend
composer install
```

To run the application locally:
```bash
composer start

```
Run this command in the application directory to run the test suite
```bash
composer test
```

## API documentation 
### Return banner content
- **URL**

  /banner-details

- **Method**

  GET
  
- **URL Parameters**

  There are no URL parameters

- **Success Response:**

    Code: 200
    Content:
  ```
  {"Details":
    [
    {"id":"1",
    "Title":"Lorem ipsum dolor sit amet.",
    "Subtitle":"Ut tenetur amet sit natus nihil ad quia quaerat. Ab quis quos et sunt velit qui architecto dignissimos est quasi repellat. ",
    "ImageUrl":"https:\/\/images.freeimages.com\/images\/large-previews\/3b2\/prague-conference-center-1056491.jpg"},
    ...
    ], 
  "Status": "200",
  "Message": "Banner content was successfully retrieved"
  }
  ```
- **Error Response:**

  Code: 500
  Content:
     ```
  {"Details":[], 
  "Status":"500",
  "Message": "Internal server error"
  }
  ```

### Submit contact form
- **URL**

  /contact-us

- **Method**

  POST
  
- **URL Parameters**

  There are no URL parameters

- **Request body**

  Format: JSON
  Example: 
  ```
  {
    "FullName": "Diana Prince",
    "EmailAddress": "wonder.woman@louvres.fr",
    "PhoneNumber1": "+331234567890",
    "PhoneNumber2": "+590 590 90 23 81",
    "PhoneNumber3": "",
    "MessageText": "Do you make bespoke tiaras?",
    "bIncludeAddressDetails": 0,
    "AddressLine1": "",
    "AddressLine2": "",
    "CityTown": "",
    "StateCounty": "",
    "Postcode": "" ,
    "Country": ""
  }

- **Success Response:**

    Code: 200
    Content:
  ```
  {
  "Details":[], 
  "Status":"200",
  "Message": "Contact form was successfully sent."
  }
  
- **Error Responses:** 

   - Code: 400
     This type of error occurs if one of the fields in the JSON body is invalid, for instance:
    ```
   {
    "Details":[], 
    "Status":"400",
    "Message": "Invalid email address"
    }
  ```
    
  - Code: 500
  Content:
  ```
   {
    "Details":[], 
    "Status":"500",
    "Message": "Contact form could not be sent."
    }

  

