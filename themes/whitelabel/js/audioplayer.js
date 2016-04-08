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
		  url: '<?php print url('music'); ?>',  
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
