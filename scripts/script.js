function updateGreeting() {
    var now = new Date();
    var hour = now.getHours();

    var greeting = "";
    if (hour >= 0 && hour < 12) {
      greeting = "Good morning!";
    } else if (hour >= 12 && hour < 18) {
      greeting = "Good afternoon!";
    } else {
      greeting = "Good evening!";
    }

    document.getElementById("greeting").textContent = greeting;
  }


function validateForm() {
    var doctorSelect = document.getElementById("doctor");
    var testSelect = document.getElementById("test");

    if (doctorSelect.options.length === 0) {
        alert("No doctors are available. Please try again later.");
        return false;
    }

    if (testSelect.options.length === 0) {
        alert("No tests are available. Please try again later.");
        return false;
    }

    return true;
}
