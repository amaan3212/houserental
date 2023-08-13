document.addEventListener("DOMContentLoaded", function () {
    const passwordForm = document.getElementById("password-form");
    const errorModal = document.getElementById("error-modal");
    const closeModalButton = document.getElementById("close-modal");
  
    passwordForm.addEventListener("submit", async function (event) {
      event.preventDefault();
  
      const passwordInput = document.getElementById("password");
      const enteredPassword = passwordInput.value;
  
      const response = await fetch("dbsignin.php", {
        method: "POST",
        body: new URLSearchParams({
          password: enteredPassword,
        }),
      });
  
      if (response.ok) {
        passwordInput.value = "";
      } else {
        errorModal.style.display = "block";
      }
    });
  
    closeModalButton.addEventListener("click", function () {
      errorModal.style.display = "none";
    });
  }); 