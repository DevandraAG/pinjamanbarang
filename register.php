<html>
<head>
    <title>Form Pendaftaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        select,
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        select {
            height: 35px;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
<html>
<head>
    <title>Form Pendaftaran</title>
</head>
<body>
    <h2>Form Pendaftaran</h2>
    <form action="index.php" method="POST">
        <label for="nama">Nama:</label>
        <input type="varchar" id="nama" name="nama" required><br><br>

        <label for="username">Username:</label>
        <input type="varchar" id="username" name="username" required><br><br>

		<label for="password">Passwod:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="level;">Daftar sebagai:</label>
        <select id="level" name="level">
            <option value="Siswa">Siswa</option>
            <option value="Guru">Guru</option>
        </select><br><br>

        <input type="submit" value="Daftar">
    </form>
</body>
</html>
