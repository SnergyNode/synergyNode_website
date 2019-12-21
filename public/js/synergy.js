function goto($value){
    window.location.href=$value;
}

$('form :input').attr('autocomplete', 'off');

function setVolume() {
    let audio = document.getElementById('audio');
    audio.volume = 0.2;
}