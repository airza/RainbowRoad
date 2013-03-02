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
		$text = str_replace($char, $replacement, $text);
	}
	$text = stripslashes(utf8_decode($text));

} else {
	$text = "A GIANT PYRAMID WHERE ONTO THE INSIDE WALLS FOOTAGE OF EVERY TIME YOU SHOULD'VE KISSED SOMEONE, BUT DIDN'T, IS PROJECTED. IT PLAYS FOREVER.";
}
if (isset($_REQUEST['tweet_url'])) {
	$pattern = "~^https?:[/]{2}twitter.com[/][0-9a-zA-Z_]+[/]status[/][0-9]+$~i";
	error_log("MATCH:".preg_match($pattern, urldecode($_REQUEST['tweet_url'])));
	error_log("URL:".urldecode($_REQUEST['tweet_url']));
	if (preg_match($pattern, urldecode($_REQUEST['tweet_url'])) === 1) {
		$text = "<a href='".$_REQUEST['tweet_url']."'>".$text."</a>";
	}
}
?>
<html>
<head>
	<meta chartset="utf-8">
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
		#rainbow-text a {
			text-decoration: none;
			color:inherit;
		}
		#rainbow-text a:hover {
			text-decoration: none;
			color:inherit;
			cursor:crosshair;
		}
		#rainbow-text a:visited{
			text-decoration: none;
			color:inherit;
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
		h3, .hi {
			font-family: 'Roboto Condensed', sans-serif;
			color:orange;

		}

		textarea {
			font-size:20px;
			width:40%;
			background-color: #333333;
			color:white;
		}
	</style>
	<script>
	twitter_url_regex = /^https?:[/]{2}twitter.com[/][\w]+[/]status[/][0-9]+$/
	$(function(){
		$('#rainbow-input').bind("keyup input paste",function() {
			$('#rainbow-text').html($(this).val())
		})
		$('.url-builder').bind("keyup input paste",function() {
			base_url = '<?=$_SERVER['HTTP_HOST'];?>'
			base_url += '/weird.php?text='+encodeURIComponent( $('#rainbow-input').val() );
			if (twitter_url_regex.test( $('#twitter-link').val() ) ) {
				base_url += '&tweet_url='+encodeURIComponent($('#twitter-link').val());
			}
			$('#output-link').val(base_url);
		})
	})
	function cycling_hex_factory(speed) {

		return function(x) {
			//remember, math is a forest it's okay to burn down with your friends
			return Math.ceil((256/2) * Math.sin (x * speed) + 127 )
		}
	}
	pipi =(2*Math.PI)
	//cache values so this isn't incredibly INCREDIBLY slow
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
	<h3>enter your own text:</h3>
	<textarea class='url-builder' id="rainbow-input"></textarea><br>
	<h3>OPTIONAL: PASTE TWITTER LINK HERE</h3>
	<textarea class='url-builder' id="twitter-link"></textarea><br>
	<h3>Link:</h3>
	<textarea readonly="readonly" id="output-link"></textarea><br>

	<? if (!isset($_REQUEST['text'])) { ?>
	<a class="hi" href="https://twitter.com/YUNGLIKEAHORSE/status/297891307391696897">Link to original tweet</a>
	<? } ?>
	<br>
	<a class="hi" href="https://github.com/airza/RainbowRoad">Github (why would you want this, christ)</a>
	<br>
<a href="https://twitter.com/airzae" class="twitter-follow-button" data-show-count="false">Follow @airzae</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="http://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</body>

</html>
