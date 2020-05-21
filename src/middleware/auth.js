const jwt = require('jsonwebtoken');
const User = require('../models/credential');

const auth = async (req, res, next) => {
    const key = req.header('X-Key');
    const route = req.header('X-Route');
    const signature = req.header('X-Signature');

    console.log(key);
    console.log(route);
    console.log(signature);
    console.log(req.route.path);
    next();
    // try {
    //     const token = req.header('Authorization').replace('Bearer ', '')
    //     const decoded = jwt.verify(token, 'thisismynewcourse')
    //     const user = await User.findOne({ _id: decoded._id, 'tokens.token' : token})

    //     if(!user){
    //         throw new Error()
    //     }
        
    //     req.token = token
    //     req.user = user
    //     next()

    // } catch(e){
    //     res.status(401).send({error: 'Please Authenticate'})
    // }
}

module.exports = auth