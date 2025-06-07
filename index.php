<?php $todos = [];
$file = "todos.json";

if (file_exists($file)) {
    $todos = json_decode(file_get_contents($file), true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['task'])) {
    $todos[] = $_POST['task'];
    file_put_contents($file, json_encode($todos));
    header('Location: index.php');
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>To-Do Liste Projekt1</h1>
    <form method="POST" action="">
        <input type="text" name="task" placeholder="Neue Aufgabe" required />
        <button type="submit">Hinzufügen</button>
    </form>

    <ul>
        <?php foreach ($todos as $todo): ?>
            <li><?= htmlspecialchars($todo) ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>