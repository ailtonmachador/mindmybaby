<?

require("connection.php");

function create_tables_for_bd(){
    require("connection.php");
    $conect = new mysqli($host,  $user,  $password, $db);

$table = 'login'; //table to be create
    //create table if it doesn't exists
$login_table = "CREATE TABLE IF NOT EXISTS  $table (       
    id int(30),   
    acess_level int (1),
    email VARCHAR(45),
    user_password VARCHAR(45) ,
    users_name VARCHAR(45),
    PRIMARY KEY (email) 
   )ENGINE = innodb;";    
   
   $parent_testimonial_table = "CREATE TABLE IF NOT EXISTS parent_testimonial(
   email VARCHAR(45) NULL,
   services VARCHAR(45) NULL,
   firstname VARCHAR(45) NULL,
   comment VARCHAR(45) NULL,
   displayed VARCHAR(45) NULL,
   days_date VARCHAR(45) NULL,
   INDEX email_idx (email ASC) VISIBLE,
   CONSTRAINT email
     FOREIGN KEY (email)
     REFERENCES child_care.login (email)
     ON DELETE NO ACTION
     ON UPDATE NO ACTION);";



$run  = @mysqli_query($conect, $login_table); // Run create login table.
$run2  = @mysqli_query($conect, $parent_testimonial_table); // Run create parent_testimonial table.


$errors = array(); // create an errors array to record errors if any.

//check if table was create
if($run){     
   
}else{

  $errors[] = "error to create login table!";
}

if($run2){     
   
}else{

  $errors[] = "error to create parent_testimonial table!";
}
  

}

function oi (){
     echo "oi";
}

create_tables_for_bd();



?>