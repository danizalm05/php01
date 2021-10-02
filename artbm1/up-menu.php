<?php 
 

?>
<script>
     //PHP Front To Back [Part 18] - PHP & AJAX

	function showSuggestion(str){
			if(str.length == 0){
				document.getElementById('output').innerHTML = '';
			} else {
				// AJAX REQ
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function(){
					if(this.readyState == 4 && this.status == 200){
						document.getElementById('output').innerHTML = this.responseText;
						//echo 'this.responseText =' .this.responseText;
					}
				}
				xmlhttp.open("GET", "suggest.php?q="+str, true);
				xmlhttp.send();
			}
		}
	</script>

	
	
	
<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php" style="color: rgb(0,255,125)">ArtBokMak</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
        <li class="active">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
 		       aria-haspopup="true" aria-expanded="false">
		      View   <span class="caret"></span>
		     
		  </a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="movmentsMenu.php">	
			    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Art Movments    
			    </a>
			</li>
            <li><a href="index.php?id=1">	
			      <span class="glyphicon glyphicon-random" aria-hidden="true"></span> Random Artist   
			    </a></li>
            <li role="separator" class="divider"></li>
             
				
			
				
				
          </ul>
      </li>
    </ul>
	
	  <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
 		       aria-haspopup="true" aria-expanded="false">
		       Add   <span class="caret"></span>
		   </a>
          <ul class="dropdown-menu">
             
             

            <li><a href=" addMovment.php">	
			      <span class="glyphicon glyphicon-education " aria-hidden="true"></span>Add Movement   
			    </a>
			</li> 


		 <li role="separator" class="divider"></li>
            <li><a href="https://vazamb.000webhostapp.com/prj/randoms/showBookmark.php">
			         <span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span> Bookmark
				</a></li>
			<li><a href="loadVnudata.php">
			 <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 
			  Load Vnu 
			  </a>
			 </li>	
			<li><a href="#">
			 <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 
			 Load   
			  </a>
			 </li>	
          </ul>
      </li>
    </ul>
	
   
<?php if ( isset($_SESSION['username'])){
		      
?>		      
<form action="classes/register.php" method="get" class="navbar-form navbar-right"  >
         
         <button type="submit" class="btn btn-default" value="submit">
		                Register
		 </button>
      </form>

<?php  }    ?>
     
	 
      <ul class="nav navbar-nav navbar-right">
         


       <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Random <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="users.php">Users</a></li>
            <li><a href="lambada.php">lambda</a></li>
            <li><a href="cart.php">Carta</a></li>
            <li role="separator" class="divider"></li>
             
            <li><a href="http://sid.com" target="_blank">Spider</a></li>
       
          </ul>
        </li>
      </ul>
	  <div class="container">
         <form  class="navbar-form navbar-left"> 
	        Search <input type="text" class="form-control" onkeyup="showSuggestion(this.value)">
       </form>
          <p>:<span id="output" style="font-weight:bold"></span></p>
     </div>
	  
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>