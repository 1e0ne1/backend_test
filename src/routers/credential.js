const express = require('express');
const {credential, addCredential, getKey} = require('../models/credential');
const router = new express.Router();

router.put('/credential', (req, res) => {

    const {key, shared } = req.body; //get key and shared_secret on body
    if(getKey(key).length > 0){ //if key exists send code 403
        return res.status(403).send(); 
    }

    addCredential(key, shared); //if key doesnt exist add it
    res.status(204).send(); //send 204 code
});

module.exports = router;