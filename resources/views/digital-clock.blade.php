<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Clock</title>
    <style>
        .clock {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 3rem;
            text-align: center;
            margin-top: 20%;
        }
    </style>
</head>
<body>
    <div class="clock" id="digital-clock">
        <!-- Clock will be inserted here now-->
    </div>

    <!-- Include jQuery from CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Custom script for clock -->
    <script>
        $(document).ready(function() {
            function displayTime() {
                var currentTime = new Date();
                var hours = currentTime.getHours();
                var minutes = currentTime.getMinutes();
                var seconds = currentTime.getSeconds();

                // Add leading zeros if necessary
                minutes = (minutes < 10 ? "0" : "") + minutes;
                seconds = (seconds < 10 ? "0" : "") + seconds;

                // Determine AM/PM
                var period = (hours < 12) ? "AM" : "PM";

                // Convert to 12-hour format
                hours = (hours > 12) ? hours - 12 : hours;
                hours = (hours == 0) ? 12 : hours;

                // Display the time
                var currentTimeString = hours + ":" + minutes + ":" + seconds + " " + period;
                $("#digital-clock").html(currentTimeString);
            }

            // Refresh clock every second
            setInterval(displayTime, 1000);
        });
    </script>
</body>
</html>
