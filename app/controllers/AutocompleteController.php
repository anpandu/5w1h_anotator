<?php

class AutocompleteController extends \BaseController {

	
	public function getAutocomplete($article_id)
	{
		$article = Article::find($article_id);
		$text_autocomplete = $article["text_autocomplete"];
		$text_autocomplete = str_replace("\n", " ", $text_autocomplete); // !!!
		$word_array = explode(" ", $text_autocomplete);

		$input = Input::get('term', 'a') . "";
		$suggestions = $this->getSuggestion($input, $word_array);
		$res = [];
		foreach ($suggestions as $key => $suggestion) {
			$item = new stdClass();
			$item->id = $key;
			$item->value = $suggestion;	
			$item->label = $suggestion;			
			$res[$key] = $item;
		}

		return json_encode($res);
	}

	private function getSuggestion($_input, $_word_arr) {
		$result = [];
		$n_word = count(explode(" ", $_input));

		$word_array = $this->transformWordArray($_word_arr, $n_word);
		for ($i=0; $i < count($word_array) ; $i++) { 
			$value = $word_array[$i];
			if (stripos($value, $_input)===0)
				if (!in_array($value, $result))
					if (strcasecmp($value, $_input))
						$result[] = $value;
		}

		return $result;
	}

	private function transformWordArray($_word_arr, $_n) {
		$result = [];
		if ($_n==1) {
			return $_word_arr;
		} else {
			for ($i=0; $i<count($_word_arr)-$_n+1; $i++) { 
				$temp = [];
				for ($j=0; $j<$_n; $j++) { 
					$temp[] = $_word_arr[$i + $j];
				}
				$result[] = implode(" ", $temp);
			}
		}
		return $result;
	}


}
