<!DOCTYPE html>
<html>

<head>
    <title>Edit Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
    <h2 class="mb-4">✏️ Edit Task</h2>
    <form method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Task Title</label>
            <input type="text" class="form-control" name="title" value="<?= htmlspecialchars($todo['title']) ?>" required>
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
        <a href="<?= site_url('todo') ?>" class="btn btn-secondary">Back</a>
    </form>
</body>

</html>