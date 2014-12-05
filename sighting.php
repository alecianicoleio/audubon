<!DOCTYPE html>
<html>
<head>
  <link href="main.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
  <link rel="stylesheet" type="text/css" href="css/autocomplete.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="js/jquery.autocomplete.min.js" type="text/javascript"></script>

  <script type="text/javascript">
    $(document).ready(function() {
        $("#autocomplete").devbridgeAutocomplete({
            serviceUrl: "php/autocomplete.php"
        });
    });

    var currentDate = new Date();

    function pageLoad(){
      /*
      The year select input needs the last five years
      */
      var yearSelect = $('select[name=year]');
      var lastYear = currentDate.getFullYear()
      var year = lastYear-4;

      while(year <= lastYear){
        yearSelect.append($("<option></option>")
                  .attr("value", year)
                  .text(year));

        year++;
      }
    }

    // Checks if form inputs are valid
    function check(){
      // Element to validate: name
      var element = $('input[name=name]').val();
      // Name should be a string
      if(element != ""){
        if(!(isNaN(element))){
          alert("Invalid Name: Cannot be only a number")
          return false;
        }
      }

      // Element to validate: phone
      element = $('input[name=phone]').val();
      if(element != ""){
        // Length of phone number must be 10
        var length = stringToNumberVal(element);

        if(length != 10){
          alert("Invalid Phone number");
          return false;
        }
      }

      // Element to validate: Date and Time
      if(!dateCheck()){
        return false;
      }

      // Element to validate: Location
      element = $('input[name=location]').val();
      if(!blankCheck(element, "Please enter a location")){
        // Location is required
        return false;
      }

      // Element to validate: Species
      element = $('input[name=species]').val();
      if(!blankCheck(element, "Please enter a species")){
        // Species is required
        return false;
      }

      // Element to validate: Description
      element = $('textarea[name=desc]').val();
      if(!blankCheck(element, "Please enter a description")){
        // Description is required
        return false;
      }

      // Element to validate: City
      element = $('input[name=city]').val();
      if(!blankCheck(element, "Please enter a city")){
        // Description is required
        return false;
      }

      // Element to validate: State
      if(!selectCheck("states", "Please select a state")){
        return false;
      }

      return true;
    }

    function blankCheck(element, message){
      if(element == ""){
        alert(message);
        return false;
      }
      else
        return true;
    }

    function stringToNumberVal(element){
        // Replace all non numbers from element
        var numbers = element.replace(/[^0-9]/g, '');

        // Length of element
        return numbers.length;
    }

    function dateCheck(){
      // Verify day, month, year, and am/pm have been selected
      if(!selectCheck("day", "Please select a day") ||
         !selectCheck("month", "Please select a month") ||
         !selectCheck("year", "Please select a year") ||
         !selectCheck("ampm", "Please select AM or PM")){
         return false;
       }

      // Grab date selections
      var day = $('select[name=day] option:selected').val();
      var month = $('select[name=month] option:selected').val();
      var year = $('select[name=year] option:selected').val();

      // Grab time inputs
      var minute = $('input[name=minute]').val();
      var hour = $('input[name=hour]').val();
      var ampm = $('select[name=ampm] option:selected').val();

      // Validate minute
      if(!blankCheck(minute, "Please enter minute")){
        return false;
      }
      if(isNaN(minute) || minute < 0 || minute > 59){
        alert("Invalid minute");
        return false;
      }

      // Validate hour
      if(!blankCheck(hour, "Please enter hour")){
        return false;
      }
      if(isNaN(hour) ||
        hour < 1 ||
        hour > 12 ||
        (hour > 11 && ampm == "pm")){
        alert("Invalid hour");
        return false;
      }

      // Convert to military time
      if(ampm == "pm")
        hour = parseInt(hour) + 12;

      /*
      Check for a leap year
      If it's not a leap year, then Feburary 29th is not possible
      Remember that for javascript's Date object, a month of 1 is Feburary
      */
      var leapCheck = new Date(year, 2, 29);
      var isLeap = leapCheck.getMonth() == 1;

      if(!isLeap && month == 1 && day == 29){
        alert("Invalid date: Feburary 29 is only possible for leap years");
        return false;
      }

      var newDate = new Date(year, month, day, hour, minute);

      if(newDate > currentDate){
        alert("Invaid date: cannot be greater then current date")
        return false;
      }

      return true;
    }

    function selectCheck(name, message){
      var cmd = "select[name=" + name + "] option:selected";
      element = $(cmd).val();

      if(element == "selected"){
        alert(message);
        return false;
      }

      return true;
    }
  </script>

  <title>Bird Sighting</title>
</head>

