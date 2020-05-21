const { v4: uuidv4 } = require('uuid');
// console.log(uuidv4());

const messages = [{
    id: 1,
    msg: 'prueba',
    tags: [
        'test'
    ]
}];

const addMessage = (msg, tags) => {
    let id = uuidv4(); 
    
    messages.push({
        id,
        msg,
        tags
    });

    return id;
}

const getMessage = (id) => {
    return messages.filter(message => message.id === id);
}

const getMessagesByTag = (searchTag) => {
    return messages.filter(message => message.tags.includes(searchTag));
}

module.exports = {
    messages,
    addMessage,
    getMessage,
    getMessagesByTag
}

// addMessage("hola mundo", ['texto', 'mundo', 'saludo']);
// addMessage("hello world", ['texto', 'saludo']);
// const newId = addMessage("bye bye", ['despedida']);

console.log(getMessage(1));

// console.log(getMessagesByTag('nuevo'));