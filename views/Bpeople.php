<?php

?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>sakamoto_activity</title>
        <link rel="stylesheet" type="text/css" href="/Activity/views/css/firefly_frame.css" media="screen">
        <link rel="stylesheet" type="text/css" href="/Activity/views/css/UI.css" media="screen">
        <link rel="stylesheet" type="text/css" href="/Activity/views/css/Bpeople.css" media="screen">
        <link rel="stylesheet" type="text/css" href="/Activity/views/css/table.css" media="screen">
        <link rel="stylesheet" type="text/css" href="/Activity/views/css/form.css" media="screen">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
        <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    </head>
    <body>
        <div id="wrapper">
            <h1 class="ta-c pd-b-1">新增員工名單</h1>
            <div class="w-100 activity cf bgc-1">
                <div class="w-50 float-l">
                    <div class="">活動名稱：<?php echo $data[0]['Aname']; ?></div>
                    <div class="">報名開始時間：<?php echo $data[0]['startTime']; ?></div>
                    <div class="">報名截止時間：<?php echo $data[0]['endTime']; ?></div>
                    <div class="">報名人數：<?php echo $data[0]['number']; ?></div>
                    <div class="">上數上限：<?php echo $data[0]['numberUpper']; ?></div>
                    <div class="">可否攜伴：<?php echo $data[0]['Atogether']; ?></div>
                </div>
                <div class="w-50 float-l">
                    <div class="">其他內容：<br><?php echo $data[0]['content']; ?></div>
                </div>
            </div>
            <div class="pd-t-3">
                <table class="margin-center">
                    <tr>
                        <th>員工編號</th>
                        <th>員工名稱</th>
                        <th>是否參加</th>
                        <th>是否攜伴</th>
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
            </div>
            <div class="pd-t-3">
                <form action="/Activity/back_con/newPeople" method="post" class="">
                    <div class="w-100">
                        <label for="">員工編號</label>
                        <input type="text" name="Snumber" pattern="[0-9]{3,20}"/>
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
            
        </div>
    </body>
</html>