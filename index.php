<?
	/*
		RD HTML/CSS/JS Framework + Normalize + Blank generator
		
		Powered by Ruslan Dmitriev
		https://rdmitriev.ru/githab/RD
		https://github.com/RDmitriev/RD
	*/
	
	$css = '';
	$css_media = '';
	$html = '';
	
	$css_media_array = array();
	
	if(isset($_POST['generate']))
	{
		$outputHtml = '';
		$outputCss = '';
		$outputCssMedia = '';
		
		foreach($_POST['part'] as $key => $val)
		{
			$part = trim($part);
			
			if($val != '')
			{
				if($_POST['line'][$key])
				{
					$output = line($key, $_POST['line'][$key]);
					
					$outputHtml .= $output['0'];
					$outputCss .= $output['1'];
					$outputCssMedia .= $output['2'];
				}
				
				if($_POST['menu'][$key])
				{
					$output = menu($key, $_POST['menu'][$key]);
					
					$outputHtml .= $output['0'];
					$outputCss .= $output['1'];
					$outputCssMedia .= $output['2'];
				}
				
				if($_POST['ul'][$key])
				{
					$output = ul($key, $_POST['ul'][$key]);
					
					$outputHtml .= $output['0'];
					$outputCss .= $output['1'];
					$outputCssMedia .= $output['2'];
				}
				
				if($_POST['form'][$key])
				{
					$output = form($key, $_POST['form'][$key]);
					
					$outputHtml .= $output['0'];
					$outputCss .= $output['1'];
					$outputCssMedia .= $output['2'];
				}
				
				// вставляем html в row
				$output = row($key, $outputHtml, $val);
				
				$outputCss .= $output['1'];
				$outputHtml = $output['0'];
				
			}
		}
		
		$html = html($outputHtml);
		$css = css($outputCss);
		$cssMedia = cssMedia($outputCssMedia);
		
		file_put_contents('index.html', $html);
		file_put_contents('design/style.css', $css);
		file_put_contents('design/media.css', $cssMedia);
		
		//unlink('index.php');
		
		//header('Location: index.html');
	}
	
	function line($id, $count)
	{
		$html = '';
		$css = '';
		$cssMedia = '';
		
		$textStyle = '
	/* color: #cccccc; */
	/* font-size: 14px; */
';

		for($y=1; $y <= $count; $y++)
		{
			$css .= '.rd-box-' . $id . ' .line-' . $y . '{' . $textStyle . '}
.rd-box-' . $id . ' .line-' . $y . ' a{' . $textStyle . '}
.rd-box-' . $id . ' .line-' . $y . ' span{' . $textStyle . '}
';
		}
		
		$html .= '<div class="line-1">
						<div class="line-2">
							<a href="/"><img src="/design/img/img.jpg"></a>
						</div>';
		for($y=3; $y <= $count; $y++)
		{
			$html .= '

						<div class="line-' . $y . '">
							
						</div>';
		}
		
		$html .= '
					</div>';
		
		return array($html, $css, $cssMedia);
	}
	
	function menu($id, $count)
	{
		$html = '';
		$css = '';
		$cssMedia = '';
		
		for($i=1; $i <= $count; $i++)
		{
			$css .= '.rd-menu-' . $i . '{
	
}
.rd-menu-' . $i . ' li{
	
}
.rd-menu-' . $i . ' li a{
	
}
.rd-menu-open-' . $i . '{
	display: none;
	cursor:pointer;
	font-size:24px;
	color:#000;
	padding:10px 0;
}

';


		for($i=1; $i <= $count; $i++)
		{
			$html .= '

					<div class="rd-menu-open-' . $i . ' rd-center"><i class="fa fa-bars"></i> МЕНЮ</div>
					<ul class="rd-menu-' . $i . ' rd-padding">
						<li><a href="/">Пункт</a></li>
					</ul>';
		}

$css_media_array[700] .= '	.rd-menu-' . $i . '{
		display: none;
	}
	.rd-menu-open-' . $i . '{
		display: block;
	}

