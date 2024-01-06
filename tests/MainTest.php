<?php

namespace tests;

use PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
	public function testValidParenthesis(): void
	{

		$this->assertTrue(isParenthesisValid('Hello there'));
		$this->assertTrue(isParenthesisValid('Hello (there)'));
		$this->assertTrue(isParenthesisValid('Hello (th[e]re)'));
		$this->assertTrue(isParenthesisValid('<Hello (th[e]re)>'));
	}

	public function testInvalidParenthesis(): void
	{
		$this->assertFalse(isParenthesisValid('Hello (there'));
		$this->assertFalse(isParenthesisValid('Hello )there('));
		$this->assertFalse(isParenthesisValid('Hello (th[ere)'));
		$this->assertFalse(isParenthesisValid('Hello (th[e)re]'));
		$this->assertFalse(isParenthesisValid('Hello (th[ere)>'));
		$this->assertFalse(isParenthesisValid('Hello (th[e<)re]>'));
	}

	public function testEmptyInputException(): void
	{
		$this->expectException(\InvalidArgumentException::class);
		$this->expectExceptionMessage("Input string is empty");
		isParenthesisValid('');
	}
}