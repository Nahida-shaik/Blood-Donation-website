<?php
include "db-connect.php";

if (isset($_POST['logout'])) {
    //session_destroy();
    setcookie("user", "", time() - 60 * 60 * 24, "/");
    header("location:index.php");
}

?>
<!DOCTYPE html>
<html>

<head>
    <title> Blood Donors Society</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
    
    <link rel="stylesheet" href="css/styles.css"> <!-- Ensure this file is correctly linked -->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

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
    <div class="section2" id="home">
        <h1>Be a hero, give the gift of life</h1>
        <h3>Welcome to LifeDrop🩸– Your Lifeline in Times of Need<br><br>Drop by drop,we build hope</h3>
        <button class="btn1" onclick="window.location.href='register.php'">Join as Donor</button>
        <button class="btn2" onclick="window.location.href='#SearchDonors'">Search Donors</button><br />
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 style="color:#660000 ;">Donate The Blood</h1>
                <br>
                <br>
                <p class="pera-text">
                    Donate Blood – Be a Lifesaver!<br>
                    "A single pint can save three lives, a single gesture can create a million smiles."<br><br>

                    Blood donation is one of the most selfless acts of kindness. Every drop you donate can make the difference between life and death for someone in need. Whether it’s an accident victim, a cancer patient, or someone undergoing surgery, your donation can bring hope and healing.
                </p>

                <p class="pera-text">
                    <strong style="color:red ;">Why Donate Blood?</strong><br>
                    ✅ Saves Lives: Your donation can help patients battling severe illnesses, injuries, and surgeries.<br>
                    ✅ Promotes Good Health: Regular donation stimulates blood cell production and improves heart health.<br>
                    ✅ Encourages Community Support: Blood banks often face shortages—your contribution helps bridge the gap.<br>
                    ✅ Takes Just a Few Minutes: A simple act that requires little effort but has a massive impact.<br>
                </p>

                <p class="pera-text">
                    <strong style="color:red ;">Who Can Donate?</strong><br>
                    ✔️ Age: 18-60 years<br>
                    ✔️ Weight: At least 50 kg<br>
                    ✔️ Good health with no infections or chronic diseases<br>
                    ✔️ No recent surgeries or major medical treatments<br>
                </p>

                <p class="pera-text">
                    <strong style="color:red ;">How to Donate?</strong><br>
                    1️⃣ Register – Sign up as a donor on LifeDrop.<br>
                    2️⃣ Find a Camp or Blood Bank – Check nearby donation centers or upcoming drives.<br>
                    3️⃣ Donate Safely – Follow medical guidelines for a smooth donation process.<br>
                    4️⃣ Spread the Word – Encourage friends and family to become blood donors!<br>
                </p>

                <p class="pera-text">
                    <strong>Remember:</strong><br>
                    "You don’t need a special reason to donate blood. You just need your own reason that makes you realize the power of saving a life."
                </p>

                <a href="register.php" class="btn btn-default">Become a Life Saver!</a>
            </div>
        </div>
    </div>

    
			<!-- end doante section -->
    <div id="SearchDonors" class="section3">
        <h1>Search Donors</h1>
        <div class="row">
            <form action="search-donors.php" method="post">
                <div class="column">
                    <label for="blood_group">Blood Group</label><br />
                    <select id="blood_group" name="blood_group" required>
                        <option value="0">Select</option>
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
    <div class="section4">
        <h1 style="text-align: center;">We're a network of</h1>
        <div class="row">
            <div class="column">
                <center>
                    <i aria-hidden="true" class="fa fa-user fa-3x"></i><br />
                    <h2>100 Donors</h2>
                </center>
            </div>
            <div class="column">
                <i aria-hidden="true" class="fa fa-map-marker fa-3x" size></i><br />
                <h2>26 Districts</h2>
            </div>
            <div class="column">
                <i aria-hidden="true" class="fa fa-users fa-3x"></i><br />
                <h2>8 Blood Groups</h2>
            </div>
        </div>
    </div>
    <div class="section5" id="AboutUs">
    <div style="display: flex; justify-content: space-between; width: 100%; padding: 20px; box-sizing: border-box;">
    <div style="flex: 1; margin: 10px; padding: 20px; background: white; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); text-align: center;">
        <img src="img/vision.png" alt="Vision" style="width: 100px; height: 100px;">
        <h2 style="color: darkred;">Our Vision</h2>
        <p>"A world where no life is lost due to blood scarcity"<br>"We envision a world where no life is lost due to blood scarcity.
