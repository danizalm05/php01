 
 <?php  
 //http://www.newthinktank.com/2019/12/learn-php-one-video/
 //29:20
 
?>
 
<!-- Tells the browser to render using HTML5 spec -->
<!DOCTYPE HTML>
<!-- Define we are using English -->
<html lang="en">
  <!-- Contains data for defining the doc -->
  <head>
    <!-- Defines the character set -->
    <meta charset="UTF-8">
    <title>PHP Tutorial Arrays</title>
  </head>
  <body>
    <?php
	    # ---------- ARRAYS ----------
          # Arrays store multiple values
          $friends = array('Joy', 'Willow', 'Ivy');
          # Access by index
          echo 'Wife : ' . $friends[0] . '<br>';
          
		  # Add an item
          $friends[3] = 'Steve';
          
		  # Cycle through an array
          foreach($friends as $f){
            printf("Friend : %s<br>", $f);
          }
		  
          # Create key value pairs
          $me_info = array('Name'=>'Derek', 'Street'=>'123 Main');
          # Output keys and values
          foreach($me_info as $k => $v){
            printf("%s : %s<br>", $k, $v);
          }
		  
		  
          # Sort is ascending order
          sort($friends);
		  foreach($friends as $f){
            printf("friends Sort: %s<br>", $f);
          }
          # Sort in descending order
          rsort($friends);
		  foreach($friends as $f){
            printf("friends rsort: %s<br>", $f);
          }
		  
          # Sort a key value (associative array) by value
          asort($me_info);
          # Sort associative array by key
          ksort($me_info);
          # Use arsort and krsort for descending
         
		 # Multidimensional arrays
          $customers = array(array('Derek', '123 Main'),
                            array('Sally', '122 Main'));
			for($row = 0; $row < 2; $row++){
              for($col = 0; $col < 2; $col++){
                  echo '['. $row. '] ' .  '['.$col .'] = '.$customers[$row][$col] . ', ';
                }
              echo '<br>';
            }
		  
		 
          # Turn a string into an array
          $let_str = "A B C D";
          $let_arr = explode(' ', $let_str);
          foreach($let_arr as $l){
            printf("Letter explode : %s<br>", $l);
          }
          # Turn an array into a string
          $let_str_2 = implode(' ', $let_arr);
          echo "String implode: $let_str_2<br>";
          # Check if key exists
          printf("Key Exists : %d<br>", array_key_exists('Name', $me_info));
          # Get key for matching value
          printf("Key : %s<br>", array_search('Derek', $me_info));
          # Is value in array
          printf("In Array : %d<br>", in_array('Joy', $friends));
 
          
		   # ---------- LOOPS ----------
          # While loops execute as long as a condition is true
          $i = 0;
          while($i < 10){
            echo ++$i . ', ';
          }
          echo '<br>';
         
          # For loops compacts what is spread out with while
          for($i = 0; $i < 10; $i++){
            # continue jumps to top of loop to only print odds
            if(($i % 2) == 0){
              continue;
            }
            # Break jumps to the code that follows the loop
            if($i == 7) break;
            echo $i . ', ';
          }
          echo '<br>';
          
          # foreach can be used to easily cycle through arrays
          # as shown above
 
          # do while will execute at least once
          $i = 0;
          do {
            echo "Do While : $i<br>";
          } while ($i > 0);
  
 
	   
	?>
  </body>
</html>