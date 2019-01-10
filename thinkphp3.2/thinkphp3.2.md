# thinkphp3.2学习笔记

## 目录安全文件设置
```php
define('DIR_SECURE_FILENAME', 'default.html');//更改默认index.html
define('BUILD_DIR_SECURE', false);//关闭
```
## 命名规范
- 类文件都是以.class.php为后缀（这里是指的ThinkPHP内部使用的类库文件，不代表外部加载的类库文件），使用驼峰法命名，并且首字母大写，例如 - DbMysql.class.php；
- 类的命名空间地址和所在的路径地址一致，例如 Home\Controller\UserController类所在的路径应该是 Application/Home/Controller/UserController.- class.php；
- 确保文件的命名和调用大小写一致，是由于在类Unix系统上面，对大小写是敏感的（而ThinkPHP在调试模式下面，即使在Windows平台也会严格检查大小写- ）；
- 类名和文件名一致（包括上面说的大小写一致），例如 UserController类的文件命名是UserController.class.php， InfoModel类的文件名是InfoModel.- class.php， 并且不同的类库的类命名有一定的规范；
- 函数、配置文件等其他类库文件之外的一般是以.php为后缀（第三方引入的不做要求）；
- 函数的命名使用小写字母和下划线的方式，例如 get_client_ip；
- 方法的命名使用驼峰法，并且首字母小写或者使用下划线“_”，例如 getUserName，_parseType，通常下划线开头的方法属于私有方法；
- 属性的命名使用驼峰法，并且首字母小写或者使用下划线“_”，例如 tableName、_instance，通常下划线开头的属性属于私有属性；
- 以双下划线“__”打头的函数或方法作为魔法方法，例如 __call 和 __autoload；
- 常量以大写字母和下划线命名，例如 HAS_ONE和 MANY_TO_MANY；
- 配置参数以大写字母和下划线命名，例如HTML_CACHE_ON；
- 语言变量以大写字母和下划线命名，例如MY_LANG，以下划线打头的语言变量通常用于系统语言变量，例如 _CLASS_NOT_EXIST_；
- 对变量的命名没有强制的规范，可以根据团队规范来进行；
- ThinkPHP的模板文件默认是以.html 为后缀（可以通过配置修改）；
- 数据表和字段采用小写加下划线方式命名，并注意字段名不要以下划线开头，例如 think_user 表和 user_name字段是正确写法，类似 _username - 这样的数据表字段可能会被过滤。

## 配置
### 加载顺序
惯例配置->应用配置->模式配置->调试配置->状态配置->模块配置->扩展配置->动态配置
### 读取
C('参数名称')//config
__配置参数名称中不能含有 “.” 和特殊字符，允许字母、数字和下划线。__

### 动态配置
C('参数名称','新的参数值');
__动态配置赋值仅对当前请求有效，不会对以后的请求造成影响。__

## 架构

### 自动生成controler
```php
\Think\Build::buildController('Admin','Role');
```
### 命名空间
#### 实例化PHP内置的类库或者第三方的没有使用命名空间定义的类，需要采用下面的方式：
```php
$class =    new \stdClass();
$sxml  =    new \SimpleXmlElement($xmlstr);
```
#### 注册新的命名空间
```php
'AUTOLOAD_NAMESPACE' => array(
    'My'     => THINK_PATH.'My',
    'One'    => THINK_PATH.'One',
)
```
如果命名空间不在Library目录下面，并且没有定义对应的AUTOLOAD_NAMESPACE参数的话，
则会当作模块的命名空间进行自动加载:
```php
new Home\Model\UserModel();
Application/Home/Model/UserModel.class.php
```
### 伪静态
```php
'URL_HTML_SUFFIX' => 'html|shtml|xml'
```

### URL生成
U('地址表达式',['参数'],['伪静态后缀'],['显示域名'])

### 获取输入变量（Input）
I('变量类型.变量名',['默认值'],['过滤方法'],['额外数据源'])
系统默认的变量过滤机制:'htmlspecialchars'

### 判断请求类型
- IS_GET => 判断是否是GET方式提交
- IS_POST => 判断是否是POST方式提交
- IS_PUT => 判断是否是PUT方式提交
- IS_DELETE => 判断是否是DELETE方式提交
- IS_AJAX => 判断是否是AJAX提交
- REQUEST_METHOD => 当前提交类型

### 空操作
> 是指系统在找不到请求的操作方法的时候，会定位到空操作（_empty）方法来执行，利用这个机制，我们可以实现错误页面和一些URL的优化。

### 空控制器
> 是指当系统找不到请求的控制器名称的时候，系统会尝试定位空控制器(EmptyController)，利用这个机制我们可以用来定制错误页面和进行URL的优化。

### 页面trace
'SHOW_PAGE_TRACE' =>true,

## 定义默认模块
define('BIND_MODULE', 'Home');
ThinkPHP/Library/Behavior/ShowPageTraceBehavior.class.php





<style>
    strong{color: red;}
</style>