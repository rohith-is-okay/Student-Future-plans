function togglePasswordVisibility(passwordId, buttonId) {
    var passwordInput = document.getElementById(passwordId);
    var showPasswordButton = document.getElementById(buttonId);
    
    
    showPasswordButton.addEventListener("click", function() {
      var toggleIcon = this.querySelector('i');
      
      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
      } else {
        passwordInput.type = "password";
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
      }
    });
  }
  
  // Initialize the password visibility toggle
  document.addEventListener("DOMContentLoaded", function() {
    togglePasswordVisibility("studpassword", "showStudentPasswordButton");
    togglePasswordVisibility("password", "showFacultyPasswordButton");
  });
  