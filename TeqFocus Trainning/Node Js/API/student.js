/*const express = require('express'); // requre the express framework
const app = express();
const studentdata = require('./data');
//const validator = require('validator');
const router = express.Router();
//const fs = require('fs');
app.get('/studentlist', function(req, res) {
   // fs.readFile(__dirname + "/" + "student.json", 'utf8', function(err, data) {
        //console.log(data);
       // res.end(data); // you can also use res.send()
    return res.send({status:"success",message:"Student List", data:studentdata})
    });
module.exports=router;*/