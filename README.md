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



## Usage

In the following example we generate a list which allows a user to pick multiple days of the week.

```php
<?php
use FlSouto\HtCklist;
require("vendor/autoload.php");

$select = new HtCklist("select_days");
$select->options([1=>'Mon',2=>'Tue',3=>'Wed',4=>'Thu',5=>'Fri',6=>'Sat']);

echo $select;
```

Outputs:

```html

<div class="widget 58cf20cba6cf5" style="display:block">
 <label>
 <input type="checkbox" name="select_days[]" value="1" />Mon</label>
 <br />
 <label>
 <input type="checkbox" name="select_days[]" value="2" />Tue</label>
 <br />
 <label>
 <input type="checkbox" name="select_days[]" value="3" />Wed</label>
 <br />
 <label>
 <input type="checkbox" name="select_days[]" value="4" />Thu</label>
 <br />
 <label>
 <input type="checkbox" name="select_days[]" value="5" />Fri</label>
 <br />
 <label>
 <input type="checkbox" name="select_days[]" value="6" />Sat</label>
 <br />
 <input type="hidden" name="select_days_submit" value="1" />
 <div style="color:yellow;background:red" class="error">
 </div>
</div>

```

**Notice**: the `options` method also accepts other formats besides an associative array. Take a look at the documentation of the [HtChoice](https://github.com/flsouto/htchoice#options-as-numeric-arrays) class in order to learn more.


## Changing the separator

By default, the separator used to separate the options is a `<br/>` element, that is, a line break. 
But you can change that by using the `separator` method. In the example below we change the separator to be two spaces so that the options are displayed horizontally:

```php
<?php
use FlSouto\HtCklist;
require("vendor/autoload.php");

$select = new HtCklist("select_days");
$select->options([1=>'Mon',2=>'Tue',3=>'Wed',4=>'Thu',5=>'Fri',6=>'Sat'])
	->separator("&nbsp;&nbsp;");

echo $select;
```

Outputs:

```html

<div class="widget 58cf20cba8e2c" style="display:block">
 <label>
 <input type="checkbox" name="select_days[]" value="1" />Mon</label>
 &nbsp;&nbsp;
 <label>
 <input type="checkbox" name="select_days[]" value="2" />Tue</label>
 &nbsp;&nbsp;
 <label>
 <input type="checkbox" name="select_days[]" value="3" />Wed</label>
 &nbsp;&nbsp;
 <label>
 <input type="checkbox" name="select_days[]" value="4" />Thu</label>
 &nbsp;&nbsp;
 <label>
 <input type="checkbox" name="select_days[]" value="5" />Fri</label>
 &nbsp;&nbsp;
 <label>
 <input type="checkbox" name="select_days[]" value="6" />Sat</label>
 &nbsp;&nbsp;
 <input type="hidden" name="select_days_submit" value="1" />
 <div style="color:yellow;background:red" class="error">
 </div>
</div>

```


## Selecting options

If you have read the documentation of the `HtField` and the `HtWidget` parent classes you already know that you are supposed
to use the `context` method in order to populate the value of a field/widget. In this case, you have to pass an array with the values
of the options you want to be checked when the field is displayed:

```php
<?php
use FlSouto\HtCklist;
require("vendor/autoload.php");

$select = new HtCklist("select_days");
$select->options([1=>'Mon',2=>'Tue',3=>'Wed',4=>'Thu',5=>'Fri',6=>'Sat']);
$select->context(['select_days'=>[2,5]]); // check Tue and Fri

echo $select;
```

Outputs:

```html

<div class="widget 58cf20cba984c" style="display:block">
 <label>
 <input type="checkbox" name="select_days[]" value="1" />Mon</label>
 <br />
 <label>
 <input type="checkbox" name="select_days[]" value="2" checked="checked" />Tue</label>
 <br />
 <label>
 <input type="checkbox" name="select_days[]" value="3" />Wed</label>
 <br />
 <label>
 <input type="checkbox" name="select_days[]" value="4" />Thu</label>
 <br />
 <label>
 <input type="checkbox" name="select_days[]" value="5" checked="checked" />Fri</label>
 <br />
 <label>
 <input type="checkbox" name="select_days[]" value="6" />Sat</label>
 <br />
 <input type="hidden" name="select_days_submit" value="1" />
 <div style="color:yellow;background:red" class="error">
 </div>
</div>

```