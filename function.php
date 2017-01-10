<?php
	/**
     * 自定义cookie函数，加密输出的cookie值
	 * 基于TP自带的cookie函数和加密类
	 * @param string $name cookie名称，为''时返回所有cookie
	 * @param string $value cookie值，为''时用于获取某cookie值，不为''时则设置cookie值，为null时删除cookie
	 * @param int $expire 有效期，秒为单位
     * @author lan
     */
    function mycookie($name='', $value='', $expire=0){
        // 用于加密的密钥
        $cryptKey = "YVSEURQN";
        
        if($name != '' && $value === '' && $expire === 0){
            // 获取cookie值
            $cookie = cookie($name, $value, $expire);
            return \Think\Crypt::decrypt($cookie, $cryptKey);
        }elseif ($name != '' && $value != '') {
        	// 设置cookie值
            $value = \Think\Crypt::encrypt($value, $cryptKey);
            return cookie($name, $value, $expire);
        }elseif ($name != '' && $value == null) {
        	// 删除cookie
            return cookie($name, $value, $expire);
        }elseif ($name == '') {
            // 获取所有cookie值，不解密
            return cookie($name, $value, $expire);
        }
        return null;
    }