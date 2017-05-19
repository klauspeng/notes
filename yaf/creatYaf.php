<?php
/**
 * Created by Klaus.
 * Date: 2017/5/19
 * Time: 14:52
 */

$path = __DIR__ . '/';

// 公共文件夹
makeDir('public');

// 入口文件
write('public/index.php', <<<'EOF'
<?php
define("APP_PATH",  realpath(dirname(__FILE__) . '/../')); /* 指向public的上一级 */
$app  = new Yaf_Application(APP_PATH . "/conf/application.ini");
$app->run();
EOF
);
// 重写规则
write('public/.htaccess', <<<'EOF'
#.htaccess, 当然也可以写在httpd.conf
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule .* index.php
EOF
);


// 配置
makeDir('conf');

write('conf/application.ini', <<<'EOF'
[product]
;支持直接写PHP中的已定义常量
application.directory=APP_PATH "/application/" 
EOF
);


// 应用目录
makeDir('application');
// 控制器
makeDir('application/controllers');
// 默认控制器
write('application/controllers/Index.php', <<<'EOF'
<?php
class IndexController extends Yaf_Controller_Abstract {
   public function indexAction() {//默认Action
       $this->getView()->assign("content", "Hello World");
   }
}
?>
EOF
);

// 视图
makeDir('application/views');

// 默认Action的视图
makeDir('application/views/index');
write('application/views/index/index.phtml', <<<'EOF'
<html>
 <head>
   <title>Hello World</title>
 </head>
 <body>
  <?php echo $content;?>
 </body>
</html>
EOF
);

// 模块
makeDir('application/modules');
// 本地类库
makeDir('application/library');
// 模型
makeDir('application/models');
// 插件目录
makeDir('application/plugins');


/**
 * 创建目录
 *
 * @param $dir 目录
 */
function makeDir($dir)
{
    global $path;
    mkdir($path . $dir);
}


/**
 * 创建文件并写入内容
 *
 * @param $file    文件路径
 * @param $content 内容
 */
function write($file, $content)
{
    global $path;
    $myfile = fopen($path.$file, "w") or die("Unable to open file!");
    if ($content)
    {
        fwrite($myfile, $content);
    }
    fclose($myfile);
}



