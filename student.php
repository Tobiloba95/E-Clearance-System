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
    $nameErr = $emailErr = $genderErr = $departmentErr = $facultyerr = "";
    $name = $email = $gender = $faculty = $department = "";

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

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        if (empty($_POST["department"])) {
            $departmentErr = "Department is required";
        } else {
            $department = test_input($_POST["department"]);
        }

        if (empty($_POST["faculty"])) {
            $facultyErr = "Faculty is required";
        } else {
            $faculty = test_input($_POST["faculty"]);
        }


        if (empty($_POST["phoneno"])) {
            $phonenoErr = "Phone Number is required";
        } else {
            $phoneno = test_input($_POST["phoneno"]);
        }

        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
        } else {
            $gender = test_input($_POST["gender"]);
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
    <h2>Student Biodata</h2>
    <form method="post" action="biology.php">
        <input type="text" name="name" placeholder="full name...">
        <span class="error"> <?php echo $nameErr; ?></span>
        <br><br>
        <input type="text" name="email" placeholder="email...">
        <span class="error"> <?php echo $emailErr; ?></span>
        <br><br>
        <input type="text" name="department" placeholder="department...">
        <span class="error"> <?php echo $departmentErr; ?></span>
        <br><br>
        <input type="text" name="faculty" placeholder="faculty...">
        <span class="error"> <?php echo $facultyErr; ?></span>
        <br><br>
        <input type="number" name="phoneno" placeholder="phone number...">
        <span class="error"> <?php echo $phonenoErr; ?></span>
        <br><br>
        Gender:
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?>>Female
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?>>Male
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "other") echo "checked"; ?>>Other
        <span class="error"> <?php echo $genderErr; ?></span>
        <br><br>
        <input type="submit" name="submit" value="Submit"></a>

    </form>

</body>

</html>