Every patient in need should receive timely blood donations.
By building a strong network of voluntary donors,
we ensure that no one suffers due to a lack of available blood."</p>
    </div>
    
    <div style="flex: 1; margin: 10px; padding: 20px; background: white; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); text-align: center;">
        <img src="img/goal.png" alt="Goal" style="width: 100px; height: 100px;">
        <h2 style="color: darkred;">Our Goal</h2>
        <p>"Saving lives, one drop at a time"<br> "Our goal is to save lives, one drop at a time.
We aim to spread awareness about the importance of blood donation.
By creating a seamless and efficient donor-recipient system,
we make life-saving blood available whenever needed."</p>
    </div>
    
    <div style="flex: 1; margin: 10px; padding: 20px; background: white; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); text-align: center;">
        <img src="img/target.png" alt="Mission" style="width: 100px; height: 100px;">
        <h2 style="color: darkred;">Our Mission</h2>
        <p>"Creating a future where no blood request goes unanswered"<br>"We strive to ensure no blood request goes unanswered.
Our mission is to connect donors and recipients in real time.
By leveraging technology and community support,
we create a reliable and accessible blood donation network."</p>
    </div>
</div>
</div>

<!-- blogs section -->
<section class="section6" id="blogs">
    <h2>Latest Blogs</h2>

    <article class="blog-post">
        <img src="images/blood-donation.jpg" alt="Understanding Blood Donation">
        <h3>Understanding Blood Donation</h3>
        <p>Blood donation saves lives! Learn about the importance of donating blood and how you can contribute.</p>
        <a href="blog1.php">Read More</a>
    </article>

    <article class="blog-post">
        <img src="images/who-can-donate.jpg" alt="Who Can Donate Blood?">
        <h3>Who Can Donate Blood?</h3>
        <p>Not everyone is eligible to donate blood. Find out the requirements and if you qualify.</p>
        <a href="blog2.php">Read More</a>
    </article>

    <article class="blog-post">
        <img src="images/blood-myths.jpg" alt="Blood Donation Myths">
        <h3>Blood Donation Myths</h3>
        <p>There are many misconceptions about donating blood. Let’s debunk some common myths.</p>
        <a href="blog3.php">Read More</a>
    </article>

    <article class="blog-post">
        <img src="images/donor-experience.jpg" alt="My First Blood Donation Experience">
        <h3>My First Blood Donation Experience</h3>
        <p>Read the inspiring story of a first-time donor who saved a life and found the experience fulfilling.</p>
        <a href="blog4.php">Read More</a>
    </article>
