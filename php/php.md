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
4. 通过设置session.use_trans_sid = 1，防止禁用cookie后session不能使用，会自动拼接session_id到href里面
5. 获取session_id用 session_id(); 方法

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


##有一对兔子，从出生后第3个月起每个月都生一对兔子，小兔子长到第三个月后每个月又生一对兔子，假如兔子都不死，问每个月的兔子总数为多少？
分析：兔子的规律为数列：1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144, ...
所以很明显兔子数量为[斐波那契数列](http://baike.baidu.com/item/%E6%96%90%E6%B3%A2%E9%82%A3%E5%A5%91%E6%95%B0%E5%88%97)，下面只需要用代码计算斐波那契数列即可。

```php
function Fibonacci($month)
{
  if ($month == 1 || $month == 2) {
    return 1;
  }else{
    return Fibonacci($month-1)+ Fibonacci($month - 2);
  }
}

for ($i=1; $i < 10; $i++) {
  echo '第',$i,'个月','兔子的个数',Fibonacci($i),';<br>';
}
```
## PHP实现四种基本排序算法
### 冒泡排序
思路分析：在要排序的一组数中，对当前还未排好的序列，从前往后对相邻的两个数依次进行比较和调整，让较大的数往下沉，较小的往上冒。即，每当两相邻的数比较后发现它们的排序与排序要求相反时，就将它们互换。
```php
$arr=array(1,43,54,62,21,66,32,78,36,76,39);
bubbleSort($arr);
//Array(1,21,32,36,39,43,54,62,66,76,78)
function bubbleSort($arr)
{
  $len=count($arr);
  //该层循环控制 需要冒泡的轮数
  for($i=1;$i<$len;$i++)
  { //该层循环用来控制每轮 冒出一个数 需要比较的次数
    for($k=0;$k<$len-$i;$k++)
    {
       if($arr[$k]>$arr[$k+1])
        {
            $tmp=$arr[$k+1];
            $arr[$k+1]=$arr[$k];
            $arr[$k]=$tmp;
        }
    }
  }
  return $arr;
}
```

### 选择排序
思路分析：在要排序的一组数中，选出最小的一个数与第一个位置的数交换。然后在剩下的数当中再找最小的与第二个位置的数交换，如此循环到倒数第二个数和最后一个数比较为止。
```php
function selectSort($arr) {
//双重循环完成，外层控制轮数，内层控制比较次数
 $len=count($arr);
    for($i=0; $i<$len-1; $i++) {
        //先假设最小的值的位置
        $p = $i;

        for($j=$i+1; $j<$len; $j++) {
            //$arr[$p] 是当前已知的最小值
            if($arr[$p] > $arr[$j]) {
            //比较，发现更小的,记录下最小值的位置；并且在下次比较时采用已知的最小值进行比较。
                $p = $j;
            }
        }
        //已经确定了当前的最小值的位置，保存到$p中。如果发现最小值的位置与当前假设的位置$i不同，则位置互换即可。
        if($p != $i) {
            $tmp = $arr[$p];
            $arr[$p] = $arr[$i];
            $arr[$i] = $tmp;
        }
    }
    //返回最终结果
    return $arr;
}
```

### 插入排序
思路分析：在要排序的一组数中，假设前面的数已经是排好顺序的，现在要把第n个数插到前面的有序数中，使得这n个数也是排好顺序的。如此反复循环，直到全部排好顺序。
```php
function insertSort($arr) {
    $len=count($arr);
    for($i=1, $i<$len; $i++) {
        $tmp = $arr[$i];
        //内层循环控制，比较并插入
        for($j=$i-1;$j>=0;$j--) {
            if($tmp < $arr[$j]) {
                //发现插入的元素要小，交换位置，将后边的元素与前面的元素互换
                $arr[$j+1] = $arr[$j];
                $arr[$j] = $tmp;
            } else {
                //如果碰到不需要移动的元素，由于是已经排序好是数组，则前面的就不需要再次比较了。
                break;
            }
        }
    }
    return $arr;
}
```

### 快速排序
思路分析：选择一个基准元素，通常选择第一个元素或者最后一个元素。通过一趟扫描，将待排序列分成两部分，一部分比基准元素小，一部分大于等于基准元素。此时基准元素在其排好序后的正确位置，然后再用同样的方法递归地排序划分的两部分。
```php
function quickSort($arr) {
    //先判断是否需要继续进行
    $length = count($arr);
    if($length <= 1) {
        return $arr;
    }
    //选择第一个元素作为基准
    $base_num = $arr[0];
    //遍历除了标尺外的所有元素，按照大小关系放入两个数组内
    //初始化两个数组
    $left_array = array();  //小于基准的
    $right_array = array();  //大于基准的
    for($i=1; $i<$length; $i++) {
        if($base_num > $arr[$i]) {
            //放入左边数组
            $left_array[] = $arr[$i];
        } else {
            //放入右边
            $right_array[] = $arr[$i];
        }
    }
    //再分别对左边和右边的数组进行相同的排序处理方式递归调用这个函数
    $left_array = quick_sort($left_array);
    $right_array = quick_sort($right_array);
    //合并
    return array_merge($left_array, array($base_num), $right_array);
}
```

## 两个路径预定义常量
separator：分隔符
### DIRECTORY_SEPARATOR
DIRECTORY_SEPARATOR：路径分隔符，linux上就是‘/'    windows上是‘\'
### PATH_SEPARATOR
PATH_SEPARATOR：include多个路径使用，在windows下，当你要include多个路径的话，你要用”;”隔开，但在linux下就使用”:”隔开的。
这2个常量的使用能够避免不同平台的兼容性问题

## 多维数组var_dump展示不全
[参考链接](http://blog.csdn.net/Merlin_feng/article/details/51733354)
在php.ini里的xdebug节点中，追加一下配置：
```ini
;最多孩子节点数
xdebug.var_display_max_children=128
;最大字节数
xdebug.var_display_max_data=512
;最大深度
xdebug.var_display_max_depth=5
```


### http分块输出
[参考链接](https://www.douban.com/note/330602704/)
```php
public function csv()
{
    $content = array("我是文章题目", "我是文章简介", "我是章节索引", "我是章节内容",);
    $buffer_size = 4096;
    foreach ($content as $c) {
        echo str_pad( "<p>$c</p>", $buffer_size);
        ob_flush();
        flush();
        sleep(1);                 //我们这里故意放慢节奏，等待一秒
    }
}
```
应用-csv大批量导出：

[参考链接](http://www.cnblogs.com/houdj/p/6492009.html)
```php
<?php
class CsvExport
{
    // 每次查询数量
    public $pre_count = 5000;
    // PHP文件句柄
    private $fp = null;

    /**
     * CsvExport constructor.
     *
     * @param $name 文件名字（默认数据导出）
     */
    public function __construct($name = '数据导出')
    {
        header("Content-type:application/vnd.ms-excel");
        header("Content-Disposition:filename=" . iconv("UTF-8", "GB18030", $name) . ".csv");

        // 打开PHP文件句柄
        $this->fp || $this->fp = fopen('php://output', 'a');

    }

    /**
     * 设置输出数据
     *
     * @param     $data              数组
     * @param int $isDoubleDimension 是否为二维数组（默认是）
     */
    public function setDate(array $data,$isDoubleDimension = 1)
    {
        if ($isDoubleDimension)
        {
            foreach ($data as $item)
            {
                $rows = array();
                foreach ($item as &$export_obj)
                {
                    $rows[] = iconv('utf-8', 'GB18030', $export_obj);
                }
                fputcsv($this->fp, $rows);
            }
            unset($export_data);
        }
        else
        {
            $rows = array();
            foreach ($data as &$d)
            {
                $rows[] = iconv('utf-8', 'GB18030', $d);
            }
            unset($d);
            fputcsv($this->fp, $rows);
        }

        // http分块输出
        ob_flush();
        flush();

    }
}
```

## PSR规范
这边文章说的比较好，[参考链接](http://www.cnblogs.com/x3d/p/php-psr-standards.html)

## 生成唯一ID
`md5(uniqid(md5(microtime(true)),true))`
[参考链接](http://blog.csdn.net/ghostyusheng/article/details/53788087)


## php-resque
[github传送门](https://github.com/chrisboulton/php-resque)
[php-resque使用](http://avnpc.com/pages/run-background-task-by-php-resque#toc8)

## PDO_Mysql
1. 数据库抽象层 PDO
2. 111