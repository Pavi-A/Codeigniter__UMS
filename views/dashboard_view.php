<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8f9fa;
      margin: 0;
      padding: 30px;
    }

    h2 {
      text-align: center;
      color: #333;
      margin-bottom: 20px;
    }

    p {
      text-align: center;
      margin-bottom: 25px;
    }

    p a {
      background-color: #007bff;
      color: white;
      padding: 10px 20px;
      border-radius: 4px;
      text-decoration: none;
      margin: 0 10px;
      font-size: 14px;
      display: inline-block;
      transition: 0.3s;
    }

    p a:hover {
      background-color: #0056b3;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: white;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      overflow-x: auto;
    }

    th, td {
      padding: 14px;
      text-align: center;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #007bff;
      color: white;
    }

    tr:hover {
      background-color: #f1f1f1;
    }

    img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      object-fit: cover;
    }

    td a {
      text-decoration: none;
      font-size: 14px;
    }

    td a:first-child {
      color: #28a745; /* green - edit */
    }

    td a:last-child {
      color: #dc3545; /* red - delete */
    }

    td a:hover {
      text-decoration: underline;
    }

    @media (max-width: 768px) {
      table, thead, tbody, th, td, tr {
        display: block;
      }

      thead tr {
        display: none;
      }

      tr {
        margin-bottom: 20px;
        background: white;
        padding: 10px;
        border-radius: 6px;
      }

      td {
        text-align: right;
        position: relative;
        padding-left: 50%;
        border: none;
        border-bottom: 1px solid #eee;
      }

      td:before {
        content: attr(data-label);
        position: absolute;
        left: 10px;
        width: 45%;
        font-weight: bold;
        text-align: left;
        color: #555;
      }
    }
  </style>
</head>
<body>
  <h2>Welcome! User Dashboard</h2>

  <p>
    <a href="<?php echo base_url('user/report'); ?>">🧾 Print Report</a>
    <a href="<?php echo base_url('user/logout'); ?>">🚪 Logout</a>
  </p>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Created At</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user) { ?>
        <tr>
          <td data-label="ID"><?= $user->id; ?></td>
          <td data-label="Photo"><img src="<?= base_url('uploads/' . $user->image); ?>"></td>
          <td data-label="Name"><?= $user->name; ?></td>
          <td data-label="Email"><?= $user->email; ?></td>
          <td data-label="Gender"><?= $user->gender; ?></td>
          <td data-label="Created At"><?= $user->created_at; ?></td>
          <td data-label="Actions">
            <a href="<?= base_url('user/edit/' . $user->id); ?>">✏️ Edit</a> |
            <a href="<?= base_url('user/delete/' . $user->id); ?>" onclick="return confirm('Are you sure?')">🗑️ Delete</a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</body>
</html>
