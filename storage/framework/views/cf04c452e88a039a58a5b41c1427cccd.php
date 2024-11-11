<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style2.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function showSection(sectionId) {
            const sections = document.querySelectorAll('.content-box');
            sections.forEach(section => {
                section.style.display = 'none'; // Hide all sections
            });
            document.getElementById(sectionId).style.display = 'block'; // Show selected section
            
            // Specific case for dashboard to show paragraph
            if (sectionId === 'dashboard') {
                document.getElementById('dashboard-paragraph').style.display = 'block'; // Show paragraph in dashboard
            } else {
                document.getElementById('dashboard-paragraph').style.display = 'none'; // Hide paragraph in other sections
            }
        }

        function toggleChatbox() {
            const chatbox = document.getElementById('chatbox');
            chatbox.style.display = chatbox.style.display === 'none' ? 'block' : 'none';
        }

        function sendMessage() {
            const messageInput = document.getElementById('messageInput');
            const messageContainer = document.getElementById('messageContainer');

            const messageText = messageInput.value;
            if (messageText.trim() !== '') {
                const messageDiv = document.createElement('div');
                messageDiv.className = 'message sent';
                messageDiv.innerHTML = messageText + '<div class="sent-confirmation">Sent at ' + new Date().toLocaleString() + '</div>';
                messageContainer.appendChild(messageDiv);
                messageInput.value = ''; // Clear input
                messageContainer.scrollTop = messageContainer.scrollHeight; // Scroll to the bottom
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            showSection('dashboard'); // Show dashboard by default
            document.getElementById('chatbox').style.display = 'none'; // Hide chatbox by default
        });

        function toggleHelpDocs() {
            const helpDocsDiv = document.getElementById('help-docs');
            // Hide all other sections
            const sections = document.querySelectorAll('.content-box');
            sections.forEach(section => {
                section.style.display = 'none';
            });
            // Show Help & Docs section
            helpDocsDiv.style.display = helpDocsDiv.style.display === 'none' ? 'block' : 'none';
        }
    </script>
</head>
<body>
    <header>
        <div class="title">
            <h1>HARVESTERS PRIDE</h1>
        </div>
        <div class="main">
            <div class="logo">
                <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo">
            </div>
            <ul class="menu">
                <li><a href="javascript:void(0);" onclick="showSection('dashboard')" id="dashboard-link"><i class="fas fa-home icon"></i>Dashboard</a></li>
                <li><a href="javascript:void(0);" onclick="showSection('usage')" id="usage-link"><i class="fas fa-chart-bar icon"></i>Usage</a></li>
                <li><a href="javascript:void(0);" onclick="showSection('billing')"><i class="fas fa-file-invoice-dollar icon"></i>Billing</a></li>
                <li><a href="javascript:void(0);" onclick="showSection('payments')"><i class="fas fa-credit-card icon"></i>Payments</a></li>
                <li class="gap"><button class="message-button" onclick="toggleChatbox()"><i class="fas fa-envelope icon"></i>Message</button></li>
                <li><a href="javascript:void(0);" onclick="toggleHelpDocs()"><i class="fas fa-question-circle icon"></i>Help & docs</a></li>
                <li><a href="javascript:void(0);" onclick="showSettings()"><i class="fas fa-cog icon"></i>Settings</a></li>
            </ul>
        </div>
    </header>

    <!-- Dashboard Section -->
    <div id="dashboard" class="content-box" style="display: block;">
        <p id="dashboard-paragraph" style="display: block;">This is an online-based system that enables the automation of the whole water billing cycle. The system has features that help in the management of members, records, meter readings, bills, M-PESA integrated payments and generate reports.</p>
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

    <!-- Payments Section -->
    <div id="payments" class="content-box" style="display: none;">
        <h2>Payment History</h2>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Amount (KSH)</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>2024-01-15</td>
                    <td>500</td>
                    <td>Completed</td>
                </tr>
                <tr>
                    <td>2024-10-15</td>
                    <td>750</td>
                    <td>Completed</td>
                </tr>
                <tr>
                    <td>2024-11-22</td>
                    <td>850</td>
                    <td>Pending</td>
                </tr>
                <tr>
                    <td>2024-12-18</td>
                    <td>950</td>
                    <td>Completed</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Help-docs section -->
    <div id="help-docs" class="content-box" style="display: none;">
        <h2>How can we help</h2>
        <p>Here are some steps on how we can assist you:</p>
        
        <h3>Frequently Asked Questions (FAQ)</h3>
        <ul>
            <li><strong>What is HARVESTERS PRIDE?</strong> HARVESTERS PRIDE is an online-based system that enables the automation of the whole water billing cycle. The system has features that help in the management of members, records, meter readings, bills, M-PESA integrated payments and generate reports</li>
            <li><strong>How do I create an account?</strong> To create an account, click on the "Sign Up" button and input your credentials of choice</li>
            <li><strong>What should I do if I forget my password?</strong> If you forget your password, click on the "Forgot Password" link, an email will be sent to you whereby you will be able to change your password</li>
        </ul>
    
        <h3>Step-by-Step Guides</h3>
        <h4>How to Check Your Water Usage:</h4>
        <ol>
            <li>Log in to your account.</li>
            <li>Navigate to the "Usage" section.</li>
            <li>View your monthly meter readings displayed in the chart.</li>
        </ol>
    
        <h3>Contact Information</h3>
        <p>For further assistance, contact our customer support:</p>
        <li>Through the message toggle on the menu bar</li>
        <p><strong>Email:</strong> support@harvesterspride.com</p>
        <p><strong>Phone:</strong> +254 796516752</p>
    
        <h3>Troubleshooting Tips</h3>
        <ul>
            <li><strong>Problem:</strong> Unable to log in.<br><strong>Solution:</strong> Ensure your email and password are entered correctly...</li>
        </ul>
    
        <h3>System Requirements</h3>
        <p>Minimum browser version: Chrome 90+, Firefox 85+, Safari 14...</p>
    
        <h3>Share Your Feedback</h3>
        <form action="<?php echo e(route('feedback.submit')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <label for="feedback">Your Feedback:</label><br>
            <textarea id="feedback" name="feedback" rows="4" cols="50"></textarea><br>
            <button type="submit">Submit</button>
        </form>
    </div>

    <!-- Settings Section -->
    <div id="settings" class="content-box" style="display: none;">
        <h2>Settings</h2>
        <form action="<?php echo e(route('settings.update')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="<?php echo e(auth()->user()->name); ?>">
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo e(auth()->user()->email); ?>">
            </div>
            <button type="submit">Update</button>
        </form>
    </div>

    <!-- Message Box -->
    <div id="chatbox" class="chatbox">
        <div id="messageContainer" class="message-container"></div>
        <input type="text" id="messageInput" class="message-input" placeholder="Type a message..." />
        <button class="send-button" onclick="sendMessage()">Send</button>
    </div>

    <footer>
        <p>&copy; <?php echo e(date('Y')); ?> HARVESTERS PRIDE. All Rights Reserved.</p>
    </footer>
</body>
</html>
<?php /**PATH C:\SMARTWATERBILLING\smartwaterbilling\resources\views/home.blade.php ENDPATH**/ ?>