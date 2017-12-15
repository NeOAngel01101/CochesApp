var audioElement = document.createElement('audio');
audioElement.setAttribute('src', 'http://www.salamisound.com/stream_file/6120492987136547878968146');
audioElement.setAttribute('loop', true);
audioElement.volume = 0.5;
audioElement.load();
audioElement.play();

var bg = document.createElement('audio');
bg.setAttribute('src', 'http://yt-files.com/yt-dd.php?id=RgKAFK5djSk&hash=5d442ded2928ccfe5f4306f3f764e03d&name=Wiz%20Khalifa%20-%20See%20You%20Again%20ft.%20Charlie%20Puth%20[Official%20Video]%20Furious%207%20Soundtrack');
bg.setAttribute('loop', true);
bg.load();
bg.play();

var leftPx = parseInt($("#car").css('left').split('px')[0]);
var topPx  = parseInt($("#car").css('top').split('px')[0]);
$(document).on('keydown', 'body', function(e){
    var key = e.keyCode || e.which;
    if(key == 37){
        if(leftPx >= ($("#car").width())){
            leftPx = leftPx - 10;
        }
    }else if(key == 39){
        if(leftPx <= ($("#game").outerWidth() - ($("#car").width()))){
            leftPx = leftPx + 10;
        }
    }

    $("#car").stop(true).animate({
        top   : topPx,
        left  : leftPx
    },100);

    e.preventDefault();
});

i = 250;
var h1_interval = setInterval(function(){
    (i == 404) ? clear_interval(h1_interval) : i++;
    $(".h1_404").html(i);
},25);