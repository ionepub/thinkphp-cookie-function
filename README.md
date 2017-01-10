# ThinkPHP cookie函数强化

> ThinkPHP版本：3.2.3，其他版本未测试

## 功能

借助ThinkPHP自带的cookie函数和加密类，对cookie做加密处理

## 示例

```
$cookieName = 'forgetPasswordTime';
$cookieValue = 1;

#1 对cookie名也做加密处理
$cookieName = md5($cookieName);

#2 有效期1小时
mycookie($cookieName, $cookieValue, 3600);
# result：gXZ0qYV4pqmCeXeqfqZ8og

# 获取值

$val = mycookie($cookieName);
# result: 1

```

## 使用

将函数体复制到`Common/Common/function.php`中即可。

## 参数

```php
/**
 * cookie函数强化，加密输出的cookie值
 * 基于TP自带的cookie函数和加密类
 * @param string $name cookie名称，为''时返回所有cookie
 * @param string $value cookie值，为''时用于获取某cookie值，不为''时则设置cookie值，为null时删除cookie
 * @param int $expire 有效期，秒为单位
 * @author lan
 */
function mycookie($name='', $value='', $expire=0){}
```