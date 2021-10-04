 
 <?php  
 //http://www.newthinktank.com/2019/12/learn-php-one-video/
 
$f_name = "Derek"; // String
$l_name = 'Banas'; // You can use single quotes
$age = 44; // Integer
$height = 1.87; // Float
$can_vote = true; // Boolean
// Array
$address = array('street' => '155 Main St', 
                  'city'  => 'Pittsburgh');
 
$state = NULL;
 
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
	  }
	   if(count($_GET) >= 3){
          # Math operators
          $num_1 = $_GET['num-1'];
          $num_2 = $_GET['num-2'];
          echo "$num_1 + $num_2 = " . ($num_1 + $num_2) . "<br>";
          echo "$num_1 - $num_2 = " . ($num_1 - $num_2) . "<br>";
          echo "$num_1 * $num_2 = " . ($num_1 * $num_2) . "<br>";
          echo "$num_1 / $num_2 = " . ($num_1 / $num_2) . "<br>";
          echo "$num_1 % $num_2 = " . ($num_1 % $num_2) . "<br>";
           # Integer Division
          echo "$num_1 / $num_2 = " . (intdiv($num_1, $num_2)) . "<br>";
 
          # Shortcut ways of incrementing and decrementing
          echo "Increment $num_1 = " . ($num_1++) . "<br>";
          echo "Decrement $num_1 = " . ($num_1--) . "<br>";
           # The following use the format of turning i = i + 1 into
          # i += 1
          $num_1 += 1;
          $num_1 -= 1;
          $num_1 *= 1;
          $num_1 /= 1;
          $num_1 %= 1;
 
          # Built in math functions
          echo "abs(-5) = " . abs(-5) . "<br>";
          echo "ceil(4.45) = " . ceil(4.45) . "<br>";
          echo "floor(4.45) = " . floor(4.45) . "<br>";
          echo "round(4.45) = " . round(4.45) . "<br>";
          echo "max(4,5) = " . max(4,5) . "<br>";
          echo "min(4,5) = " . min(4,5) . "<br>";
          echo "pow(4,2) = " . pow(4,2) . "<br>"; # 4 raised to the power of 2
          echo "sqrt(16) = " . sqrt(16) . "<br>"; # Square Root
          echo "exp(1) = " . exp(1) . "<br>"; # Exponent of e
          echo "log(e) = " . log(exp(1)) . "<br>"; # Logarithm
          echo "log10(10) = " . log10(exp(10)) . "<br>"; # Base 10 Logarithm
          echo "PI = " . pi() . "<br>"; # PI
          echo "hypot(10,10) = " . hypot(10,10) . "<br>"; # Hypotenuse
          echo "deg2rad(90) = " . deg2rad(90) . "<br>"; # Degrees to radians
          echo "rad2deg(1.57) = " . rad2deg(1.57) . "<br>";
          echo "mt_rand(1,50) = " . mt_rand(1,50) . "<br>"; # Fast random num
          echo "rand(1,50) = " . rand(1,50) . "<br>"; # Original random num
          echo "Max Random = " . mt_getrandmax() . "<br>"; # Max random num
          echo "is_finite(10) = " . is_finite(10) . "<br>";
          echo "is_infinite(log(0)) = " . is_infinite(log(0)) . "<br>";
          echo "is_numeric(\"10\") = " . is_numeric("10") . "<br>";
          echo "is_numeric(\"g\") = " . is_numeric("g") . "<br>";
          # Trig functions
          # sin, cos, tan, asin, acos, atan, asinh, acosh, atanh, atan2
          echo "sin(0) = " . sin(0) . "<br>";
		  
		  
		   # Format with decimals and defined decimal places
          echo number_format(12345.6789, 2) . "<br>";
 
          # If, elseif and else are used to execute different blocks
          # of code depending on multiple conditions. We do this with
          # Conditional Operators : == != < > <= >= and with
          # Logical Operators : && || !
          # Calculate discounts based on amount purchased
          $num_oranges = 4;
          $num_bananas = 36;
          if(($num_oranges > 25) && ($num_bananas > 30)){
            echo "25% Discount<br>";
          } elseif(($num_oranges > 30) || ($num_bananas > 35)){
            echo "15% Discount<br>";
          } elseif(!(($num_oranges < 5)) || (!($num_bananas < 5))){
            echo "5% Discount<br>";
          } else {
            echo "No Discount<br>";
          }
 
          # Switch provides output for a limited number of options
          $request = "Coke";
          switch($request){
            case "Coke":
              echo "Here is your Coke<br>";
              break;
            case "Pepsi":
              echo "Here is your Pepsi<br>";
              break;
            default:
              echo "Here is your Water<br>";
              break;
          }
 
          # You can also use conditons with Switch if you match the
          # value checked as true with a condition that also is true
          $age = 12;
		    # You can also use conditons with Switch if you match the
          # value checked as true with a condition that also is true
          $age = 12;
          switch(true){
            case ($age < 5):
              echo "Stay Home<br>";
              break;
            case ($age == 5):
              echo "Go to Kindergarten<br>";
              break;
            # Range creates an array with values from 6 to 17
            # in_array returns true if the value of age is in the array
            case in_array($age, range(6, 17)):
              $grade = $age - 5;
              echo "Go to Grade $grade<br>";
              break;
            default:
              echo "Go to College<br>";
          }
		     # The Ternary operator assigns one or another value based
          # on a condition
          $can_vote = ($age >= 18) ? "Can Vote" : "Can't Vote";
          echo "Vote? : $can_vote<br>";
 
          # The identical operator returns true only if the value
          # and the data type are the same
          if ("10" === 10){
            echo "They are Equal<br>";
          } else {
            echo "They aren't Equal<br>";
          }
 
           

	}// if(count($_GET) >= 3)


?>
	</body>
</html>