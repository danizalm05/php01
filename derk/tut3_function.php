 
 <?php  
 //http://www.newthinktank.com/2019/12/learn-php-one-video/
 //40
 
?>
 
<!-- Tells the browser to render using HTML5 spec -->
<!DOCTYPE HTML>
<!-- Define we are using English -->
<html lang="en">
  <!-- Contains data for defining the doc -->
  <head>
    <!-- Defines the character set -->
    <meta charset="UTF-8">
    <title>PHP Tutorial functions</title>
  </head>
  <body>
    <?php 
	
	 # ---------- FUNCTIONS ----------
          # Functions allow you to reuse code
          # They must begin with a letter, but can contain
          # numbers and underscores
          # You can pass values to a function and set default values
          # You can define parameter types like this
          # function addNumbers(int $num_1=0, int $num_2=0)
          function addNumbers($num_1=0, $num_2=0){
            # return returns data from where the function
            # was called
            return $num_1 + $num_2;
          }
 
          printf("5 + 4 = %d<br>", addNumbers(5,4));
 
          # Functions are pass by value by default so you can't
          # effect values out of the function
          function changeMe($change){
            $change = 10;
          }
 
          $change = 5;
          changeMe($change);
          echo "Change : $change<br>";
 
          # You can pass by reference though
          function changeMe2(&$change){
            $change = 10;
          }
		   $change = 5;
          changeMe2($change);
          echo "Change : $change<br>";
 
          # Receive a variable number of parameters
          function getSum(...$nums){
            $sum = 0;
            foreach($nums as $num){
              $sum += $num;
            }
            return $sum;
          }
          printf("Sum = %d<br>", getSum(1,2,3,4));
 
          # Return multiple values
          function doMath($x, $y){
            return array(
              $x + $y,
              $x - $y
            );
          }
          list($sum, $difference) = doMath(5,4);
          echo "Sum = $sum<br>";
          echo "Difference = $difference<br>";
 
          # ---------- MAP ----------
	?>
  </body>
</html>