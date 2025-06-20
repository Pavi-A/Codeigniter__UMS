<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
      background: linear-gradient(to right, #f2fcfe, #1c92d2);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .register-container {
      background-color: #fff;
      padding: 30px 40px;
      border-radius: 10px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      width: 400px;
    }

    .register-container h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #333;
    }

    .register-container label {
      display: block;
      margin-bottom: 5px;
      font-weight: 600;
      color: #444;
    }

    .register-container input[type="text"],
    .register-container input[type="email"],
    .register-container input[type="password"],
    .register-container select,
    .register-container input[type="file"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      outline: none;
      transition: 0.3s;
    }

    .register-container input:focus,
    .register-container select:focus {
      border-color: #1c92d2;
      box-shadow: 0 0 5px rgba(28, 146, 210, 0.4);
    }

    .register-container button {
      background-color: #007bff;
      color: white;
      font-weight: bold;
      border: none;
      padding: 12px;
      width: 100%;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.3s;
    }

    .register-container button:hover {
      background-color: #0056b3;
    }

    .register-container a {
      display: block;
      text-align: center;
      margin-top: 15px;
      color: #333;
      text-decoration: none;
    }

    .register-container a:hover {
      color: #007bff;
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="register-container">
    <h2>📝 User Registration</h2>
    <form action="<?= base_url('user/register_user'); ?>" method="post" enctype="multipart/form-data">
      <label>Name:</label>
      <input type="text" name="name" required>

      <label>Email:</label>
      <input type="email" name="email" required>

      <label>Password:</label>
      <input type="password" name="password" required>

      <label>Gender:</label>
      <select name="gender" required>
        <option value="">Select</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      </select>

      <label>Image:</label>
      <input type="file" name="image" required>

      <button type="submit">Register</button>
    </form>

    <a href="<?php echo base_url('user/index'); ?>">Already Registered? Login</a>
  </div>
</body>
</html>
