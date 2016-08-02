<?php

?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>sakamoto_activity</title>
        <link rel="stylesheet" type="text/css" href="css/firefly_frame.css" media="screen">
        <link rel="stylesheet" type="text/css" href="css/UI.css" media="screen">
        <link rel="stylesheet" type="text/css" href="css/B_setupActivit.css" media="screen">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
        <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    </head>
    <body>
        <div id="wrapper">
            <div class="w-100">
                <div class="w-50">
                    
                </div>
                <div class="w-50">
                    
                </div>
            </div>
            <table>
                <tr>
                    <td>員工編號</td>
                    <td>員工名稱</td>
                    <td>是否參加</td>
                    <td>是否攜伴</td>
                </tr>
                <?php foreach($data[1] as $row){ ?>
                <tr>
                    <td><?php echo $row['Snumber']; ?></td>
                    <td><?php echo $row['Sname']; ?></td>
                    <td><?php echo $row['sign']; ?></td>
                    <td><?php echo $row['together']; ?></td>
                </tr>
                <?php } ?>
                
            </table>
            <form action="/Activity/back_con/newPeople" method="post">
                <div class="w-100">
                    <label for="">員工編號</label>
                    <input type="text" name="Snumber"/>
                </div>
                <div class="w-100">
                    <label for="">員工名稱</label>
                    <input type="text" name="Sname"/>
                </div>
                <div class="w-100">
                    <input type="hidden" name="Aid" value="<?php echo $data[2]; ?>">
                    <input type="submit" value="新增員工" name="newPeople"/>
                </div>
                
            </form>
            
        </div>
    </body>
</html>