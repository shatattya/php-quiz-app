<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Create fresh database
$conn->query("DROP DATABASE IF EXISTS simple_quiz");
$conn->query("CREATE DATABASE simple_quiz");
$conn->select_db("simple_quiz");

// Create questions table
$conn->query("CREATE TABLE questions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question TEXT NOT NULL,
    option1 VARCHAR(255) NOT NULL,
    option2 VARCHAR(255) NOT NULL,
    option3 VARCHAR(255) NOT NULL,
    option4 VARCHAR(255) NOT NULL,
    correct_option INT NOT NULL
)");

// Insert exactly 5 questions
$conn->query("INSERT INTO questions (question, option1, option2, option3, option4, correct_option) VALUES
    ('What does HT in HTML stand for?', 'Hyper Trainer', 'Hyper Text', 'Home Tool', 'Hyperlinks', 2),
    ('2+2*2 = ?', '6', '8', '4', '10', 1),
    ('Primary color?', 'White', 'Orange', 'Purple', 'Red', 4),
    ('Capital of Japan?', 'Beijing', 'Seoul', 'Tokyo', 'Bangkok', 3),
    ('Largest planet?', 'Earth', 'Mars', 'Jupiter', 'Saturn', 3)");

echo "Database reset with exactly 5 questions!";
$conn->close();
?>