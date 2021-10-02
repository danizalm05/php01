 
 <?php  
 //https://www.youtube.com/watch?v=NihZYkNpslE
// Here are the different data types
$f_name = "Derek"; // String
$l_name = 'Banas'; // You can use single quotes
$age = 44; // Integer
$height = 1.87; // Float
$can_vote = true; // Boolean
// Array
$address = array('street' => '123 Main St', 
                  'city'  => 'Pittsburgh');
 
$state = NULL;
 
// You can define constants
define('PI', 3.1415);
 
?>
 
<!-- Tells the browser to render using HTML5 spec -->
<!DOCTYPE HTML>
<!-- Define we are using English -->
<html lang="en">
  <!-- Contains data for defining the doc -->
  <head>
    <!-- Defines the character set -->
    <meta charset="UTF-8">
    <title>PHP Tutorial</title>
  </head>
  <body>
    <!-- Display inline using PHP tags and echo. Combine strings with . -->
    <p>Name : <?php echo $f_name . ' ' . $l_name; ?></p>
 
    <!-- You can pass data to a PHP script using forms
    Get passes the values through the URL in an array
    Get should be used when you are reading data from the
    server. 
	Using Get allows the user to bookmark the page
    Use Post when you resend data to the server
    because if the user tries to send the same data to the
    server multiple times they will be warned
    -->
    <form action="tut1.php" method="get">
      <label>Your State : </label>
      <input type="text" name="state"/><br>
      <label>Number 1 : </label>
      <input type="text" name="num-1"/><br>
      <label>Number 2 : </label>
      <input type="text" name="num-2"/><br>
      <input type="submit" value="Submit"/>
    </form>
	
	 <?php
    # Check if anything was passed to the web page and if the state key exists
    # I'll show a better way to validate user input later, but I want to cover
    # these functions as well
      if(isset($_GET) && array_key_exists('state', $_GET)){
        # Assign the value passed
        $state = $_GET['state'];
        # Verify that the value isn't NULL and isn't empty
        if (isset($state) && !empty($state)){
          echo 'You live in ' . $state . '<br>';
          # Use double quotes to insert a variable in a string
          echo "$f_name lives in $state<br>";
        }
	   
	  
	?>
	
	
	
	
	
	</body>
</html>