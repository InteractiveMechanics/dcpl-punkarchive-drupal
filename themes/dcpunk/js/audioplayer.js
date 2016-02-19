/*$(document).ready(function(){
	  
	 function getMusicTracks(){
		var music_content = localStorage.getItem('music_data');
		
		if(music_content) {
			var data = JSON.parse(music_content);
			setupAudio(data);
		} else {
			$.ajax({
			  dataType: "json",
			  url: 'http://staging.interactivemechanics.com/dcpunk/json/music',
			  success: function(data){
				  var music_data = JSON.stringify(data);
				  localStorage.setItem('music_data', music_data);
				  
				  setupAudio(data);
			  }
			});
		}
		
	 }
	 
	 function setupAudio(musicTracks) {
		 var supportsAudio = !!document.createElement('audio').canPlayType;
		 if(supportsAudio) {
	        var index = localStorage.getItem('current_music_index') ? localStorage.getItem('current_music_index') : 0;
	        playing = false;
	        mediaPath = 'audiofiles/',
	        extension = '',
	        tracks = musicTracks,
	        trackCount = musicTracks.length,
	        npAction = $('#npAction'),
	        npAction2 = $('#npAction2'),
	        npTitle = $('#npTitle'),
	        npBand = $('#npBand'),
	        npAlbumCover = $('.album-image'),
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
		                                   	index++;
	                                        if(index < trackCount) {
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
	                        console.log(id);
	                        if(id !== index) {
	                            playTrack(id);
	                        }
	                    }),
	                    loadTrack = function(id) {
		                    localStorage.setItem('current_music_index', id);
		                    
		                    $('.album-cover-placeholder').html('<img src="' + tracks[id].album_cover  + '" width="60" height="60" />')
		                    
	                        $('.plSel').removeClass('plSel');
	                        $('#plUL li:eq(' + id + ')').addClass('plSel');
	                        npTitle.html('<h3>' + tracks[id].name + '</h3>');
	                        
	                        
	                        npBand.html('<h4>' + tracks[id].band_name + '</h4>');
	                        npAlbumCover.attr('src', tracks[id].album_cover);
	                        index = id;
	                        
	                        if(audio) {
		                        audio.src = tracks[id].file;
	                        }
	                    },
	                    playTrack = function(id) {
	                        loadTrack(id);
	                        audio.play();
	                    };
	                   
	                    loadTrack(index);
	    }
	 }
     
     getMusicTracks();
});*/

var musicTracks = null;
var currentIndex = 0;
var isMusicPlaying = false;
var audioTag = null;

function getMusicTracks(){
	var music_content = localStorage.getItem('music_data');
	
	var eDate = localStorage.getItem('exp_date');
	if(!eDate) {
		music_content = null;
	}
	
	var d = new Date();
	d += 1000 * 60 * 60 * 2;
	d = new Date(d);
	
	if(eDate) {
		if(eDate <= d) {
			music_content = null;
		}
	}
	
	if(music_content) {
		var data = JSON.parse(music_content);
		setupAudio(data);
	} else {
		$.ajax({
		  dataType: "json",
		  url: 'http://staging.interactivemechanics.com/dcpunk/json/music',
		  success: function(data){
			  var music_data = JSON.stringify(data);
			  localStorage.setItem('music_data', music_data);
			  localStorage.setItem('exp_date', new Date());
			  setupAudio(data);
		  }
		});
	}
 }
 
 function setupAudio(data) {
	 musicTracks = data;
	 
	 console.log(musicTracks);
	 if(musicTracks) {
		 
		$('.album-cover-placeholder').html('<img src="' + musicTracks[currentIndex].album_cover  + '" width="60" height="60" />');
        $('#npTitle').html('<h3>' + musicTracks[currentIndex].name + '</h3>');
        $('#npBand').html('<h4>' + musicTracks[currentIndex].band_name + '</h4>');
        $('.album-image').attr('src', musicTracks[currentIndex].album_cover);
        
        if(audioTag) {
        	audioTag.src = musicTracks[currentIndex].file;
			audioTag.load();
			currentIndex += 1;
		}
	 }
 }
 
 function playMusic() {
	 audioTag.play();
	 isMusicPlaying = true;
	 $('#playButton').hide();
	 $('#pauseButton').show();
	 
	 localStorage.setItem('current_music_index', currentIndex);
 }
 
 function pauseMusic() {
	 audioTag.pause();
	 isMusicPlaying = false;
	 $('#pauseButton').hide();
	 $('#playButton').show();
 }
 
 function nextPlaylistItem() {
	 console.log('nect');
	 if(currentIndex >= musicTracks.length) {
		 currentIndex = 0;
		 localStorage.setItem('current_music_index', currentIndex);
	 }
	 
	$('.album-cover-placeholder').html('<img src="' + musicTracks[currentIndex].album_cover  + '" width="60" height="60" />');
    $('#npTitle').html('<h3>' + musicTracks[currentIndex].name + '</h3>');
    $('#npBand').html('<h4>' + musicTracks[currentIndex].band_name + '</h4>');
    $('.album-image').attr('src', musicTracks[currentIndex].album_cover);
     
     if(audioTag) {
	     
     	audioTag.pause();
	 	audioTag.src = musicTracks[currentIndex].file;
	 	audioTag.load();
	 }
	 setTimeout(playMusic, 500);
	 currentIndex += 1;
 }
 
 $(document).ready(function(){
	$('#pauseButton').hide();
	
	$('#playButton').click(playMusic);
	$('#pauseButton').click(pauseMusic);
	$('#btnNext').click(nextPlaylistItem);
	
	audioTag = $('#audio1')[0];
	
	getMusicTracks(); 
 });
