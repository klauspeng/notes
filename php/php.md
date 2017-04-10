# php整理
## 三元运算符
```php
$output = $value ? $value : 'No value set.';  
//可简化成  
$output = $value ?: 'No value set.';
```
同理
```php
$value = $value . $other_value;
//可简化
$value .= $other_value;
```