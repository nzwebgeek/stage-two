

// Check if entered data is valid       
// Form data
$fName = trim($_POST['firstname'] ?? '');
$lName = trim($_POST['lastname'] ?? '');
$country = trim($_POST['country'] ?? '');

/*if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (is_numeric($fName) || is_numeric($lName)) {
    die('Names cannot be numbers.');
    }
    else{
        $prepStmt =$conn->prepare("INSERT INTO users (fName, lname, country) VALUES (?, ?, ?)");

        $prepStmt->bind_param("sss",$fName, $lName, $country);

        $prepStmt->execute();
        echo 'Add Successfully';

      
        // After your execute statement
        $prepStmt->execute();
        $prepStmt->close(); // Close once, explicitly

        // Redirect to prevent form resubmission
        header("Location: ../index.php?success=true");
        exit();
        }
    
}*/
  
// Check connection immediately
