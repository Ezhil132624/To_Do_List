<!DOCTYPE html>
<html>

<head>
    <title>To-Do App</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            padding: 30px;
        }

        h2 {
            font-weight: bold;
            color: #343a40;
        }

        .btn {
            font-weight: 500;
        }

        .table {
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .btn i {
            margin-right: 5px;
        }

        p {
            color: #6c757d;
        }
    </style>
</head>

<body class="container">
    <h2 class="mb-4">📝 My To-Do List</h2>
    <a href="<?= site_url('todo/add') ?>" class="btn btn-success mb-3">
        <i class="fas fa-plus"></i> Add Task
    </a>

    <?php if (!empty($todos)) : ?>
        <table class="table table-bordered shadow-sm">
            <thead class="table-light">
                <tr>
                    <th>S:No</th>
                    <th>Task</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($todos as $todo) : ?>
                    <tr>
                        <td><?= $todo['id'] ?></td>
                        <td><?= htmlspecialchars($todo['title']) ?></td>
                        <td><?= $todo['created_at'] ?></td>
                        <td>
                            <a href="<?= site_url('todo/edit/' . $todo['id']) ?>" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>Edit
                            </a>
                            <a href="<?= site_url('todo/delete/' . $todo['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this task?')">
                                <i class="fas fa-trash-alt"></i>Delete
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>No to-do items found.</p>
    <?php endif; ?>
</body>

</html>
