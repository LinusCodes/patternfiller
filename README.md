# patternfiller

Patternfiller is a class, that allows you to replace placeholders in a patterntext with data.

Example:
```php
require_once __DIR__.'/vendor/linus-codes/patternfiller/src/PatternFiller.php';
use LinusCodes\patternfiller\PatternFiller;

$regex = '/\[\(\$(.*?)\)\]/';

$one = 'Name: [($name)]<br>Parts:<br><div style="display:flex; flex-direction:column;">[($partsArray)]</div>Year: [($year)]';
$json = '{
    "name": "Linus",
    "partsArray": [
        {
            "format": "<div><div style=\"float: left; padding: 5px; width:80px; height:20px; background:rgb(220, 220, 220);\">[($number)]</div><div style=\"float:left; padding: 5px; width:80px; height:20px; background: rgb(190,190,190);\">[($partname)]</div><div style=\"float: left; padding: 5px; width:80px; height:20px; background:rgb(220, 220, 220);\">[($partprice)]</div></div>",
            "number": "123456",
            "partname": "Something",
            "partprice": "4,50$"
        },
        {
            "format": "<div><div style=\"float: left; padding: 5px; width:80px; height:20px; background:rgb(220, 220, 220);\">[($number)]</div><div style=\"float:left; padding: 5px; width:80px; height:20px; background: rgb(190,190,190);\">[($partname)]</div><div style=\"float: left; padding: 5px; width:80px; height:20px; background:rgb(220, 220, 220);\">[($partprice)]</div></div>",
            "number": "101112",
            "partname": "Anything",
            "partprice": "12,20$"
        }
    ],
    "year": "2023"
}';

$filler = new PatternFiller();
echo $filler->replacePlaceholder($one, json_decode($json, true), '/\[\(\$(.*?)\)\]/');
```


Installation
```bash
composer require linus-codes/patternfiller
```

