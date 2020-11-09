$(document).ready(function(){
	console.log("bien")
	var note = $('.form-control');
	var note_content = '';
	console.log(note.val())
	try{
		var SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
		var recognition = new SpeechRecognition();
	}
	catch(e){
		console.log(e);
	}

	recognition.continuous = true;

	recognition.onresult = function(event){
		var current = event.resultIndex;
		var transcript = event.results[current][0].transcript;

		var mobileRepeatBug = (current == 1 && transcript == event.results[0][0].transcript);

		if(!mobileRepeatBug){
			note_content += transcript;
			note.val(note_content);
		}
	}

	recognition.onstart = function(){
		$("#state_record").text("Record started");
	}

	recognition.onerror = function(event){
		if(event.error == 'no-speech'){
			$("#state_record").text("No record, reessayez!");
		}
	}

	note.on('input', function(){
		note_content = $(this).val();
	})


	$("#btn_start_record").on("click", function(e){
		if(note_content.length){
			note_content += ' ';
		}
		recognition.start();
	})

	$('#btn_stop_record').on('click', function(e){
		recognition.stop();
		$("#state_record").text("Record stopped");
		alert(note.val());
	})
})