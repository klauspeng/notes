# Redis学习笔记
## windows注册成服务
> redis-server.exe --service-install redis.6380.conf --service-name redis6380 --port 6380

##　客户端按端口连接
> redis-cli.exe -p 6380

## 数据类型
### 字符串String
1. 二进制安全的，string可以包含任何数据。比如jpg图片或者序列化的对象 。
2. 一个键最大能存储512MB

### Hash（哈希）
1. Redis hash是一个string类型的field和value的映射表，hash特别适合用于存储对象。
2. 每个 hash 可以存储 2^32 -1 键值对（40多亿）。
3. 命令如下：  
![redis hash](http://ww1.sinaimg.cn/large/80eaa069ly1feqv33tysbj20fn07vdge.jpg)
