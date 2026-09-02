import { createUserWithEmailAndPassword, sendPasswordResetEmail } from "https://www.gstatic.com/firebasejs/11.6.0/firebase-auth.js";
import { auth } from "/js/firebase-auth.js";

const form = document.getElementById("registration-form");
const panel = document.getElementById("registration-panel");
const successMessage = document.getElementById("registration-success-message");
const heading = document.getElementById("registration-heading");
const subtext = document.getElementById("registration-subtext");
const passwordGroup = document.getElementById("password-group");
const password = document.getElementById("password");
const submitButton = document.getElementById("submit-button");
const toggleButton = document.getElementById("password-reset-toggle");
const errorMessage = document.getElementById("error-message");
const errorText = document.getElementById("error-text");
const noticeMessage = document.getElementById("notice-message");

let mode = "signup";

function clearMessages() {
  errorMessage.hidden = true;
  errorText.textContent = "";
  noticeMessage.hidden = true;
  noticeMessage.textContent = "";
}

function showError(message) {
  errorText.textContent = message;
  errorMessage.hidden = false;
}

function showNotice(message) {
  noticeMessage.textContent = message;
  noticeMessage.hidden = false;
}

function setMode(nextMode) {
  mode = nextMode;
  const isResetRequest = mode === "reset-request";

  heading.textContent = isResetRequest ? "Reset password" : "Sign up";
  subtext.textContent = isResetRequest
    ? "Enter your email address and we will send you a password reset link."
    : "Get instant, free access to iSDA's APIs.";
  passwordGroup.hidden = isResetRequest;
  password.required = !isResetRequest;
  password.disabled = isResetRequest;
  submitButton.textContent = isResetRequest ? "Send password reset email" : "Sign up";
  toggleButton.textContent = isResetRequest ? "Return to sign up" : "Forgotten password?";
  clearMessages();
}

function registrationErrorMessage(error) {
  switch (error.code) {
    case "auth/email-already-in-use":
      return "An account already exists for this email address. Use password reset to choose a new password.";
    case "auth/invalid-email":
      return "Enter a valid email address.";
    case "auth/weak-password":
      return "Choose a stronger password and try again.";
    default:
      return "We could not create your account. Please try again or contact us for help.";
  }
}

function resetRequestErrorMessage(error) {
  if (error.code === "auth/invalid-email") {
    return "Enter a valid email address.";
  }

  return "We could not send a password reset email. Please try again or contact us for help.";
}

toggleButton.addEventListener("click", () => {
  setMode(mode === "signup" ? "reset-request" : "signup");
});

form.addEventListener("submit", async (event) => {
  event.preventDefault();
  clearMessages();

  if (!form.reportValidity()) {
    return;
  }

  const email = document.getElementById("email").value.trim();
  const isResetRequest = mode === "reset-request";
  const originalButtonText = submitButton.textContent;
  submitButton.disabled = true;
  submitButton.textContent = isResetRequest ? "Sending..." : "Creating account...";

  try {
    if (isResetRequest) {
      await sendPasswordResetEmail(auth, email);
      showNotice("If an account exists for this email address, a password reset link has been sent. Please check your inbox.");
    } else {
      await createUserWithEmailAndPassword(auth, email, password.value);
      panel.hidden = true;
      successMessage.hidden = false;
    }
  } catch (error) {
    showError(isResetRequest ? resetRequestErrorMessage(error) : registrationErrorMessage(error));
    console.error(isResetRequest ? "Password reset request failed:" : "Registration failed:", error.code);
  } finally {
    submitButton.disabled = false;
    submitButton.textContent = originalButtonText;
  }
});
