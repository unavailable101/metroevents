// Show modal
function showCancellationModal(eventId) {
    var modal = document.getElementById("cancelModal");
    modal.style.display = "block";
}

// Hide modal
function hideCancellationModal() {
    var modal = document.getElementById("cancelModal");
    modal.style.display = "none";
}

// Cancel event
function cancelEvent(eventId) {
    var cancellationReason = document.getElementById("cancelReason").value;

    // AJAX call or PHP form submission to handle cancellation and removal of event from JSON
    // Delete event with ID 'eventId' from your JSON data using PHP
    $.ajax({
        method: "POST",
        url: "api.php", // This should be the path to your PHP file
        data: {
            functionName: "eventCancel",
            eventId: eventId,
            cancellationReason: cancellationReason
        },
        success: function(response) {
            // Handle the response from the server if needed
            console.log('Response from PHP function:', response);
            var jsonResponse = JSON.parse(response);
            if (jsonResponse.success) {
                // Redirect to dashboard if success is true
                window.location.href = 'dashboard.php';
            } else {
                // Handle failure scenario if needed
                alert('failed!');
            }
        },
        error: function(xhr, status, error) {
            // Handle errors
            console.error('Error:', error);
        }
    });
    // Hide modal after submission
    hideCancellationModal();
}


//di mu work, both join ug organizer
//gi kapoy nako
function requestJoin(eventId, uid){
    alert("Request to Join Event Success! " + eventId + " " + uid);
    $.ajax({
        method: "POST",
        url: "api.php", // This should be the path to your PHP file
        data: {
            functionName: "joinRequest",
            eventId: eventId,
            uid: uid
        },
        success: function(response) {
            // Handle the response from the server if needed
            console.log('Response from PHP function:', response);
        },
        error: function(xhr, status, error) {
            // Handle errors
            console.error('Error:', error);
        }
    });

    // // Requiring fs module 
    // const fs = require("fs"); 
    
    // // Storing the JSON format data in myObject 
    // var data = fs.readFileSync("data/notifs.json"); 
    // var myObject = JSON.parse(data); 
    
    // // Defining new data to be added 
    // let newData = { 
    //     notifId : 1,
    //     uid : $uid,
    //     eventId : eventId,
    //     type : "to-join",
    //     title : "Requesting to Join ",
    //     body : " is requesting to join the event." 
    // }; 
    
    // // Adding the new data to our object 
    // myObject.push(newData); 
    
    // // Writing to our JSON file 
    // var newData2 = JSON.stringify(myObject); 
    // fs.writeFile("data/notifs.json", newData2, (err) => { 
    // // Error checking 
    // if (err) throw err; 
    // console.log("New data added"); 
    // }); 
}

function requestOrg(eventId, uid){
    // alert("Requesting to be an Organizer Success! " + eventId + " " + uid);
    $.ajax({
        method: "POST",
        url: "api.php", // This should be the path to your PHP file
        data: {
            functionName: "orgRequest",
            eventId: eventId,
            uid: uid
        },
        success: function(response) {
            // Handle the response from the server if needed
            console.log('Response from PHP function:', response);
        },
        error: function(xhr, status, error) {
            // Handle errors
            console.error('Error:', error);
        }
    });
}