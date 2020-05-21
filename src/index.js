const express = require('express');
const {credential, addCredential, getKey} = require('./models/credential');
const { getMessage, getMessagesByTag, addMessage} = require( './models/message');
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
    const {msg, tags } = req.body;
    const id = addMessage(msg, tags);
    if(id.length > 0) {
        return res.status(200).send({id});
    }

    res.status(400).send();
});

app.get('/message/:id', auth, (req, res) => {
    res.send(getMessage(req.params.id));
});

app.get('/messages/:tag', auth, (req, res) => {
    res.send(getMessagesByTag(req.params.tag));
});
