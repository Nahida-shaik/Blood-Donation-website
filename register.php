<?php

include "db-connect.php";

if (isset($_COOKIE['user'])) {
    header("location: panel/home.php");
}

function validate_data($val)
{
    $val = trim($val);
    $val = stripslashes($val);
    $val = htmlspecialchars($val);

    return $val;
}

$error   = "";
$success = "";
$color   = "";
$flag    = 0;

if (isset($_POST['submit'])) {
    $first_name       = $_POST['first_name'];
    $last_name        = $_POST['last_name'];
    $email            = $_POST['email'];
    $phone            = $_POST['phone'];
    $age              = $_POST['age'];
    $gender           = $_POST['gender'];
    $blood_group      = $_POST['blood_group'];
    $district         = $_POST['district'];
    $password         = $_POST['pwd'];
    $confirm_password = $_POST['confirm_pwd'];

    if (empty($first_name) || empty($last_name) || empty($email) || empty($phone) || empty($password) || empty($age) || empty($gender) || empty($blood_group) || empty($district)) {
        $error = "You did not fill out the required fields!<br>";
        $color = "red";
    } else {
        if ($password != $confirm_password) {
            $error = "Password & Confirm Password is not same<br>";
            $color = "red";
        } else {
            $first_name  = validate_data($first_name);
            $last_name   = validate_data($last_name);
            $email       = validate_data($email);
            $phone       = validate_data($phone);
            $age         = validate_data($age);
            $gender      = validate_data($gender);
            $blood_group = validate_data($blood_group);
            $district    = validate_data($district);
            $password    = validate_data($password);

            $password = md5($password);

            $sql    = "INSERT into users(first_name,last_name,age,gender,blood_group,district,email,phone,password,eligible) values('$first_name','$last_name','$age','$gender','$blood_group','$district','$email','$phone','$password','0')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $success = "Account Created Successfully!<br>";
                $color   = "green";
                $flag    = 1;
            } else {
                $error = "Account with the following email or number Already exist!<br>";
                $color = "red";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Create Account | LifeDrop</title>
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
    <link rel="stylesheet" type="text/css" href="css/reg.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <?php
if ($flag == 1) {
    echo "<meta http-equiv=\"refresh\" content=\"3;url=login.php\" />";
    $flag = 0;
}?>

</head>

<body>
    <div class="topnav">
    <li><a href="index.php" class="navlogo"><i class="fa fa-tint"></i> LifeDrop</a></li>

<li><a href="index.php">Home</a></li>
<li><a href="register.php">Donate</a></li>
<li><a href="about-us.php">About Us</a></li>
<li><a href="search-donors.php">Search Donors</a></li>
<li><a href="emergency.php">Blogs</a></li>
        <li><a href="" class="site-search"><i class="fa fa-search" aria-hidden="true"></i></a></li>
    </div>
    <div class="register">
        <center>
            <form action="" method="POST">
                <h1>CREATE ACCOUNT</h1>
                <span style="text-align:center; color:<?php echo "$color"; ?>; font-size: 15px;">
                    <?php echo "$error$success"; ?></span>
                <div class="fname">
                    <input type="text" placeholder="First Name" name="first_name" ></br>
                </div>
                <div class="lastname">
                    <input type="text" placeholder="Last Name" name="last_name" ></br>
                </div>
                <div class="email">
                    <input type="email" placeholder="Email" name="email" ></br>
                </div>
                <div class="mobile">
                    <input type="text" placeholder="Mobile Number" name="phone" ></br>
                </div>
                <div class="age">
                    <input type="text" placeholder="Age" name="age"></br>
                </div>
                <div class="gender">
                    <select id="gender" name="gender" >
                        <option value="">Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="blood_group">
                    <select id="blood_group" name="blood_group" >
                        <option value="">Blood Group</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>
                </div>
                <div class="district">
                    <select id="district" name="district" >
                    <option value="0">Select</option>
        <option value="Alluri Sitharama Raju">Alluri Sitharama Raju</option>
        <option value="Anakapalli">Anakapalli</option>
        <option value="Anantapur">Anantapur</option>
        <option value="Annamayya">Annamayya</option>
        <option value="Bapatla">Bapatla</option>
        <option value="Chittoor">Chittoor</option>
        <option value="East Godavari">East Godavari</option>
        <option value="Eluru">Eluru</option>
        <option value="Guntur">Guntur</option>
        <option value="Kadapa">Kadapa</option>
        <option value="Kakinada">Kakinada</option>
        <option value="Konaseema">Konaseema</option>
        <option value="Krishna">Krishna</option>
        <option value="Kurnool">Kurnool</option>
        <option value="Nandyal">Nandyal</option>
        <option value="NTR">NTR</option>
        <option value="Palnadu">Palnadu</option>
        <option value="Parvathipuram Manyam">Parvathipuram Manyam</option>
        <option value="Prakasam">Prakasam</option>
        <option value="Sri Potti Sriramulu Nellore">Sri Potti Sriramulu Nellore</option>
        <option value="Sri Sathya Sai">Sri Sathya Sai</option>
        <option value="Srikakulam">Srikakulam</option>
        <option value="Tirupati">Tirupati</option>
        <option value="Visakhapatnam">Visakhapatnam</option>
        <option value="Vizianagaram">Vizianagaram</option>
        <option value="West Godavari">West Godavari</option>
                    </select>
                </div>
                <div class="password1">
                    <input type="password" placeholder="Enter Password" name="pwd" ></br>
                </div>
                <div class="password2">
                    <input type="password" placeholder="Confirm Password" name="confirm_pwd" ></br>
                </div>
                <button type="submit" name="submit">Register</button><br>
                <a href="login.php">Already have account?</a>
            </form>
        </center>
    </div>
    <div class="footer">
        <div class="elementor-shape" data-negative="false">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1800 5.8" preserveAspectRatio="none">
                <path class="elementor-shape-fill" d="M5.4.4l5.4 5.3L16.5.4l5.4 5.3L27.5.4 33 5.7 38.6.4l5.5 5.4h.1L49.9.4l5.4 5.3L60.9.4l5.5 5.3L72 .4l5.5 5.3L83.1.4l5.4 5.3L94.1.4l5.5 5.4h.2l5.6-5.4 5.5 5.3 5.6-5.3 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.4h.2l5.6-5.4 5.4 5.3L161 .4l5.4 5.3L172 .4l5.5 5.3 5.6-5.3 5.4 5.3 5.7-5.3 5.4 5.4h.2l5.6-5.4 5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.4 5.3 5.6-5.3 5.5 5.4h.2l5.6-5.4 5.5 5.3L261 .4l5.4 5.3L272 .4l5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.4h.1l5.7-5.4 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.4 5.3 5.7-5.3 5.4 5.4h.2l5.6-5.4 5.5 5.3L361 .4l5.5 5.3 5.6-5.3 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.4h.1l5.7-5.4 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.4h.1l5.6-5.4 5.5 5.3L461 .4l5.5 5.3 5.6-5.3 5.4 5.3 5.7-5.3 5.4 5.3 5.6-5.3 5.5 5.4h.2l5.6-5.4 5.5 5.3 5.6-5.3 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.4h.1L550 .4l5.4 5.3L561 .4l5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.4 5.3 5.6-5.3 5.5 5.4h.2l5.6-5.4 5.5 5.3 5.6-5.3 5.4 5.3 5.7-5.3 5.4 5.3 5.6-5.3 5.5 5.4h.2L650 .4l5.5 5.3 5.6-5.3 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.4 5.4h.2l5.6-5.4 5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.4 5.3 5.6-5.3 5.5 5.4h.2L750 .4l5.5 5.3 5.6-5.3 5.4 5.3 5.7-5.3 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.4h.1l5.7-5.4 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.4 5.4h.2L850 .4l5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.4h.2l5.6-5.4 5.4 5.3 5.7-5.3 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.4h.1l5.7-5.4 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.4 5.3 5.6-5.3 5.5 5.4h.2l5.6-5.4 5.5 5.3 5.6-5.3 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.4h.2l5.6-5.4 5.4 5.3 5.7-5.3 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.4 5.4h.2l5.6-5.4 5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.4 5.3 5.6-5.3 5.5 5.4h.2l5.6-5.4 5.5 5.3 5.6-5.3 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.4h.1l5.7-5.4 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.4 5.4h.2l5.6-5.4 5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.4h.2l5.6-5.4 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.4h.1l5.7-5.4 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.4 5.3 5.6-5.3 5.5 5.4h.2l5.6-5.4 5.5 5.3 5.6-5.3 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.4h.2l5.6-5.4 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.4 5.3 5.7-5.3 5.4 5.4h.2l5.6-5.4 5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.4 5.3 5.6-5.3 5.5 5.4h.2l5.6-5.4 5.5 5.3 5.6-5.3 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.4h.1l5.6-5.4 5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.4 5.3 5.7-5.3 5.4 5.4h.2l5.6-5.4 5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.4h.1l5.7-5.4 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.4h.1l5.6-5.4 5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.4 5.3 5.7-5.3 5.4 5.3 5.6-5.3 5.5 5.4V0H-.2v5.8z"></path>
            </svg>
        </div>
        <div class="column left">
            <h1>LifeDrop</h1>
            <p>LifeDrop is an automated blood service that connects blood searchers with voluntary blood donors in a moment through SMS and website.</p>
            <a href="#"><i aria-hidden="true" class="fa fa-facebook fa-2x"></i></a>
            <a href="#"><i aria-hidden="true" class="fa fa-twitter fa-2x"></i></a>
            <a href="#"><i aria-hidden="true" class="fa fa-linkedin fa-2x"></i></a><br />
            <div class="xyz">
                <a href="/terms">Terms & Conditions</a> | <a href="/policy">Privacy Policy</a>
            </div>
        </div>
        <div class="column right">
            <h1 style="color: #333333;">Quick Links</h1>
            <a href="#">Contact Us</a>
            <br />
            <a href="">Different Blood Groups</a>
            <br />
            <a href="#">Who can donate blood?</a>
            <br />
            <a href="#">Different Blood Terms</a>
            <br />
        </div>
    </div>
</body>

</html>