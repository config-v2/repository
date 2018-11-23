var youtubeWrapper = function (options) {
    var defaultOptions = {
      width: '100%',
      height: '100%',
      params: {
        rel:0,
        showinfo: 0
      }
    };


    var options = options || {};


    for (var option in defaultOptions){
        if (!options.hasOwnProperty(option)){
            options[option] = defaultOptions[option];
        }
    }


    for (var param in defaultOptions['params']){
        if (!options['params'].hasOwnProperty(param)){
            options['params'][param] = defaultOptions['params'][param];
        }
    }


    var addFrame = function () {
        var iframe = document.createElement("iframe");
        var videoUrl = 'https://www.youtube.com/embed/' + this.id + '?autoplay=1&autohide=1&controls=2&rel=0&showinfo=0&iv_load_policy=3&modestbranding=1&disablekb=1&playsinline=1&cc_load_policy=0&cc_lang_pref=auto&enablejsapi=1&widgetid=1';
        for (var param in options.params) {
            videoUrl += '&' + param + '=' + options.params[param];
        }
        iframe.setAttribute('src', videoUrl);
        iframe.setAttribute('allowfullscreen', 1);
        iframe.setAttribute('frameborder', 0);
        iframe.style.width  = options.width;
        iframe.style.height = options.height;
        this.innerHTML = '';
        this.style.backgroundImage = '';
        this.appendChild(iframe);
        this.removeEventListener('click', addFrame);
    };


    var videoContainers = document.getElementsByClassName('youtube');
    var videoCounter = videoContainers.length;

    for(var i = 0; i < videoCounter; i++){
        videoContainers[i].style.backgroundImage = 'url(http://i.ytimg.com/vi/' + videoContainers[i].id + '/hqdefault.jpg)';
        var play = document.createElement("div");
        play.setAttribute("class","play");
        videoContainers[i].appendChild(play);
        videoContainers[i].addEventListener('click', addFrame);
    }
};

document.addEventListener('DOMContentLoaded', function(){
    youtubeWrapper();
});