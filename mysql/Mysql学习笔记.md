# 增
```sql
insert into liuyan values (1,'a','aa',''),(10,'b','bb','');
INSERTINTO tbl_name (col1,col2) VALUES(15,col1*2);
insertinto worker set name='tom';
```
在 SET 子句中未命名的行都赋予一个缺省值，使用这种形式的 INSERT 语句不能插入多行。


# 删
```sql
delete from liuyan where id = '1';
```
# 改
```sql
update liuyan set content = 'cc' where id = '1';
```
# 查
```sql
select * from liuyan;
```
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
```sql
 CREATE DATABASE `drupal` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
```
注意：` 不是' ，是在~那个按钮……

# 删除数据库：
```sql
drop database test2;
```
# 更改用户密码：
```sql
set password for root@localhost = password('root'); 
```

> 广义投影：取两列

# 5种查询句子是有严格的顺序的：
> where》group by》having》order by》limit

# mysql开启日志sql语句：
wamp开启：
```sql
#查看日期情况#
show variables like '%general%';
#开启日志#
SET GLOBAL general_log = 'On';
#指定日志文件#
SET GLOBAL general_log_file = 'E:/my.log';
```

# 增加用户：
```sql
GRANT USAGE ON *.* TO 'hcrdz'@'localhost' IDENTIFIED BY 'dz@surveystore' WITH GRANT OPTION;
```
# 授权：
```sql
GRANT SELECT,INSERT,UPDATE,DELETE,CREATE,DROP ON userclub.*  TO 'hcrdz'@'localhost' IDENTIFIED BY 'dz@surveystore';
GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY 'root' WITH GRANT OPTION;
```
# 查看表结构:
```sql
DESCRIBE table;
desc[ribe] table 查表结构
order by column desc[ent]是排序
```

# 去重用 DISTINCT 关键字
```sql
SELECT DISTINCT owner FROM pet;
```

# SQL模式匹配允许你使用“_”匹配任何单个字符，而“%”匹配任意数目字符(包括零字符)。
```sql
#要想找出以“b”开头的名字：
SELECT * FROM pet WHERE name LIKE 'b%';
#要想找出正好包含5个字符的名字，使用“_”模式字符：
SELECT * FROM pet WHERE name LIKE '_____';
```

# 查询表的索引
```sql
show index from user_t;
```
## CURD
中文简介  
> CRUD是指在做计算处理时的增加(Create)、查询(Retrieve)（重新得到数据）、更新(Update)和删除(Delete)几个单词的首字母简写。主要被用在描述软件系统中数据库或者持久层的基本操作功能。

英文释义  
> In computing, CRUD is an acronym for create, retrieve, update, and delete. It is used to refer to the basic functions of a database or persistence layer in a software system.

1. C reate new records
2. R etrieve existing records
3. U pdate existing records
4. D elete existing records.