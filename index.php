<?php

    require_once('function.php');
    $info ='';
    $task = $_GET['task'] ?? 'report';
    if ( 'seed' == $task ) {
        seed();
            $info = "Seeding is complete";
    }
    if(isset($_POST['submit'])){
        $name= filter_input(INPUT_POST,'name',FILTER_SANITIZE_STRING);
        $dept= filter_input(INPUT_POST,'dept',FILTER_SANITIZE_STRING);
        $home= filter_input(INPUT_POST,'home',FILTER_SANITIZE_STRING);
        $roll= filter_input(INPUT_POST,'roll',FILTER_SANITIZE_STRING); 
        if($name !='' && $dept !='' && $home !='' && $roll != ''){
            $db_name = "/var/www/html/f_crud/file_crud/data/f1.txt";
    
            $serializeData = file_get_contents($db_name);
            $students = unserialize($serializeData);
            // array_push($students,$student);
        //     addStudent($name,$dept,$home,$roll);
            $newId = count($students)+1;
            // echo $newId;
            $student = array(
                'id'=>$newId,
                'name'=>$name,
                'dept'=>$dept,
                'home'=>$home,
                'roll'=>$roll
            );
            array_push($students,$student);
            $serialize_data = serialize($students);
            // file_put_contents($db_name,$serialize_data,LOCK_EX);
            // print_r($students);
            file_put_contents($db_name,$serialize_data);
            // echo $serialize_data;
        }
        
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Crud System Make-File</title>
  </head>
  <body>
    
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-10 offset-md-1 mt-3">
                <div class="card">
                        <?php include_once('nav.php')?>
                    <div class="card-body">
                        <?php
                            if($info!=''):
                        ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                               <?=$info?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php
                            endif;
                            if('report'== $task):
                                genarateReport();
                            endif;
                
                            if('add_student'== $task):
                        ?>
                            <form action="index.php?task=report" method="post">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="dept">Department</label>
                                    <input type="text" class="form-control" id="dept" name="dept" placeholder="Enter Department">
                                </div>
                                <div class="form-group">
                                    <label for="home">Home Dist</label>
                                    <input type="text" class="form-control" id="home" name="home" placeholder="Enter Home Dist">
                                </div>
                                <div class="form-group">
                                    <label for="roll">Home Dist</label>
                                    <input type="number" class="form-control" id="roll" name="roll" placeholder="Enter Roll">
                                </div>
                                <button type="submit" name='submit'  class="btn btn-primary">Submit</button>
                            </form>
                        <?php
                            endif;
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>