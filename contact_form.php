<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML Contact Form Submission</title>
    <!-- custom css file link -->
    <link rel="stylesheet" href="css/style1.css">
</head>
<body>
    <div class="container">
    <div class="content">
        <h1>contact form</h1>
        <form action="https://formspree.io/f/mqazwojk" method="POST">
            <input type="text" name="Name" placeholder="Full Name" required>
            <input type="email" name="Email" placeholder="Email" required>
            <select name="Continent">
                <option>Africa</option>
                <option>Asia</option>
                <option>Australia</option>
                <option>Europe</option>
                <option>North America</option>
                <option>South America</option>
            </select>
            <textarea name="Message" placeholder="Message" required></textarea>
            <button type="submit">send</button>
        </form>
    </div>
    </div>
</body>
</html>