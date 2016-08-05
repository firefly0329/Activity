<?php
date_default_timezone_set('Asia/Taipei');
$time = date("Y-m-d H:i:s");
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>sakamoto_activity</title>
        <link rel="stylesheet" type="text/css" href="/Activity/views/css/firefly_frame.css" media="screen">
        <link rel="stylesheet" type="text/css" href="/Activity/views/css/UI.css" media="screen">
        <link rel="stylesheet" type="text/css" href="/Activity/views/css/BactivityList.css" media="screen">
        <link rel="stylesheet" type="text/css" href="/Activity/views/css/table.css" media="screen">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
        <script type="text/javascript" src="/Activity/views/js/jquery-1.11.3.min.js"></script>
    </head>
    <body>
        <div id="wrapper">
            <h1 class="pd-t-1 pd-b-1 ta-c">活動清單</h1>
            <table class="margin-center">
                
                <tr>
                    <th>狀態</th>
                    <th>活動名稱</th>
                    <th>報名開始時間</th>
                    <th>報名截止時間</th>
                    <!--<th>剩餘人數</th>-->
                    <th>上數上限</th>
                    <th>是否可攜伴</th>
                    <th></th>
                </tr>
                <?php foreach($data as $data2){ ?>
                <tr>
                    <td style="color: orange;"><?php if($time < $data2['startTime']){echo "尚未到期";}else if($time > $data2['endTime']){echo "已過期";} ?></td>
                    <td><?php echo $data2['Aname']; ?></td>
                    <td><?php echo $data2['startTime']; ?></td>
                    <td><?php echo $data2['endTime']; ?></td>
                    <!--<td><?php echo $data2['number']; ?></td>-->
                    <td><?php echo $data2['numberUpper']; ?></td>
                    <td><?php echo $data2['Atogether']; ?></td>
                    <td>
                        <form method="post" action="/Activity/back_con/linkBpeople">
                            <input type="hidden" value="<?php echo $data2['Aid']; ?>" name="Aid">
                            <button type="submit" value="" name="linkBpeopleBTN">詳細資料</button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
                
                
            </table>
            <div class="ta-c pd-t-3">
                <form method="post" action="/Activity/back_con/linkSetupActivit">
                    <button type="submit" value="" name="linkSetupActivitBTN">新增活動</button>
                </form>
            </div>
        </div>
    </body>
</html>