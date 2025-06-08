<html>
    <style>
        /* Apply to full page */
body, html {
  margin: 0;
  padding: 0;
  height: 100%;
  overflow: hidden;
}

/* Siri-like animated background */
body::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background: linear-gradient(45deg, #3a1c71, #d76d77, #ffaf7b);
  background-size: 600% 600%;
  animation: siriBackground 10s ease infinite;
  z-index: -1; /* Keeps it behind all content */
}

/* Animation keyframes */
@keyframes siriBackground {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
}
    </style>

</html>