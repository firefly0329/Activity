<?php
echo $data;

?>


<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>sakamoto_activity</title>
        <link rel="stylesheet" type="text/css" href="/Activity/views/css/firefly_frame.css" media="screen">
        <link rel="stylesheet" type="text/css" href="/Activity/views/css/UI.css" media="screen">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
        <script type="text/javascript" src="/Activity/views/js/jquery-1.11.3.min.js"></script>
    </head>
    <body>
        <div id="wrapper">
            <form action="/Activity/front_con/FactivityList" method="post" class="">

                    <div class="w-100">
                        <!--<input type="hidden" id="Aid" name="Aid" value="<?php echo $data[2]; ?>">-->
                        <input type="submit" value="回活動清單" name="newPeople"/>
                    </div>
                    
            </form>
        </div>
    </body>
</html>