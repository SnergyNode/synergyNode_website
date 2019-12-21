
// socket = io.connect("http://localhost:6565");
var socket = io.connect("https://hyvecore.herokuapp.com");
var obj = { type: "synres"};
socket.on('connect', function(){
    socket.emit(obj.type,'hello server from client');
});
socket.on("synres",function(data){
    console.log(data + ' received');
    data=data-1;
    data<=0?data=0:data;
    $(".online").text(data);
    console.log(data + ' response');
});
