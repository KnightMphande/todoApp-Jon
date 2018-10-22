<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To do </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="default.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body id="index">


    <?php require('functions.php'); ?>

    <?php 
        if(isset($_POST['submit'])) {
            addItem($_POST['todoItem'], $_POST["date"]);
        }
        if(isset($_POST['update'])) {
            addItem($_POST['todoItem'], $_POST["date"]);
        }
        if(isset($_POST['delete'])) {
            deleteItem($_POST['delete']);
        }
        if(isset($_POST['completed'])) {
            toggleComplete($_POST['completed']);
        }
        if(isset($_POST["edit"])) {
            deleteItem($_POST["edit"]);
        }
    ?>
    
    <div class="containeer">
    <h1>TO-DO LIST<i class=""></i></h1>
    <form action="" method="post">

        <?php if($_SESSION['todoItem']) { ?>
            <ul>
                <?php foreach($_SESSION['todoItem'] as $key => $item) { $date = $_SESSION["date"] ?>
             <li class="<?php echo $item['completed']; ?>">
                    <button type="submit" class="btn btn-danger" value="<?php echo $key; ?>" name="delete"><i class="fa fa-trash"></i></button>
                        <?php echo $item['item']; ?>
                        <span class="dates"><?php echo $date[$key] ?> </span>
                        <button type ="submit" class="btn btn-secondary float-right" value="<?php echo $key; ?>" name="edit">edit</button>
                        <button type="submit" class="btn btn-success float-right" value="<?php echo $key; ?>" name="completed"><?php  if($item['completed'] == ''){ echo '<i class="fa fa-check"></i>';} else { echo 'Undo';} ?></button>
                    </li> 
                <?php } ?>
               
            </ul>
        <?php } ?>
            <?php if(isset($_POST["edit"])){ ?>
                <input type="text" name="todoItem" placeholder="Update To-Do...">
                <input type="date" name="date" class="date">
                <input type="submit" class="wat" name="update" value="UPDATE">
            <?php }  else {?>
                <input type="text" name="todoItem" placeholder="Update To-Do...">
                <input type="date" name="date" class="date">
                <input type="submit" class="wat" name="submit" value="SUBMIT">
             <?php } ?>
    </form>
    
    </div>
    

    
</body>
</html>
