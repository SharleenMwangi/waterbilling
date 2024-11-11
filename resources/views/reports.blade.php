<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function showSection(sectionId) {
            const sections = document.querySelectorAll('.content-box');
            sections.forEach(section => {
                section.style.display = 'none'; // Hide all sections
            });
            document.getElementById(sectionId).style.display = 'block'; // Show selected section
        }

        document.addEventListener('DOMContentLoaded', () => {
            showSection('dashboard'); // Show dashboard by default
        });
    </script>
</head>
<body>
    <header>
        <div class="title">
            <h1>HARVESTERS PRIDE</h1>
        </div>
        <div class="main">
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
            </div>
            <ul class="menu">
                <li><a href="javascript:void(0);" onclick="showSection('dashboard')" id="dashboard-link"><i class="fas fa-home icon"></i>Dashboard</a></li>
                <li><a href="javascript:void(0);" onclick="showSection('usage')" id="usage-link"><i class="fas fa-chart-bar icon"></i>Usage</a></li>
                <li><a href="javascript:void(0);" onclick="showSection('billing')"><i class="fas fa-file-invoice-dollar icon"></i>Billing</a></li>
                <li><a href="#"><i class="fas fa-credit-card icon"></i>Payments</a></li>
                <li class="gap"><button class="message-button"><i class="fas fa-envelope icon"></i>Message</button></li>
                <li><a href="#"><i class="fas fa-question-circle icon"></i>Help & docs</a></li>
                <li><a href="#"><i class="fas fa-cog icon"></i>Settings</a></li>
            </ul>
        </div>
    </header>

    <!-- Dashboard Section -->
    <div id="dashboard" class="content-box" style="display: block;">
        <p>This is an online-based system that enables the automation of the whole water billing cycle...</p>
    </div>

    <!-- Usage Section -->
    <div id="usage" class="content-box" style="display: none;">
        <h2>Monthly Meter Readings</h2>
        <canvas id="barChart"></canvas>
    </div>

    <!-- Billing Section -->
    <div id="billing" class="content-box" style="display: none;">
        <h2>Charges Based on Meter Usage</h2>
        <canvas id="billingDoughnutChart"></canvas>
    </div>

    <script>
        // Bar chart for monthly meter readings
        const ctxBar = document.getElementById('barChart').getContext('2d');
        new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [{
                    label: 'Cubic Meters of Water',
                    data: [12, 19, 13, 15, 22, 18, 30, 25, 28, 35, 40, 45], // Example data for meter readings
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Doughnut chart for billing (showing in billing section)
        const ctxBillingDoughnut = document.getElementById('billingDoughnutChart').getContext('2d');
        const waterUsage = [12, 19, 13, 15, 22, 18, 30, 25, 28, 35, 40, 45]; // Same data as bar chart
        const chargePerCubicMeter = 150; // 150 KSH per cubic meter

        const totalCharges = waterUsage.map(usage => usage * chargePerCubicMeter);

        new Chart(ctxBillingDoughnut, {
            type: 'doughnut',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [{
                    label: 'Total Charges (KSH)',
                    data: totalCharges,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                    ],
                    borderWidth: 1
                }]
            }
        });
    </script>
</body>
</html>
