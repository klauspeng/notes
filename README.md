# notes
学习笔记整理
>   https://github.com / 你的用户名 / 你的项目名 / raw / 分支名 / 存放图片的文件夹 / 该文件夹下的图片
![测试图片](https://github.com/klauspeng/notes/raw/master/img/test.png)

php笔记：[php](https://github.com/klauspeng/notes/blob/master/php/php.md)

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
