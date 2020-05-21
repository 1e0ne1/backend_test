## REST API for message storage

This project is about message storage with authentication. Before storing messages you have to authenticate by providing a unique key and secret password. Messages consist of unique id, message body and tags. Is possible to search messages by id and by single tag. 

**Installation:** Install all dependencies by runing the command *npm install* 

## Project Structure (Backend)

    src -
        |- middleware
        |- models
        |- routers
        |- index.js (main file)

## backend: Developed in NodeJs, using Express.js. Other NPM modules:
    - **UUID:** Package for unique id 
    - **JSON Web Token:** Package for authenticate. It provides encryption unsing HMAC-SHA256.
    - **NODEMON:** Package for update changes in development.

## Usage: 
You can start the backend server with the command "npm run dev" that will start server on port 3000. You can go to the following urls:
    - **CREDENTIALS:** You can go to *http://localhost:3000/credential* and create a new credential by using the following parameters:
        **METHOD:** PUT
        **BODY:** Key and Shared Secret.
        If you enter these parameters you will obtain a response code 204. If the key already exists you will get a response code 403.
    - **CREATE MESSAGE:** You can go to *http://localhost:3000/message* and create a new credential by using the following parameters:
        **METHOD:** POST
        **BODY:** Message body and tag array.
        **URL PARAMETERS:** none
        **HEADERS**: 
            **X-Key:** must be present and it must contain a string that represents a key already known
            **X-Route:** must be present and it must containt a string representing the route for the request
            **X-Signature** must be present and it must contain a string representing the HMAC-SHA256 result achieved based on the following description.
        If you enter these parameters you will obtain a response code 200. If the key already exists you will get a response code 403.
    - **GET MESSAGE BY ID:** You can go to *http://localhost:3000/message/id* and create a new credential by using the following parameters:
        **METHOD:** GET
        **BODY:** None.
        **URL PARAMETERS:** Message id value.
        **HEADERS**: 
            **X-Key:** must be present and it must contain a string that represents a key already known
            **X-Route:** must be present and it must containt a string representing the route for the request
            **X-Signature** must be present and it must contain a string representing the HMAC-SHA256 result achieved based on the following description.
        If you enter these parameters you will obtain a response code 200 with the message information on the response body. If the key already exists you will get a response code 403.
    - **GET MESSAGES BY TAG:** You can go to *http://localhost:3000/messages/tag* and create a new credential by using the following parameters:
        **METHOD:** GET
        **BODY:** None.
        **URL PARAMETERS:** Tag value.
        **HEADERS**: 
            **X-Key:** must be present and it must contain a string that represents a key already known
            **X-Route:** must be present and it must containt a string representing the route for the request
            **X-Signature** must be present and it must contain a string representing the HMAC-SHA256 result achieved based on the following description.
        If you enter these parameters you will obtain a response code 200 with all the matched messages on the response body. If the key already exists you will get a response code 403.


## Front End

    Front end client was developed in PHP.

    **Installation:** Run the PHP Scripts by running the following command in the public folder *php -S localhost:8080* This will start client server in port 8080

## Project Structure (FrontEnd)

    public -
        |- assets
        |- js
        |- vendor
        |- functions.php
        |- index.php (main file)


## Usage:

    Open in your browser the following URL "http://localhost:8080" this will start the web application. You will get a form and you must enter your credentials (key and secret shared). This credentials will allow you to enter the application.

    If you enter correctly your credentials you will get to the main page. Here you can perform the following actions:
    
    1. Create messages: You must enter the message body and the tags related. The system will take your credentials and will perform the encryption automatically. You will get an unique id that the server assigns to the message created.
    2. View messages: When you create a message a link will appear in the main page. You can click it in order to visualize its content.
    3. Search messages: Enter to the menu "Search Messages" located in the top menu. You will be redirected to the search page. Here you can enter a single tag that will be sent to the server and you will get back all the matched messages for this respective tag.
    4. Logout: This will delete your credentials, and all the messages created.

## Future fixes:
    1. Styling: This web app does not have any style applied. For future releases this will be fixed.
    2. Sanitize data: Currently this security feature is not implemented. 