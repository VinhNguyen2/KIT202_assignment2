<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Accomodation</title>

    <!-- Bootstrap CSS file -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="newstyles.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <!--Load font family from Google web fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="newstyles.css" />
    <link rel="stylesheet" href="icofont.min.css" />
</head>

<body>
    <?php
    include 'db_conn.php';
    ?>

    <!--Section for the search box-->
    <div class="resp">
        <form action="accommodation.php" method="GET">
            <table class="table">
                <tr>
                    <td>
                        <select name="location" id="location" aria-placeholder=" Select the location" required>
                            <option class="form-control" value="" hidden disabled selected="selected">
                                Select location
                            </option>
                            <option class="form-control" value="Hobart">
                                Hobart
                            </option>
                            <option class="form-control" value="Launceston">
                                Launceston
                            </option>
                            <option class="form-control" value="Devonport">
                                Devonport
                            </option>
                        </select>
                    </td>

                    <td>
                        Check in:
                        <input type="date" id="checkin" name="checkin_date" required />
                    </td>

                    <td>
                        Check out:
                        <input type="date" id="checkout" name="checkout_date" required />
                    </td>

                    <td>
                        Guest:
                        <input type="number" id="num_guests" name="num_guests" min="1" placeholder="Guest" required />
                    </td>

                    <td>
                        <button type="submit">Search</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>







    <!-- Template - Container for 1 house 
        <div class="grid-item">
            Container for image
            <div class="image-div" style="border: 1px dotted red;">
                <img class="house-image" src="" alt="house-image">
            </div>
            
            Container for accommodation details
            <div class="details-div" style="border: 1px dotted red;">
                <label class="accomodation_title">Three bed room house with parking slots</label>
                <br />

                Address: 114 Elizabeth St, Launceston 7250
                <br />

                $450/w
                &nbsp; 3<i class="icofont-bed"></i>
                &nbsp; 2<i class="icofont-bathtub"></i>
                &nbsp; 2<i class="icofont-car"></i>

                <br />
            </div>
        </div>
    -->
    <!-- Container for all houses in grid -->
    <div class="grid-container" style="border: 1px solid black;">

        <?php
        // echo "Location = " . $_GET["location"] . "<br>";
        // echo "Checkin = " . $_GET["checkin_date"] . "<br>";
        // echo "Checkout = " . $_GET["checkout_date"] . "<br>";
        // echo "Num_guests = " . $_GET["num_guests"] . "<br>";

        $sql = 'SELECT * FROM House';
        $result = mysqli_query($conn, $sql);
        $arr = mysqli_fetch_all($result, MYSQLI_ASSOC);

        foreach ($arr as $house) {
            $condition = true;
            // if fields are filled
            if (isset($_GET["num_guests"])) {
                $condition = ($_GET["num_guests"] <= $house['max_guests']) && ($_GET["location"] == $house['city']) && $house['available'];
            }

            if ($condition) {
                $address = $house['street_address'] . ", " . $house['city'] . " " . $house['zip'];
                $internet = ($house['internet']) ? '<i class="icofont-ui-wifi"></i>' : "";
                $pet_friendly = ($house['pet_friendly']) ? '<i class="icofont-dog-alt"></i>' : "";
                $smoking = ($house['smoking']) ? "" : '<i class="icofont-no-smoking"></i>';

                echo '
                <div class="grid-item">
                    <div class="image-div">
                        <img class="house-image" src="' . $house['image'] . '" alt="house-image">
                    </div>

                    <div class="details-div"">
                        <label class="accomodation_title">' . $house['title'] . '</label>
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
                    
                    </div>
                </div>
            ';
            }
        }

        $conn->close();
        ?>

    </div>
</body>

</html>