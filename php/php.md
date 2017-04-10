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

## 运行时间统计示例
```php

/**
* Simple function to replicate PHP 5 behaviour
*/
function microtime_float()
{
list($usec, $sec) = explode(" ", microtime());
return ((float)$usec + (float)$sec);
}

$time_start = microtime_float();

// Sleep for a while
usleep(100);

$time_end = microtime_float();
$time = $time_end - $time_start;

echo "Did nothing in $time seconds\n";

```