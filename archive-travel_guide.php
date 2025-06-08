<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Siri-like Background</title>
  <style>
    html, body {
      margin: 0;
      padding: 0;
      height: 100%;
      overflow: hidden;
      background: #000;
    }

    /* Siri-like animated background using radial gradient blobs */
    .siri-bg {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      overflow: hidden;
      z-index: -1;
    }

    .blob {
      position: absolute;
      width: 400px;
      height: 400px;
      background: radial-gradient(circle, rgba(255,255,255,0.3) 0%, rgba(255,255,255,0) 70%);
      border-radius: 50%;
      filter: blur(100px);
      animation: moveBlobs 20s ease-in-out infinite;
    }

    .blob:nth-child(1) {
      top: 10%;
      left: 20%;
      background: radial-gradient(circle, rgba(58,28,113,0.6), transparent);
      animation-delay: 0s;
    }

    .blob:nth-child(2) {
      top: 40%;
      left: 60%;
      background: radial-gradient(circle, rgba(215,109,119,0.6), transparent);
      animation-delay: 5s;
    }

    .blob:nth-child(3) {
      top: 70%;
      left: 30%;
      background: radial-gradient(circle, rgba(255,175,123,0.6), transparent);
      animation-delay: 10s;
    }

    @keyframes moveBlobs {
      0%, 100% {
        transform: translate(0, 0) scale(1);
      }
      50% {
        transform: translate(50px, -50px) scale(1.2);
      }
    }
  </style>
</head>
<body>

  <!-- Siri-like background -->
  <div class="siri-bg">
    <div class="blob"></div>
    <div class="blob"></div>
    <div class="blob"></div>
  </div>

  <!-- Content (Optional) -->
  <div style="position: relative; z-index: 1; text-align: center; color: white; padding-top: 20%;">
    <h1>Siri-Like Background</h1>
    <p>This is a smooth, glowing animation inspired by Siri’s UI.</p>
  </div>

</body>
</html>
