const { v4: uuidv4 } = require('uuid');
// console.log(uuidv4());

const messages = [];

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
