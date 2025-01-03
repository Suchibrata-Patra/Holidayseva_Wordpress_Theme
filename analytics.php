<h1>Page Load Statistics</h1>
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

  <script>
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

      // Create the chart
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
    };
  </script>