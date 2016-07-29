function $_GET(s, key) {
    s = s.match(new RegExp(key + '=([^&=]+)'));
    return s ? s[1] : false;
}

function loadData(url) {
    console.log('URL -> '+url);

    var album_Id = $_GET(url, 'id');
    var curPage = $_GET(url, 'page');

    $.ajax({
        url: '/album_show_2',
        dataType: 'json',
        data: "id=" + album_Id + "&page=" + curPage,

        error: function(){
            console.log("ajaxError");},

        success: function (htmlInput) {
            var param = ".images-" + album_Id;

            var temp = htmlInput['html'].toString();

            var start = temp.indexOf("<div class=\"images-" + album_Id);
            var end = temp.indexOf("</article");

            var result = temp.substring(start,end);

            $(param).after(result);
        }
    })
}

console.log('_1_document.location.href =  ' + document.location.href); // .href - return ful page's adress

$(".navigation a").addEventListener(function (e) {
//     $(".navigation a").on("click", function (e) {
    e.preventDefault(); //method stops the default action of an element from happening
    var url = $(this).attr("href");
    console.log(url);
    var temp = 'div.images-' + $_GET(url, 'id');
    $(temp).remove(); //удаляет только фотки с определенного альбома
    loadData(url);
        console.log("END");

    return false;
});
