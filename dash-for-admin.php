<?php

    include("api.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        createEvent();
    }

    
?>

<style>
    /* Modal styles */
    .modal {
        display: none; /* Hidden by default */
        position: fixed;
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scrolling if needed */
        background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 15% auto; /* Centered */
        padding: 20px;
        border: 1px solid #888;
        width: 80%; /* Adjust width as needed */
        max-width: 400px; /* Set a maximum width */
        border-radius: 10px;
    }

    /* Close button in modal */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div style="display: inline-block; vertical-align: top; margin-top: 25px; width: 40%;">
    <div>
        <span>
            <?php
                echo '<h1 style="margin-bottom: 0px;">' . $_SESSION['name'] . '</h1>';
            ?>
        </span>
        <hr style="width: 100%; margin: 0;">
        <h3 style="margin-top: 0px;">ADMIN</h3>
    </div>

    <div class="create-container" style="width: 60%; padding: 10px; margin-top: 50px;">
        <h2 style="margin-top: 0%;">Create Event</h2>
        <form id="eventForm" action="" method="POST" >
            <label for="eventName">Event Name:</label>
            <input type="text" id="eventName" name="eventName" method="POST" required><br><br>

            <label for="eventType">Event Type:</label>
            <input type="text" id="eventType" name="eventType" method="POST" required><br><br>
            
            <label for="eventDate">Event Date:</label>
            <input type="date" id="eventDate" name="eventDate" method="POST" required><br><br>
            
            <label for="eventTime">Event Type:</label>
            <input type="time" id="eventTime" name="eventTime" method="POST" required><br><br>
            
            <button type="submit">Create Event</button>
        </form>
        
    </div>
</div>

<div style="display: inline-block; vertical-align: top; margin-top: 10px; width: 55%; float: right; overflow-y: auto; height: 84%;">
    <!-- ang mga events na gi create ni admin -->
    <div>
        <?php
            echo adminEvents();
        ?>
    </div>
</div>

<script src = "myscripts.js"></script>


<!-- para unta di mag refresh 
every time mu create kog event
it works, the part na dili mu refresh
but di pd mu save/store ang imo inputs -->

<!-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("eventForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent default form submission

            // Get form data using FormData object
            var formData = new FormData(document.getElementById("eventForm"));

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "api.php", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Handle successful response
                        alert(xhr.responseText); // Show alert with response message
                    } else {
                        // Handle error
                        alert('Error: Something went wrong.');
                    }
                }
            };

            xhr.send(formData); // Send form data via AJAX
        });
    });
</script> -->