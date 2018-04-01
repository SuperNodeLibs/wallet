//i18n
String.defaultLocale = "zh_CN";
var lang = getCookie("user_locale");
if(lang){
    String.locale = lang;
}
String.toLocaleString({
    "en_US":"/static/js/lang/en.json",
    "zh_CN":"/static/js/lang/zh.json"
});
var l = function (string) {
    var tran = string.toLocaleString();
    return tran;
};
