<html>
    <style>
        .msg{
            margin-left:500px;
            font-size:31px;
            font-weight:900;
            height:fit-content;
            width:fit-content;
            border:2px solid grey;
            margin-top:230px;
            padding:25px;
            background-color:grey;
            color:white;
        }
    </style>
    <body>
        <title>Output page</title>
    </body>
</html>
<?php
    $msg=$_REQUEST["msg"];
    echo "<h1 class='$msg'>".$msg."</h1>;
?>