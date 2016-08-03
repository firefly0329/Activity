<?php

?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>sakamoto_activity</title>
        <link rel="stylesheet" type="text/css" href="/Activity/views/css/firefly_frame.css" media="screen">
        <link rel="stylesheet" type="text/css" href="/Activity/views/css/UI.css" media="screen">
        <link rel="stylesheet" type="text/css" href="/Activity/views/css/BsetupActivit.css" media="screen">
        <link rel="stylesheet" type="text/css" href="/Activity/views/css/form.css" media="screen">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
        <script type="text/javascript" src="/Activity/views/js/jquery-1.11.3.min.js"></script>
    </head>
    <body>
        <div id="wrapper">
            <h1 class="pd-t-1 pd-b-1 ta-c">新增活動</h1>
            <form method="post" action="/Activity/back_con/newActivity">
                <div class="w-100">
                    <label for="">活動名稱</label>
                    <input type="text" name="Aname"/>
                </div>
                <div class="w-100">
                    <label for="">開始時間</label>
                    <input type="datetime-local" name="startTime"/>
                </div>
                <div class="w-100">
                    <label for="">結束時間</label>
                    <input type="datetime-local" name="endTime"/>
                </div>
                <div class="w-100">
                    <label for="">人數上限</label>
                    <input type="text" name="numberUpper"/>
                </div>
                <div class="w-100">
                <label for="">可否攜伴</label>
                    <select name="together" id="">
                        <option value="可">可</option>
                        <option value="否">否</option>
                    </select>
                </div>
                <div class="w-100">
                    <label for="">其他資訊</label>
                    <textarea name="content" maxlength="5000"></textarea>
                </div>
                <div class="w-100">
                    <input type="submit" value="新增活動" name="newActivityBTN"/>
                </div>
            </form>
        </div>
    </body>
</html>