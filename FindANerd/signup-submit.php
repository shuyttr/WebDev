<?php include("top.html"); ?>

<?php
    $name = htmlspecialchars($_POST["name"]);
    $gender = $_POST["gender"];
    $age = $_POST["age"];
    $personality = $_POST["personality"];
    $os = $_POST["favoriteos"];
    $minage = $_POST["minage"];
    $maxage = $_POST["maxage"];

    $string_to_add_to_file = $name . "," . $gender . "," . $age . "," . $personality . "," . $os . "," . $minage . "," . $maxage;
    $text = file_get_contents("singles.txt");
    $lines = explode("\n", $text);
    array_push($lines, $string_to_add_to_file);
    $text = implode("\n", $lines);
    file_put_contents("singles.txt", $text);

?>
<div>
    <h1>Thank you!</h1>
    Welcome to NerdLuv, <?= $name ?>!<br />
    Now <a href="matches.php">log in to see your matches!</a>
</div>
<?php include("bottom.html"); ?>
