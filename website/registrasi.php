<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Registrasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .register-box {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type="submit"] {
            background: #4CAF50;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #45a049;
        }
    </style>
</head>
<body>

<div class="register-box">
    <h2>Form Registrasi</h2>
    <form action="process_register.php" method="POST">
        <input type="text" name="username" placeholder="Nama Pengguna" required>
        <input type="email" name="email" placeholder="Alamat Email" required>
        <input type="password" name="password" placeholder="Kata Sandi" required>
        <input type="submit" value="Daftar">
    </form>
</div>

</body>
</html>
