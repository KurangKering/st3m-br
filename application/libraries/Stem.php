<?php 
/**
 * 
 */
class Stem 
{
	protected $dictionary;


	protected $originalWords;

	protected $originalWord;

	protected $currentWord;

	public $isFound = false;

	function __construct($params)
	{
		$this->dictionary = $params['dictionary'];
	}



	public function prefixNYtoS($word)
	{
		$matches  = null;
		$contains = preg_match('/^ny([aiueo])(.*)$/', $word, $matches);

		if ($contains === 1) {
			return 's' . $matches[1] . $matches[2];
		}
	}

	public function prefixNYtoC($word)
	{
		$matches  = null;
		$contains = preg_match('/^ny([aiueo])(.*)$/', $word, $matches);

		if ($contains === 1) {
			return 'c' . $matches[1] . $matches[2];
		}
	}
	public function prefixNYtoNull($word)
	{
		$matches  = null;
		$contains = preg_match('/^ny([aiueo])(.*)$/', $word, $matches);

		if ($contains === 1) {
			return  $matches[1] . $matches[2];
		}
	}

	public function prefixNtoT($word)
	{
		$matches  = null;
		$contains = preg_match('/^n([aiueo])(.*)$/', $word, $matches);

		if ($contains === 1) {
			return 't' . $matches[1] . $matches[2];
		}
	}public function prefixNtoNull($word)
	{
		$matches  = null;
		$contains = preg_match('/^n([a-z])(.*)$/', $word, $matches);

		if ($contains === 1) {
			return $matches[1] . $matches[2];
		}
	}

	public function prefixMtoP($word)
	{
		$matches  = null;
		$contains = preg_match('/^m([aiueo])(.*)$/', $word, $matches);

		if ($contains === 1) {
			return 'p' . $matches[1] . $matches[2];
		}
	}
	public function prefixMtoNull($word)
	{
		$matches  = null;
		$contains = preg_match('/^m([a-z])(.*)$/', $word, $matches);

		if ($contains === 1) {
			return  $matches[1] . $matches[2];
		}
	}

	public function prefixNGtoK($word)
	{
		$matches  = null;
		$contains = preg_match('/^ng([aiueo])(.*)$/', $word, $matches);

		if ($contains === 1) {
			return 'k' . $matches[1] . $matches[2];
		}
	}
	public function prefixNGtoNull($word)
	{
		$matches  = null;
		$contains = preg_match('/^ng([a-z])(.*)$/', $word, $matches);

		if ($contains === 1) {
			return  $matches[1] . $matches[2];
		}
	}
	public function prefixTAKtoNull($word)
	{
		$matches  = null;
		$contains = preg_match('/^tak([a-z])(.*)$/', $word, $matches);

		if ($contains === 1) {
			return  $matches[1] . $matches[2];
		}
	}
	public function prefixDItoNull($word)
	{
		$matches  = null;
		$contains = preg_match('/^di([a-z])(.*)$/', $word, $matches);

		if ($contains === 1) {
			return  $matches[1] . $matches[2];
		}
	}
	public function prefixKEtoNull($word)
	{
		$matches  = null;
		$contains = preg_match('/^ke([a-z])(.*)$/', $word, $matches);

		if ($contains === 1) {
			return  $matches[1] . $matches[2];
		}
	}
	public function prefixMEtoNull($word)
	{
		$matches  = null;
		$contains = preg_match('/^me([a-z])(.*)$/', $word, $matches);

		if ($contains === 1) {
			return  $matches[1] . $matches[2];
		}
	}

	public function infixEMtoNull($word)
	{
		$matches  = null;
		$contains = preg_match('/^([bcdfghjklmnpqrstvwxyz])em([aiueo])(.*)$/', $word, $matches);

		if ($contains === 1) {
			return $matches[1] . $matches[2] . $matches[3];
		}
	}

	public function suffixNAtoNull($word)
	{
		$matches  = null;
		$contains = preg_match('/^(.*)na$/', $word, $matches);

		if ($contains === 1) {
			return $matches[1];
		}
	}
	public function suffixANtoNull($word)
	{
		$matches  = null;
		$contains = preg_match('/^(.*)an$/', $word, $matches);

		if ($contains === 1) {
			return $matches[1];
		}
	}
	public function suffixNItoNull($word)
	{
		$matches  = null;
		$contains = preg_match('/^(.*)ni$/', $word, $matches);

		if ($contains === 1) {
			return $matches[1];
		}
	}
	public function suffixItoNull($word)
	{
		$matches  = null;
		$contains = preg_match('/^(.*)i$/', $word, $matches);

		if ($contains === 1) {
			return $matches[1];
		}
	}

