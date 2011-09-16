<?php
function curl_get_contents($url) {
	
	// setting useragent to firefox for shoutcast
	$useragent = 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1';
	
    
        // this function was found on http://fusionswift.com/blog/2010/02/curl-vs-file_get_contents/
        
	// Initiate the curl session
	$ch = curl_init();
	// Set the URL
	curl_setopt($ch, CURLOPT_URL, $url);
	// Removes the headers from the output
	curl_setopt($ch, CURLOPT_HEADER, 0);
	// Return the output instead of displaying it directly
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	// set user agent
	curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
	// Execute the curl session
	$output = curl_exec($ch);
	// Close the curl session
	curl_close($ch);
	// Return the output as a variable
	return $output;
	
}

function get_contents($ip, $port){
	
	include '../vendor/simple_html_dom.php';
	
	$html = str_get_html(curl_get_contents('http://'.$ip.':'.$port.'/index.html'));
	foreach($html->find('td font b') as $element){ $contents[] = $element->plaintext;}

	if($contents[0] === 'Server is currently up and public.'){
		
		preg_match_all ('/[0-9]+(?:\.[0-9]*)?/', $contents[1], $numbers_one);
		preg_match_all ('/[0-9]+(?:\.[0-9]*)?/', $contents[2], $numbers_two);

		$final_contents = array(
			'status' => TRUE,
			'listeners' => array(
				'total' => $numbers_two[0],
				'unique' => $numbers_two[2],
				'peak' => $contents[3],
				'max' => $numbers[2][1],
				'average_listen_time' => $contents[4]
			),
			'title' => $contents[5],
			'type' => $contents[6],
			'bitrate' => $numbers_one.'kbps',
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

		$final_contents['status'] = TRUE;

	}else{

		$final_contents['status'] = FALSE;

	}
	
	echo json_encode($final_contents);
}

echo get_contents($_GET['ip'], $_GET['port']);