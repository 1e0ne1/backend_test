## REST API for message storage

This project is about message storage with authentication. Before storing messages you have to authenticate by providing a unique key and secret password. Messages consist of unique id, message body and tags. Is possible to search messages by id and by single tag. 

**Installation:** Install all dependencies by runing the command *npm install* 

**backend**: Developed in NodeJs, using Express.js. Other NPM modules:
    - **UUID:** Package for unique id 
    - **JSON Web Token:** Package for authenticate. It provides encryption unsing HMAC-SHA256.
    - **NODEMON:** Package for update changes in development.
