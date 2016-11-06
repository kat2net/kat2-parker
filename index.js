var port = (8000 || process.env.PORT);

var express = require('express');
var app = express();

app.get('/', function(req, res){
    res.send(req.host);
});

app.listen(port, function(){
    console.log('Example app listening on port ' + port + '!');
});