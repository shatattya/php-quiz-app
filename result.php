<?php
$score = 0;
$conn = new mysqli("localhost", "root", "", "simple_quiz");
$questions = $conn->query("SELECT * FROM questions");

while($row = $questions->fetch_assoc()) {
    $qid = $row['id'];
    if(isset($_POST["q$qid"]) && (int)$_POST["q$qid"] === (int)$row['correct_option']) {
        $score++;
    }
}
$total = $questions->num_rows;
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quiz Results</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container result">
        <h1>Your Score: <?= $score ?>/<?= $total ?></h1>
        <p><?= $score >= 3 ? '🎉 Great job!' : '💪 Keep practicing!' ?></p>
        <a href="index.php" class="retry-btn">Try Again</a>
    </div>
</body>
</html>