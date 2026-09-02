import { getApp, getApps, initializeApp } from "https://www.gstatic.com/firebasejs/11.6.0/firebase-app.js";
import { getAuth } from "https://www.gstatic.com/firebasejs/11.6.0/firebase-auth.js";

const firebaseConfig = {
  apiKey: "AIzaSyBB-jZsA4qHGpJo3XPww_x_cljESutX3FU",
  authDomain: "isdaafrica-1565853766345.firebaseapp.com",
  projectId: "isdaafrica-1565853766345",
  storageBucket: "isdaafrica-1565853766345.firebasestorage.app",
  messagingSenderId: "665342871462",
  appId: "1:665342871462:web:179600cb15cc6c6178f167",
  measurementId: "G-CY9P5B9NYM"
};

const app = getApps().length ? getApp() : initializeApp(firebaseConfig);

export const auth = getAuth(app);
