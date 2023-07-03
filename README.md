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
- URL

  /banner-details

- Method

  GET
  
- URL Parameters

  There are no URL parameters

- Success Response:

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
  "Status":"1",
  "Errors":[]
  }
  ```
