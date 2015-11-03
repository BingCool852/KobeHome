/** 
 * 判断是否null 
 * @param data 
 */
function isNull(data) {
    return (data == "" || data == undefined || data == null) ? 1 : data;
}

/**
 * [getNum 获取字符串中数字]
 * @param  {[string]} str [目标字符串]
 * @return {[string]}     [纯数字字符串]
 */
function getNum(str) {
    var re = /[\u4000-\uFFFF]/g;
    var re_str = str.replace(re, '');
    return re_str;
}

/**
 * [trim 去掉字符串两边空格]
 * @param  {[string]} str [需要操作的字符串]
 * @return {[string]}     [处理后字符串]
 */
function trim(str) {
    return str.replace(/(^\s*)|(\s*$)/g, "");
}
