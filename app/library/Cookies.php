<?php

class Cookies extends Phalcon\Http\Response\Cookies {
	public function get($name){
		$cookie = parent::get($name);
		$val = $cookie->getValue();
		$val = str_replace(array("\t","\r\n","\n","\0","\v"," "),'', $val);
		return $val;
	}
}