<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Quiz</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Simple Knowledge Test</h1>
        <form action="result.php" method="post">
            <?php
            $conn = new mysqli("localhost", "root", "", "simple_quiz");
            $questions = $conn->query("SELECT * FROM questions");
            
            while($row = $questions->fetch_assoc()) {
                echo '<div class="question-card">';
                echo '<h3>'.htmlspecialchars($row['question']).'</h3>';
                for($i = 1; $i <= 4; $i++) {
                    echo '<label class="option">';
                    echo '<input type="radio" name="q'.$row['id'].'" value="'.$i.'" required>';
                    echo htmlspecialchars($row['option'.$i]);
                    echo '</label>';
                }
                echo '</div>';
            }
            $conn->close();
            ?>
            <button type="submit" class="submit-btn">Check My Score</button>
        </form>
    </div>
</body>
</html>