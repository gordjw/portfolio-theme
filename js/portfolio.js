jQuery( document ).ready( function() {
   var BV = new jQuery.BigVideo();
    BV.init();
    BV.show('http://video-js.zencoder.com/oceans-clip.mp4', {ambient:true});
});