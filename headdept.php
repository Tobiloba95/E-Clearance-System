<!DOCTYPE HTML>
<html>

<head>
    <style>
        .error {
            color: darkred;
        }
    </style>

</head>

<body>

    <?php
    // define variables and set to empty values
    $nameErr = $tick = "";
    $name = $tick = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["option"])) {
            $tickErr = "Selection is required";
        } else {
            $tick = test_input($_POST["option"]);
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
    <img src="AUL.png"></img>
    <p><b>PMB </b>001, Ipaja Post Office, Ayobo, Ipaja, Lagos</p>
    <p><b>Email</b>:registrar@aul.edu.ng</p>
    <p><b>CLEARANCE FORM FOR  ACADEMIC SESSION</b></p>
    <p><b>GRADUATING STUDENT OF ANCHOR UNIVERSITY LAGOS</b></p>
    <h2>HEAD OF DEPARTMENT</h2>
    <p>This is to certify that this student has fully sttled his/her indebtedness to the Department and is herby cleared.</p>
    <form method="post" action="faculty.php">
        <input type="text" name="name" placeholder="Name of Head of Department...">
        <span class="error"> <?php echo $nameErr; ?></span>
        <br><br>
        Selection:
        <input type="radio" name="option" <?php if (isset($tick) && $gender == "Cleared") echo "checked"; ?>>Cleared
        <input type="radio" name="option" <?php if (isset($tick) && $gender == "Not cleared") echo "checked"; ?>>Not Cleared
        <span class="error"> <?php echo $tickErr; ?></span>
        <br><br>
        <input type="submit" name="submit" value="Submit">

    </form>

</body>

</html>