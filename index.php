<?php
    include('DB_connection.php');

    $select_query = "SELECT * FROM students";
    $result = mysqli_query($connection, $select_query);
    $students = mysqli_fetch_all($result, MYSQLI_ASSOC);


    if(isset($_POST['action']) && $_POST['action'] == 'delete') {
        $id = isset($_POST['id']) ? $_POST['id'] : null;
            echo $id;
        if($id) {
            $delete_query = "DELETE FROM students WHERE id = " .$id;

            

            if(mysqli_query($connection, $delete_query)) {
                echo "Record Deleted";
            } else {
                echo "Error";
            }
        }
    }

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>


    <header>
        <span class="logo">LOGO</span>
        <div class="user">
            <div>
                <img src="assets/img/user.png" alt="">
            </div>
            <div>
                <span>
                    John Doe
                </span>
                <span>Administrator</span>
            </div>
            <div>
                <button>
                    <img class="arrow" src="assets/img/down-arrow.png" alt="">
                </button>
            </div>
        </div>
    </header>
    
    <aside>
        <ul>
            <li class="active">
                <a href="">Students</a>
            </li>
        </ul>
    </aside>

    <main>
        <div class="container-header">
            <h2>Students</h2>
            <a href="form.php" class="btn">Add New</a>
        </div>
        <div class="content">
            <table>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Age</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                <?php foreach($students as $value) { ?>
                <tr>
                    <td><?= $value['name'] ?></td>
                    <td><?= $value['lastname'] ?></td>
                    <td><?= $value['age'] ?></td>
                    <td><?php 
                    if ($value['status'] == 1) { ?>
                        <span class="status active">active</span>
                    <?php
                    }  else {?>
                        <span class="status inactive">inactive</span>
                    <?php
                    }
                    ?></td>
                    <td class="actions">
                        <a class="edit" href="update.php">Edit</a>
                        <form action="" method="post">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?= $value["id"] ?>">
                            <a class="delete" href="">Delete</a>
                        </form>
                    </td>
                </tr>
            <?php } ?>
              </table>
        </div>
    </main>

</body>
</html>