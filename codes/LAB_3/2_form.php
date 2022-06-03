<?php
$error = '';
$name = '';
$lname = '';
$email = '';
$gender = '';

function clean_text($string) {
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}

if (isset($_POST["submit"])) 
{
    if (empty($_POST["name"])) 
    {
        $error .= '<p><label class = "text-danger">Please Enter your Name</label></p>';
    } 
    else 
    {
        $name = clean_text($_POST["name"]);
        if (!preg_match("/^[a-zA-Z]*$/", $name)) 
        {
            $error .= '<p><label class = "text-danger">Only letters and white space allowed</label></p>';
        }
    }
    if (empty($_POST["lname"])) 
    {
        
    } 
    else 
    {
        $lname = clean_text($_POST["lname"]);
    }
    if (empty($_POST["email"])) 
    {
        $error .= '<p><label class = "text-danger">Please Enter your Email</label></p>';
    } 
    else 
    {
        $email = clean_text($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            $error .= '<p><label class = "text-danger">Invalid email format</label></p>';
        }
    }
    if (empty($_POST["gender"])) 
    {
        $error .= '<p><label class = "text-danger">Gender is required</label></p>';
    } 
    else 
    {
        $gender = clean_text($_POST["gender"]);
    }
    if ($error == '') {
        $file_open = fopen("members.csv", "a");
        $no_rows = count(file("members.csv"));
        if ($no_rows > 1) {
            $no_rows = ($no_rows - 1) + 1;
        }
        $form_data = array(
            'sr_no' => $no_rows,
            'name' => $name,
            'lname' => $lname,
            'email' => $email,
            'gender' => $gender
        );
        fputcsv($file_open, $form_data);
        $error .= '<p><label class = "text-danger">Thank you for contacting us</label></p>';
        $name = '';
        $lname = '';
        $email = '';
        $gender = '';
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>form2</title>
        <link rel="stylesheet" type="text/css" id="applicationStylesheet" href="form2.css"/>
    </head>
    <body>
        <div id="form2">
            <svg class="Rectangle_11">
            <rect id="Rectangle_11" rx="0" ry="0" x="0" y="0" width="904" height="398">
            </rect>
            </svg>
            <svg class="Rectangle_12">
            <rect id="Rectangle_12" rx="0" ry="0" x="0" y="0" width="904" height="90">
            </rect>
            </svg>
            <div id="Welcome_to_IITG_Sodding_Clube">
                <span>Welcome to IITG Sodding Club</span>
            </div>
            <svg class="Rectangle_13">
            <rect id="Rectangle_13" rx="0" ry="0" x="0" y="0" width="276" height="308">
            </rect>
            </svg>
            <svg class="Rectangle_14">
            <rect id="Rectangle_14" rx="10" ry="10" x="0" y="0" width="175" height="53">
            </rect>
            </svg>
            <div id="About_Us" >
                <a href="form.html">about us</a>
            </div>
            <div id="Register">
                <span>Register</span>

            </div>
            <form action="" method="post">
                <div class="container">
                    <?php echo $error; ?>
                    <div id="First_Name_">
                        <label for="fname">First name:</label>
                        <input type="text" name="name" value="<?php echo $name; ?>" height="20" required="text"><br>

                    </div>
                    <div id="Last_Name_">
                        <label for="fname">Last name:</label>
                        <input type="text" name="lname" value="<?php echo $lname; ?>" required="text">
                    </div>
                    <div id="Email_ID_">
                        <label for="email">E-mail:</label>
                        <input type="email" name="email" value="<?php echo $email; ?>" required="email" unique>
                    </div>
                    <div id="Gender_">
                        <span>Gender :</span>
                    </div>

                    </svg>
                    <div id="Male">
                        <input type="radio" name="gender"
                        <?php if (isset($gender) && $gender == "female") echo "checked"; ?>
                               value="female">Female
                        <input type="radio" name="gender"
                        <?php if (isset($gender) && $gender == "male") echo "checked"; ?>
                               value="male">Male
                    </div>
                    <div id="Group_89">
                        <div id="Submite">
                            <button type="submit" class="registerbtn" name="submit" value="Get CSV File">Register</button>
                        </div>
                    </div>
            </form>
    </body>
</html>