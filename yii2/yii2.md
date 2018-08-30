## yii源码分析

### 入口文件
```php
// 定义常量
defined('YII_DEBUG') or define('YII_DEBUG', false);
defined('YII_ENV') or define('YII_ENV', 'prod');

// 自动加载
require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../../vendor/yiisoft/yii2/Yii.php';
require __DIR__ . '/../../common/config/bootstrap.php';
require __DIR__ . '/../config/bootstrap.php';

// 合并配置
$config = yii\helpers\ArrayHelper::merge(
    require __DIR__ . '/../../common/config/main.php',
    require __DIR__ . '/../../common/config/main-local.php',
    require __DIR__ . '/../config/main.php',
    require __DIR__ . '/../config/main-local.php'
);

// 初始化应用
(new yii\web\Application($config))->run();
```
### 初始化应用

`yii\web\Application`继承自`\yii\base\Application` 先看构造函数
```php
public function __construct($config = [])
{
    Yii::$app = $this;
    // 设置应用
    static::setInstance($this);

    // 设置应用状态
    $this->state = self::STATE_BEGIN;

    // 预初始化应用（应用路径、缓存路径、时区、容器、组件等）
    $this->preInit($config);

    // 注册错误处理方法
    $this->registerErrorHandler($config);

    // 只是初始化配置
    Component::__construct($config);
}
```

### run方法
```php
public function run()
{
    try {
        $this->state = self::STATE_BEFORE_REQUEST;
        // 触发请求前事件
        $this->trigger(self::EVENT_BEFORE_REQUEST);

        $this->state = self::STATE_HANDLING_REQUEST;
        $response = $this->handleRequest($this->getRequest());

        $this->state = self::STATE_AFTER_REQUEST;
        // 触发请求后事件
        $this->trigger(self::EVENT_AFTER_REQUEST);

        $this->state = self::STATE_SENDING_RESPONSE;
        $response->send();

        $this->state = self::STATE_END;

        return $response->exitStatus;
    } catch (ExitException $e) {
        $this->end($e->statusCode, isset($response) ? $response : null);
        return $e->statusCode;
    }
}
```