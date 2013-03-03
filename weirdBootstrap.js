
	function cycling_hex_factory(speed) {

		return function(x) {
			//remember, math is a forest it's okay to burn down with your friends
			return Math.ceil((256/2) * Math.sin (x * speed) + 127 )
		}
	}
	pipi =(2*Math.PI)
	fps = 50

	r = cycling_hex_factory((pipi/fps) * 2)
	g = cycling_hex_factory((pipi/fps) * 3)
	b = cycling_hex_factory((pipi/fps) * 5)
	//cache values so this isn't incredibly INCREDIBLY slow
	colorArr = []
	sizeArr = []
	for(i=0; i<fps; i++){
		colorArr[i] = "rgb(" + r(i) + "," + g(i) +  ","  + b(i) + ")"
		sizeArr[i] = "0px 0px "+ i%20 +"px " + colorArr[i]
	}		

	var count = 0
	function dancer() {
		count = (count+1) % fps
		items = document.getElementsByClassName('rainbow-text')
		for (var i = 0; i < items.length; i++) {
		  var item = items[i];
		  item.style.color = colorArr[count]
		  item.style.textShadow = sizeArr[count]
		}
	}
	window.setInterval(dancer,1000/fps);
