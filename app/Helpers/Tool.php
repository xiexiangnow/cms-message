<?php
namespace App\Helpers;
/**
 * Created by PhpStorm.
 * User: xiexiang
 * Date: 2019/8/16
 * Time: 11:07 AM
 */

class Tool {


    /**
     * 获取远程图片的宽高和体积大小
     *
     * @param string $url 远程图片的链接
     * @param string $type 获取远程图片资源的方式, 默认为 curl 可选 fread
     * @param boolean $isGetFilesize 是否获取远程图片的体积大小, 默认false不获取, 设置为 true 时 $type 将强制为 fread
     * @return false|array
     */
   public static function myGetImageSize($url, $type = 'curl', $isGetFilesize = false)
    {
        // 若需要获取图片体积大小则默认使用 fread 方式
        $type = $isGetFilesize ? 'fread' : $type;

        if ($type == 'fread') {
            // 或者使用 socket 二进制方式读取, 需要获取图片体积大小最好使用此方法
            $handle = fopen($url, 'rb');

            if (! $handle) return false;

            // 只取头部固定长度168字节数据
            $dataBlock = fread($handle, 168);
        }
        else {
            // 据说 CURL 能缓存DNS 效率比 socket 高
            $ch = curl_init($url);
            // 超时设置
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            // 取前面 168 个字符 通过四张测试图读取宽高结果都没有问题,若获取不到数据可适当加大数值
            curl_setopt($ch, CURLOPT_RANGE, '0-167');
            // 跟踪301跳转
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            // 返回结果
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $dataBlock = curl_exec($ch);

            curl_close($ch);

            if (! $dataBlock) return false;
        }

        // 将读取的图片信息转化为图片路径并获取图片信息,经测试,这里的转化设置 jpeg 对获取png,gif的信息没有影响,无须分别设置
        // 有些图片虽然可以在浏览器查看但实际已被损坏可能无法解析信息
        $size = getimagesize('data://image/jpeg;base64,'. base64_encode($dataBlock));
        if (empty($size)) {
            return false;
        }

        $result['width'] = $size[0];
        $result['height'] = $size[1];

        // 是否获取图片体积大小
        if ($isGetFilesize) {
            // 获取文件数据流信息
            $meta = stream_get_meta_data($handle);
            // nginx 的信息保存在 headers 里，apache 则直接在 wrapper_data
            $dataInfo = isset($meta['wrapper_data']['headers']) ? $meta['wrapper_data']['headers'] : $meta['wrapper_data'];

            foreach ($dataInfo as $va) {
                if ( preg_match('/length/iU', $va)) {
                    $ts = explode(':', $va);
                    $result['size'] = trim(array_pop($ts));
                    break;
                }
            }
        }

        if ($type == 'fread') fclose($handle);

        return $result;
    }

}