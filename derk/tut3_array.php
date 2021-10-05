 
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
          # Combine arrays
          $friends2 = array('Doug');
          $friends = $friends + $friends2;
          # Sort is ascending order
          sort($friends);
          # Sort in descending order
          rsort($friends);
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
              echo $customers[$row][$col] . ', ';
            }
            echo '<br>';
          }
          # Turn a string into an array
          $let_str = "A B C D";
          $let_arr = explode(' ', $let_str);
          foreach($let_arr as $l){
            printf("Letter : %s<br>", $l);
          }
          # Turn an array into a string
          $let_str_2 = implode(' ', $let_arr);
          echo "String : $let_str_2<br>";
          # Check if key exists
          printf("Key Exists : %d<br>", array_key_exists('Name', $me_info));
          # Get key for matching value
          printf("Key : %s<br>", array_search('Derek', $me_info));
          # Is value in array
          printf("In Array : %d<br>", in_array('Joy', $friends));
 
          # ---------- LOOPS ----------
	   
	?>
  </body>
</html>