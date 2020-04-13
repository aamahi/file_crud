<?php

define('DB_NAME','/var/www/html/f_crud/file_crud/data/f1.txt');
$db_name = "/var/www/html/f_crud/file_crud/data/f1.txt";

function seed(){
$db_name = "/var/www/html/f_crud/file_crud/data/f1.txt";

    $data = [
        [
            'id'=>1,
            'name'=>"Hasin Hayder",
            'dept'=>"Civil",
            'home'=>"Bogura",
            'roll'=>"38520",
        ],[
            'id'=>2,
            'name'=>"Tareq Hasan",
            'dept'=>"computer science",
            'home'=>"Rajshahi",
            'roll'=>"38521",
        ],[
            'id'=>3,
            'name'=>"Kawsar Ahmed",
            'dept'=>"Textial Engineering",
            'home'=>"Khulna",
            'roll'=>"38522",
        ]
    ];

    $serialize_data = serialize($data);
    file_put_contents($db_name,$serialize_data);
    // $fp = fopen($db_name,'w');

    //     foreach($data as $student){
    //         fputcsv($fp,$student);
    //     }
    // fclose($fp);

}
seed();
function genarateReport(){
    $db_name = "/var/www/html/f_crud/file_crud/data/f1.txt";
        
        $serializeData = file_get_contents($db_name);
        $students = unserialize($serializeData);
        ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Dept</th>
                <th scope="col">Home</th>
                <th scope="col">Roll</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($students as $student):
            ?>
                <tr>
                    <th><?php printf("%s",$student['id'])?></th>
                    <th><?php printf("%s",$student['name'])?></th>
                    <th><?php printf("%s",$student['dept'])?></th>
                    <th><?php printf("%s",$student['home'])?></th>
                    <th><?php printf("%s",$student['roll'])?></th>
                    <th>
                        <?php printf(" <a href='index.php?task=edit&id=%s' class='btn btn-info'>Edit</a>", $student['id'])?>
                        <?php printf(" <a href='index.php?task=delete&id=%s' class='btn btn-danger'>Delete</a>", $student['id'])?>
                    </th>
                  
                </tr>
            <?php
                endforeach;
            ?>
            </tbody>
        </table>
    
        <?php
    
    }
    function addStudent($name,$dept,$home,$roll){
        $db_name = "/var/www/html/f_crud/file_crud/data/f1.txt";
        
        $serializeData = file_get_contents($db_name);
        $students = unserialize($serializeData);
        $newId = count($student)+1;
        $student = array(
            'id'=>$newId,
            'name'=>$name,
            'dept'=>$dept,
            'home'=>$home,
            'roll'=>$roll
        );
        array_push($students,$student);
    
        $serialize_data = serialize($students);
        file_put_contents($db_name,$serialize_data,LOCK_EX);
    
    
    }
    

?>