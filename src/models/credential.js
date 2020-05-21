
let credentials = [];

const addCredential = (key, shared) => {
    credentials.push({
        key,
        shared
    });
}

const getKey = (key) => {
    return credentials.filter(credential => credential.key === key);
}

const getCredentials = () => {
    console.log(credentials);
}


module.exports = {
    credentials,
    addCredential,
    getKey,
    getCredentials
}