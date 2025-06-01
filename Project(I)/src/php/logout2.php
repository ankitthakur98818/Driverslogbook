<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Logout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .logout-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        p {
            color: #555;
            margin-bottom: 30px;
        }

        .btn {
            background-color: #FF5733; /* Shopping theme color */
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            width: 80%;
        }

        .btn:hover {
            background-color: #e14c1c;
        }

        .btn-secondary {
            background-color: #ddd;
            color: #333;
            margin-top: 10px;
        }

        .btn-secondary:hover {
            background-color: #bbb;
        }
    </style>
</head>
<body>

    <div class="logout-container">
        <h1>Logout</h1>
        <p>Are you sure you want to log out from the Online Shopping System?</p>

        <a href="../homepage/h.php" class="btn">Logout</a>
        <a href="home.html" class="btn btn-secondary">Cancel</a>
    </div>

</body>
</html>