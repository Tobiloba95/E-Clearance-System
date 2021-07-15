<!DOCTYPE HTML>
<html>

<head>
    <style>
        .error {
            color: darkred;
        }
    </style>
    <script>
        function myFunction() {
            document.getElementById("demo").innerPHP = Biology.php;
        }
    </script>
</head>

<body>

    <?php
    // define variables and set to empty values
    $nameErr = $tick="";
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

    <h2>Biology Labouratory</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="text" name="name" placeholder="full name...">
        <span class="error"> <?php echo $nameErr; ?></span>
        <br><br>        
        Selection
        <input type="radio" name="option" <?php if (isset($tick) && $gender == "Cleared") echo "checked"; ?>>Cleared
        <input type="radio" name="option" <?php if (isset($tick) && $gender == "Not cleared") echo "checked"; ?>>Not Cleared
        <span class="error"> <?php echo $tickErr; ?></span>
        <br><br>
        <input type="submit" name="submit" value="Submit" onclick="myFunction()">

    </form>

</body>

</html>