<?php
use PHPUnit\Framework\TestCase;

#mdx:h use
use FlSouto\HtCklist;

#mdx:h al
require("vendor/autoload.php");

/* 
# HtCklist

This library can be used to generate a multichoice field.
I recommend you take a look at the documentation of its parent classes in order to grasp all the inherited functionality:

- [HtChoice](https://github.com/flsouto/htchoice)
- [HtWidget](https://github.com/flsouto/htwidget)
- [HtField](https://github.com/flsouto/htfield)

## Installation

Via composer:

```
composer require flsouto/htcklist
```

*/
class HtCklistTest extends TestCase{

/*

## Usage

In the following example we generate a list which allows a user to pick multiple days of the week.

#mdx:Render

Outputs:

#mdx:Render -o httidy

**Notice**: the `options` method also accepts other formats besides an associative array. Take a look at the documentation of the [HtChoice](https://github.com/flsouto/htchoice#options-as-numeric-arrays) class in order to learn more.

*/
	function testRender(){
		#mdx:Render
		$select = new HtCklist("select_days");
		$select->options([1=>'Mon',2=>'Tue',3=>'Wed',4=>'Thu',5=>'Fri',6=>'Sat']);
		#/mdx echo $select
		$this->expectOutputRegex("/input.*?select_days.*?1.*?select_days.*?6.*?Sat/s");
		echo $select;
	}

/* 
## Changing the separator

By default, the separator used to separate the options is a `<br/>` element, that is, a line break. 
But you can change that by using the `separator` method. In the example below we change the separator to be two spaces so that the options are displayed horizontally:

#mdx:Separator

Outputs:

#mdx:Separator -o httidy

*/
	function testSeparator(){
		#mdx:Separator
		$select = new HtCklist("select_days");
		$select->options([1=>'Mon',2=>'Tue',3=>'Wed',4=>'Thu',5=>'Fri',6=>'Sat'])
			->separator("&nbsp;&nbsp;");

		#/mdx echo $select
		$this->expectOutputRegex("/input.*?select_days.*?Mon.*?".preg_quote('&nbsp;&nbsp;').".*?Tue/s");
		echo $select;		
	}

/*
## Selecting options

If you have read the documentation of the `HtField` and the `HtWidget` parent classes you already know that you are supposed
to use the `context` method in order to populate the value of a field/widget. In this case, you have to pass an array with the values
of the options you want to be checked when the field is displayed:

#mdx:SelectedOption

Outputs:

#mdx:SelectedOption -o httidy
*/
	function testSelectedOption(){
		#mdx:SelectedOption
		$select = new HtCklist("select_days");
		$select->options([1=>'Mon',2=>'Tue',3=>'Wed',4=>'Thu',5=>'Fri',6=>'Sat']);
		$select->context(['select_days'=>[2,5]]); // check Tue and Fri
		#/mdx echo $select
		$this->expectOutputRegex("/input.*?2.*checked.*?input.*?5.*?checked/s");
		echo $select;
	}

}