<?php

use Phalcon\Filter;

/*
string - Strip tags and encode HTML entities, including single and double quotes.
email - Remove all characters except letters, digits and !#$%&*+-/=?^_{|}~@.[]`.
int - Remove all characters except digits, plus and minus sign.
float - Remove all characters except digits, dot, plus and minus sign.
alphanum - Remove all characters except [a-zA-Z0-9]
striptags - Applies the strip_tags function
trim - Applies the trim function
lower - Applies the strtolower function
url - Remove all characters except letters, digits and |$-_.+!*'(),{}[]<>#%";/?:@&=.^~\`
upper - Applies the strtoupper function
*/


class R extends Phalcon\Mvc\User\Component
{

	protected $_request;

	public function initialize($request) {
		$this->_request = $request;
	}

	public function getPost($inputName, $filterName = false){
		$var = $this->_request[$inputName];

		if ($filterName !== false) {

			$filter = new Filter();
			$var = $filter->sanitize($var, $filterName);

		}

		return $var;
		
	}

	public function validateRequest($expectedFields){
		$missedFields = [];

		foreach ($expectedFields as $field) {
			if (!isset($this->_request[$field])){
				$missedFields[] = $field;
			}
		}

		if (count($missedFields) == 0) {
			return true;
		} else {
			return implode(', ', $missedFields);
		}
	}

}