<body onload="pageLoad()">
  <div class="main">
    <form onsubmit="return check()" action="php/formSubmit.php" method="POST">
      <div>
        <legend class="formtitle">Bird Sighting</legend>
      </div>

      <!-- Personial Info -->
      <div>
       <label class="label">Name:</label><input type="text" name="name" />
     </div>
     <div>
       <label class="label">Email:</label><input type="email" name="email" />
     </div>
     <div>
       <label class="label">Phone:</label><input type="phone" name="phone" />
     </div>
       <!-- End Personal Info -->

        <!-- Bird Info -->
      <div>
        <label class="label">Species:<span>*</span></label><input type="text" name="species" id="autocomplete" />
      </div>
      <div>
        <label class="label">Description:<span>*</span></label><textarea rows="4" name="desc"></textarea>
      </div>
        <!-- End Bird Info -->

        <!-- Sighting Info -->
      <div>
        <label class="label">Date:<span>*</span></label>
        <select class="day" name="day">
          <option value="selected">Select Day</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="16">16</option>
          <option value="17">17</option>
          <option value="18">18</option>
          <option value="19">19</option>
          <option value="20">20</option>
          <option value="21">21</option>
          <option value="22">22</option>
          <option value="23">23</option>
          <option value="24">24</option>
          <option value="25">25</option>
          <option value="26">26</option>
          <option value="27">27</option>
          <option value="28">28</option>
          <option value="29">29</option>
          <option value="30">30</option>
          <option value="31">31</option>
        </select>

        <select class="month" name="month">
          <option value="selected">Select Month</option>
          <!-- javascript date month starts at 0, so value starts at 0 -->
          <option value="0">January</option>
          <option value="1">February</option>
          <option value="2">March</option>
          <option value="3">April</option>
          <option value="4">May</option>
          <option value="5">June</option>
          <option value="6">July</option>
          <option value="7">August</option>
          <option value="8">September</option>
          <option value="9">October</option>
          <option value="10">November</option>
          <option value="11">December</option>
        </select>

        <!-- Year selection options are inputted using javascript for the last five years -->
        <select class="year" name="year" id="year">
          <option value="selected">Select Year</option>
        </select>
      </div>

      <div>
        <label class="label">Time:<span>*</span></label>
        <input type="text" name="hour" size="1px" />
        <input type="text" name="minute" size="1px" />
        <select class="ampm" name="ampm">
          <option value="selected">AM/PM</option>
          <option value="am">AM</option>
          <option value="pm">PM</option>
        </select>
      </div>
      <div>
        <label class="label">Location:<span>*</span></label> <input type="text" name="location" />
      </div>
      <div>
        <label class="label">City:<span>*</span></label> <input type="text" name="city" />
      </div>

      <div>
        <label class="label">State:<span>*</span></label><select class="states" name="states">
          <option value="selected">Select state</option>
          <option value="AL">Alabama</option>
          <option value="AK">Alaska</option>
          <option value="AZ">Arizona</option>
          <option value="AR">Arkansas</option>
          <option value="CA">California</option>
          <option value="CO">Colorado</option>
          <option value="CT">Connecticut</option>
          <option value="DE">Delaware</option>
          <option value="FL">Florida</option>
          <option value="GA">Georgia</option>
          <option value="HI">Hawaii</option>
          <option value="ID">Idaho</option>
          <option value="IL">Illinois</option>
          <option value="IN">Indiana</option>
          <option value="IA">Iowa</option>
          <option value="KS">Kansas</option>
          <option value="KY">Kentucky</option>
          <option value="LA">Louisiana</option>
          <option value="ME">Maine</option>
          <option value="MD">Maryland</option>
          <option value="MA">Massachusetts</option>
          <option value="MI">Michigan</option>
          <option value="MN">Minnesota</option>
          <option value="MS">Mississippi</option>
          <option value="MO">Missouri</option>
          <option value="MT">Montana</option>
          <option value="NE">Nebraska</option>
          <option value="NV">Nevada</option>
          <option value="NH">New Hampshire</option>
          <option value="NJ">New Jersey</option>
          <option value="NM">New Mexico</option>
          <option value="NY">New York</option>
          <option value="NC">North Carolina</option>
          <option value="ND">North Dakota</option>
          <option value="OH">Ohio</option>
          <option value="OK">Oklahoma</option>
          <option value="OR">Oregon</option>
          <option value="PA">Pennsylvania</option>
          <option value="RI">Rhode Island</option>
          <option value="SC">South Carolina</option>
          <option value="SD">South Dakota</option>
          <option value="TN">Tennessee</option>
          <option value="TX">Texas</option>
          <option value="UT">Utah</option>
          <option value="VT">Vermont</option>
          <option value="VA">Virgina</option>
          <option value="WA">Washington</option>
          <option value="WV">West Virgina</option>
          <option value="WI">Wisconsin</option>
          <option value="WY">Wyoming</option>
        </select>
        <!-- End Sighting Info -->
      </div>

      <div>
        <input type="submit" value="Submit" />
      </div>
    </form>
  </div>
  <img src="http://thesis2010.micadesign.org/kropp/images/research/bird_icon.png">
</body>
</html>