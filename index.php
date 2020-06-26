<?php
require_once('conn.php');
$query = "SELECT * FROM password";
$result = mysqli_query($con, $query);
?>

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
                <h4>Genrate Password</h4>
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
                </form>
                <form method="post" role= "form">
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
        <div class="container">
            <div class="row row-content">
                <div class="col-12 col-sm-9">
                    <h2 style="color: black;">List of All The Password</h2>
                    <div class="table-responsive">
                        <table class="table table-striped table-dark" style="color: black;">
                            <thead class="thead-dark">
                                <tr>
                                    <th><h4>User</h4></th>
                                    <th><h4>Password</h4></th>
                                    <th><h4>Description</h4></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        ?>
                                        <tr>
                                            <td name="user"><h4><?php echo $row['User']?></h4></td>
                                            <td name="pass"><h4><?php echo $row['Pass_Gen']?></h4></td>
                                            <td name="descript"><h4><?php echo $row['Descript']?></h4></td>
                                        </tr>
                                        <?php
                                        
                                    }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>    
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
    
    $query = "INSERT INTO password (User, Pass_Gen, Descript) VALUES('".$user."', '".$password."', '".$des."')";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<script>alert('New record created successfully');</script>";
  } else {
        echo "<script>alert('Error: " . $query . "<br>" . mysqli_error($con)."');</script>";
  }
  mysqli_close($con);
  
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
