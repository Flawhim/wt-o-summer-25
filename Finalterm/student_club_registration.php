<!DOCTYPE html>
<html>
<head>
 <title>Student Technology Club Registration</title>
</head>
<body>

 <h2>Student Technology Club Registration Form</h2>

<?php


$name = $age = $email = $membership = $department = $contact = "";
$nameErr = $ageErr = $emailErr = $membershipErr = $departmentErr = $contactErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


 if (empty($_POST["name"])) {
 $nameErr = "Name is required";
 } else {
 $name = $_POST["name"];


 if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
 $nameErr = "Only letters and spaces are allowed";
 }
 }


 if (empty($_POST["age"])) {
 $ageErr = "Age is required";
 } else {
 $age = $_POST["age"];


 if (!is_numeric($age) || $age < 18 || $age > 30) {
 $ageErr = "Age must be between 18 and 30";
 }
 }


 if (empty($_POST["email"])) {
 $emailErr = "Email is required";
 } else {
 $email = $_POST["email"];


 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 $emailErr = "Invalid email format";
 }
 }


 if (empty($_POST["membership"])) {
 $membershipErr = "Please select a membership type";
 } else {
 $membership = $_POST["membership"];
 }


 if (empty($_POST["department"]) || $_POST["department"] == "--Select Department--") {
 $departmentErr = "Please select your department";
 } else {
 $department = $_POST["department"];
 }


 if (empty($_POST["contact"])) {
 $contactErr = "Phone number is required";
 } else {
 $contact = $_POST["contact"];


 if (!preg_match("/^[0-9]{11}$/", $contact)) {
 $contactErr = "Phone number must contain exactly 11 digits";
 }
 }
}

?>

<form method="post" action="">

 Student Name:
 <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>">
 <span style="color:red">
 * <?php echo $nameErr; ?>
 </span>

 <br><br>

 Student Age:
 <input type="number" name="age" value="<?php echo htmlspecialchars($age); ?>">
 <span style="color:red">
 * <?php echo $ageErr; ?>
 </span>

 <br><br>

 University Email:
 <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
 <span style="color:red">
 * <?php echo $emailErr; ?>
 </span>

 <br><br>

 Membership Type:
 Regular Member
 <input type="radio" name="membership" value="Regular Member" <?php if ($membership == "Regular Member") echo "checked"; ?>>

 Executive Member
 <input type="radio" name="membership" value="Executive Member" <?php if ($membership == "Executive Member") echo "checked"; ?>>

 Volunteer
 <input type="radio" name="membership" value="Volunteer" <?php if ($membership == "Volunteer") echo "checked"; ?>>
 <span style="color:red">
 * <?php echo $membershipErr; ?>
 </span>

 <br><br>

 Department:
 <select name="department">
 <option value="--Select Department--" <?php if ($department == "--Select Department--" || $department == "") echo "selected"; ?>>-- Select Department --</option>
 <option value="CSE" <?php if ($department == "CSE") echo "selected"; ?>>CSE</option>
 <option value="EEE" <?php if ($department == "EEE") echo "selected"; ?>>EEE</option>
 <option value="BBA" <?php if ($department == "BBA") echo "selected"; ?>>BBA</option>
 <option value="English" <?php if ($department == "English") echo "selected"; ?>>English</option>
 <option value="Architecture" <?php if ($department == "Architecture") echo "selected"; ?>>Architecture</option>
 </select>
 <span style="color:red">
 * <?php echo $departmentErr; ?>
 </span>

 <br><br>

 Contact Number:
 <input type="text" name="contact" value="<?php echo htmlspecialchars($contact); ?>">
 <span style="color:red">
 * <?php echo $contactErr; ?>
 </span>

 <br><br>

 <input type="submit" name="submit" value="Submit">

</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($nameErr) && empty($ageErr) && empty($emailErr) && empty($membershipErr) && empty($departmentErr) && empty($contactErr))
 {

 echo "<h3>Your Input:</h3>";
 echo "Name: " . htmlspecialchars($name) . "<br>";
 echo "Age: " . htmlspecialchars($age) . "<br>";
 echo "Email: " . htmlspecialchars($email) . "<br>";
 echo "Membership Type: " . htmlspecialchars($membership) . "<br>";
 echo "Department: " . htmlspecialchars($department) . "<br>";
 echo "Contact Number: " . htmlspecialchars($contact) . "<br>";
}
?>

</body>
</html>
