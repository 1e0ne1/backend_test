## REST API for message storage

This project is about message storage with authentication. Before storing messages you have to authenticate by providing a unique key and secret password. Messages consist of unique id, message body and tags. Is possible to search messages by id and by single tag. 

**Installation:** Install all dependencies by runing the command *npm install* 

**backend**: Developed in NodeJs, using Express.js. Other NPM modules:
    - **UUID:** Package for unique id 
    - **JSON Web Token:** Package for authenticate. It provides encryption unsing HMAC-SHA256.
    - **NODEMON:** Package for update changes in development.

**usage:** You can start the backend server with the command "npm run dev" that will start server on port 3000. You can go to the following urls:
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

