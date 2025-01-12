window.onload = function () {
  const performanceData = window.performance.timing;
  const navigationStart = performanceData.navigationStart;
  const domContentLoadedTime =
    performanceData.domContentLoadedEventEnd - navigationStart;
  const domContentLoadedTimeInSec = (domContentLoadedTime / 1000).toFixed(3);
  document.getElementById("dom-content-loaded").textContent =
    domContentLoadedTimeInSec + " seconds";
};
