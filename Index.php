<?php

require_once("AutoLoad.php");

$p1="";
$p2="";
$nameErr = "";
$name2Err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["player1"])) {
        $nameErr = "Player 1 is required";
    } else {
        $p1 = test_input($_POST["player1"]);
        $s1 = $_POST["strategy1"];

        if (!preg_match("/^[a-zA-Z ]*$/", $p1)) {
            $nameErr = "Only letters and white space allowed";
        } else {
            $player1 = new Classes\Player($p1,$s1);
            #debugOutput($player1);
        }
    }

    if (empty($_POST["player2"])) {
        $name2Err = "Player 2 is required";
    } else {
        $p2 = test_input($_POST["player2"]);
        $s2 = $_POST["strategy2"];

        if (!preg_match("/^[a-zA-Z ]*$/", $p2)) {
            $name2Err = "Only letters and white space allowed";
        } else {
            $player2 = new Classes\Player($p2,$s2);
            #debugOutput($player2);
        }
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function debugOutput ($output)
{
    echo "<pre>";
    print_r ($output);
    echo "</pre>";
}

?><pre><?
printf($player1);
?></pre><?

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Game</title>
</head>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="player1">Player 1</label>
    <input type="text" id="player1" name="player1" value="<?php echo $p1 ?>">
    <label>
        <select name="strategy1">
            <option value="Random">Random</option>
            <option value="Defensive">Defensive</option>
            <option value="Offensive">Offensive</option>
        </select>
    </label>
    <span class="error">* <?php echo $nameErr; ?></span>
    <br>
    <label for="player2">Player 2</label>
    <input type="text" id="player2" name="player2" value="<?php echo $p2 ?>">
    <label>
        <select name="strategy2">
            <option value="Random">Random</option>
            <option value="Defensive">Defensive</option>
            <option value="Offensive">Offensive</option>
        </select>
    </label>
    <span class="error">* <?php echo $name2Err; ?></span>
    <br>
    <input type="submit" name="submit" value="!!! Start the game !!!">
</form>

<br>
<strong>Player
    1: </strong><?php if (isset($player1) && is_a($player1, "Classes\Player")) echo $player1->getName(); else echo "Nog geen naam ingegeven"; ?>
<br>
<strong>Health: </strong><?php if (isset($player1) && is_a($player1, "Classes\Player")) echo $player1->getHealth(); else echo ""; ?>
<br>
<strong>Weapon: </strong><?php if (isset($player1) && is_a($player1, "Classes\Player")) echo $player1->getStrategy()->getWeapon()->getName(); else echo ""; ?>
<br>
<strong>Armor: </strong><?php if (isset($player1) && is_a($player1, "Classes\Player")) echo $player1->getStrategy()->getArmor()->getName(); else echo ""; ?>
<br>
<br>
<strong>Player
    2: </strong><?php if (isset($player2) && is_a($player2, "Classes\Player")) echo $player2->getName(); else echo "Nog geen naam ingegeven"; ?>
<br>
<strong>Health: </strong><?php if (isset($player2) && is_a($player2, "Classes\Player")) echo $player2->getHealth(); else echo ""; ?>
<br>
<strong>Weapon: </strong><?php if (isset($player2) && is_a($player2, "Classes\Player")) echo $player2->getStrategy()->getWeapon()->getName(); else echo ""; ?>
<br>
<strong>Armor: </strong><?php if (isset($player2) && is_a($player2, "Classes\Player")) echo $player2->getStrategy()->getArmor()->getName(); else echo ""; ?>
<br /><br />

<?php


?>
</body>
</html>