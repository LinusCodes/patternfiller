# patternfiller

Patternfiller is a class, that allows you to replace placeholders in a patterntext with data.

### Example:
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

In this example a placeholder is defined with '[($' at start and ')]' at the end. The text between is the name of the placeholder. It gets used to select the data which should be inserted. You can define your own Placeholdes by providing a fitting regular expression.

You can also define an array for a placeholder as shown in:
```json
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
    ]
```

In format you can choose a pattern for each element in the array. The Class does also allow arrays in arrays in arrays in array in...

### Use of function replacePlaceholder()
```php
$patternFiller->replacePlaceholder(string $origin, array $data, string $regex);
```
-$origin expects the pattern-text with placeholders
-$data expects an array of the needed data to fill the placeholders. Make shure both array keyvalues and placeholders are named correctly
-$regex expects a regular expression to mark placeholders as such

Placeholders with the same name will get the same value.



### Installation
```bash
composer require linus-codes/patternfiller
```