	public function konfix($word)
	{	
		$invalidAffixes = array(
			'/^(ng)(.*)(i)$/',
			'/^(n)(.*)(na)$/',
			'/^(di)(.*)(i)$/',
			'/^(di)(.*)(na)$/',
			'/^(tak)(.*)(i)$/',
			'/^(tak)(.*)(na)$/',
			'/^(m)(.*)(na)$/',
		);

		$contains = false;

		foreach ($invalidAffixes as $invalidAffix) {
			$contains = preg_match($invalidAffix, $word, $matches);

			if ($contains === 1) {
				return $matches;
			}
		}
		return $contains;


	}



	public function doPrefix($input) 
	{
		if ($this->currentWord = $this->checkDictionary($this->prefixNYtoS($input))) {
			return $this->currentWord;
		} else
		if ($this->currentWord = $this->checkDictionary($this->prefixNYtoC($input))) {
			return $this->currentWord;
		} else
		if ($this->currentWord = $this->checkDictionary($this->prefixNYtoNull($input))) {
			return $this->currentWord;
		} else
		if ($this->currentWord = $this->checkDictionary($this->prefixNtoT($input))) {
			return $this->currentWord;
		} else
		if ($this->currentWord = $this->checkDictionary($this->prefixNtoNull($input))) {
			return $this->currentWord;
		} else
		
		if ($this->currentWord = $this->checkDictionary($this->prefixMtoP($input))) {
			return $this->currentWord;
		} else
		if ($this->currentWord = $this->checkDictionary($this->prefixMtoNull($input))) {
			return $this->currentWord;
		} else

		if ($this->currentWord = $this->checkDictionary($this->prefixNGtoK($input))) {
			return $this->currentWord;
		} else
		if ($this->currentWord = $this->checkDictionary($this->prefixNGtoNull($input))) {

			return $this->currentWord;
		}  else
		if ($this->currentWord = $this->checkDictionary($this->prefixTAKtoNull($input))) {

			return $this->currentWord;
		}  else
		if ($this->currentWord = $this->checkDictionary($this->prefixDItoNull($input))) {

			return $this->currentWord;
		}  else
		if ($this->currentWord = $this->checkDictionary($this->prefixMEtoNull($input))) {

			return $this->currentWord;
		}  else
		if ($this->currentWord = $this->checkDictionary($this->prefixKEtoNull($input))) {

			return $this->currentWord;
		} 
	} 
	public function doSuffix($input)
	{
		if ($this->currentWord = $this->checkDictionary($this->suffixNAtoNull($input))) {

			return $this->currentWord;
		} else
		if ($this->currentWord = $this->checkDictionary($this->suffixANtoNull($input))) {

			return $this->currentWord;
		} else
		if ($this->currentWord = $this->checkDictionary($this->suffixNItoNull($input))) {

			return $this->currentWord;
		} else
		if ($this->currentWord = $this->checkDictionary($this->suffixItoNull($input))) {

			return $this->currentWord;
		}
	}


	public function checkStrip($word)
	{
		$matches  = null;
		$contains = preg_match('/^(.*)-(.*)$/', $word, $matches);

		if ($contains === 1) {
			return $matches;
		} 
	}
	public function doStem($input)
	{
		$this->isFound = false;
		$this->originalWord = $input;

		if ($this->checkDictionary($this->originalWord)) {
			return $this->originalWord;
		}

		if ($matches = $this->checkStrip($input)) {
			if ($this->currentWord = $this->checkDictionary($matches[1])) {

				return $this->currentWord;
			}

			if ($prefixedWord = $this->doPrefix($matches[1])) {
				return $prefixedWord;
			} 
		} else

		//prefix
		if ($prefixedWord = $this->doPrefix($input)) {
			return $prefixedWord;
		} else
		//suffix
		if ($suffixedWord = $this->doSuffix($input)) {
			return $suffixedWord;
		} else
		
		//infix
		if ($this->currentWord = $this->checkDictionary($this->infixEMtoNull($input))) {

			return $this->currentWord;
		} else
		
		if ($matches = $this->konfix($input)) {
			//prefix konfix
			if ($prefixedWord = $this->doPrefix($matches[1] . $matches[2])) {
				return $prefixedWord;
			}
			else
			//suffix konfix
				if ($prefixedWord = $this->doPrefix($matches[2] . $matches[3])) {
					return $prefixedWord;

				}
			}

			return $this->currentWord = $this->originalWord;
		}

		public function checkDictionary($word)
		{
			if (isset($this->dictionary[$word])) {
				$this->isFound = true;
				return $word;
			}
			return isset($this->dictionary[$word]) ? $word : false;
		}






	}