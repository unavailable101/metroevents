<!-- <?php

    // include("api.php");

    // if ($_SERVER["REQUEST_METHOD"] == "POST"){
    //     createEvent();
    // }
?> -->

<div style="display: inline-block; vertical-align: top; margin-top: 25px; width: 40%;">
    <div>
        <span>
            <?php
                echo '<h1 style="margin-bottom: 0px;">' . $_SESSION['name'] . '</h1>';
            ?>
        </span>
        <hr style="width: 100%; margin: 0;">
        <h3 style="margin-top: 0px;">
        <?php
            echo $_SESSION['username'];
        ?>
        </h3>
    </div>

    <div class="create-container" style="width: 60%; padding: 10px; margin-top: 50px;">
        
        <span>
            Joined Events: 
        </span>

        <br><br>

        <span>
            Organized Events: 
        </span>
        
    </div>
</div>

<!-- <div style="display: inline-block; vertical-align: top; margin-top: 10px; width: 55%; float: right; overflow-y: auto; height: 84%;"> -->
    <!-- ang mga events na gi create ni admin -->
    <!-- <div> -->
        <!-- <?php
           // echo adminEvents();
        ?> -->
    <!-- </div> -->
</div>