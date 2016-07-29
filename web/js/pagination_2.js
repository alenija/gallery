$(document).ready(function() {

    function $_GET(s, key) {
        // var s = document.location.search;
        s = s.match(new RegExp(key + '=([^&=]+)'));
        return s ? s[1] : false;
    }

    function loadData(url) {

        console.log('URL -> '+url);

        var album_Id = $_GET(url, 'albumId');
        var curPage = $_GET(url, 'page');

        $.ajax({
            // url: '/album_show',
            url: '/album_show_2',
            dataType: 'json',
            data: "id=" + album_Id + "&page=" + curPage,

            error: function(){
                console.log("ajaxError");},

            success: function (htmlInput) {
                console.log('AJAX IS WORK ');
                console.log(htmlInput);


                var param = ".images-" + album_Id;
                var paramImg = "div.images-" + album_Id;
                var newHTMLImage =' ';

                // it creates a block <div> for the current album of pictures
                // $(param).after("<div class='images-" + album_Id + "'></div>");

                var temp = htmlInput['html'].toString();
                console.log(temp);

                var start = temp.indexOf("<div class=\"images-" + album_Id);
                var end = temp.indexOf("</article");

                var result = temp.substring(start,end);

                console.log(start);
                console.log(end);

                console.log("Result:");
                console.log(result);

                $(param).after(result);

                // var htmlOut = temp.find(".gallery");
                // console.log(htmlOut);

// $("div" + param).html(htmlInput['html']);


            }
        })
    }


    console.log('_1_document.location.href =  ' + document.location.href); // .href - return ful page's adress

    function Navigation() {

        $(".navigation a").click(function () {
            // $(".navigation a").on("click", function (e) {
            var url = $(this).attr("href");
            var temp = 'div.images-' + $_GET(url, 'albumId');
            $(temp).remove(); //удаляет только фотки с определенного альбома
            loadData(url);
            // e.preventDefault();
            return false;
        });

    }

    Navigation();
});