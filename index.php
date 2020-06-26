<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Abby's Picsoid</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="shortcut icon" href="images/favicon.ico">

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <style>
        section{
            width: 100vw;
            height: 100vh;
            padding:50px;
        }
        .cl_white{
            color: white;
        }
        .text_font{
            opacity: 1;
            font-family:Comic Sans MS, cursive, sans-serif;
        }
        .row-header{
            position: auto;
            background-color: white;
            color: tomato;
        }
    </style>
</head>
<body class ="text_font fade" data-spy="scroll" data-target=".abhi">
    <nav class="navbar abhi navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="nav navbar-header">
                <a href="#" class="navbar-brand">aBBy's Picsoid</a>
            </div>
        <div id="myNavbar">
        <ul class="nav navbar-nav">
            <li><a href="#generate">Generate</a></li>
            <li><a href="#display">Display</a></li>
        </ul>
        </div>
        </div>
    </nav>

    <section class="cl_white text-center" id="generate" style="background-color: aquamarine ; background-size: 100% 100%;" >
    <div class="container">
        <div class="row row-header">
        
            <div class="col-12">
                <h3>Genrate Password</h3>
            </div>
            <div class="col-12">
                <form role="form" method="post">
                    <div class="form-group row">
                        <div class="offset-6 col-6">
                            <form method="post" role="form">
                                <button type="btt" name="btt" class="btn btn-success">
                                    GENERATE
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="passgen" class="col-md-2 col-form-label">Generated Password</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="passgen" name="passgen" value="<?php 
                            if(isset($_POST['btt']))
                            {
                                function generateNumericOTP($n) { 
	
                                    $generator = "1357902468abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@#$%&*"; 
                                    $result = ""; 
                                
                                    for ($i = 1; $i <= $n; $i++) { 
                                        $result .= substr($generator, (rand()%(strlen($generator))), 1); 
                                    } 
                                    return $result; 
                                } 
                                $n = 8;
                                print_r(generateNumericOTP($n)); 
                            } 
                            ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user" class="col-md-2 col-form-label">User</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="user" name="user" placeholder="Enter Your Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-md-2 col-form-label">Description</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="description" name="description" placeholder="Description">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-6 col-6">
                            <button type="submit" name="submit" class="btn btn-primary">
                                    Submit
                            </button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div id="res" class="offset-6 col-6">
                            
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    </section>
    <section class="cl_white text-center" id="display" style="background-color: cadetblue ; background-size: 100% 100%;" >

    </section>

</body>

</html>
<?php
require_once('conn.php');
	
if(isset($_POST['submit']))
{
    $password = $_POST['passgen'];
    $user = $_POST['user'];
    $des = $_POST['description'];
    
    
    
    $sql = "INSERT INTO password (User, Pass_Gen, Descript) VALUES('".$user."', '".$password."', '".$des."')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close();
}

    
    


?>



<!--?php 


function generateNumericOTP($n) { 
	
	$generator = "1357902468abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@#$%&*"; 
	$result = ""; 

	for ($i = 1; $i <= $n; $i++) { 
		$result .= substr($generator, (rand()%(strlen($generator))), 1); 
	} 
	return $result; 
} 
function main(){
$n = 8; 
print_r(generateNumericOTP($n)); 
}
?--> 
