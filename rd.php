<?
	/*
		RD CSS/JS Framework + Normalize + Blank
		
		Powered by Ruslan Dmitriev
		http://rdmitriev.ru/githab/RD
		https://github.com/RDmitriev/RD
	*/
	
	for($i=1; $i <= 20; $i++)
	{
		$textStyle = '
	/* color: #cccccc; */
	/* font-size: 14px; */
	/* text-transform: uppercase; */
	/* background: #132656; */
	/* padding: 10px; */
	/* font-family: bold; */
';

$boxStyle = '
	/* background: url(img/bg' . $i . '.jpg) top center no-repeat; */
	/* background-size:cover; */
	/* position: relative; */
';

		echo '.rd-box-' . $i . '{' . $boxStyle . '}
';
		
		for($y=1; $y <= 20; $y++)
		{
			echo '.rd-box-' . $i . ' .line-' . $y . '{' . $textStyle . '}
.rd-box-' . $i . ' .line-' . $y . ' a{' . $textStyle . '}
.rd-box-' . $i . ' .line-' . $y . ' span{' . $textStyle . '}
';
		}
		
		echo '

';
	}
?>