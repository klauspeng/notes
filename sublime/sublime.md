# sublime3使用

## 输入法不跟随光标
插件：IMESupport

## markdown支持
### 编辑
插件：MarkDown Editing

ctrl+shift+p打开命令输入，打开Preference: MarkdownEditing Setting: User

去除文字与行号中间很宽："draw_centered": ture,改为false

[链接](http://blog.csdn.net/hfut_jf/article/details/52853868)

### 预览
插件：OminiMarkupPreview

快捷键：Ctrl+Alt+O: Preview Markup in Browser.

## 大小写转换
先选中要转换的部分
大写转换小写：ctrl+k l
小写转换大写：ctrl+K u

## 主题ayu
1. package control 安装 ayu
2. [主题链接](https://github.com/dempfi/ayu)
3. 设置
```json
"ui_separator":             true, // separators between panels
"ui_font_size_small":       true, // smaller UI font size(sidebar, statusbar etc)
"ui_big_tabs":              true, // increased tab height
"ui_fix_tab_labels":        true, // to fix tab labels if they look not right
"ui_font_source_code_pro": true, // use [Source Code Pro](https://fonts.google.com/specimen/Source+Code+Pro) for UI
"ui_wide_scrollbars":  true,  // wider scrollbars
"ui_sidebar_highlight_row": true // to highlight whole row for current item in sidebar
```

## 批量插入递增数字
插件：insertNum [github地址](https://github.com/jbrooksuk/InsertNums)

Ctrl+Shift+L进入多行编辑模式，再按 Ctrl+Alt+N  
Ctrl+Shift+Alt+N 可设置初始值，以及step