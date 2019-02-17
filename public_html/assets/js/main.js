"use strict";


/*  Capture user events  */
$(document).ready(function(){
	/* Send button is clicked */
	$('#btn-send').click(function(event){
		event.preventDefault();
        processLocalMessage();  // Call a function that handles a new message added locally
	});

	/* User presses <Enter> while typing*/
    var input = document.getElementById('txt-message');

    input.addEventListener('keyup', function(event){
        if (event.key === "Enter"){     // Also: "event.keyCode === 13"
            event.preventDefault();
            
            $('#btn-send').click();     // Trigger the send button click
        }
    });
    
    /* Check regularly if a remote message is available */
    setInterval(function () {
        askForRemoteMessages();
    }, 3 * 1000);   // Duration in miliseconds
});

/* Processes a new message from us */
function processLocalMessage(){
    /* Extract new message */
    var user = "Me";
    var msg = $.trim(document.getElementById('txt-message').value);

    if (msg == '') {  // Do nothing if message is empty
        console.log('Type something');
        return;
    }

    /* Append new message to the page */
    $('#cont-msg').append(
        '<div class="w-100">' +
            '<div class="float-right text-wrap shadow-sm t-msg-right">' +
                '<h6><b>' + user + ':</b></h6>' +
                '<p>' + msg + '</p>' +
            '</div>' +
        '</div>'
    );

    window.scrollTo(0, document.querySelector("#cont-msg").scrollHeight);  // Scroll to display the new message

    /* Clear input */
    document.getElementById('txt-message').value = '';
}


/* Checks if other users have sent any messages */
function askForRemoteMessages (){
    // TODO
    console.log("TODO: Implement askForRemoteMessages() function")
}

/* Processes messages sent by other users */
function processRemoteMessage(){
    // TODO
}