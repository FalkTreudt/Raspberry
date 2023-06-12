<?php
        //define properties for example database
        $dbname = 'temperature';
        $dbuser = 'admin';
        $dbpass = 'falk';
        $dbhost = '192.168.178.47:3306';

        //connect to database
        $connect = @mysqli_connect($dbhost ,$dbuser,$dbpass, $dbname );
        
        //test if connection succeeded
        if($conenct){
            echo "Error: " . mysqli_connect_error();
            exit();
        }
        //give feedback that connection succeeded
        echo "Connection Sucess!<br><br>";

        //get values for name and id
        $time = $_GET["time"];
        $temp = $_GET["temp"];
        
        $temp = "'".$temp."'";
        $time = "'".$time."'";

        echo $time;
        echo $temp;

        //insert values to database (email = 'testmail'...just for testing)
        $query = "INSERT INTO bad (Zeit,Temperatur)VALUES($time,$temp);";
        $result = mysqli_query($connect,$query);

        echo "Insertion Sucess!<br>";
        ?>
