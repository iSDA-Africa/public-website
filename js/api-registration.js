// Your web app's Firebase configuration
const firebaseConfig = {
    apiKey: "AIzaSyDST7D7ZGcshZPCLkKJDkj2fRzx8AoQLLI",
    authDomain: "isdaafrica-1565853766345.firebaseapp.com",
    projectId: "isdaafrica-1565853766345",
    storageBucket: "isdaafrica-1565853766345.firebasestorage.app",
    messagingSenderId: "665342871462",
    appId: "1:665342871462:web:59c09330769a426278f167",
};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);

// Function to handle user registration
async function registerUser(event) {
    event.preventDefault(); // Prevent form submission

    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    try {
      const userCredential = await firebase.auth().createUserWithEmailAndPassword(email, password);
      const user = userCredential.user;

      // On success, replace the form with a success message
      document.getElementById("signup-form").style.display = "none";
      document.getElementById("success-message").style.display = "block";
    } catch (error) {
        const errorCode = error.code;
        const errorMessage = error.message.replace("Firebase:", "");

        // Display the error message
        document.getElementById("error-message").style.display = "block";
        document.getElementById("error-text").innerText = errorMessage;

        console.error("Error during registration:", errorCode, errorMessage);
    }
}
// Attach the function to the form's submit event
document.querySelector("form").addEventListener("submit", registerUser);

// Function to change the form to password reset
function showPasswordResetForm() {
  // Hide the password input and any error messages
  document.getElementById("error-message").style.display = "none";
  document.getElementById("password").parentElement.style.display = "none";
  document.getElementById("sub-text").innerText = "Enter your email address to receive a password reset link.";
  // Change the heading and button text
  document.querySelector("h1").innerText = "Reset Password";
  document.getElementById("submit-button").innerText = "Send Password Reset Email";
  // Change the form submit action
  document.querySelector("form").removeEventListener("submit", registerUser);
  document.querySelector("form").addEventListener("submit", sendPasswordResetEmail);
  // Change the link text
  document.getElementById("forgotten-password").innerText = "Return to Sign Up";
  document.getElementById("forgotten-password").addEventListener("click", hidePasswordResetForm);
}

// Attach the function to the "Forgotten password?" link
document.getElementById("forgotten-password").addEventListener("click", showPasswordResetForm);

// Function to hide the password reset form and show the sign-up form
function hidePasswordResetForm(event) {
  event.preventDefault(); // Prevent default link behavior
  // Show the password input and reset the form
  document.getElementById("password").parentElement.style.display = "block";
  document.getElementById("error-message").style.display = "none";
  document.getElementById("sub-text").innerText = "Get instant, free access to iSDA's API.";
  // Change the heading and button text back
  document.querySelector("h1").innerText = "Sign up";
  document.getElementById("submit-button").innerText = "Sign up";
  // Change the form submit action back
  document.querySelector("form").removeEventListener("submit", sendPasswordResetEmail);
  document.querySelector("form").addEventListener("submit", registerUser);
  // Change the link text back
  document.getElementById("forgotten-password").innerText = "Forgotten password?";
  document.getElementById("forgotten-password").removeEventListener("click", hidePasswordResetForm);
  document.getElementById("forgotten-password").addEventListener("click", showPasswordResetForm);
}

// Function to send password reset email
async function sendPasswordResetEmail(event) {
  event.preventDefault(); // Prevent form submission

  const email = document.getElementById("email").value;

  try {
      await firebase.auth().sendPasswordResetEmail(email);
      alert("Password reset email sent. Please check your inbox.");
  } catch (error) {
      const errorCode = error.code;
      const errorMessage = error.message.replace("Firebase:", "");

      // Display the error message
      document.getElementById("error-message").style.display = "block";
      document.getElementById("error-text").innerText = errorMessage;

      console.error("Error sending password reset email:", errorCode, errorMessage);
  }
}