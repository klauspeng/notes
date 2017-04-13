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
## isset() empty()
### isset()检测变量是否设置
1. 若变量存在且值不为NULL，则返回 TURE 
2. 同时检查多个变量时，每个单项都符合上一条要求时才返回 TRUE，否则结果为 FALSE 
3. 检测常量是否已设置可使用 defined() 函数
### empty()检查一个变量是否为空 
1. 若变量不存在则返回 TRUE 
2. 若变量存在且其值为""、0、"0"、NULL、、FALSE、array()、var $var; 以及没有任何属性的对象，则返回 TURE 
3. 若变量存在且值不为""、0、"0"、NULL、、FALSE、array()、var $var; 以及没有任何属性的对象，则返回 FALSE 
### 二者区别
empty()和isset()的处理对象无外乎未定义变量，0，空字符串。  

1. 如果变量为0，则empty()会返回TRUE，isset()会返回TRUE； 
2. 如果变量为空字符串，则empty()会返回TRUE，isset()会返回TRUE； 
3. 如果变量未定义，则empty()会返回TRUE，isset()会返回FLASE； 

## echo(),print(),print_r()的区别
1. echo是PHP语句（速度相对会快）, print和print_r是函数,语句没有返回值,函数可以有返回值(即便没有用)  
2. print只能打印出简单类型变量的值(如int,string)  
3. print_r可以打印出复杂类型变量的值(如数组,对象)  
4. echo -- 输出一个或者多个字符串

## session与cookie区别
session与cookie的区别?
1. session:储存用户访问的全局唯一变量,存储在服务器上的php指定的目录中的（session_dir）的位置进行的存放
2. cookie:用来存储连续访问一个页面时所使用，是存储在客户端，对于Cookie来说是存储在用户WIN的Temp目录中的。 
3. 两者都可通过时间来设置时间长短

## 写出 SQL语句的格式 : 插入 ，更新 ，删除
1. insert into user values (2,"pthlp","1990-12-03 00:00:00");
2. update user set birth=now() where name = 'lp';
3. delete from user where name = 'lp';

## 遍历一个文件夹下的所有文件和子文件夹
```php
function read_all_dir( $dir ){
    $result = array();
    $handle = opendir($dir);
    if ( $handle ){
        while ( ( $file = readdir($handle)) !== false ){
            if ( $file != '.' && $file != '..'){
                $cur_path = $dir . DIRECTORY_SEPARATOR . $file;
                if ( is_dir ( $cur_path ) ){
                    $result['dir'][$cur_path] = read_all_dir ( $cur_path );//递归
                }else{
                    $result['file'][] = $cur_path;
                }
            }
        }
        closedir($handle);
    }
    return $result;
}
```

## php 通过url 读取网页内容 
- 方法1
```php
$text = file_get_contents($URL);
```
- 方法2、
```php
//获得url地址的网页内容
function get_URL($url){
	$ch = curl_init();
	$timeout = 5; 
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$file_contents = curl_exec($ch);
	curl_close($ch);
	return $file_contents;
}
$text =  get_URL($URL);
```
- 方法3
```php
$handle = fopen("http://s.jb51.net", "rb"); 
$contents = stream_get_contents($handle); 
fclose($handle); 
echo $contents; 
```

## 用户表与登录表分开的好处?
1. 面向象面考虑,用户信息用户用户名密码进门钥匙
2. 性能面考虑,数据检索候列少要快些且密码东西登录进没用,用户经常登录，但个人信息相对会少更改查看
3. 安全性考虑，模块查询用户信息直接密码带容易现恶意操作

## 缓存，问了memcache与redis的区别，redis的优势之处。怎样解决memcache命中率低的问题，问了在实际项目中memcache命中率。是否部署过redis服务器。
