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

## github host
```
# GitHub Start 
192.30.253.112 github.com 
192.30.253.119 gist.github.com 
151.101.100.133 assets-cdn.github.com 
151.101.100.133 raw.githubusercontent.com 
151.101.100.133 gist.githubusercontent.com 
151.101.100.133 cloud.githubusercontent.com 
151.101.100.133 camo.githubusercontent.com 
151.101.100.133 avatars0.githubusercontent.com 
151.101.100.133 avatars1.githubusercontent.com 
151.101.100.133 avatars2.githubusercontent.com 
151.101.100.133 avatars3.githubusercontent.com 
151.101.100.133 avatars4.githubusercontent.com 
151.101.100.133 avatars5.githubusercontent.com 
151.101.100.133 avatars6.githubusercontent.com 
151.101.100.133 avatars7.githubusercontent.com 
151.101.100.133 avatars8.githubusercontent.com 
# GitHub End
```