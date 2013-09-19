<?php
if (!function_exists('utf8')) {
	function utf8($string) {
		$encodings = array('UTF-8', 'windows-1251');
		foreach ($encodings as $enc) {
			$test = mb_convert_encoding($string, $enc, $enc);
			if ($test === $string) {
				return mb_convert_encoding($string, 'UTF-8', $enc);
			}
		}

		return $string;
	}
}

if (!function_exists('only_digits')) {
	function only_digits($string) {
		return preg_replace('/[^0-9]/', '', $string);
	}
}

if (!function_exists('compose_url')) {
	function compose_url($components) { 
		$scheme   = isset($components['scheme'])   ? $components['scheme'] . '://' : '';
		$host     = isset($components['host'])     ? $components['host']           : '';
		$port     = isset($components['port'])     ? ':' . $components['port']     : '';
		$user     = isset($components['user'])     ? $components['user']           : '';
		$pass     = isset($components['pass'])     ? ':' . $components['pass']     : '';
		$path     = isset($components['path'])     ? $components['path']           : '';
		$query    = isset($components['query'])    ? '?' . $components['query']    : '';
		$fragment = isset($components['fragment']) ? '#' . $components['fragment'] : '';

		$pass = ($user || $pass) ? "$pass@" : '';

		return "$scheme$user$pass$host$port$path$query$fragment";
	}
}
