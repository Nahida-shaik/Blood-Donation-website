<?php
include 'db-connect.php';
$flag     = 0;
$num_rows = 0;
if (isset($_POST['search'])) {
    $blood_group = $_POST['blood_group'];
    $district    = $_POST['district'];
    $donortype   = $_POST['donortype'];

    if ($donortype == 0) {
        $sql = "SELECT blood_group,district,first_name,last_name FROM users where blood_group=\"$blood_group\" AND district=\"$district\" AND verified = \"1\"";
    } else {
        $sql = "SELECT blood_group,district,first_name,last_name FROM users where blood_group=\"$blood_group\" AND district=\"$district\" AND eligible=\"$donortype\" AND verified = \"1\"";
    }
    $select   = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($select);
    $flag     = 1;
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Search Donors | LifeDrop</title>
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
    <link rel="stylesheet" type="text/css" href="css/oth.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
    <div class="topnav">
    <li><a href="index.php" class="navlogo"><i class="fa fa-tint"></i> LifeDrop</a></li>

<li><a href="index.php">Home</a></li>
<li><a href="register.php">Donate</a></li>
<li><a href="about-us.php">About Us</a></li>
<li><a href="search-donors.php">Search Donors</a></li>
<li><a href="emergency.php">Blogs</a></li>
                <?php if (!isset($_COOKIE['user'])) {
    echo " <li><a href=\"login.php\">Login</a></li>";
} else {

    echo "
        <li><div class=\"dropdown\">
    <button class=\"dropbtn\">Update
      <i class=\"nav-arrow fa fa-angle-down\"></i>
    </button>
    <div class=\"dropdown-content\">
      <a href=\"panel/home.php\">Dashboard</a>
      <form action=\"\" method=\"post\"> <button type=\"submit\" name=\"logout\" class=\"navbutton\">Logout</button>
    </form></a>
    </div>
  </div> </li>";
}
?>
       <li><a href="" class="site-search"><i class="fa fa-search" aria-hidden="true"></i></a></li>
    </div>


        <div id="SearchDonors" class="search">
        <h1>Search Donors</h1>
        <div class="row">
            <form action="" method="post">
                <div class="column">
                    <label for="blood_group">Blood Group</label><br />
                    <select id="blood_group" name="blood_group" required>
                        <option value="">Select</option>
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
                <div class="column">
                    <label for="district">District</label><br />
                    <select id="district" name="district" required>
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
                
                <button type="search" class="search" name="search">SEARCH</button>
            </form>
        </div>
    </div>
<?php if ($flag == 1) {
    echo "
<div class=\"donors\" >
    <div class=\"donor_count\">
        <h3>Total donor found $num_rows </h3>
    </div>";
}
?>
<div class="donor_result">
<?php
if ($num_rows > 0) {
    while ($rows = mysqli_fetch_array($select, MYSQLI_ASSOC)) {

        echo "<div class=\"column-3\">
    <table>
        <tr>
            <td><img src=\"img/avatar.png\" /></td>
            <td>
                <div class=\"bgname\">
                    <span class=\"label\">";
        echo $rows['first_name'] . ' ' . $rows['last_name'];
        echo "</span>
                </div>
                <div class=\"blood_group\">
                    <span class=\"label\">Group: </span>
                    <span class=\"value\">";
        echo $rows['blood_group'];
        echo "</span>
                </div>
                <div class=\"meta district\">
                    <span class=\"label\">District:</span>
                    <span class=\"value\">";
        echo $rows['district'];
        echo "</span>
                    <button class=\"donor_contact\" onclick=\"window.location.href='form.php'\">Get in touch!</button>
                </div>
            </td>
        </tr>
    </table>
</div>";
    }
}

?>
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
