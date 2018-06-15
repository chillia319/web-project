<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<!-- Nick Meek, 2012 A page used to demonstrate using PHP to write style sheet paths -->
<html>
	<head>
		<title>Choose your Own Style</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="./style1.css">
		<link rel="stylesheet" type="text/css" href="<?php echo($_GET[style]); ?>">	
		</head>
	<body>
		<div class="intro">
				<form action="change.php" method="get">
					<fieldset class="style">
						<legend>Style Choice</legend>
						<ul>
							<li>
								<input type="radio" name="style" id="one" value="./style1.css">
								<label>Style 1</label>
							</li>
							<li>
								<input type="radio" name="style" id="two" value="./style2.css">
								<label>Style 2</label>
							</li>
							<li>
								<input type="radio" name="style" id="three" value="./style3.css">
								<label>Style 3</label>
							</li>
						</ul>
						<label><input type="submit" id="convert" value="convert"></label>
						<label><input type="reset" id="reset" value="reset"></label>
					</fieldset>
					<h1>Lorem Ipsum</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam suscipit porttitor felis, sit amet suscipit magna pulvinar nec. Quisque quam metus, bibendum adipiscing pretium sit amet, viverra sed purus. Duis vulputate suscipit elementum. Fusce vitae mi ipsum. Morbi eleifend risus auctor metus faucibus congue vitae eget nibh.
					</p>
					<p>In magna lectus, scelerisque eleifend iaculis ac, sollicitudin et nisl. Duis felis mauris, dignissim a condimentum et, venenatis tincidunt turpis. Maecenas a porttitor enim. Quisque at lacus vel ante interdum rhoncus porttitor vel massa. Etiam libero diam, pharetra quis aliquet vel, condimentum a tellus. Quisque vulputate, arcu non commodo congue, ante tortor accumsan purus, vitae tristique orci diam nec lacus. Vivamus quis leo in ipsum iaculis consequat quis non diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
					</p>
		</div>
		<div class="section">
			<h2>Ut luctus</h2>
			<p>Ut luctus, metus ac laoreet porttitor, libero tortor pulvinar dolor, id suscipit erat libero quis velit. Ut massa lectus, volutpat vel faucibus in, facilisis nec neque. Vestibulum pellentesque molestie semper. Etiam pellentesque fermentum libero, sed ornare nunc rhoncus ac. Nulla non placerat nulla. Nunc a nulla nisl. Vestibulum tristique tristique lobortis.
			</p>
			<p>Suspendisse nisi odio, ultricies vel tincidunt eu, dignissim sit amet tellus. Integer id euismod nunc. Ut aliquet sem vel lectus viverra et lobortis odio elementum. Donec in enim at nunc porttitor mattis. Aliquam diam arcu, viverra sed pellentesque eget, convallis nec tellus. Ut et dolor magna, at pellentesque metus. Etiam et dolor eget ipsum ornare porta.
			</p>
			<p>Aliquam porttitor facilisis leo non vulputate. Sed et eleifend enim. In vel neque felis, eu porta tellus. Proin feugiat justo eget lorem consequat scelerisque. Phasellus tristique tincidunt aliquet. Mauris blandit, augue a suscipit ullamcorper, tellus nisi tincidunt metus, vel sodales lacus purus eu elit. Ut suscipit dui eget tortor pulvinar gravida.
			</p>
		</div>
		<div class="section">
			<h2>Praesent in urna sem</h2>
			<p>Praesent in urna sem, non interdum enim. Vestibulum ac quam nec lectus blandit commodo. Praesent vel diam felis, vel commodo diam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Morbi eu tellus erat. Pellentesque adipiscing rutrum nisi, at accumsan sem viverra eget. Vivamus varius scelerisque quam nec lacinia. Vivamus ultrices posuere placerat. Nunc vitae molestie purus. Maecenas tristique porttitor feugiat. Integer eget nibh quis felis porttitor lobortis.
			</p>
			<p>Phasellus egestas, felis et ultrices euismod, turpis nisl tempor magna, in sollicitudin elit dui sed tellus. Nulla facilisi. Vestibulum tristique urna eget nunc aliquam tincidunt hendrerit enim sodales. Aliquam volutpat lorem a tortor blandit lacinia. Suspendisse vulputate varius venenatis. Suspendisse potenti. Curabitur velit lorem, lobortis quis sollicitudin vel, molestie vel dui.
			</p>
			<p>Sed tempus suscipit ipsum, eu vehicula elit sagittis gravida. In sed eros risus, at congue nisi. Duis dolor arcu, ultrices et cursus a, volutpat nec lectus. Fusce magna quam, dapibus sed posuere id, euismod ut enim. Mauris ut euismod massa.
			</p>
			<h2>Praesent viverra</h2>
			<p>Praesent viverra egestas viverra. Praesent suscipit nulla ac arcu congue eleifend facilisis eros volutpat. Ut iaculis tincidunt mi, quis faucibus mauris ultrices in. Curabitur scelerisque elit sit amet nisi pellentesque eu dictum tortor sagittis.
			</p>
			<p>Nullam eu ipsum in tellus vehicula faucibus. Maecenas vel tellus nec lorem pellentesque adipiscing sed ac lorem. Nam aliquam elementum enim ullamcorper venenatis. Suspendisse potenti. Sed semper quam eu urna commodo in varius libero semper.
			</p>
			<p>Vestibulum faucibus tristique dui at adipiscing. Sed in metus quis tortor porta egestas in ut magna. Sed sit amet ante eros. Aenean tellus urna, vulputate eu dignissim et, rhoncus non nulla. Etiam sit amet dolor et arcu facilisis dapibus at et erat.
			</p>
		</div>
		<div class="section">
			<h2>Nullam pretium</h2>
			<p>Nullam pretium nulla in ligula sagittis id facilisis massa dictum. Nullam in justo leo, dictum volutpat neque. Proin accumsan orci nec leo tincidunt dignissim. Donec in diam nulla, at feugiat est. Duis a leo sit amet massa faucibus placerat sed eu nisi.
			</p>
			<p>Cras gravida tortor sed enim commodo eget suscipit eros tincidunt. Fusce magna eros, scelerisque consectetur sollicitudin quis, commodo sed tellus. Sed mauris mi, aliquet at mollis sit amet, laoreet quis metus. Donec non magna ut metus fermentum pretium eu eget metus. Aenean erat elit, ornare a aliquet in, dictum sit amet quam. Quisque at diam ac sem interdum rutrum. Nulla facilisi. Pellentesque adipiscing turpis vitae turpis tristique a euismod elit eleifend.
			</p>
			<p>Quisque volutpat posuere nulla, ac accumsan elit vehicula quis. Suspendisse eu eros elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris hendrerit commodo tempus. Quisque tellus sapien, dictum et molestie eget, vehicula eget dui.
			</p>
		</div>
	</body>
</html>