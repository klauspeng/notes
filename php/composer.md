# composer笔记
## [官网](http://www.phpcomposer.com/)

## 简介
依赖管理，不是包管理器  
声明依赖关系： 创建composer.json的文件  
```json
{
    "require": {
        "monolog/monolog": "1.2.*"
    }
}
```
运行`composer install`即可  
![](http://ww1.sinaimg.cn/large/80eaa069ly1feys13n8epj20ti096tda.jpg)
目录结构：  
![](http://ww1.sinaimg.cn/large/80eaa069ly1feys4g5jrmj20hg0fm75a.jpg)

## 自动加载
除了库的下载，Composer 还准备了一个自动加载文件，它可以加载 Composer 下载的库中所有的类文件。  
使用它，你只需要将下面这行代码添加到你项目的引导文件中：
```php
require 'vendor/autoload.php';
```