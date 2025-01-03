<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page Load Stats & Network Graphs</title>
  <!-- Include Chart.js library from CDN -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-streaming"></script> <!-- For real-time graphs -->
  <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
      margin: 50px;
      background-color: #f4f4f4;
      color: #333;
      transition: all 0.3s ease;
    }
    body.dark {
      background-color: #333;
      color: #f4f4f4;
    }
    #chart-container {
      width: 80%;
      margin: auto;
    }
    button {
      margin: 10px;
      padding: 10px;
      cursor: pointer;
      font-size: 16px;
    }
    .theme-toggle {
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 5px;
    }
    .network-toggle {
      background-color: #007BFF;
      color: white;
      border: none;
      border-radius: 5px;
    }
  </style>
</head>
<body>
  <h1>Page Load and Network Performance</h1>

  <!-- Theme toggle button -->
  <button class="theme-toggle" onclick="toggleTheme()">Toggle Theme</button>

  <!-- Network Data Toggle button -->
  <button class="network-toggle" onclick="toggleNetworkData()">Show Network Data</button>

  <div id="chart-container">
    <canvas id="loadChart"></canvas>
  </div>

  <div>
    <h3>Page Load Times (in ms)</h3>
    <ul>
      <li><strong>Navigation Start:</strong> <span id="nav-start">0</span> ms</li>
      <li><strong>DOM Content Loaded:</strong> <span id="dom-content-loaded">0</span> ms</li>
      <li><strong>Page Load (load event):</strong> <span id="page-load">0</span> ms</li>
    </ul>
  </div>

  <!-- Real-time Network Data Chart -->
  <div id="network-container" style="display: none;">
    <h3>Network Activity (ms)</h3>
    <canvas id="networkChart"></canvas>
  </div>

  <script>
    let networkDataVisible = false;
    let networkChart;

    // Function to toggle dark/light theme
    function toggleTheme() {
      document.body.classList.toggle('dark');
    }

    // Function to toggle network data visibility
    function toggleNetworkData() {
      networkDataVisible = !networkDataVisible;
      document.getElementById('network-container').style.display = networkDataVisible ? 'block' : 'none';
      if (networkDataVisible && !networkChart) {
        initializeNetworkChart();
      }
    }

    // Initialize the network data chart
    function initializeNetworkChart() {
      const ctx = document.getElementById('networkChart').getContext('2d');
      networkChart = new Chart(ctx, {
        type: 'line',
        data: {
          datasets: [{
            label: 'Network Response Time (ms)',
            data: [],
            borderColor: 'rgba(54, 162, 235, 1)',
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            fill: true,
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          scales: {
            x: {
              type: 'linear',
              position: 'bottom',
              title: {
                display: true,
                text: 'Time (ms)'
              }
            },
            y: {
              beginAtZero: true,
              title: {
                display: true,
                text: 'Response Time (ms)'
              }
            }
          },
          plugins: {
            legend: {
              position: 'top'
            }
          }
        }
      });
    }

    // Track network activity with Performance API
    function trackNetworkActivity() {
      const resources = performance.getEntriesByType('resource');
      const networkTimes = resources.map(resource => {
        return {
          name: resource.name,
          duration: resource.duration
        };
      });

      // Update the network chart with new data
      if (networkChart) {
        networkTimes.forEach(item => {
          networkChart.data.datasets[0].data.push({
            x: Date.now(),
            y: item.duration
          });
        });
        networkChart.update();
      }
    }

    window.onload = function () {
      // Get performance data using the Performance API
      const performanceData = window.performance.timing;

      // Calculate different timing metrics
      const navigationStart = performanceData.navigationStart;
      const domContentLoadedTime = performanceData.domContentLoadedEventEnd - navigationStart;
      const pageLoadTime = performanceData.loadEventEnd - navigationStart;

      // Display the raw times in the page
      document.getElementById('nav-start').textContent = navigationStart;
      document.getElementById('dom-content-loaded').textContent = domContentLoadedTime;
      document.getElementById('page-load').textContent = pageLoadTime;

      // Prepare data for the chart
      const data = {
        labels: ['Navigation Start', 'DOM Content Loaded', 'Page Load'],
        datasets: [{
          label: 'Page Load Time (ms)',
          data: [navigationStart, domContentLoadedTime, pageLoadTime],
          backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(75, 192, 192, 0.2)'],
          borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(75, 192, 192, 1)'],
          borderWidth: 1
        }]
      };

      // Create the chart for page load times
      const ctx = document.getElementById('loadChart').getContext('2d');
      const loadChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: {
          responsive: true,
          scales: {
            y: {
              beginAtZero: true
            }
          },
          plugins: {
            legend: {
              position: 'top'
            },
            tooltip: {
              callbacks: {
                label: function(tooltipItem) {
                  return tooltipItem.raw + ' ms';
                }
              }
            }
          }
        }
      });

      // Update network data every second
      setInterval(trackNetworkActivity, 1000);
    };
  </script>
</body>
</html>
