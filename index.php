<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Text Converter</title>
    <link rel="stylesheet" href="style.css">	
</head>

<body>
	
	<header>
		<h1>Text Converter <span>&beta;eta 1</span></h1>
	</header>
	
	<div class="main">

		<textarea id="raw" placeholder="Enter your text here"></textarea>
		
		<button id="convert" type="button" onClick="convert()">Encode</button>
		
		<textarea id="output" readonly placeholder="Output will be displayed here"></textarea>
		
	</div>
	<script>
	function convert() {
		
		// Define variables
		var output = document.getElementById('output');
		var convert = document.getElementById('convert');
		var raw = document.getElementById('raw').value;
		
		// Clear the output
		output.value = '';
		
		// Define an object of characters and their encoded value
		map = {
			'&' : '&amp;',
			'-' : '&#45;',
			'—' : '&ndash;',
			'…' : '&hellip;',
			'...' : '&hellip;',
			'©' : '&copy;',
			'®' : '&reg;',
			'™' : '&trade;',
			'’' : '&rsquo;',
			'”' : '&rdquo;',
			'‘' : '&lsquo;',
			'“' : '&ldquo;',
			'€' : '&euro;',
			'£' : '&pound;'
		};
		
		var keys = Object.keys(map);
		keys[keys.indexOf('&')] = keys[0];
		keys[0] = '&';
		
		// Replace map keys with value using a regular expression
		keys.forEach(function (ico) {
			var icoE = ico.replace(/([.?*+^$[\]\\(){}|-])/g, "\\$1");	
			raw = raw.replace( new RegExp(icoE, 'g'), map[ico] );				
		});
		
		// Set the output
		output.value = raw;
					
	};
	</script>
</body>
</html>