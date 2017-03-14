<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('encryptURL'))
{
    function encryptURL($var)
    {
        return rtrim(strtr(base64_encode($var), '+/', '-_'), '=');
    }
	
	function decryptURL($var)
    {
        return base64_decode($var);
    }
}

function PointsGained($mpoints,$bpoints) {
	return $mpoints+$bpoints;
}