<html>
<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<style type="text/css">
		#outside[id] {
			display: table;
			position: static;
			width:100%;
			height:70%;
			margin:auto;
		}
		#middle[id] {
			display: table-cell;
			width: 100%;
			position: static;
		}
		#rainbow-text {
			margin-left: auto;
			margin-right: auto;
			font-size: 70px;
			text-align: center;
			font-family: "arial narrow", fantasy;
			position: absolute;
		}
		body {
			background: rgb(73,73,73); /* Old browsers */
			background: linear-gradient(to bottom, rgba(73,73,73,1) 0%,rgba(40,52,59,1) 100%); /* W3C */
		}
		#spacelord{
			height:40%;
		}
	</style>
	<script>
	$(function(){
		$('#rainbow-input').bind("keyup input paste",function() {
			$('#rainbow-text').html($(this).val())
		})
	})
	function cycling_hex_factory(speed) {

		return function(x) {
			//remember, math is a forest you can it's okay down with your friends
			return Math.ceil((256/2) * Math.sin (x * speed) + 127 )
		}
	}
	pipi =(2*Math.PI)
	//cache values so this isn't incredibly INCREDIBLY slow
	//also use coprime values for maximum combination of rainbows
	r = cycling_hex_factory((pipi/100) * 2)
	g = cycling_hex_factory((pipi/100) * 3)
	b = cycling_hex_factory((pipi/100) * 5)
	rArr = []
	gArr = []
	bArr = []
	sizeArr = []
	for(i=0; i<100; i++){
		rArr[i] = r(i)
		gArr[i] = g(i)
		bArr[i] = b(i)
		sizeArr[i] = i%20;
	}
	var count = 0
	function dancer() {
		count = (count+1) % 100
		colorString = "rgb(" + rArr[count]+ "," + gArr[count] +  ","  + bArr[count] + ")"
		shadowString = "0px 0px "+ sizeArr[count] +"px " + colorString
		document.getElementById("rainbow-text").style.color = colorString
		document.getElementById("rainbow-text").style.textShadow = shadowString
	}

	window.setInterval(dancer,10);

	</script>
</head>
<body>
	<div id="outside">
		<div id="middle">
			<div id="rainbow-text">
				<?= isset($_REQUEST['text']) ? $_REQUEST['text'] :"I'M THE KING OF SPACE"; ?>
			</div>
		</div>
	</div>
	<div id="spacelord">
	</div>
	<textarea id="rainbow-input"></textarea>
	<textarea id="url"></textarea>
</body>

</html>
