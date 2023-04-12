<html>
<body>
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

        //insert values to database (email = 'testmail'...just for testing)
        $query = "SELECT* FROM temperature;";
        $result = mysqli_query($connect,$query);

        echo $result;
        ?>
</body>
</html>
