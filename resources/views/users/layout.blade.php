<!DOCTYPE html>
<html>
<head>
<title>Users</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="../../css/app.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>
        $(document).ready(function () {
            $("#parent").html("<option value='Angular'> Angular </option><option>React</option><option>Vue</option>");
            $("#sub").html("<option>AngularJS</option><option>Angular 2</option>");
            $("#main").change(function () {
                let val = $(this).val();
                if (val == "Front End Developer") {
                    $("#parent").html("<option value='Angular'> Angular </option><option>React</option><option>Vue</option>");
                } else if (val == "Back End Developer") {
                    $("#parent").html("<option value='PHP'> PHP </option><option>NodeJs</option>");
                }
            });
            $("#parent").change(function () {
                let val = $(this).val();
                if (val == "Angular") {
                    $("#sub").html("<option>AngularJS</option><option>Angular 2</option>");
                } else if (val == "React") {
                    $("#sub").html(" <option>React Native</option>");
                }
             else if (val == "Vue") {
                $("#sub").html("<option> Vue</option>");
            }
             else if (val == "PHP") {
                $("#sub").html("<option>Symphony</option><option>Laravel</option><option>Lumen</option>");
            }
             else if(val == "NodeJs")
                {
                    $("#sub").html("<option>Expres</option><option>NestJS</option>");

                }
            });


        });
    </script>
</head>

<body>
<div class="container">
    @yield('content')
</div>

</body>
</html>
