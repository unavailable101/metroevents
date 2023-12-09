<?php

    $userJSON = "user.json";
    $stored_users = json_decode(file_get_contents($userJSON), true);
    $new_user;

    function toLogin(){
        global $userJSON; 
        global $stored_users;
        foreach ($stored_users as $user) {
            if($user['username'] == $_POST['username']){
            //    if(password_verify($this->password, $user['password'])){
                  // You can set a session and redirect the user to his account.
                  $_SESSION['username'] = $_POST['username'];
                  $_SESSION['name'] = $user['name'];
                  $_SESSION['uid'] = $user['uid'];

                  echo "<script>alert('You are logged in. Hello {$_SESSION['username']}')</script>";
                  header("Location: index.php");
                  exit();
            //    }
            }
         }
         echo"<script>alert('Log in failed')</script>";
         //  return $this->error = "Wrong username or password";
    }

    function toRegister(){
        global $userJSON;
        global $stored_users;
        global $new_user;
        $lastUser = end($stored_users);
        $new_user = [
            "uid" => $lastUser['uid']+1,
            "name" => $_POST['name'],
            "username" => $_POST['username'],
            "email" => $_POST['email'],
            "password" => $_POST['password']
        ];

        $_SESSION['uid'] = $new_user['uid'];
        $_SESSION['name'] = $new_user['name'];
        $_SESSION['username'] = $new_user['username'];
        $_SESSION['email'] = $new_user['email'];
        
        array_push($stored_users, $new_user);
        if(file_put_contents($userJSON, json_encode($stored_users, JSON_PRETTY_PRINT))){
            echo "<script>alert('Your registration was successful')</script>";
            header("Location: index.php");
            exit();
         }else{
            echo "<script>alert('Something went wrong, please try again')</script>";
         }
    }

    // for events nani dire dapit
    $eventJSON = "events.json";
    $stored_events = json_decode(file_get_contents($eventJSON), true);

    function createEvent() {
        global $eventJSON;
        global $stored_events;

        $lastEvent = end($stored_events);
        $eventId = isset($lastEvent['eventId']) ? $lastEvent['eventId'] + 1 : 1; // Generate unique event ID

        $new_event = [
            "eventId" => $eventId,
            "adminId" => $_SESSION['uid'],
            "orgId" => null,
            "participants" => [],
            "eventName" => $_POST['eventName'],
            "eventType" => $_POST['eventType'],
            "eventDate" => $_POST['eventDate'],
            "eventTime" => $_POST['eventTime']
        ];

        array_push($stored_events, $new_event);

        if (file_put_contents($eventJSON, json_encode($stored_events, JSON_PRETTY_PRINT))) {
            //echo "<script>alert('Event creation successful')</script>";
        } else {
            echo "<script>alert('Failed to create event. Please try again.')</script>";
        }
    }

    function adminEvents(){
        global $eventJSON;
        global $stored_events;
        global $stored_users;

        $reverseEvents = array_reverse($stored_events);
        //note: after <h4>tag [eventType] kay ang ratings na star2
        foreach($reverseEvents as $event){
            if ($event['adminId'] == $_SESSION['uid']){
                
                $orgName;
                //get name of organizer
                foreach($stored_users as $org){
                    if ($event['orgId'] == $org['uid']){
                        $orgName = $org['name'];
                    } else {
                        $orgName = null;
                    }
                }

                $lastP = end($event['participants']);
                $noParts = isset($lastP['partId']) ? $lastP['partId'] : 0;
                echo '
                    <div style="border: 1px solid black; margin: 10px; padding:10px;">
                        <h2 style="margin: 0;">' . $event['eventName'] . '</h2>
                        <hr style="margin-top:10;margin-bottom:10;">
                        <h3 style="margin: 0;">'. 
                            $event['eventType'] . '<br><p style="font-size: 15px;margin-top: 0;">' . $event['eventDate'] . ' @ ' . $event['eventTime'] .
                        '</p></h3>
                        <p>Organizer: '.$orgName.'</p>
                        <p>Participants: '. $noParts .'</p>
                        <button onclick = "showCancellationModal(' . $event['eventId'] . ')">Cancel Event</button>
                    </div>
                ';
                // Hidden Modal
                echo '
                <div id="cancelModal" class="modal">
                    <div class="modal-content">
                        <span class="close" onclick="hideCancellationModal()">&times;</span>
                        <textarea id="cancelReason" rows="4" cols="50" placeholder="Enter reason for cancellation..."></textarea>
                        <button onclick="cancelEvent(' . $event['eventId'] . ')">Submit</button>
                    </div>
                </div>
                ';
            }
        }
    }

    function allEvents(){
        global $eventJSON;
        global $stored_events;
        global $stored_users;

        $reverseEvents = array_reverse($stored_events);

        foreach($reverseEvents as $event){

            $orgUsername;
            $adUsername;
            //get name of organizer and admin
            foreach($stored_users as $user){
                
                //for admin
                if ($event['adminId'] == $user['uid']){
                    $adUsername = $user['username'];
                }

                //for organizer
                if ($event['orgId'] == $user['uid']){
                    $orgUsername = $user['username'];
                } else {
                    $orgUsername = null;
                }
            }
            
            $lastP = end($event['participants']);
            $noParts = isset($lastP['partId']) ? $lastP['partId'] : 0;

            $buttonText; 
            if ($orgUsername == null) { 
                $buttonText = 'Request to be an Organizer';
            } else { 
                $buttonText = 'Request to Join';
            }

            echo '
                <div style="display: inline-block; width: 300px; height: 250px; border: 1px solid black; margin-top: 1.5%; padding: 10px; border-radius: 10px;">
                    <center>
                        <h2 style="margin: 0;">'. $event['eventName'] .'</h2>
                    </center>
                    <hr style="margin-top:10;margin-bottom:10;">
                    <h3 style="margin: 0;">' .
                         $event['eventType'] . '<br><p style="font-size: 15px;margin-top: 0;">' . $event['eventDate'] . ' @ ' . $event['eventTime'].'</p></h3>
                    <p>Admin: '.$adUsername.'</p>
                    <p>Organizer: '.$orgUsername.'</p>
                    <p>Participants: '. $noParts .'</p>
                    <button>' . $buttonText . '</button>
                </div>';
        }
    }

?>