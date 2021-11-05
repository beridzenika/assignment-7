<?php

include('DB_connection.php');

if(isset($_POST['action']) && $_POST['action'] == 'insert') {
    $name = isset($_POST['name']) ? $_POST['name'] : '' ;
    $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '' ;
    $age = isset($_POST['age']) ? $_POST['age'] : '' ;
    $status = isset($_POST['status']) ? $_POST['status'] : '' ;

    if($name && $lastname && $age && $status) {
        $insert_query = "INSERT INTO students (name, lastname, age, status) VALUES ('$name', '$lastname', '$age', 'status')";
        
        if(mysqli_query($connection, $insert_query)) {
            echo "Record Created";
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
            <a href="" class="btn">Add New</a>
        </div>
        <div class="content">
            <form action="" method="post">
                <input type="hidden" name="action" value="insert">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name">
                </div>
                <div class="form-group">
                    <label for="">Lastname</label>
                    <input type="text" name="lastname">
                </div>
                <div class="form-group">
                    <label for="">Age</label>
                    <input type="text" name="age">
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    <select name="status">
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn submit">Add</button>
                </div>
            </form>
        </div>
    </main>

</body>
</html>