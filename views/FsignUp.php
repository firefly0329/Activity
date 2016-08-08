<?php
date_default_timezone_set('Asia/Taipei');
    $time = date("Y-m-d H:i:s");
    if($time >= $data[0]['startTime'] && $time <= $data[0]['endTime']){
        
    }else{
        echo "<script>alert('現在不是報名期間');location.href='/Activity/front_con/FactivityList/';</script>";
    }

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
            <h1 class="ta-c pd-b-1">活動報名</h1>
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
                <form action="/Activity/front_con/signUp" method="post" class="">
                    <div class="w-100">
                        <label for="">員工編號：</label>
                        <input type="text" name="Snumber" pattern="[0-9]{3,20}"/>
                    </div>
                    <div class="w-100">
                        <label for="">員工名稱：</label>
                        <input type="text" name="Sname"/>
                    </div>
                    <?php if($data[0]['Atogether'] == "可") : ?>
                    <div class="w-100">
                        <label for="">攜伴人數：</label>
                        <input type="number" name="together" min="0" max="10" style=""/>
                    </div>
                    <?php endif ?>
                    <div class="w-100">
                        <input type="hidden" name="Aid" value="<?php echo $data[0]['Aid']; ?>">
                        <input type="submit" value="活動報名" name="signUpBTN"/>
                    </div>
                    
                </form>
                <h3 class="ta-c pd-t-1" style="color: red;"><?php echo $data[3]; ?></h3>
            </div>
            
        </div>
    </body>
</html>