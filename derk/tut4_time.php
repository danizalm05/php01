 
 <?php  
 //http://www.newthinktank.com/2019/12/learn-php-one-video/
 //48:35
 
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
	  # ---------- DATES ----------
          # Set the time zone php.net/manual/en/timezones.php
          date_default_timezone_set('America/New_York');
 
          # Format date info for now
          # php.net/manual/en/function.date.php
          echo "Date : " . date('l F m-d-Y g:i:s A') . "<br>";
 
          # Create a date hour, minute, second, month, day, year
          $import_date = mktime(0, 0, 0, 12, 21, 1974);
          echo "Important Date : " . date('l F m-d-Y g:i:s A', $import_date) . "<br>";
 
          # ---------- INCLUDING OTHER FILES ----------
          # You can insert code from another script with include
          include 'sayhello.php';
 
		  
	?>
  </body>
</html>