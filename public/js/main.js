
// Get location field for Google Autocomplete
var $autoLocation = document.getElementById('inputLoc');

// Required form fields for validation
var $inDate, $inTime, $inLoc, $inSpec, $inDescrip; 

// Location Autocomplete Powered By Google= https://developers.google.com/maps/documentation/javascript/places-autocomplete
var options = {
  // Restrict Search by Type and Country
  types: ['(regions)'],
  componentRestrictions: {country: 'us'}
};
var autocomplete = new google.maps.places.Autocomplete($autoLocation, options);


// Format phone number on client side
var $inPhone = $("#inputPhone");
$inPhone.mask("999-999-9999");


// Wait for the DOM to be ready
$(function() {
  // Initialize form validation on the registration form.
  $("form[name='brdr-form']").validate({
    // Specify validation rules
    rules: {
      inputPhone: {
        required: false,
        phoneUS: true
      },
      inputEmail: {
        required: false,
        email: true
      },
      inputDate: {
        required: true,
        date: true
      },
      inputTime: "required",
      inputLoc: "required",
      inputSpec: "required",
      inputDescrip: "required"
    },
    // Specify validation error messages
    messages: {
      inputEmail: "Please enter a valid email.",
      inputLoc: "Please enter a location.",
      inputSpec: "Please enter a species",
      inputDescrip: "Please enter a description"
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});