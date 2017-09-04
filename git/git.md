# git使用技巧
## win下创建.gitignore文件
1. 创建一个1.txt(可随意命名)
2. cmd进入当前文件夹，输入命令 ren 1.txt .gitignore

## 同时推送到多个仓库
1. 修改./git/conf文件，增加remote下url
2. 运行`git push -f origin master` origin就是对应的remote名字 强制本地更新到远端
3. 接着就正常使用了
```ini
[remote "origin"]
    url = git@github.com:klauspeng/cc.git
    url = git@git.oschina.net:klauspeng/cc.git
```