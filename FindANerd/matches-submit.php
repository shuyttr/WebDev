<?php include("top.html"); ?>
<?php
    $name = htmlspecialchars($_GET["name"]);
?>
<div>
    Matches for <?= $name ?>
</div>
<?php
    $text = file_get_contents("singles.txt");
    $lines = explode("\n", $text);
    $do_i_exist = false;
    //print_r($lines);
    for($i = 0; $i < count($lines); $i++){
        $string_array = explode(",", $lines[$i]);
        //print_r($string_array);
        if($name == $string_array[0]){
            $found_identity["name"] = $string_array[0];
            $found_identity["gender"] = $string_array[1];
            $found_identity["age"] = $string_array[2];
            $found_identity["type"] = $string_array[3];
            $found_identity["os"] = $string_array[4];
            $found_identity["min"] = $string_array[5];
            $found_identity["max"] = $string_array[6];
            $do_i_exist = true;
            break;
        }
    }
    //print_r($found_identity);

    //echo count($lines);

    for($j = 0; $j < count($lines); $j++){
        if(!$do_i_exist){
            echo '<strong>Error! Invalid data</strong>';
        break;
        }
        $strings_array = explode(",", $lines[$j]);
        //print_r($strings_array);
        
        if($found_identity["name"] === $strings_array[0]) continue; 
        if($strings_array[1] === $found_identity["gender"]) continue;
        if(!($found_identity["min"] <= $strings_array[2] && $strings_array[2] <= $found_identity["max"])) continue; 
        if($strings_array[4] !== $found_identity["os"])continue;

        $count = 0;
        $possible_person_name_as_assay = str_split($strings_array[3]);
        $taka_person_name_as_array = str_split($found_identity["type"]);
        /*print_r($possible_person_name_as_assay);
        print_r($taka_person_name_as_array);*/
        for($z = 0; $z < 4; $z++){
            if($possible_person_name_as_assay[$z] === $taka_person_name_as_array[$z]){
                $count++;
            }
        }
        //echo $count;
        if($count < 2) continue;

        //print_r($strings_array);
        ?>
        <div class="match">
            <p>
                <img src="http://162.243.171.11/COM3780/homework/4/Resources/user.jpg" width="150px" />
                <?= $strings_array[0]?>
            </p>
            <ul>
                <strong>gender:</strong><li><?= $strings_array[1] ?></li>
                <strong>age:</strong><li><?= $strings_array[2] ?></li>
                <strong>type:</strong><li><?= $strings_array[3] ?></li>
                <strong>OS:</strong><li><?= $strings_array[4] ?></li>
            </ul>
        </div>
    <?php
    } 
?> 
<?php include("bottom.html"); ?>