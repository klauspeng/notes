# Modern PHP笔记

## 第一部分 语言特性
### 命名空间
> 作用是按照一种虚拟的层次结构组织PHP代码，类似文件系统中的目录结构
> 主要解决命名冲突

#### 声明：
第一行,namespace,用\来声明子命名空间  
```php
<?php
namespace Klaus\ModernPHP;
```
#### 导入和别名：
```php
<?php
use Klaus\ModernPHP [as mp];
```

#### 全局命名空间
在命名空间中使用全局函数，用\前缀，提升效率

#### 接口
灵活，委托别人实现细节

#### 性状trait
#### 生成器
#### 闭包
就是匿名函数，对象

## 良好实践
### 标准
#### PHP-FIG
实现框架的互操作性  
接口、自动加载、风格 
 
1. PSR-1:基本代码风格
2. PSR-2:严格的代码风格
3. PSR-3:日志记录接口
4. PSR-4:自动加载






<style>
.markdown-body{font-family: "Microsoft YaHei";}
.markdown-body h1{text-align: center;}
.markdown-body h3{font-weight:normal;color:blue;}
.markdown-body h4{font-weight:normal;color:dodgerblue ;}
</style>