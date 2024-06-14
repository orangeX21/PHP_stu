# 图书管理系统 (Book Management System)

这是一个用于管理图书的简单系统，允许用户添加、浏览、和管理图书信息。

## 目录

- [功能](#功能)
- [安装](#安装)
- [配置](#配置)
- [使用](#使用)
- [数据库结构](#数据库结构)
- [贡献](#贡献)
- [许可](#许可)

## 功能

- 用户可以添加新的图书。
- 用户可以浏览现有图书。
- 用户可以浏览和添加出版社信息。
- 用户可以通过日历选择出版日期。

## 安装

1. **克隆代码库**
   ```bash
   git clone https://github.com/orangeX21/PHP_stu.git
   cd PHP_stu
   ```

2. **设置本地服务器**
   本项目需要在支持 PHP 和 MySQL 的服务器上运行。

3. **配置数据库**
   - 创建一个名为 `mybook` 的数据库。
   - 导入项目根目录下的 `mybook.sql` 文件：
     ```bash
     mysql -u root -p mybook < mybook.sql
     ```

## 配置

1. **数据库连接**
   编辑文件中的数据库连接部分，以确保使用正确的数据库凭据：
   ```php
   $conn = new mysqli("localhost", "root", "password", "mybook");
   ```

2. **启用错误报告**
   为了在开发过程中进行调试，可以在文件的顶部启用错误报告：
   ```php
   <?php
   error_reporting(E_ALL);
   ini_set('display_errors', 1);
   ?>
   ```

## 使用

1. **启动服务器**
   启动您的本地服务器。

2. **访问项目**
   在浏览器中打开以下地址：
   ```
   http://localhost/yourrepository/index.php
   ```

3. **添加图书**
   填写图书信息并选择出版日期，然后点击 “添加” 按钮提交表单。添加成功后，系统会自动跳转到 “浏览图书” 页面。

## 数据库结构

数据库名：`mybook`

### 表：`books`
| 字段名       | 数据类型    | 说明             |
| ------------ | ----------- | ---------------- |
| id           | int(4)      | 主键，自增       |
| title        | varchar(20) | 书名             |
| author       | varchar(20) | 作者             |
| price        | decimal(5,2)| 价格             |
| publisherId  | int(11)     | 出版社 ID        |
| publishDate  | date        | 出版日期         |

### 表：`publisher`
| 字段名        | 数据类型    | 说明            |
| ------------- | ----------- | --------------- |
| publisherId   | int(11)     | 主键，自增      |
| publisherName | varchar(20) | 出版社名称      |

### 表：`users`
| 字段名   | 数据类型    | 说明           |
| -------- | ----------- | -------------- |
| username | varchar(16) | 用户名（主键） |
| password | varchar(32) | 密码           |
| email    | varchar(30) | 电子邮件       |

## 贡献

如果你想贡献代码或报告问题，请创建一个 pull request 或提交一个 issue。

## 许可

该项目使用 [MIT 许可证](LICENSE)。