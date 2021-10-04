 
 <?php  
 //http://www.newthinktank.com/2019/12/learn-php-one-video/
 //24:00 
 
?>
 
<!-- Tells the browser to render using HTML5 spec -->
<!DOCTYPE HTML>
<!-- Define we are using English -->
<html lang="en">
  <!-- Contains data for defining the doc -->
  <head>
    <!-- Defines the character set -->
    <meta charset="UTF-8">
    <title>PHP Tutorial Printf</title>
  </head>
  <body>
    <?php
	  # ---------- PRINTF ----------
          # printf provides another way to format output
          # The variable value is placed where the type specifier
          # is located in the string
          # %c : Character
          # %d : Integer
          # %f : Float with decimal length requested
          # %s : String
          printf("%c %d %.2f %s<br>", 65, 65, 1.234, "string");
 
          # ---------- STRINGS ----------
          # Strings store a series of characters
          $rand_str = "     Random String      ";
	
	
	?>
  </body>
</html>