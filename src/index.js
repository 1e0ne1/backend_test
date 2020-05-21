const express = require('express');
const {credential, addCredential, getKey} = require('./models/credential');
const auth = require('./middleware/auth')

const app = express();
const port = process.env.PORT || 3000;

app.use(express.json());

app.listen(port, () => {
    console.log('Server is up on port ' + port);
});

app.put('/credential', (req, res) => {

    const {key, shared } = req.body; //get key and shared_secret on body
    if(getKey(key).length > 0){ //if key exists send code 403
        return res.status(403).send(); 
    }

    addCredential(key, shared); //if key doesnt exist add it
    res.status(204).send(); //send 204 code
});

app.post('/message', auth, (req, res) => {
    
    res.send('testing post message!');
});

app.get('/message/:id', auth, (req, res) => {
    res.send('gettin messages with id:' + req.params.id);
});

app.get('/messages/:tag', auth, (req, res) => {
    res.send('get all the tag messages');
});