</section>



    <div class="footer" style="background-color:#8B0000;">
        <div class="elementor-shape" data-negative="false">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1800 5.8" preserveAspectRatio="none">
                <path class="elementor-shape-fill" d="M5.4.4l5.4 5.3L16.5.4l5.4 5.3L27.5.4 33 5.7 38.6.4l5.5 5.4h.1L49.9.4l5.4 5.3L60.9.4l5.5 5.3L72 .4l5.5 5.3L83.1.4l5.4 5.3L94.1.4l5.5 5.4h.2l5.6-5.4 5.5 5.3 5.6-5.3 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.4h.2l5.6-5.4 5.4 5.3L161 .4l5.4 5.3L172 .4l5.5 5.3 5.6-5.3 5.4 5.3 5.7-5.3 5.4 5.4h.2l5.6-5.4 5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.4 5.3 5.6-5.3 5.5 5.4h.2l5.6-5.4 5.5 5.3L261 .4l5.4 5.3L272 .4l5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.4h.1l5.7-5.4 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.4 5.3 5.7-5.3 5.4 5.4h.2l5.6-5.4 5.5 5.3L361 .4l5.5 5.3 5.6-5.3 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.4h.1l5.7-5.4 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.4h.1l5.6-5.4 5.5 5.3L461 .4l5.5 5.3 5.6-5.3 5.4 5.3 5.7-5.3 5.4 5.3 5.6-5.3 5.5 5.4h.2l5.6-5.4 5.5 5.3 5.6-5.3 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.4h.1L550 .4l5.4 5.3L561 .4l5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.4 5.3 5.6-5.3 5.5 5.4h.2l5.6-5.4 5.5 5.3 5.6-5.3 5.4 5.3 5.7-5.3 5.4 5.3 5.6-5.3 5.5 5.4h.2L650 .4l5.5 5.3 5.6-5.3 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.4 5.4h.2l5.6-5.4 5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.4 5.3 5.6-5.3 5.5 5.4h.2L750 .4l5.5 5.3 5.6-5.3 5.4 5.3 5.7-5.3 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.4h.1l5.7-5.4 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.4 5.4h.2L850 .4l5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.4h.2l5.6-5.4 5.4 5.3 5.7-5.3 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.4h.1l5.7-5.4 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.4 5.3 5.6-5.3 5.5 5.4h.2l5.6-5.4 5.5 5.3 5.6-5.3 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.4h.2l5.6-5.4 5.4 5.3 5.7-5.3 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.4 5.4h.2l5.6-5.4 5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.4 5.3 5.6-5.3 5.5 5.4h.2l5.6-5.4 5.5 5.3 5.6-5.3 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.4h.1l5.7-5.4 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.4 5.4h.2l5.6-5.4 5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.4h.2l5.6-5.4 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.4h.1l5.7-5.4 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.4 5.3 5.6-5.3 5.5 5.4h.2l5.6-5.4 5.5 5.3 5.6-5.3 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.4h.2l5.6-5.4 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.4 5.3 5.7-5.3 5.4 5.4h.2l5.6-5.4 5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.4 5.3 5.6-5.3 5.5 5.4h.2l5.6-5.4 5.5 5.3 5.6-5.3 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.4h.1l5.6-5.4 5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.4 5.3 5.7-5.3 5.4 5.4h.2l5.6-5.4 5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.4h.1l5.7-5.4 5.4 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.5 5.4h.1l5.6-5.4 5.5 5.3 5.6-5.3 5.5 5.3 5.6-5.3 5.4 5.3 5.7-5.3 5.4 5.3 5.6-5.3 5.5 5.4V0H-.2v5.8z"></path>
            </svg>
        </div>
        <div class="column left">
            <h1>LifeDrop🩸</h1>
            <p>LifeDrop🩸 is an automated blood service that connects blood searchers with voluntary blood donors in a moment through SMS and website.</p>
            <a href="#"><i aria-hidden="true" class="fa fa-facebook fa-2x"></i></a>
            <a href="#"><i aria-hidden="true" class="fa fa-twitter fa-2x"></i></a>
            <a href="#"><i aria-hidden="true" class="fa fa-linkedin fa-2x"></i></a><br />
            <div class="xyz">
                <a href="/terms">Terms & Conditions</a> | <a href="/policy">Privacy Policy</a>
            </div>
        </div>
        
        <div class="column right">
            <h1 style="color: #333333;">Quick Links</h1>
            <a href="contact-us.php">Contact Us</a>
            <br />
            <a href="#">Different Blood Groups</a>
            <br />
            <a href="#">Who can donate blood?</a>
            <br />
            <a href="#">Different Blood Terms</a>
            <br />
        </div>
    </div>
</body>

</html>
