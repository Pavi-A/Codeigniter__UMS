<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
      background: linear-gradient(135deg, #c3ecb2, #7dd5c2);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-container {
      background-color: #fff;
      padding: 30px 40px;
      border-radius: 10px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
      width: 350px;
    }

    .login-container h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #333;
    }

    .login-container label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
      color: #444;
    }

    .login-container input[type="email"],
    .login-container input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      outline: none;
      transition: 0.3s;
    }

    .login-container input[type="email"]:focus,
    .login-container input[type="password"]:focus {
      border-color: #6fc3df;
      box-shadow: 0 0 5px rgba(111, 195, 223, 0.5);
    }

    .login-container input[type="submit"] {
      background-color: #28a745;
      color: white;
      font-weight: bold;
      border: none;
      padding: 12px;
      width: 100%;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.3s;
    }

    .login-container input[type="submit"]:hover {
      background-color: #218838;
    }

    .login-container a {
      display: block;
      text-align: center;
      margin-top: 15px;
      text-decoration: none;
      color: #007bff;
    }

    .login-container a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>🔐 User Login</h2>
    <form method="post" action="<?php echo base_url('user/login_user'); ?>">
      <label>Email:</label>
      <input type="email" name="email" required>

      <label>Password:</label>
      <input type="password" name="password" required>

      <input type="submit" value="Login">
    </form>
    <a href="<?php echo base_url('user/register'); ?>">New user? Register here</a>
  </div>
</body>
</html>
