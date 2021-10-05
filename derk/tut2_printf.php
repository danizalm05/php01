 
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
          # Get number of characters in the string
          printf("Length : %d<br>", strlen($rand_str));
          # Trim left white space
          printf("Length : %d<br>", strlen(ltrim($rand_str)));
          # Trim right white space
          printf("Length : %d<br>", strlen(rtrim($rand_str)));
          # Trim all white space
          $rand_str = trim($rand_str);
          printf("Length : %d<br>", strlen($rand_str));
          # Display in all uppercase
          printf("Upper : %s<br>", strtoupper($rand_str));
          # Display in all lowercase
          printf("Lower : %s<br>", strtolower($rand_str));
          # 1st letter in uppercase
          printf("Upper : %s<br>", ucfirst($rand_str));
          # Get characters from 0 to 6
          printf("1st 6 : %s<br>", substr($rand_str, 0, 6));
          # Get location of a string
          printf("Index : %d<br>", strpos($rand_str, "String"));
          echo "rand_str : " . $rand_str . "<br>";
          # Replace a string with another
          $rand_str = str_replace("String", "Characters", $rand_str);
          printf("Replace : %s<br>", $rand_str);
          # Compare strings
          # 0 if equal
          # Positive if str1 > str2
          # Negative if str1 < str2
          # strcasecmp() isn't case sensitive
          printf("A == B : %d<br>", strcmp("A", "B"));
 
	
	
	?>
  </body>
</html>