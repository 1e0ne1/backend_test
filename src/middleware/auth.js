const jwt = require('jsonwebtoken');
const { getKey } = require('../models/credential');

const auth = async (req, res, next) => {

    try{
        const key = req.header('X-Key');
        const route = req.header('X-Route');
        const signature = req.header('X-Signature');
        const bodyParams = JSON.stringify(req.body);
        const urlParams = JSON.stringify(req.params);

        const { shared } = getKey(key)[0]; //obtain secret_shared key

        const datasigned = route + ";" + bodyParams + ";" + urlParams;
        
        const decoded = jwt.verify(signature, shared);
        
        if(decoded !== datasigned){
            throw new Error();
        }

        next();
    } catch(e) {
        res.status(403).send({error: 'Error in authentication'});
    }
    
}

module.exports = auth