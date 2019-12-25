<?php include("top.html"); ?>
    <div>
        <form action="http://162.243.171.11/aroffe/hw5/Resources/matches-submit.php" method="get">
            <fieldset>
                <legend>Returning User</legend>

                <div id="w3c" class="match">
                    <strong><label class="left" for="name">Name:</label></strong>
                    <input class="column" type="text" name="name" id="name" size="16" />
                 </div>
                <input type="submit" value="View My Matches" />
            </fieldset>
        </form>
    </div>
<?php include("bottom.html");
