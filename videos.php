<?php
$current_location = $_POST['current_location'] ?? '';
$destination = $_POST['destination'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Route Result</title>
    <link rel="stylesheet" href="trackmybus.css">
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>🚍 Smart Route Planner</h1>
        </header>
        
        <main class="main-content">
            <?php if ($current_location && $destination): ?>
                <div class="result-container">
                    <?php if ($destination === 'Khamgaon'): ?>
                        <div class="route-details">
                            <h2>Route to Khamgaon</h2>
                            <p>🗺️ Starting from <b>Mauli College</b>, follow NH6 and continue for 45 minutes to reach Khamgaon.</p>
                        </div>
                        <div class="video-container">
                            <iframe src="WhatsApp Video 2024-08-27 at 14.08.17_17132102.mp4"></iframe>
                        </div>
                    <?php elseif ($destination === 'Shegaon'): ?>
                        <div class="route-details">
                            <h2>Route to Shegaon</h2>
                            <p>🗺️ Starting from <b>Mauli College</b>, take the SH6 highway, and you will reach Shegaon in about 35 minutes.</p>
                        </div>
                        <div class="video-container">
                            <iframe src="Shegaon edit - Made with Clipchamp.mp4"></iframe>
                        </div>
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <p style="color: yellow;">⚠️ Please select both Current Location and Destination to see the route.</p>
            <?php endif; ?>
        </main>
        
        <footer class="footer">
            <p>&copy; 2025 Smart Route Planner | Built for Students 🚀</p>
        </footer>
    </div>
</body>
</html>
