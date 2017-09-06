# TP5笔记
## 开启页面trace
config.php

```php
// 应用Trace
'app_trace' => true,//默认false
```

## PDO持久连接
database.php

```php
// 数据库连接参数
'params'          => [
    // 持久化连接
    \PDO::ATTR_PERSISTENT => true,
],
```


## parse_ini_file
```php
array parse_ini_file ( string $filename [, bool $process_sections = false] )
parse_ini_file() 载入一个由 filename 指定的 ini 文件，并将其中的设置作为一个联合数组返回。
```
1. 第二个参数`$process_sections`为`true`返回多维数组
2. 能解析常量
3. 多维数组示例
```ini
[third_section]
phpversion[] = "5.0"
phpversion[] = "5.1"
phpversion[] = "5.2"
phpversion[] = "5.3"
```