';
		}
		
		$css_media_array[700] .= '	.showMenu{
	display:block;
}';
		
		return array($html, $css, $cssMedia);
	}
	
	function ul($id, $count)
	{
		$html = '';
		$css = '';
		$cssMedia = '';
		
		for($i=1; $i <= $count; $i++)
		{
			$css .= '.rd-ul-' . $i . '{
	
}
.rd-ul-' . $i . ' li{
	
}
.rd-ul-' . $i . ' li a{
	
}

';
		}
		
		for($i=1; $i <= $count; $i++)
		{
			$html .= '

					<ul class="rd-ul-' . $i . '">
						<li><a href="/">Пункт</a></li>
					</ul>';
		}
		
		return array($html, $css, $cssMedia);
	}
	
	function form($id, $count)
	{
		$html = '';
		$css = '';
		$cssMedia = '';
		
		for($i=1; $i <= $count; $i++)
		{
			$css .= '.rd-form-' . $i . '{
	
}

.rd-form-' . $i . ' input[type=text] {
	/* background:transparent; */
	/* border:2px solid #000; */
}

.rd-form-' . $i . ' textarea {
	/* background:transparent; */
	/* border:2px solid #000; */
}

.rd-form-' . $i . ' label {
	/* color:#000000 !important; */
}

.rd-form-' . $i . ' input[type=submit] {
	/* background: #ff9600; */
	/* padding: 10px 85px; */
	/* color: #fff; */
	/* font-size: 22px; */
}

';
		}
		
		for($i=1; $i <= $count; $i++)
		{
			$html .= '

					<form method="post" class="rd-form-' . $i . '">
						<div class="labelContainer label">
							<input type="text" name="name" required><label>Текстовое поле</label>
						</div>
						
						<div class="labelContainer">
							<label><input type="checkbox" name="published" value="1"> Чекбокс 1</label>
							<label><input type="checkbox" name="published" value="1"> Чекбокс 2</label>
						</div>
						
						<div class="labelContainer">
							<label><input type="radio" name="published" value="1"> Радио 1</label>
							<label><input type="radio" name="published" value="1"> Радио 2</label>
						</div>
						
						<div class="labelContainer label">
							<textarea type="text" name="title" required="required"></textarea>
							<label>Большое текстовое поле</label>
						</div>
						
						<div class="labelContainer rd-right">
							<input type="submit" name="send" value="Кнопка">
						</div>
					</form>';
		}
		
		return array($html, $css, $cssMedia);
	}
	
	function row($id, $outputHtml, $cols)
	{
		$html = '';
		$css = '';
		$cssMedia = '';
		
		$boxStyle = '
	/* background: url(img/bg' . $id . '.jpg) top center no-repeat; */
	/* background-size: cover; */
';

		$css .= '.rd-box-' . $id . '{' . $boxStyle . '}
';

		for($y=1; $y <= $line; $y++)
		{
			$css .= '.rd-box-' . $id . ' .line-' . $y . '{' . $textStyle . '}
.rd-box-' . $id . ' .line-' . $y . ' a{' . $textStyle . '}
.rd-box-' . $id . ' .line-' . $y . ' span{' . $textStyle . '}
';
		}
		
		$html .= '
	<div class="rd-wrapper">
		<div class="rd-box-' . $id . '">
			<div class="rd-row rd-margin rd-padding">
				<div class="rd-col-12">
					' . $outputHtml . '
				</div>
			</div>
		</div>
	</div>
';
		return array($html, $css, $cssMedia);
	}
	
	function css($outputCss)
	{
		$css = '';
		
		$css .= '/*
	RD CSS/JS Framework + Normalize + Blank
	
	Powered by Ruslan Dmitriev
	http://rdmitriev.ru/githab/RD
	https://github.com/RDmitriev/RD
*/

@import url("media.css");

/*@font-face {
	font-family: fontName;
	src: url(fonts/fontName.ttf);
}*/

body{
	color:#000;
	font-size:14px;
	font-family: Arial;
}
a{
	color:#000;
	font-size:14px;
	font-family: Arial;
}
h1, .h1{
	color:#000;
	font-size:21px;
	font-family: Arial;
}
*{
	word-wrap: break-word !important;
}
[class^="box-"]{
	padding:50px 0;
}

';
		$css .= $outputCss;
		
		return $css;
	}
	
	
	/*
		CSS MEDIA GENERATION
	*/
	
	function cssMedia()
	{
		$cssMedia = '';
		
		$cssMedia .= '/*
	RD CSS/JS Framework + Normalize + Blank
	
	Powered by Ruslan Dmitriev
	http://rdmitriev.ru/githab/RD
	https://github.com/RDmitriev/RD
*/
';
		for($i=1200; $i>= 250; $i--)
		{
			if($i % 50 == 0)
			{
				$cssMedia .= '
@media all and (max-width: ' . $i . 'px) {
';
				if(isset($css_media_array[$i]))
				{
					$cssMedia .= $css_media_array[$i];
				}
				
				$cssMedia .= '
}
';
			}
		}
		
		return $cssMedia;
	}
	
	/*
		HTML GENERATION
	*/
	
	function html($outputHtml)
	{
		$html .= '<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="format-detection" content="telephone=no">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	
	<link rel="stylesheet" href="/design/rd/rd-normalize.css">
	<link rel="stylesheet" href="/design/rd/rd-framework.css">
	<link rel="stylesheet" href="/design/font-awesome/font-awesome.min.css">
	<link rel="stylesheet" href="/design/style.css">
	<script src="/design/js/jquery.min.js"></script>
	
	<link rel="stylesheet" href="/design/js/owl.carousel/assets/owl.carousel.css">
	<link rel="stylesheet" href="/design/js/owl.carousel/assets/owl.theme.default.min.css">
	<script src="/design/js/owl.carousel/owl.carousel.min.js"></script>
	
	<script src="/design/js/js.js"></script>
	
	<title>Hello world!</title>
</head>
<body>';
		$html .= $outputHtml;
		
		$html .= '</body>
</html>';
		
		return array($html);
	}
