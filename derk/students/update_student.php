  
 <?php  
 //http://www.newthinktank.com/2019/12/learn-php-one-video/
 //1:40:10
# Get data to input

$err_flg =0;
include('./classes/error.php');
 

echo "<br><pre>".print_r($_POST, true) . "</pre>"; 


 
$first_name = filter_input(INPUT_POST, "first_name");  
$last_name  = filter_input(INPUT_POST, "last_name");
$email      = filter_input(INPUT_POST, "email");
$street     = filter_input(INPUT_POST, "street");
$city       = filter_input(INPUT_POST, "city");
$state      = filter_input(INPUT_POST, "state");
$zip        = filter_input(INPUT_POST, "zip");
$phone      = filter_input(INPUT_POST, "phone");
$birth_date = filter_input(INPUT_POST, "birthdate");
$sex        = filter_input(INPUT_POST, "sex");
$lunch_cost = filter_input(INPUT_POST, "lunch", FILTER_VALIDATE_FLOAT);
 

 
# Verify that eveything has been entered
$err_title = "Input error";#In case there will  error 
 
  
if($first_name == null || $last_name == null || $email == null ||
     $street == null || $city == null || $state == null ||
     $zip == null || $phone == null || $birth_date == null ||
     $sex == null || $lunch_cost == false)
  {
    
   	 CreateErrMsg( "Input error","Some values  are missing!!");
  }
    
   
    elseif(!preg_match("/[a-zA-Z]{3,30}$/", $first_name)){
	         CreateErrMsg( "Input error","First Name Not Valid ");
    } 
    elseif(!preg_match("/[a-zA-Z]{3,30}$/", $last_name)){
	         CreateErrMsg( "Input error","Last Name Not Valid ");
     } 
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            CreateErrMsg( "Input error","Email Not Valid");
    }  
    elseif(!preg_match("/^[A-Za-z0-9 ,#'\/.]{3,50}$/", $street)){
            CreateErrMsg( "Input error","Street Not Valid");
    }
	elseif(!preg_match("/[a-zA-Z\- ]{2,58}$/", $city)){
           CreateErrMsg( "Input error","City Not Valid");
     }
	elseif(!preg_match("/^(?:A[KLRZ]|C[AOT]|D[CE]|FL|GA|HI|I[ADLN]|K[SY]|LA|M[ADEINOST]|N[CDEHJMVY]|O[HKR]|PA|RI|S[CD]|T[NX]|UT|V[AT]|W[AIVY])*$/", $state))
	   {
            CreateErrMsg( "Input error","State Not Valid");
     } 
    elseif(!preg_match("/[0-9]{5}$/", $zip)){
            CreateErrMsg( "Input error","Zip Not Valid");
    } 
    elseif(!preg_match("/[0-9]{6,12}$/", $birth_date)){
         CreateErrMsg( "Input error","Birth Date Not Valid");
    } 
	elseif(!preg_match("/[MF]{1}$/", $sex)){
         CreateErrMsg( "Input error","Sex Not Valid");
    } 
	
	


if($err_flg ==0){
  # Create a timestamp for now
   $date_entered = date('Y-m-d H:i:s');
   echo 'date_entered = '	.$date_entered;	
	
  require_once('classes/DB.php');
  # Create your query using : to add parameters to the statement
  $q = 'INSERT INTO students (
        first_name,  last_name,  email,  
		street,      city,       state, zip, 
		phone,       birth_date, sex,   date_entered,
        lunch_cost) 
	VALUES';#, student_id
  
  # \'\'  == '' :student_id holder automatic increase
  $holders = '(:first_name, :last_name, :email, 
               :street, :city,       :state,     :zip, 
			   :phone,  :birth_date, :sex,      :date_entered, 
			   :lunch_cost )'; #  , :student_id   ,\'\'
  $sql = $q. $holders;
  echo '<br>'. $sql;
  $parm = array(':first_name'  => $first_name, 
		        ':last_name'   => $last_name, 
	            ':email'       => $email,
				':street'      => $street, 
				':city'        => $city, 
				':state'       => $state, 
				':zip'         => $zip, 
				':phone'       => $phone ,
	            ':birth_date'  => $birth_date, 
				':sex'         => $sex, 
				':date_entered'=> $date_entered , 
				':lunch_cost'  => $lunch_cost 
				
		     );
    
   DB::query($sql, $parm);
}
 
require_once('./classes/error.php');
$parm = array('');
$sql =   'SELECT *
	     FROM students 
		 ORDER BY student_id';
$students = DB::query($sql,$parm); 
$numOfStudents = count($students);
echo "numOfStudents = ". $numOfStudents;		 
 
?>
 <!DOCTYPE HTML>
 <html lang="en">
   <head>
     <meta charset="UTF-8">
     <title>PHP Tutorial</title>
     <link rel="stylesheet" type="text/css" href="main.css" />
   </head>
   <body>
     <h3>Student List</h3>
     <table>
       <tr>
         <th>ID</th>
         <th>Name</th>
         <th>Email</th>
         <th>Street</th>
         <th>City</th>
         <th>State</th>
         <th>Zip</th>
         <th>Phone</th>
         <th>BD</th>
         <th>Sex</th>
         <th>Entered</th>
         <th>Lunch</th>
       </tr>
       <!-- Get an array from the DB query and cycle
       through each row of data -->
       <?php foreach($students as $student) : ?>
         <tr>
           <!-- Print out individual column data -->
           <td><?php echo $student['student_id']; ?></td>
           <td><?php echo $student['first_name'] . ' ' . $student['last_name']; ?></td>
           <td><?php echo $student['email']; ?></td>
           <td><?php echo $student['street']; ?></td>
           <td><?php echo $student['city']; ?></td>
           <td><?php echo $student['state']; ?></td>
           <td><?php echo $student['zip']; ?></td>
           <td><?php echo $student['phone']; ?></td>
           <td><?php echo $student['birth_date']; ?></td>
           <td><?php echo $student['sex']; ?></td>
           <td><?php echo $student['date_entered']; ?></td>
           <td><?php echo $student['lunch_cost']; ?></td>
         </tr>
       <!-- Mark the end of the foreach loop -->
       <?php endforeach; ?>
     </table>
     <h3>Update Student</h3>
	   <form action="update_student.php" method="post"
       id="update_student_form">
       <label>Student ID : </label>
       <input type="text" name="student_id"><br>
       <label>First Name : </label>
       <input type="text" name="first_name"><br>
       <label>Last Name : </label>
       <input type="text" name="last_name"><br>
       <label>Email : </label>
       <input type="text" name="email"><br>
       <label>Street : </label>
       <input type="text" name="street"><br>
       <label>City : </label>
       <input type="text" name="city"><br>
       <label>State : </label>
       <input type="text" name="state"><br>
       <label>Zip Code : </label>
       <input type="text" name="zip"><br>
       <label>Phone : </label>
       <input type="text" name="phone"><br>
       <label>Birth Date : </label>
       <input type="text" name="birthdate"><br>
       <label>Sex : </label>
       <input type="text" name="sex"><br>
       <label>Lunch Cost : </label>
       <input type="text" name="lunch"><br>
       <input type="submit" value="Update Student"><br>
     </form>
   </body>
 </html>
 
  