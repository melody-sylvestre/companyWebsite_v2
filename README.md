# Backend

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

  
# Frontend
This project was bootstrapped with [Create React App](https://github.com/facebook/create-react-app).

To install the frontend 

```
cd frontend
npm install
```

## Available Scripts

In the project directory, you can run:

### `npm start`

Runs the app in the development mode.\
Open [http://localhost:3000](http://localhost:3000) to view it in your browser.

The page will reload when you make changes.\
You may also see any lint errors in the console.

### `npm test`

Launches the test runner in the interactive watch mode.\
See the section about [running tests](https://facebook.github.io/create-react-app/docs/running-tests) for more information.

### `npm run build`

Builds the app for production to the `build` folder.\
It correctly bundles React in production mode and optimizes the build for the best performance.

The build is minified and the filenames include the hashes.\
Your app is ready to be deployed!

See the section about [deployment](https://facebook.github.io/create-react-app/docs/deployment) for more information.

### `npm run eject`

**Note: this is a one-way operation. Once you `eject`, you can't go back!**

If you aren't satisfied with the build tool and configuration choices, you can `eject` at any time. This command will remove the single build dependency from your project.

Instead, it will copy all the configuration files and the transitive dependencies (webpack, Babel, ESLint, etc) right into your project so you have full control over them. All of the commands except `eject` will still work, but they will point to the copied scripts so you can tweak them. At this point you're on your own.

You don't have to ever use `eject`. The curated feature set is suitable for small and middle deployments, and you shouldn't feel obligated to use this feature. However we understand that this tool wouldn't be useful if you couldn't customize it when you are ready for it.

## Learn More

You can learn more in the [Create React App documentation](https://facebook.github.io/create-react-app/docs/getting-started).

To learn React, check out the [React documentation](https://reactjs.org/).

### Code Splitting

This section has moved here: [https://facebook.github.io/create-react-app/docs/code-splitting](https://facebook.github.io/create-react-app/docs/code-splitting)

### Analyzing the Bundle Size

This section has moved here: [https://facebook.github.io/create-react-app/docs/analyzing-the-bundle-size](https://facebook.github.io/create-react-app/docs/analyzing-the-bundle-size)

### Making a Progressive Web App

This section has moved here: [https://facebook.github.io/create-react-app/docs/making-a-progressive-web-app](https://facebook.github.io/create-react-app/docs/making-a-progressive-web-app)

### Advanced Configuration

This section has moved here: [https://facebook.github.io/create-react-app/docs/advanced-configuration](https://facebook.github.io/create-react-app/docs/advanced-configuration)

### Deployment

This section has moved here: [https://facebook.github.io/create-react-app/docs/deployment](https://facebook.github.io/create-react-app/docs/deployment)

### `npm run build` fails to minify

This section has moved here: [https://facebook.github.io/create-react-app/docs/troubleshooting#npm-run-build-fails-to-minify](https://facebook.github.io/create-react-app/docs/troubleshooting#npm-run-build-fails-to-minify)

