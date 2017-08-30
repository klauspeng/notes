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