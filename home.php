<?php
    session_start();
    echo 'welcome ';
    echo $_SESSION['username'];

    echo '<br>';
    echo '<br>';
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    </head>
    <body>
        <table id="datas">
            <thead>
                <th>User name</th>
                <th>Email</th>
                <th>Password</th>
            </thead>
            <tbody>
                <?php
                    $connection = mysqli_connect("localhost","root","","collection") or die($connection);

                    $query = mysqli_query($connection , "SELECT * FROM users ORDER BY username");
                    while($result = mysqli_fetch_array($query)){
                        echo "<tr>
                            <td>".$result['username']."</td>
                            <td>".$result['email']."</td>
                            <td>".$result['password']."</td>
                        </tr>";
                    }

                ?>         
            </tbody>
        </table>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script >
            $(document).ready(function(){
                $('#datas').DataTable();
            });
        </script>
    </body>
</html>