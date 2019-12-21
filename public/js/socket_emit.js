//init socket, connection to server
// var socket = io();
// socket = io.connect("http://localhost:6565");
var socket = io.connect("https://hyvecore.herokuapp.com");
var obj = { type: "synfront"};
socket.on('connect', function(){
    socket.emit(obj.type,'hello server from client');
});

//disable auto complete


