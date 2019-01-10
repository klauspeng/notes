<?php

//连接本地的 Redis 服务
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
echo "Connection to server sucessfully",'<br>';

//查看服务是否运行
echo "Server is running: " . $redis->ping(),'<hr>';

//Redis PHP List(列表) 实例
$redis->lpush("database-list", "Redis");
$redis->lpush("database-list", "Mongodb");
$redis->lpush("database-list", "Mysql");
// 获取存储的数据并输出
$arList = $redis->lrange("database-list", 0 ,5);
echo "Stored string in redis",'<br>';
var_dump($arList);

echo '<hr>';
//Redis PHP Keys 实例

// 获取数据并输出
$arList = $redis->keys("*");
echo "Stored keys in redis: ",'<br>';
var_dump($arList);