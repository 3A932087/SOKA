<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
</head>
<body>
    <button id="get" class="">get</button>
    <input type="button" class="btn btn-danger" value="123">
    <script>
        $.ajax({
            url:'api/test',
            method:'get',
            data:{
                
            },
            success:function(data){
                console.log(data.data);
            }
        });
    </script>
</body>
</html>