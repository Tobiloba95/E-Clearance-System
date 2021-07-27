<!DOCTYPE HTML>
<html>

<head>
    <style>
        .error {
            color: darkred;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=depth, initial-scale=1.0">
    <meta http-eqiv="X-UA-Compatible" content="ie=edge">
    <title>e-Clearance</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,400;1,500&display=swap" rel="stylesheet"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;1,400;1,500&display=swap" rel="stylesheet"> 

</head>

<body>

    <?php
    // define variables and set to empty values
    $nameErr = $tick = "";
    $name = $tick = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["stuaff_name"])) {
            $nameErr = "Student affairs officer's name is required";
        } else {
            $name = test_input($_POST["stuaff_name"]);
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
    <header>
        <div class="logo-container">
            <img src="pic/AUL.png" alt="logo">
            <p><b>PMB </b>001, Ipaja Post Office, Ayobo, Ipaja, Lagos</p>
            <p><b>Email </b>: registrar@aul.edu.ng</p>
            <p><b>CLEARANCE FORM FOR  ACADEMIC SESSION</b></p>
            <p><b>GRADUATING STUDENT OF ANCHOR UNIVERSITY LAGOS</b></p>

        </div>
    </header>
    <h2>STUDENT AFFAIRS</h2>
    <p>This is to certify that this student has fully settled his/her indebtedness to the Student Affairs and is herby cleared.</p>
    <form method="post" action="bursary.php">
        <input type="text" name="stuaff_name" placeholder="Student Affairs Officer...">
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