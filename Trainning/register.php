<!DOCTYPE html>
<html lang="en">

<head>

    <title>Register</title>
</head>

<body>
    <main>
        <form action="process_register.php" method="post">

            <div>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name">
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email">
            </div>
            <div>
                <label for="mobile">Mobile:</label>
                <input type="mobile" name="mobile" id="mobile">
            </div>

            <div>
                <label for="address">Address:</label>
                <input type="address" name="address" id="address">
            </div>
            <div>
                <label for="passwords">Password:</label>
                <input type="passwords" name="passwords" id="passwords">
            </div>

            </div>
            <button type="submit">Register</button>

        </form>
    </main>
</body>

</html>