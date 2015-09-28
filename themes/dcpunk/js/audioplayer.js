  $(document).ready(function(){
     var supportsAudio = !!document.createElement('audio').canPlayType;

     if(supportsAudio) {
        var index = 0;
        playing = false;
        mediaPath = 'audiofiles/',
        extension = '',
        tracks = [
          {"track":1,"name":"Symphony No. 9", "length":"04:57","file":"Symphony_No._9__Beethoven", "bandName":"Beethoven"},
          {"track":2,"name":"Bolero", "length":"17:22","file":"Bolero_Ravel", "bandName":"Ravel"},
          {"track":3,"name":"In A Sentimental Mood", "length":"04:16","file":"Sentimental_Mood_Ellington", "bandName":"Ellington/Coltraine"},
          {"track":4,"name":"This Land is Your Land", "length":"05:03","file":"Land_Is_Your_Land_Seeger", "bandName":"Pete Seeger"},
          {"track":5,"name":"I Say A Little Prayer for You", "length":"03:29","file":"Say_A_Little_Prayer_Franklin", "bandName":"Aretha Franklin"}
        ],
        trackCount = tracks.length,
        npAction = $('#npAction'),
        npAction2 = $('#npAction2'),
        npTitle = $('#npTitle'),
        npBand = $('#npBand'),
        playButton = $('#playButton'),
        pauseButton = $('#pauseButton'),


        // sets initial state
        playButton.show();
        pauseButton.hide();

        audio = $('#audio1').bind('play', function() {
                        playing = true;
                        npAction.html('<i class="fa fa-pause"></i>');
                        pauseButton.show();
                        playButton.hide();
                        npAction2.text('Now Playing:');
                    }).bind('pause', function() {
                        playing = false;
                        npAction.html('<i class="fa fa-play">');
                        pauseButton.hide();
                        playButton.show();
                        npAction2.text('Paused:');
                    }).bind('ended', function() {
                        npAction.html('<i class="fa fa-play">');
                        npAction2.text('Paused:');
                        if((index + 1) < trackCount) {
                            index++;
                            loadTrack(index);
                            audio.play();
                        } else {
                            audio.pause();
                            index = 0;
                            loadTrack(index);
                        }
                    }).get(0),

                    btnPrev = $('#btnPrev').click(function() {
                                        if((index - 1) > -1) {
                                            index--;
                                            loadTrack(index);
                                            if(playing) {
                                                audio.play();
                                            }
                                        } else {
                                            audio.pause();
                                            index = 0;
                                            loadTrack(index);
                                        }
                                    }),
                                    btnNext = $('#btnNext').click(function() {
                                        if((index + 1) < trackCount) {
                                            index++;
                                            loadTrack(index);
                                            if(playing) {
                                                audio.play();
                                            }
                                        } else {
                                            audio.pause();
                                            index = 0;
                                            loadTrack(index);
                                        }
                                    }),
                    li = $('#plUL li').click(function() {
                        var id = parseInt($(this).index());
                        if(id !== index) {
                            playTrack(id);
                        }
                    }),
                    loadTrack = function(id) {
                        $('.plSel').removeClass('plSel');
                        $('#plUL li:eq(' + id + ')').addClass('plSel');
                        npTitle.html('<h3>' + tracks[id].name + '</h3>');
                        npBand.html('<h4>' + tracks[id].bandName + '</h4>');
                        index = id;
                        audio.src = mediaPath + tracks[id].file + extension;
                    },
                    playTrack = function(id) {
                        loadTrack(id);
                        audio.play();
                    };
                   /* if(audio.canPlayType('audio/ogg')) {
                        extension = '.ogg';
                    }
                    if(audio.canPlayType('audio/mpeg')) {
                        extension = '.mp3';
                    }
                    loadTrack(index);*/
                }
                });

