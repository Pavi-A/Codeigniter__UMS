<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>User Report</title>
  <style>
    /* Container and base styling */
    body {
      background: #f4f7fb;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #333;
      padding: 30px 15px;
      display: flex;
      justify-content: center;
      min-height: 100vh;
    }

    .container {
      max-width: 900px;
      width: 100%;
      background: white;
      padding: 30px 40px;
      border-radius: 12px;
      box-shadow: 0 12px 30px rgba(0,0,0,0.12);
    }

    h2 {
      text-align: center;
      font-weight: 700;
      color: #222;
      margin-bottom: 25px;
      letter-spacing: 1.1px;
      font-size: 1.8rem;
    }

    button {
      background-color: #007BFF;
      color: white;
      font-weight: 600;
      border: none;
      padding: 12px 28px;
      font-size: 1rem;
      border-radius: 8px;
      cursor: pointer;
      box-shadow: 0 6px 15px rgba(0,123,255,0.3);
      transition: background-color 0.3s ease, box-shadow 0.3s ease;
      display: block;
      margin: 0 auto 30px auto;
    }

    button:hover {
      background-color: #0056b3;
      box-shadow: 0 8px 20px rgba(0,86,179,0.5);
    }

    table {
      width: 100%;
      border-collapse: collapse;
      text-align: center;
      font-size: 0.95rem;
      box-shadow: 0 2px 12px rgba(0,0,0,0.05);
    }

    thead {
      background: #007BFF;
      color: white;
      font-weight: 700;
    }

    thead th {
      padding: 14px 12px;
      border: 1px solid #0056b3;
    }

    tbody tr:nth-child(even) {
      background-color: #f9fbff;
    }

    tbody tr:hover {
      background-color: #e6f0ff;
      transition: background-color 0.3s ease;
    }

    tbody td {
      padding: 12px 10px;
      border: 1px solid #ddd;
      vertical-align: middle;
    }

    tbody img {
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid #007BFF;
    }

    a {
      display: block;
      text-align: center;
      margin-top: 30px;
      text-decoration: none;
      color: #007BFF;
      font-weight: 600;
      font-size: 1rem;
      transition: color 0.3s ease;
      user-select: none;
    }

    a:hover {
      color: #0056b3;
      text-decoration: underline;
    }

    /* Print styles */
    @media print {
      button {
        display: none;
      }

      a {
        display: none;
      }

      body, .container {
        box-shadow: none;
        background: white;
        padding: 0;
      }

      table {
        font-size: 12pt;
      }
    }

    /* Responsive */
    @media (max-width: 600px) {
      .container {
        padding: 20px 15px;
      }

      table, thead, tbody, th, td, tr {
        display: block;
      }

      thead tr {
        display: none; /* Hide table header on small screens */
      }

      tbody tr {
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        background-color: #fff;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      }

      tbody td {
        padding: 10px 15px;
        border: none;
        text-align: right;
        position: relative;
      }

      tbody td::before {
        content: attr(data-label);
        position: absolute;
        left: 15px;
        width: 45%;
        padding-left: 10px;
        font-weight: 600;
        text-align: left;
        color: #007BFF;
      }

      tbody img {
        width: 50px;
        height: 50px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>All Registered Users Report</h2>

    <button onclick="window.print()">🖨️ Print this Page</button>

    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Photo</th>
          <th>Name</th>
          <th>Email</th>
          <th>Gender</th>
          <th>Created At</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user) { ?>
          <tr>
            <td data-label="ID"><?= $user->id; ?></td>
            <td data-label="Photo">
              <img src="<?= base_url('uploads/' . $user->image); ?>" width="60" height="60" alt="User Photo" />
            </td>
            <td data-label="Name"><?= htmlspecialchars($user->name); ?></td>
            <td data-label="Email"><?= htmlspecialchars($user->email); ?></td>
            <td data-label="Gender"><?= htmlspecialchars($user->gender); ?></td>
            <td data-label="Created At"><?= htmlspecialchars($user->created_at); ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>

    <a href="<?= base_url('user/dashboard'); ?>">← Back to Dashboard</a>
  </div>
</body>
</html>
