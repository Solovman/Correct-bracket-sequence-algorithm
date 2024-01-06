<?php

function isParenthesisValid(string $input): bool
{
	$bracketsStack = [];
	$bracketPairs = [
		'(' => ')',
		'[' => ']',
		'{' => '}',
		'<' => '>',
	];

	$lenInput = strlen($input);

	for ($i = 0; $i < $lenInput; $i++)
	{
		$currentSymbol = $input[$i];

		if (isset($bracketPairs[$currentSymbol]))
		{
			$bracketsStack[] = $currentSymbol;
		}
		elseif (in_array($currentSymbol, $bracketPairs))
		{
			$lastOpened = array_pop($bracketsStack);

			if ($currentSymbol !== $bracketPairs[$lastOpened])
			{
				return false;
			}
		}
	}

	if (empty($input))
	{
		throw new InvalidArgumentException("Input string is empty");
	}

	return empty($bracketsStack);
}