?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
// Get form data
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$message = trim($_POST['message']);?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
 
{
// Get form data
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$message = trim($_POST['message']);

f (empty($name) || empty($email) || empty($message)) {
echo "All fields are required!";
}
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
{
echo "Invalid email format!";
}
else {
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feedback_db";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
// Insert data using prepared statement
$stmt = $conn->prepare(
"INSERT INTO feedback (name, email, message) VALUES (?, ?, ?)"
);
$stmt->bind_param("sss", $name, $email, $message);
if ($stmt->execute()) {
echo "Thank you, " . $name . ". Your feedback has been recorded!";

}
else {
echo "Error: " . $stmt->error;
}
$stmt->close();
$conn->close();
}
}
?>