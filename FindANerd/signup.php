<?php include("top.html"); ?>
    <div>
        <form action="http://162.243.171.11/aroffe/hw5/Resources/signup-submit.php" method="post">
            <fieldset>
                <legend>New User Signup</legend>

                <div id="w3c" class="match">
                    <strong><label class="left" for="name">Name:</label></strong>
                    <input class="column" type="text" name="name" id="name" size="16"/> <br />
                </div>

                <div id="w3c" class="match">
                    <strong><label class="left">Gender:</label></strong>
                    <div class="column">
                        <label><input type="radio" name="gender" value="M" />Male</label>
                        <label><input type="radio" name="gender" value="F" />Female</label>
                    </div>
                </div>

                <div id="w3c" class="match">
                    <strong><label class="left" for="age">Age:</label></strong>
                    <input class="column" type="text" name="age" id="age" size="6" maxlength="2" />
                </div>
               
                <div id="w3c" class="match">
                    <strong><label class="left" for="personality">Personality Type:</label></strong>
                    <input class="column" type="text" name="personality" id="personality" size="6" maxlength="4" />
                    <a href="http://www.humanmetrics.com/cgi-win/JTypes2.asp">(Don't know What your type is?)</a>
                </div>

                <div id="w3c" class="match">
                    <strong><label class="left">Favorite OS:</label></strong>
                    <select name="favoriteos" class="column">
                        <option selected="selected">Windows</option>
                        <option>Mac OS X</option>
                        <option>Linux</option>
                    </select>
                </div>

                <div id="w3c" class="match">
                    <strong><label class="left">Seeking Age:</label></strong>
                    <input type="text" name="minage" size="6" maxlength="2" placeholder="min" /> to
                    <input type="text" name="maxage" size="6" maxlength="2" placeholder="max" />
                </div>

                <input type="submit" value="Sign Up" />
            </fieldset>
        </form>
    </div>

<?php include("bottom.html"); ?>