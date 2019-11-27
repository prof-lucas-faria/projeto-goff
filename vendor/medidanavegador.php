<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>LARGURA REAL NAVEGADOR</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css" />
	
</head>
<body>
	<div><span id="largura"></span>x<span id="altura"></span></div>
</body>
<script>
window.onresize=function() {
    getDimensions()
}

function getDimensions() {
    var largura = document.getElementById('largura'),
        altura = document.getElementById('altura');
    
    largura.innerText = window.innerWidth;
    altura.innerText = window.innerHeight;
}

getDimensions();
</script>

</html>