?>
	<title>RD HTML/CSS/JS Framework + Normalize + Blank generator</title>
	<link href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic,700italic&subset=latin,cyrillic-ext" rel="stylesheet">
	<link rel="stylesheet" href="/design/rd/rd-normalize.css">
	<link rel="stylesheet" href="/design/rd/rd-framework.css">
	
	<div class="rd-wrapper">
		<div class="rd-box-1">
			<div class="rd-row">
				<div class="rd-col-12">
					<div>
						<div class="line-2 rd-center">
							<h1>RD HTML/CSS/JS Framework + Normalize + Blank generator</h1>
						</div>
					</div>
				</div>
			</div>
			
			<form method="post" class="rd-form-1">
				<? for($i=1; $i <= 30; $i++) { ?>
				<div class="rd-row rd-margin">
				<div class="rd-col-2">
					<div class="line-1">
						<div class="line-2">
							<?=$i?>
						</div>
					</div>
				</div>
				
				<div class="rd-col-2">
					<div class="line-1">
						<div class="line-2">
							<div class="labelContainer label">
								<input type="text" name="part[<?=$i?>]" value=""><label>Части</label>
							</div>
						</div>
					</div>
				</div>
				
				<div class="rd-col-2">
					<div class="line-1">
						<div class="line-2">
							<div class="labelContainer label">
								<input type="text" name="line[<?=$i?>]" value=""><label>Кол-во линий</label>
							</div>
						</div>
					</div>
				</div>
				
				<div class="rd-col-2">
					<div class="line-1">
						<div class="line-2">
							<div class="labelContainer label">
								<input type="text" name="menu[<?=$i?>]" value=""><label>Кол-во меню</label>
							</div>
						</div>
					</div>
				</div>
				
				<div class="rd-col-2">
					<div class="line-1">
						<div class="line-2">
							<div class="labelContainer label">
								<input type="text" name="ul[<?=$i?>]" value=""><label>Кол-во списков</label>
							</div>
						</div>
					</div>
				</div>
				
				<div class="rd-col-2">
					<div class="line-1">
						<div class="line-2">
							<div class="labelContainer label">
								<input type="text" name="form[<?=$i?>]" value=""><label>Кол-во форм</label>
							</div>
						</div>
					</div>
				</div>
				</div>
				<? } ?>
				
				<div class="labelContainer rd-right">
					<input type="submit" name="generate" value="Сгенерировать">
				</div>
			</form>
		</div>
	</div>