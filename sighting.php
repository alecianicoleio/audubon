<!DOCTYPE html>
<html>
<head>
    <link href="css/sightings.css" rel="stylesheet" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>



    <title>Sightings</title>
</head>

<body>
    <div class="main">
        <form action="">
            <div>
                <legend class="formtitle">Sightings</legend>
            </div>

            <!-- Select boxes -->
            <div>
            <label class="label">Species:</label>
            <select class="species" name="species">
                <option value="selected">Select species</option>
                <option value="1">1</option>
            </select>
            </div>

            <div>
                <label class="label">Location:</label><select class="location" name="location">
                    <option value="selected">Select location</option>
                    <option value="AL">Alabama</option>
                </select>
            </div>
            <!-- End Sighting Info -->

            <div>
                <input type="submit" value="Submit" />
            </div>
        </form>
    </div>
    <results>
    </results>
</body>
</html>
