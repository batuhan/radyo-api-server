<?php

$app->get('/', function() use ($app) {

});

$app->get('/api/{type}/{ip}/{port}', function($type, $ip, $port = 8000) use ($app) {
	
	include __DIR__.'/../vendor/simple_html_dom.php';
	
	$html = new simple_html_dom();
	$html->file_get_html('http://'.$ip.':'.$port.'/index.html');
	foreach($html->find('td font b') as $element) $contents[] = $element->plaintext;

	preg_match_all ('/[0-9]+(?:\.[0-9]*)?/', $contents[1], $numbers[1]);
	preg_match_all ('/[0-9]+(?:\.[0-9]*)?/', $contents[2], $numbers[2]);

	if($contents[0] === 'Server is currently up and public.'){

		$contents = array(
			'status' => TRUE,
			'listeners' => array(
				'total' => $numbers[2][0],
				'unique' => $numbers[2][2],
				'peak' => $contents[3],
				'max' => $numbers[2][1],
				'average_listen_time' => $contents[4]
			),
			'title' => $contents[5],
			'type' => $contents[6],
			'bitrate' => $numbers[1][0].'kbps',
			'genre' => $contents[7],
			'url' => $contents[8],
			'icq' => $contents[9],
			'aim' => $contents[10],
			'irc' => $contents[11],
			'songs' => array(
				'current' => $contents[12]
			)
		);

	}elseif($contents[0] === 'Server is currently up and private.'){

		$contents['status'] = TRUE;

	}else{

		$contents['status'] = FALSE;

	}
  
	echo json_encode($contents);
	
});