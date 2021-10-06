 
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
          # Apply a function to values in a list
          function double($x){
            return $x * $x;
          }
          $list = [1,2,3,4];
          $dbl_list = array_map('double', $list);
          # Print human readable version of list
		  
           
		  echo "<br><pre> x * x <br> ".print_r($dbl_list, true) . "</pre>";
          echo '<br>';
 
          # ---------- REDUCE ----------
          # Reduce values in an array to a single value
          # Multiply each value times the others
          function mult($x, $y){
            $x *= $y;
            return $x;
          }
          $dflt =1;#default  first  value
		  $prod = array_reduce($list, 'mult', $dflt);
		 # echo "<br><pre> mult <br> ".print_r($prod, true) . "</pre>";
        
          print_r($prod);
          echo '<br>';
 
          # ---------- FILTER ----------
          # Filter an array with a function
          # Get only even values
          function isEven($x){
            return ($x % 2) == 0;
          }
          $even_list = array_filter($list, 'isEven');
        #print_r($even_list);
        echo "<br><pre> filter <br> ".print_r($even_list, true) . "</pre>";
        
		 echo '<br>';
 
		  
		  
		  
		  
		  
	?>
  </body>
</html>