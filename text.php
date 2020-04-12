<?php

$file_name = "/var/www/html/f_crud/file_crud/data/f1.txt";

$students = [
    [
        'name'=>"Hasin Hayder",
        'dept'=>"Civil",
        'home'=>"Bogura",
        'roll'=>"38520",
    ],[
        'name'=>"Tareq Hasan",
        'dept'=>"computer science",
        'home'=>"Rajshahi",
        'roll'=>"38521",
    ],[
        'name'=>"Kawsar Ahmed",
        'dept'=>"Textial Engineering",
        'home'=>"Khulna",
        'roll'=>"38522",
    ]
];

$serialize = serialize($students);
file_put_contents($file_name,$serialize);
//              Fwrite


// $fp = fopen($file_name,'w');

// foreach($students as $student){
//     fputcsv($fp,$student);
//     // $data = sprintf("%s,%s,%s,%s\n",$student['name'],$student['dept'],$student['home'],$student['roll']);
//     // fwrite($fp,$data);
// }
// fclose($fp);


// $fp = fopen($file_name,'r');
// while($data= fgets($fp)){
//     $student = explode(',',$data);
//     printf(" Name : %s \n Dept:%s\n Home:%s \n Roll : %s \n",$student[0],$student[1],$student[2],$student[3]);
// }
// while($student= fgetcsv($fp)){
//     // $student = explode(',',$data);
//     printf(" Name : %s \n Dept:%s\n Home:%s \n Roll : %s \n\n",$student[0],$student[1],$student[2],$student[3]);
// }

// $new_student = [
//     'name' =>"Parvez akter",
//     'dept' =>"Computer Science",
//     'home' =>"Cumilla",
//     'roll' =>"375026",
// ];

// $fp = fopen($file_name,'a');
// fputcsv($fp,$new_student);
// fclose($fp);