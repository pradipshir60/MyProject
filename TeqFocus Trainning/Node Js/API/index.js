const { json } = require('express/lib/response');
const http = require('http');
const data = require('./data');

const requestListener = function(req, res) {
    res.writeHead(200, { 'Content-Type': 'student\json' });
    res.write(JSON.stringify(data));
    res.end();
}

const server = http.createServer(requestListener);
server.listen(8080);