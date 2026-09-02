import { confirmPasswordReset, verifyPasswordResetCode } from "https://www.gstatic.com/firebasejs/11.6.0/firebase-auth.js";
import { auth } from "/js/firebase-auth.js";

const loadingMessage = document.getElementById("reset-loading-message");
const invalidMessage = document.getElementById("reset-invalid-message");
const formPanel = document.getElementById("reset-form-panel");
const successMessage = document.getElementById("reset-success-message");
const form = document.getElementById("password-reset-form");
const accountEmail = document.getElementById("reset-account-email");
const password = document.getElementById("new-password");
const passwordConfirmation = document.getElementById("confirm-password");
const submitButton = document.getElementById("reset-submit-button");
const errorMessage = document.getElementById("reset-error-message");
const errorText = document.getElementById("reset-error-text");

const params = new URLSearchParams(window.location.search);
const mode = params.get("mode");
const actionCode = params.get("oobCode");

function showInvalidLink() {
  loadingMessage.hidden = true;
  invalidMessage.hidden = false;
}

function showError(message) {
  errorText.textContent = message;
  errorMessage.hidden = false;
}

function clearError() {
  errorText.textContent = "";
  errorMessage.hidden = true;
}

function resetErrorMessage(error) {
  switch (error.code) {
    case "auth/weak-password":
      return "Choose a stronger password and try again.";
    case "auth/expired-action-code":
    case "auth/invalid-action-code":
      return "This password reset link has expired or has already been used. Request a new one to continue.";
    default:
      return "We could not reset your password. Please try again or request a new reset link.";
  }
}

async function initialiseReset() {
  if (mode !== "resetPassword" || !actionCode) {
    showInvalidLink();
    return;
  }

  try {
    const email = await verifyPasswordResetCode(auth, actionCode);
    accountEmail.textContent = email;
    loadingMessage.hidden = true;
    formPanel.hidden = false;
  } catch (error) {
    console.error("Password reset link validation failed:", error.code);
    showInvalidLink();
  }
}

form.addEventListener("submit", async (event) => {
  event.preventDefault();
  clearError();

  if (!form.reportValidity()) {
    return;
  }

  if (password.value !== passwordConfirmation.value) {
    showError("The passwords do not match.");
    passwordConfirmation.focus();
    return;
  }

  submitButton.disabled = true;
  submitButton.textContent = "Resetting password...";

  try {
    await confirmPasswordReset(auth, actionCode, password.value);
    formPanel.hidden = true;
    successMessage.hidden = false;
  } catch (error) {
    showError(resetErrorMessage(error));
    console.error("Password reset failed:", error.code);
  } finally {
    submitButton.disabled = false;
    submitButton.textContent = "Reset password";
  }
});

initialiseReset();
