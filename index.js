var port = (process.env.PORT || 8000);

var express = require('express');
var app = express();

app.get('/', function(req, res){
    res.send(req.host);
});

app.listen(port, function(){
    console.log('Example app listening on port ' + port + '!');
});