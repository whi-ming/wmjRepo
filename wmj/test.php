<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <a href="">
            <span></span>
            <div class="inside"></div>
        </a>
    </div>
    <style>
        .container{
            background-color: black;
            border: 2px solid red;
        }
        a{
            display: flex;
            border: 2px solid yellow;
        }
        .inside{
            position: absolute;
            border: 2px solid green;
        }
        span{
            border: 2px solid blue;
            height: 300px;
            width: 300px;
        }
    </style>
</body>
</html>