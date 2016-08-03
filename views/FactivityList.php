<?php
    
    // var_dump($data);
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>sakamoto_activity</title>
        <link rel="stylesheet" type="text/css" href="css/firefly_frame.css" media="screen">
        <link rel="stylesheet" type="text/css" href="css/UI.css" media="screen">
        <link rel="stylesheet" type="text/css" href="css/FactivityList.css" media="screen">
        <link rel="stylesheet" type="text/css" href="css/table.css" media="screen">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
        <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    </head>
    <body>
        <div id="wrapper">
            <table>
                <tr>
                    <td>活動名稱</td>
                    <td>報名開始時間</td>
                    <td>報名截止時間</td>
                    <td>報名人數</td>
                    <td>上數上限</td>
                    <td>是否可攜伴</td>
                    <td></td>
                </tr>
                <?php foreach($data as $data2){ ?>
                <tr>
                    <td><?php echo $data2['Aname']; ?></td>
                    <td><?php echo $data2['startTime']; ?></td>
                    <td><?php echo $data2['endTime']; ?></td>
                    <td><?php echo $data2['number']; ?></td>
                    <td><?php echo $data2['numberUpper']; ?></td>
                    <td><?php echo $data2['Atogether']; ?></td>
                    <td>
                        <form method="post" action="/Activity/front_con/linkFsignUp">
                            <input type="hidden" value="<?php echo $data2['Aid']; ?>" name="Aid">
                            <button type="submit" value="" name="linkFsignUpBTN">我要報名</button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
                
                
            </table>
            
        </div>
    </body>
</html>