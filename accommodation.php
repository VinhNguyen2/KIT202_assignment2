<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Accomodation</title>

    <!--Load font family from Google web fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="icofont.min.css" />

    <!-- Bootstrap CSS files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />

    <!-- CSS files -->
    <link rel="stylesheet" href="styles/newstyles.css" />
    <link rel="stylesheet" href="styles/accommodation.css">
</head>

<body>
    <!--Section for the search box-->
    <div class="resp">
        <form action="" method="GET">
            <table class="table">
                <tr>
                    <td>
                        <select name="location" id="location" aria-placeholder=" Select the location" required>
                            <?php
                            $value = $_GET["location"];
                            ?>
                            <option class="form-control" value="" hidden disabled selected="selected">
                                Select location
                            </option>
                            <option <?php if (isset($value) && $value == "All") echo "selected"; ?>>
                                All
                            </option>
                            <option <?php if (isset($value) && $value == "Hobart") echo "selected"; ?>>
                                Hobart
                            </option>
                            <option <?php if (isset($value) && $value == "Launceston") echo "selected"; ?>>
                                Launceston
                            </option>
                            <option <?php if (isset($value) && $value == "Devonport") echo "selected"; ?>>
                                Devonport
                            </option>
                        </select>
                    </td>

                    <td>
                        Check in:<input type="date" id="checkin_date" name="checkin_date" required value="<?php echo isset($_GET["checkin_date"]) ? $_GET["checkin_date"] : "" ?>" />
                    </td>

                    <td>
                        Check out:<input type="date" id="checkout_date" name="checkout_date" required value="<?php echo isset($_GET["checkout_date"]) ? $_GET["checkout_date"] : "" ?>" />
                    </td>

                    <td>
                        Guest:<input type="number" id="num_guests" name="num_guests" min="1" placeholder="Guest" required value="<?php echo isset($_GET["num_guests"]) ? $_GET["num_guests"] : "" ?>" />
                    </td>

                    <!-- Check if checkout_date is after checkin_date -->
                    <script>
                        function validateCheckoutDate() {
                            var checkin_date = new Date(document.getElementById("checkin_date").value),
                                checkout_date = new Date(document.getElementById("checkout_date").value);

                            var checkout_date_obj = document.getElementById("checkout_date");

                            if (checkout_date <= checkin_date) {
                                checkout_date_obj.setCustomValidity("Checkout date must be after Checkin date");
                            } else {
                                checkout_date_obj.setCustomValidity("");
                            }
                        }
                    </script>

                    <td>
                        <button type="submit" name="search_btn" onclick="validateCheckoutDate()">Search</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <!-- Open the db connection -->
    <?php
    include_once 'php_functions/db_conn.php';
    ?>

    <!-- Container for all houses in grid -->
    <div class="page-container">
        <div id="grid-container">
            <!-- Check if the fields are filled -->
            <script>
                function validateIfGuestsFilled() {
                    var num_guests_obj = document.getElementById("num_guests");

                    if (num_guests_obj.value === '') { // if num_guests is not set
                        // console.log("Value of num_guests = " + num_guests_obj.value);
                        alert("Need to fill checkin, checkout and guests to book the accommodation");
                    }
                }
            </script>

            <?php
            $sql = 'SELECT * FROM House';
            $result = mysqli_query($conn, $sql);
            $arr = mysqli_fetch_all($result, MYSQLI_ASSOC);

            $condition = true; // initial condition = true
            foreach ($arr as $house) {
                // if the fields are filled
                if (isset($_GET["search_btn"])) {
                    $guest_cond = $_GET["num_guests"] <= $house['max_guests'];
                    $location_cond = $_GET["location"] === 'All' ? true : $_GET["location"] == $house['city'];
                    $condition = $guest_cond && $location_cond && $house['available'];
                    $href = 'booking.php?house_ID=' . $house['house_ID'] . '&checkin_date=' . $_GET["checkin_date"] . '&checkout_date=' . $_GET["checkout_date"] . '&num_guests=' . $_GET["num_guests"];
                } else {
                    $href = '#';
                }

                if ($condition) {
                    $address = $house['street_address'] . ", " . $house['city'] . " " . $house['zip'];
                    $internet = ($house['internet']) ? '<i class="icofont-ui-wifi"></i>' : "";
                    $pet_friendly = ($house['pet_friendly']) ? '<i class="icofont-dog-alt"></i>' : "";
                    $smoking = ($house['smoking']) ? "" : '<i class="icofont-no-smoking"></i>';

                    echo '
                    <div class="house-container">
                        <div id="house-image-div" class="item-container">
                            <img class="house-image" src="' . $house['image'] . '" alt="house-image">
                        </div>

                        <div id="house-details-div" class="item-container">
                            <a href="' . $href . '" class="accommodation_title" onclick="validateIfGuestsFilled()" title="Book the accommodation">' . $house['title'] . '</a>
                            <br />
                            Address: ' . $address . '
                            <br />
                            $' . $house['price'] . '/w
                            &nbsp; ' . $house['num_bedrooms'] . '<i class="icofont-bed"></i>
                            &nbsp; ' . $house['num_bathrooms'] . '<i class="icofont-bathtub"></i>
                            &nbsp; ' . $house['garage'] . ' <i class="icofont-car"></i>
                            &nbsp; ' . $internet . '
                            &nbsp; ' . $pet_friendly . '
                            &nbsp; ' . $smoking . '
                            <br /> 
                            
                            <button class="review-btn" onclick="location.href = \'write_review.php?house_ID=' . $house['house_ID'] . '\';">Write a review</button>               
                        </div>
                    </div>
                    ';
                }
            }
            ?>

            <!-- Close the db connection -->
            <?php
            include_once 'php_functions/db_close.php';
            ?>

        </div>
    </div>
</body>

</html>
