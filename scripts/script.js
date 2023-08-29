function validatetestform() {
    var testDropdown = document.getElementById("test");
    var selectedTest = testDropdown.options[testDropdown.selectedIndex].text;

    if (selectedTest === "Tests Currently Unavailable") {
        alert("Tests are not available. Please Try again later.");
        return false;
    }
    return true;
}
function validatedoctorform() {
  var testDropdown = document.getElementById("doctor");
  var selectedTest = testDropdown.options[testDropdown.selectedIndex].text;

  if (selectedTest === "No Doctors Available") {
      alert("No Doctor available. Please Try again later.");
      return false;
  }
  return true;
}
function validatehospitalform() {
  var testDropdown = document.getElementById("hospital");
  var selectedTest = testDropdown.options[testDropdown.selectedIndex].text;

  if (selectedTest === "This test does not exist in any hospital") {
      alert("Hospitals are not available. Please Try again later.");
      return false;
  }
  return true;
}
function validatesearch() {
  var selectedValue = document.getElementById("specialty").value;

  if (selectedValue === "") {
      alert("No Specialty Selected.");
      return false;
  }
  return true;
}
$(document).ready(function() {
  $("#hospitalname").change(function() {
      var selectedHospital = $(this).val();
      $.ajax({
          url: "../php_scripts/get_hospital_address.php",
          method: "POST",
          data: { hospital: selectedHospital },
          dataType: "html",
          success: function(response) {
              $("#hospitaladdr").html(response);
          }
      });
  });
});
