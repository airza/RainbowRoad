<?

$santitized_chars = array(
	'&'=>'&amp',
	'<'=>'&lt;',
	'>'=>'&gt;',
	'"'=>'&quot;',
	"'" =>'&#x27;',
	'/' => '&#x2F;',
	);
if (isset($_REQUEST['text'])) {
	$text = urldecode($_REQUEST['text']);
	foreach ($santitized_chars as $char=>$replacement) {
		$text = stripslashes(utf8_decode(str_replace($char, $replacement, $text)));
	}

} else {
	$text = "A GIANT PYRAMID WHERE ONTO THE INSIDE WALLS FOOTAGE OF EVERY TIME YOU SHOULD'VE KISSED SOMEONE, BUT DIDN'T, IS PROJECTED. IT PLAYS FOREVER.";
}

?>
<html>
<head>
	<title>RAINBOW ROAD</title>
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:700' rel='stylesheet' type='text/css'>
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
			vertical-align: middle;
			width: 100%;
		}
		#rainbow-text {
			text-align: center;
			font-size: 70px;
			font-family: 'Roboto Condensed', sans-serif;
		}
		body {
			background: rgb(69,72,77); /* Old browsers */
			background: -moz-linear-gradient(top, rgba(69,72,77,1) 0%, rgba(0,0,0,1) 100%); /* FF3.6+ */
			background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(69,72,77,1)), color-stop(100%,rgba(0,0,0,1))); /* Chrome,Safari4+ */
			background: -webkit-linear-gradient(top, rgba(69,72,77,1) 0%,rgba(0,0,0,1) 100%); /* Chrome10+,Safari5.1+ */
			background: -o-linear-gradient(top, rgba(69,72,77,1) 0%,rgba(0,0,0,1) 100%); /* Opera 11.10+ */
			background: -ms-linear-gradient(top, rgba(69,72,77,1) 0%,rgba(0,0,0,1) 100%); /* IE10+ */
			background: linear-gradient(to bottom, rgba(69,72,77,1) 0%,rgba(0,0,0,1) 100%); /* W3C */

		}
		#spacelord{
			height:40%;
		}
		.hi {
			font-family: 'Roboto Condensed', sans-serif;
			color:orange;

		}
	</style>
	<script>
	$(function(){
		$('#rainbow-input').bind("keyup input paste",function() {
			$('#rainbow-text').html($(this).val())
			$('#rainbow-output').val('<?=$_SERVER['HTTP_HOST'];?>/weird.php?text='+encodeURIComponent($(this).val()))
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
				<?= $text; ?>
			</div>
		</div>
	</div>
	<div id="spacelord">
	</div>
	<textarea id="rainbow-input">enter text here for MORE FUN</textarea><textarea id="rainbow-output"></textarea><br>
	<a class="hi" href="https://twitter.com/YUNGLIKEAHORSE/status/297891307391696897">Link to original tweet</a>
	<br>
	<a class="hi" href="https://github.com/airza/RainbowRoad">Github (why would you want this, christ)</a>
	<br>
<a href="https://twitter.com/airzae" class="twitter-follow-button" data-show-count="false">Follow @airzae</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="http://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</body>

</html>
