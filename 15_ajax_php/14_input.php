<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <script type="text/javascript">
        function getNames(){
            var x = new XMLHttpRequest();
            x.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    document.getElementById('p1').innerHTML = this.responseText;
                }
            }
            x.open("GET", "14_ajax.php?q=" + document.getElementById('in1').value, true);
            x.send();
        }
    </script>

    <input type="text" id="in1" onkeyup="getNames()">
    <br>
    <p id="p1"></p>

</body>
</html>