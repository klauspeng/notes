# 增
```sql
insert into liuyan values (1,'a','aa',''),(10,'b','bb','');
INSERTINTO tbl_name (col1,col2) VALUES(15,col1*2);
insertinto worker set name=’tom’;
```
在 SET 子句中未命名的行都赋予一个缺省值，使用这种形式的 INSERT 语句不能插入多行。


# 删
> delete from liuyan where id = '1';

# 改
> update liuyan set content = 'cc' where id = '1';

# 查
> select * from liuyan;

# 导出：
> cmd  
> mysqldump -h localhost -u root -p ckd>d:\lp.sql  
> mysqldump -h 119.90.36.165 -u hcrdz -p ckd>d:\lp.sql  

1.导出整个数据库 \
mysqldump -u 用户名 -p 数据库名 > 导出的文件名 \
> mysqldump -u wcnc -p smgp_apps_wcnc > wcnc.sql

2.导出一个表 \
> mysqldump -u 用户名 -p 数据库名 表名> 导出的文件名 
> mysqldump -u wcnc -p smgp_apps_wcnc users> wcnc_users.sql  

3.导出一个数据库结构
> mysqldump -u wcnc -p -d --add-drop-table smgp_apps_wcnc >d:\wcnc_db.sql

-d 没有数据 --add-drop-table 在每个create语句之前增加一个drop table 


# 导入：
4.导入数据库  
常用source 命令
进入mysql数据库控制台，
如mysql -u root -p 
  
> use 数据库  
> set names utf8;（先确认编码 注意不是UTF-8）

然后使用source命令，后面参数为脚本文件（如这里用到的.sql）
> source d:\panwenba0616.sql


# 创建数据库：

 CREATE DATABASE `drupal` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

注意：` 不是' ，是在~那个按钮……

# 删除数据库：
> drop database test2;

# 更改用户密码：
> set password for root@localhost = password('root'); 


广义投影：取两列

5种查询句子是有严格的顺序的：
where》group by》having》order by》limit

mysql开启日志sql语句：
wamp开启：
#查看日期情况#
show variables like '%general%';
#开启日志#
SET GLOBAL general_log = 'On';
#指定日志文件#
SET GLOBAL general_log_file = 'E:/my.log';

增加用户：
GRANT USAGE ON *.* TO 'hcrdz'@'localhost' IDENTIFIED BY 'dz@surveystore' WITH GRANT OPTION;
授权：
GRANT SELECT,INSERT,UPDATE,DELETE,CREATE,DROP ON userclub.*  TO 'hcrdz'@'localhost' IDENTIFIED BY 'dz@surveystore';
GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY 'root' WITH GRANT OPTION;

查看表结构:
DESCRIBE table;
desc[ribe] table 查表结构
order by column desc[ent]是排序














