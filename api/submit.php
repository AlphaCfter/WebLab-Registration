<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $gender = htmlspecialchars($_POST['gender']);
    $message = htmlspecialchars($_POST['message']);

    // Prepare content to be written to the text file
    $content = "Full Name: $name\n";
    $content .= "Email: $email\n";
    $content .= "Phone: $phone\n";
    $content .= "Gender: $gender\n";
    $content .= "Message: $message\n";

    // Define the filename
    $filename = "form_data.txt";

    // Open or create the text file and write data to it
    file_put_contents($filename, $content);

    // Send headers to force download the file
    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Content-Length: ' . strlen($content));

    // Output the file content to be downloaded
    echo $content;

    // Exit to complete the file download process
    exit();
} else {
    // Redirect to the form page if accessed without POST
    header("Location: index.html");
    exit();
}
?>
