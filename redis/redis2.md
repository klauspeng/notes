# phpredis扩展

## 目录
- [连接](#连接)
- [服务端](#服务端)
- [字符串](#字符串)
- [哈希](#哈希)
- [列表](#列表)

## 连接

方法 | 说明 | 例子 
---|---|---
connect, open | 连接到一个redis实例 | `$redis->connect('127.0.0.1', 6379);`
pconnect, popen | 长连接 | `$redis->pconnect('127.0.0.1', 6379);`
auth | 认证/密码 | `$redis->auth('foobared');`
select | 选择数据库 | `$redis->select(0);`
close | 关闭链接 | `$redis->close();`
setOption | 设置客户端选项 | `$redis->setOption(Redis::OPT_SERIALIZER, Redis::SERIALIZER_NONE);`
getOption | 获取选项 | `$redis->getOption(Redis::OPT_SERIALIZER);`
ping | 检查当前连接状态 | `$redis->ping(); //+PONG` 
echo | 将字符串发送到Redis，这回答相同的字符串 | 不明白作用……试了下，返回但不存储


## 服务端
方法 | 说明 | 例子 
---|---|---
bgRewriteAOF | 异步重写只附加文件 | `$redis->bgRewriteAOF();`
bgSave | 异步地把数据集保存到磁盘 | `$redis->bgSave();`
config | 获取或设置Redis服务器配置参数。| `$redis->config("GET", "*max-*-entries*");` <br> `$redis->config("SET", "dir", "/var/run/redis/dumps/");`
dbSize | 返回选定数据库的键的数目 | `$count = $redis->dbSize();`<br> `echo "Redis has $count keys\n";`
flushAll | 删除所有数据库中所有键 | `$redis->flushAll();`
flushDb | 清空当前库| `$redis->flushDb();`
info | 获取数据库的信息 | `$redis->info();`
lastSave | 返回最后一个磁盘保存的时间戳 | `$redis->lastSave();`
resetStat | 重置信息方法返回的统计信息 | `$redis->resetStat();`
save | 同步保存数据集到磁盘 | `$redis->save();`
slaveOf | 更改从属状态 | 开始`$redis->slaveOf('10.0.1.7', 6379);`<br>停止`$redis->slaveOf();`
time | 返回当前服务器时间 | `$redis->time();`
slowLog | 获取redis日志 |`$redis->slowLog('get', 10);`

## 字符串
方法 | 说明 | 例子 
---|---|---
get | 获取与指定键相关的值 | `$redis->get('key');`
set | 设置key的值 | `$redis->set('key','value', 10);`
setEx, pSetEx | 设置值并设置有效时间 秒/毫秒 | `$redis->setEx('key', 3600, 'value');// 1h`  <br> `$redis->pSetEx('key', 100, 'value');// 0.1s` 
setNx | 不存在key则设置值 | `$redis->setNx('key', 'value');`
del, delete | 删除键 | `$redis->delete('key1', 'key2');`
exists | 键是否存在 | `$redis->exists('key');`
incr, incrBy | 递增 | `$redis->incr('key1');`<br>`$redis->incrBy('key1', 10);`
incrByFloat | 以浮点递增 | `$redis->incrByFloat('key1', 1.5);`
decr, decrBy | 递减 | `$redis->decr('key1');` <br> `$redis->decrBy('key1', 10);`
mGet, getMultiple | 批量获取值 | `$redis->mGet(array('key1', 'key2', 'key3'));`
getSet | 设置一个值，并返回该键上的前一个值 | `$redis->getSet('x', 'lol');`
randomKey | 返回随机key | `$key = $redis->randomKey();`
move | 将键移动到不同的数据库 | `$redis->move('x', 1);`
rename, renameKey | 重命名 | `$redis->rename('x', 'y');`
renameNx | 存在即重命名
expire, setTimeout, pexpire | 设置有效期 | `$redis->setTimeout('x', 3);`
expireAt, pexpireAt | 设置固定差事时间 | `$redis->expireAt('x', $now + 3);`
keys, getKeys | 获取匹配的key | `$redis->keys('user*');`
scan | 扫描按键的空间 
append | 追加到值 | `$redis->append('key', 'value2');`

## 哈希
方法 | 说明 | 例子 
---|---|---
hset | 增加到hash | `$redis->hSet('h', 'key1', 'hello');`
hSetNx | 不存在则增加
hGet | 获取
hLen | hash的数量 | `$redis->hLen('h');`
hDel | 删除hash中key,可多个
hKeys | 返回hash中所有key | `$redis->hKeys('h')`
hVals | 返回hash中所有值 | `$redis->hVals('h')`
hGetAll | 获取整个hash，返回数组 | `$redis->hGetAll('h')`
hExists | key是否存在 | `$redis->hExists('h', 'a');`
hIncrBy | 递增hash中指定key的值 | `$redis->hIncrBy('h', 'x', 2);`
hIncrByFloat | 递增hash中指定key的值,浮点型 | `$redis->hIncrByFloat('h','x', 1.5);`
hMSet | 批量增加 | `$redis->hMSet('user:1', array('name' => 'Joe', 'salary' => 2000));`
hMGet | 批量获取 | `$redis->hMGet('h', array('field1', 'field2'));`
hScan | 扫描 
hStrLen | 获取字符串长度

```php
public function hash()
{
    // 实例化Redis,并连接
    $redis = new \Redis();
    $redis->connect('192.168.100.77', 6379);

    $hashName = 'hash';

    // 创建hash
    $redis->hset($hashName,'a',1);
    $redis->hSetNx($hashName,'b',2);
    $redis->hSetNx($hashName,'c',3);
    $redis->hSetNx($hashName,'d',4);

    // 获取所有
    dump($redis->hGetAll($hashName));

    // 获取值
    dump('hash中b的值：'.$redis->hget($hashName,'b'));

    // 获取长度
    dump('hash长度：'.$redis->hLen($hashName));

    // 删除
    $redis->hDel($hashName,'a');
    echo('删除a后：');
    dump($redis->hGetAll($hashName));

    // e是否存在
    echo 'e是否存在';
    dump($redis->hExists($hashName,'e'));
    echo 'b是否存在';
    dump($redis->hExists($hashName,'b'));

    // 批量添加
    $redis->hMset($hashName,['e'=>5,'f'=>6,'g'=>7]);
    dump($redis->hGetAll($hashName));

    // 批量获取
    dump($redis->hMGet($hashName,['b','d','g']));

}
```

## 列表
