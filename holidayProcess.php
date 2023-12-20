<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="styles.css" rel="stylesheet">
    <!-- Link below links a font that is used for the hamburger icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="hamburger.js"></script>
    <title>Leading Choice Getaways - Admin Page</title>
</head>
<body>
<?php

include 'database_conn.php';

$holidayTitle = isset($_REQUEST['holidayTitle']) ? $_REQUEST['holidayTitle']:false; // Forcing the variable to be set otherwise it will be null
$holidayLocation = isset($_REQUEST['holidayLocation']) ? $_REQUEST['holidayLocation']:false;
$holidayCategory = isset($_REQUEST['holidayCategory']) ? $_REQUEST['holidayCategory']:false;
$holidayDescription = isset($_REQUEST['holidayDescription']) ? $_REQUEST['holidayDescription']:false;
$holidayDuration = isset($_REQUEST['holidayDuration']) ? $_REQUEST['holidayDuration']:false;
$holidayPrice = isset($_REQUEST['holidayPrice']) ? $_REQUEST['holidayPrice']:false;

if(
    empty($holidayTitle) || empty($holidayLocation) ||
    empty($holidayCategory) || empty($holidayDescription) ||
    empty($holidayDuration) || empty($holidayPrice)
){
    echo "<p>Missing Information! Go back and re-enter information</p>";
    echo "<a href='admin.html'>Click Here</a>";
}else{


    // Escaping any apostrophes ect to prevent SQL injectiton, only need to do it on these values as these are the ones which accept text
    $holidayTitle = $dbConn->real_escape_string($holidayTitle);
    $holidayDescription = $dbConn->real_escape_string($holidayDescription);

    $SQL_insert = "INSERT INTO LCG_holidays 
                    (holidayTitle, holidayDescription, holidayDuration, 
                    locationID, catID, holidayPrice) 
                    VALUES
                    ('$holidayTitle', '$holidayDescription', '$holidayDuration', '$holidayLocation', '$holidayCategory', '$holidayPrice')";

    $sentQuery = $dbConn->query($SQL_insert);
    $dbConn->close();
}
?>
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
        <h2 class="holidayPreviewHeader">Holiday added - Preview Below</h2>
        <div class="holidayPreview">
            <?php
            //Creating a new variable called country which will hold the correct country for the preview
            $country = null;

            // Setting holidayLocation to be that of the corresponding one in the database
            if($holidayLocation == "l1"){
                $holidayLocation = "Milaidhoo Island";
                $country = "Maldives";
            }
            if($holidayLocation == "l2"){
                $holidayLocation = "Rangali Island";
                $country = "Maldives";
            }
            if($holidayLocation == "l3"){
                $holidayLocation = "Zanzibar";
                $country = "Tanzania";
            }
            if($holidayLocation == "l4"){
                $holidayLocation = "Boston";
                $country = "USA";
            }
            if($holidayLocation == "l5"){
                $holidayLocation = "San Francisco";
                $country = "USA";
            }
            if($holidayLocation == "l6"){
                $holidayLocation = "Nairobi";
                $country = "Kenya";
            }
            if($holidayLocation == "l7"){
                $holidayLocation = "Algarve";
                $country = "Portugal";
            }
            if($holidayLocation == "l8"){
                $holidayLocation = "New York";
                $country = "USA";
            }
            if($holidayLocation == "l9"){
                $holidayLocation = "Sorrento";
                $country = "Italy";
            }
            if($holidayLocation == "l10"){
                $holidayLocation = "Verona";
                $country = "Italy";
            }

            // Setting holiday category to that of the relevant one in the database

            if($holidayCategory == "c1"){
                $holidayCategory = "Luxury";
            }
            if($holidayCategory == "c2"){
                $holidayCategory = "Tour";
            }
            if($holidayCategory == "c3"){
                $holidayCategory = "Safari";
            }
            if($holidayCategory == "c4"){
                $holidayCategory = "Golf";
            }
            if($holidayCategory == "c5"){
                $holidayCategory = "Weddings";
            }
            if($holidayCategory == "c6"){
                $holidayCategory = "Walking";
            }
            if($holidayCategory == "c7"){
                $holidayCategory = "Opera";
            }


            echo
            "<div class='holidayDivPreview'> 
                <h3 class='holidayTitlePreview'>{$holidayTitle}</h3>
                <span class='locationNamePreview'>{$holidayLocation} in {$country}</span>
                <span class='catDescPreview'>{$holidayCategory}</span>
                <span class='holidayDescriptionPreview'>{$holidayDescription}</span>
                <span class='holidayDurationPreview'>{$holidayDuration} days</span>
                <span class='holidayPricePreview'>\${$holidayPrice} pp</span>
             </div>";


            // Close connections so there is no data leak/wasted resources
            ?>
        </div>
        <div class="separatorDivPreview"></div>
    </main>
</div>
</body>
</html>