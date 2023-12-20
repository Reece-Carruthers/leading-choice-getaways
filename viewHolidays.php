<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="styles.css" rel="stylesheet">
    <!-- Link below links a font that is used for the hamburger icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="hamburger.js"></script>
    <title>Leading Choice Getaways - View Holiday Page</title>
</head>
<body>
<header>
    <!-- Desktop header only shown on desktop screens -->
    <h1 id="desktopHeader"><span>L</span>eading <span>C</span>hoice <span>G</span>etaways</h1>
    <!-- Mobile navigation menu, hidden on desktop/tablet screens -->
    <div class="mobileNav">
        <a href="javascript:void(0);" class="hamburgerIcon" onclick="hamburgerShow()">
            <i class="fa fa-bars"></i>
        </a> <h1 id="mobileHeader"><span>L</span>eading <span>C</span>hoice <span>G</span>etaways</h1>
        <div id="hamburgerLinks">
            <a href="index.html">Home</a>
            <a href="viewHolidays.php">View Holidays</a>
            <a href="admin.html">Admin</a>
            <a href="credits.html">Credits</a>
            <a href="WebsiteWireframes.pdf">Wireframes</a>
        </div>
    </div>
</header>
<div class="whiterectangle"> <!-- This is obly shown on desktop the css isnt used on mobile so the element does not need to be set to display none -->
    <main>
        <!-- Desktop navigation menu, hidden on mobile screens -->
        <nav id="navbar">
            <a href="index.html" id="home">Home</a>
            <a href="viewHolidays.php" id="view_holidays">View Holidays</a>
            <a href="admin.html" id="admin">Admin</a>
            <a href="credits.html" id="credits">Credits</a>
            <a href="WebsiteWireframes.pdf" id="wireframes">Wireframes</a>
        </nav>
        <h2 class="allHolidaysHeader">All Holidays</h2>
        <div class="allHolidays">

            <?php

            include 'database_conn.php'; // Connect to database

            $sql = "SELECT holidayTitle, locationName, country, catDesc, holidayDescription, holidayDuration, holidayPrice
                    FROM LCG_holidays
                    JOIN LCG_category ON LCG_holidays.catID = LCG_category.catID
                    JOIN LCG_location ON LCG_holidays.locationID = LCG_location.locationID
                    ORDER BY holidayTitle ASC;
                    ";
            // Purpose of the $sql variable is to store the query we will be using to get the relevant holiday data
            $queryResult = $dbConn->query($sql); // dbConn variable is from the database_conn.php file, this connects to the database and sends our query $sql
            // if statements checks if there was an error with the query and reports back to the website if there was
            if($queryResult === false){
                echo "<p>Query failed: {.$dbConn->error}</p></body></html>";
                exit;
            }
            else{ // else if there is no errors display the data onto the webpage using a while loop
                while($rowObj = $queryResult->fetch_object()){
                    echo
                    "<div class='holidayDiv'> 
                        <h3 class='holidayTitle'>{$rowObj->holidayTitle}</h3>
                        <span class='locationName'>{$rowObj->locationName} in {$rowObj->country}</span>
                        <span class='catDesc'>{$rowObj->catDesc}</span>
                        <span class='holidayDescription'>{$rowObj->holidayDescription}</span>
                        <span class='holidayDuration'>{$rowObj->holidayDuration} days</span>
                        <span class='holidayPrice'>\${$rowObj->holidayPrice} pp</span>
                    </div>";
                }
            }

            // Close connections so there is no data leak/wasted resources
            $queryResult->close();
            $dbConn->close();
            ?>
        </div>
        <div class="separatorDivViewHoliday"></div>
    </main>
</div>
</body>
</html>