<?
	/*
		RD HTML/CSS/JS Framework + Normalize + Blank generator
		
		Powered by Ruslan Dmitriev
		https://rdmitriev.ru/githab/RD
		https://github.com/RDmitriev/RD
	*/
	
	if(isset($_POST['generate']))
	{
		$box = $_POST['box']; // кол-во блоков
		$line = $_POST['line']; // кол-во линий
		$menu = $_POST['menu']; // кол-во меню
		$ul = $_POST['ul']; // кол-во списков
		$form = $_POST['form']; // кол-во форм

	/*
		CSS GENERATION
	*/
	
	$css = '/*
	RD CSS/JS Framework + Normalize + Blank
	
	Powered by Ruslan Dmitriev
	http://rdmitriev.ru/githab/RD
	https://github.com/RDmitriev/RD
*/

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

	// MENU
	if($menu > 0)
	{
		for($i=1; $i <= $menu; $i++)
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
		}
		
		$css .= '
@media all and (max-width: 700px) {
	.rd-menu-1{
		display: none;
	}
	.rd-menu-2{
		display: none;
	}
	
	.rd-menu-open-1{
		display: block;
	}
	.rd-menu-open-2{
		display: block;
	}
	
	.showMenu{
		display:block;
	}
}';
	}
	
	// Ul
	if($ul > 0)
	{
		for($i=1; $i <= $ul; $i++)
		{
			$css .= '.rd-ul-' . $i . '{
	
}
.rd-ul-' . $i . ' li{
	
}
.rd-ul-' . $i . ' li a{
	
}

';
		}
	}
	
	// FORM
	if($form > 0)
	{
		for($i=1; $i <= $form; $i++)
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
	}
	
	// ROW
	if($box > 0)
	{
		for($i=1; $i <= $box; $i++)
		{
			$textStyle = '
	/* color: #cccccc; */
	/* font-size: 14px; */
';

$boxStyle = '
	/* background: url(img/bg' . $i . '.jpg) top center no-repeat; */
	/* background-size: cover; */
';

		$css .= '.rd-box-' . $i . '{' . $boxStyle . '}
';
		
			if($box > 0)
			{
				for($y=1; $y <= $line; $y++)
				{
				$css .= '.rd-box-' . $i . ' .line-' . $y . '{' . $textStyle . '}
.rd-box-' . $i . ' .line-' . $y . ' a{' . $textStyle . '}
.rd-box-' . $i . ' .line-' . $y . ' span{' . $textStyle . '}
';
				}
			}
		}
	}
	
	/*
		HTML GENERATION
	*/
	
	$html = '<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="format-detection" content="telephone=no">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	
	<link rel="stylesheet" href="/design/rd/rd-normalize.css">
	<link rel="stylesheet" href="/design/rd/rd-framework.css">
	<link rel="stylesheet" href="/design/font-awesome/font-awesome.min.css">
	<link rel="stylesheet" href="/design/design.css">
	<script src="/design/js/jquery.min.js"></script>
	
	<link rel="stylesheet" href="/design/js/owl.carousel/assets/owl.carousel.css">
	<link rel="stylesheet" href="/design/js/owl.carousel/assets/owl.theme.default.min.css">
	<script src="/design/js/owl.carousel/owl.carousel.min.js"></script>
	
	<script src="/design/js/js.js"></script>
	
	<title>Hello world!</title>
</head>
<body>';
	
	// MENU
	if($menu > 0)
	{
		for($i=1; $i <= $menu; $i++)
		{
			$html .= '
	<div class="rd-menu-open-' . $i . ' rd-center"><i class="fa fa-bars"></i> МЕНЮ</div>
	<ul class="rd-menu-' . $i . ' rd-padding">
		<li><a href="/">Пункт</a></li>
	</ul>
';
		}
	}
	
	// UL
	if($ul > 0)
	{
		for($i=1; $i <= $ul; $i++)
		{
			$html .= '
	<ul class="rd-ul-' . $i . '">
		<li><a href="/">Пункт</a></li>
	</ul>
';
		}
	}
	
	// FORM
	if($form > 0)
	{
		for($i=1; $i <= $form; $i++)
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
	</form>
';
		}
	}
	
	// ROW
	if($box > 0)
	{
		for($i=1; $i <= $box; $i++)
		{
			$html .= '
	<div class="rd-wrapper">
		<div class="rd-box-' . $i . '">
			<div class="rd-row rd-margin rd-padding">
				<div class="rd-col-12">
					<div class="line-1">
						<div class="line-2">
							<a href="/"><img src="/design/img/img.jpg"></a>
						</div>
';
					for($y=3; $y <= $line; $y++)
					{
						$html .= '
						<div class="line-' . $y . '">
							
						</div>
';
					}
		$html .= '
					</div>
				</div>
			</div>
		</div>
	</div>
';
		}
	}
	
	$html .= '</body>
</html>';
	
	file_put_contents('design/design.css', $css);
	file_put_contents('index.html', $html);
	
	unlink('index.php');
	
	header('Location: index.html');
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
						
						<div class="line-2">
							<form method="post" class="rd-form-1">
								<div class="labelContainer label">
									<input type="text" name="box" value="15" required><label>Кол-во блоков</label>
								</div>
								
								<div class="labelContainer label">
									<input type="text" name="line" value="15" required><label>Кол-во линий</label>
								</div>
								
								<div class="labelContainer label">
									<input type="text" name="menu" value="1" required><label>Кол-во меню</label>
								</div>
								
								<div class="labelContainer label">
									<input type="text" name="ul" value="1" required><label>Кол-во списков</label>
								</div>
								
								<div class="labelContainer label">
									<input type="text" name="form" value="1" required><label>Кол-во форм</label>
								</div>
								
								<div class="labelContainer rd-right">
									<input type="submit" name="generate" value="Сгенерировать">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>