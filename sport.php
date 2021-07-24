<!DOCTYPE HTML>
<html>

<head>
    <style>
        .error {
            color: darkred;
        }
    </style>
    <title>E-clearance</title>

</head>

<body>

    <?php
    // define variables and set to empty values
    $nameErr = $tick = "";
    $name = $tick = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["sport_name"])) {
            $nameErr = "Instructor's name is required";
        } else {
            $name = test_input($_POST["sport_name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["tick"])) {
            $tickErr = "Selection is required";
        } else {
            $tick = test_input($_POST["tick"]);
        }
    }


    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
    <img src="pic/AUL.png"></img>
    <p><b>PMB </b>001, Ipaja Post Office, Ayobo, Ipaja, Lagos</p>
    <p><b>Email</b>:registrar@aul.edu.ng</p>
    <p><b>CLEARANCE FORM FOR  ACADEMIC SESSION</b></p>
    <p><b>GRADUATING STUDENT OF ANCHOR UNIVERSITY LAGOS</b></p>
    <h2>SPORTS DIVISION</h2>
    <p>This is to certify that this student has fully sttled his/her indebtedness to the Sports Division and is herby cleared.</p>
    <form method="post" action="unilib.php">
        <input type="text" name="sport_name" placeholder="Name of Officer in charge...">
        <span class="error"> <?php echo $nameErr; ?></span>
        <br><br>
        Selection:
        <input type="radio" name="tick" <?php if (isset($tick) && $gender == "Cleared") echo "checked"; ?>>Cleared
        <input type="radio" name="tick" <?php if (isset($tick) && $gender == "Not cleared") echo "checked"; ?>>Not Cleared
        <span class="error"> <?php echo $tickErr; ?></span>
        <br><br>
        <input type="submit" name="submit" value="Submit">

    </form>

</body>

</html>