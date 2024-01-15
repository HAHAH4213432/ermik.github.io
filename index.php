<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monke Fn Software</title>
</head>
<body>
    <form id="discordForm">
        <div class="input-group">
            <input type="text" id="discordUsername" name="username" placeholder="Your Discord Username" required>
        </div>
        <div class="input-group">
            <input type="text" id="accessKey" name="key" placeholder="Access Key" required>
        </div>
        <button type="button" class="submit-button" onclick="submitForm()">Submit</button>
    </form>

    <script>
        function submitForm() {
            var form = document.getElementById('discordForm');
            var formData = new FormData(form);

            fetch('submit.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(data => {
                console.log(data);
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        // Add the following script to execute when the page loads
        document.addEventListener("DOMContentLoaded", function() {
            fetch('submit.php', {
                method: 'POST',
                body: new URLSearchParams({
                    key: '1234' // Replace with your actual access key
                }),
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            })
            .then(response => response.text())
            .then(data => console.log(data))
            .catch(error => console.error('Error:', error));
        });
    </script>
</body>
</html>
