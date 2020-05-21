const express = require('express');
const auth = require('../middleware/auth');
const { getMessage, getMessagesByTag, addMessage} = require( '../models/message');
const router = new express.Router();

router.post('/message', auth, (req, res) => {
    const {msg, tags } = req.body;
    const id = addMessage(msg, tags);
    if(id.length > 0) {
        // console.log(id);
        return res.status(200).send(id);
    }

    res.status(400).send();
});

router.get('/message/:id', auth, (req, res) => {
    res.send(getMessage(req.params.id));
});

router.get('/messages/:tag', auth, (req, res) => {
    res.send(getMessagesByTag(req.params.tag));
});

module.exports = router;