<?php

function my_header(){
	return array(
		'Content-Type:application/json', 
		'Authorization:Basic YW5kcm9pZDpTT1BzZW1hcmFuZy0yMDEy',
	);
}

function curl_post($payload, $path){
	$url = base_url('api') . $path;
	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload)  );
	curl_setopt($ch, CURLOPT_HTTPHEADER, my_header() );
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	// $output = json_decode(gzdecode(curl_exec($ch))); 
	$output = json_decode(curl_exec($ch)); 
	curl_close($ch);      

	return $output;
}

function curl_get($path){
	$url = base_url('api') . $path;
	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, my_header() );
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	// $output = json_decode(gzdecode(curl_exec($ch))); 
	$output = json_decode(curl_exec($ch)); 
	curl_close($ch);      

	return $output;
}

?>