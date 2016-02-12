
<?php
date_default_timezone_set('UTC');

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Welcome to zaase </title>

<style>



</style>

</head>
<body>

<section class='container'>
          <hgroup>
            <h1>Zaase is an google App which allows you to keep on track on your expenses </h1>
          </hgroup>


        <div class="row">
          <section class='col-xs-12 col-sm-6 col-md-6'>
           
              
              
              	   <h2>Enter the category and the amount expended</h2>
              	   <form action="zaase.php" method="post">
              	   Category <input type="text" name="category">
				   Amount <input type="test" name="AMOUNT">
				   <input type="submit" value="Enter" name="Enter">
				   </form>
				
                   </section>
              
              
                   <?php 
			    
				 
			     try  {$bdd = new PDO('mysql:host=localhost;dbname=zaasedb;charset=utf8', 'root', '');}     // connection 
                  catch(Exception $e){die('Erreur : '.$e->getMessage());}                                  // error dectection 
    
					 
				
    
                  
        
    

                    if(isset($_POST['Enter']))                                                  // if press enter 
	           {
		          /* echo '
<script type="text/javascript">
location.reload();
</script>'; 
*/
                                 $stmt = $bdd->prepare('SELECT category, amount FROM zaasetb WHERE category = :cat');
		                                       $stmt->execute(array(':cat' => $_POST['category']));
		                                          $row = $stmt->fetch(PDO::FETCH_ASSOC);

		                                              if(empty($row['category']))   // if row is empty then category does not exist 
		                                               {
														   //echo $_POST['category'];
														   //echo $_POST['AMOUNT'];
														   
			                                             $req = $bdd->prepare('INSERT INTO zaasetb(category, amount) VALUES(:category, :amount)');  // insert since category does not exist 
                                                            $req->execute(array(
	                                                            'category' => $_POST['category'],
	                                                                     'amount' => $_POST['AMOUNT'],));
																		      
																			     
				                                                                         					  
																		 
		                                                }
		
		
		                                                  else   // category exist so update 
		                                                          {
			                                                           //echo $row['amount']; echo $row['category'];
                                                                         $row['amount']+=$_POST['AMOUNT']; 
																		 $_POST['AMOUNT']=0;
	                                                                                   $req = $bdd->prepare('UPDATE zaasetb SET category= :categ, amount = :amt WHERE category = :categor');
                                                                                       $req->execute(array(
	                                                                                   'categ' => $row['category'],
	                                                                                    'amt' => $row['amount'],
	                                                                                   'categor' => $row['category']));
																					   //echo $row['category'];
																					    $row['amount']=0;
																					   $req->closeCursor();	
																					   
                                                                                    }
																	$stmt->closeCursor();
												$reponse = $bdd->query('SELECT * FROM zaasetb');
												
                                                       
// On affiche chaque entrée une à une
                                                 while ($donnees = $reponse->fetch())
												 {
											        ?> <p>&nbsp</p><?php     
													 echo $donnees['category'];?>
													 <?php   // adds 5 spaces
													 echo $donnees['amount'];
													 ?>
													 
													<?php  
												
													  echo date('D jS \of F Y h:i:s A');
													  
												 }
												 
													$reponse->closeCursor();	
													

		                     }
							//unset($_POST);
                            unset($_REQUEST);
                         //header('Location: config.php');
							
		

	                                    
                    
               ?>
              
			  
			  
          </section>
        </div>


</body>



</html>



