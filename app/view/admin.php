<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Ambitions</title>
        <link rel="shortcut icon" type="image/x-icon" href="../../favicon.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    </head>
    <body>
        <h1>Admin Area</h1>
        <form method="post">
            <input type="text" name="adminUser">
            <br>
            <input type="password" name="adminPass">
            <br><br>
            <input type="submit" name="adminSubmit">
            <br><br>
        </form>

        <?php
        if (isset($_POST['adminSubmit'])) {
            $user = $_POST['adminUser'];
            $pass = $_POST['adminPass'];
            if ($user == 'thales' && $pass == '3500118802') {
                require '../../config.php';
                $userCtr = new UserCtr();
                $allUsers = array_reverse($userCtr->findAll());

                echo '<table border="1" style="width:100%">';
                echo '<tr>
                <th>ID</th>
                <th>NAME</th> 
                <th>SURNAME</th>
                <th>PASSWORD</th>
                <th>EMAIL</th>
              </tr>';
                for ($i = 0; $i < count($allUsers); $i++) {
                    echo '<tr>
                    <td>' . $allUsers[$i]['id'] . '</td>
                    <td>' . $allUsers[$i]['name'] . '</td> 
                    <td>' . $allUsers[$i]['surname'] . '</td>
                    <td>' . $allUsers[$i]['password'] . '</td>
                    <td>' . $allUsers[$i]['email'] . '</td>
                  </tr>';
                }
                echo '</table>';
            }
            else {
                echo 'Invalid Credentials';
            }
        }
        ?>
    </body>
</html>
