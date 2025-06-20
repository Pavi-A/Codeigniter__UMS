<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Edit User</title>
  <style>
    /* Reset and base styles */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #333;
    }

    body {
      background: #f0f4f8;
      padding: 40px 20px;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      min-height: 100vh;
    }

    .container {
      background: white;
      padding: 35px 45px;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      max-width: 480px;
      width: 100%;
    }

    h2 {
      text-align: center;
      font-weight: 700;
      color: #222;
      margin-bottom: 30px;
      letter-spacing: 1px;
    }

    label {
      display: block;
      font-weight: 600;
      margin-bottom: 10px;
      font-size: 1rem;
      color: #444;
    }

    input[type="text"],
    input[type="email"] {
      width: 100%;
      padding: 14px 18px;
      margin-bottom: 25px;
      border: 2px solid #ddd;
      border-radius: 8px;
      font-size: 1rem;
      transition: border-color 0.3s ease;
    }

    input[type="text"]:focus,
    input[type="email"]:focus {
      border-color: #0056b3;
      outline: none;
      box-shadow: 0 0 8px rgba(0, 86, 179, 0.3);
    }

    .gender-options {
      margin-bottom: 30px;
      font-size: 1rem;
      color: #444;
    }

    .gender-options label {
      margin-right: 30px;
      cursor: pointer;
      font-weight: 500;
      user-select: none;
    }

    .gender-options input[type="radio"] {
      margin-right: 8px;
      transform: scale(1.2);
      cursor: pointer;
      vertical-align: middle;
    }

    input[type="submit"] {
      width: 100%;
      background-color: #007BFF;
      color: white;
      font-weight: 700;
      font-size: 1.2rem;
      padding: 16px 0;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      box-shadow: 0 6px 15px rgba(0, 123, 255, 0.4);
    }

    input[type="submit"]:hover {
      background-color: #0056b3;
      box-shadow: 0 8px 20px rgba(0, 86, 179, 0.6);
    }

    .back-link {
      display: block;
      margin-top: 25px;
      text-align: center;
      font-weight: 600;
      color: #007BFF;
      text-decoration: none;
      transition: color 0.3s ease;
      font-size: 1rem;
      user-select: none;
    }

    .back-link:hover {
      color: #0056b3;
      text-decoration: underline;
    }

    /* Responsive */
    @media (max-width: 500px) {
      .container {
        padding: 25px 20px;
      }
      input[type="submit"] {
        font-size: 1rem;
        padding: 14px 0;
      }
      h2 {
        font-size: 1.5rem;
      }
    }
  </style>
</head>
<body>

  <div class="container">
    <h2>Edit User - <?= htmlspecialchars($user->name); ?></h2>

    <form method="post" action="<?= base_url('user/update_user/' . $user->id); ?>">
      <label for="name">Name:</label>
      <input
        type="text"
        id="name"
        name="name"
        value="<?= htmlspecialchars($user->name); ?>"
        required
      />

      <label for="email">Email:</label>
      <input
        type="email"
        id="email"
        name="email"
        value="<?= htmlspecialchars($user->email); ?>"
        required
      />

      <label>Gender:</label>
      <div class="gender-options">
        <label>
          <input
            type="radio"
            name="gender"
            value="Male"
            <?= ($user->gender == 'Male') ? 'checked' : ''; ?>
          />
          Male
        </label>
        <label>
          <input
            type="radio"
            name="gender"
            value="Female"
            <?= ($user->gender == 'Female') ? 'checked' : ''; ?>
          />
          Female
        </label>
      </div>

      <input type="submit" value="Update" />
    </form>

    <a class="back-link" href="<?= base_url('user/dashboard'); ?>">← Back to Dashboard</a>
  </div>

</body>
</html>
