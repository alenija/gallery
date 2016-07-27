$(document).ready(function() {

    function $_GET(s, key) {
        // var s = document.location.search;
        s = s.match(new RegExp(key + '=([^&=]+)'));
        return s ? s[1] : false;
    }

    function loadData(url) {
// remove later
        console.log('URL -> '+url);
        console.log('al = ' + $_GET(url, 'albumId') + ' and p = ' + $_GET(url, 'page'));
        
        var album_Id = $_GET(url, 'albumId');

        $.ajax({
            url: '/album_show',
            dataType: 'json',
            // method: 'POST',
            // data: {'id': albumId,
            //        'page': page},
            data: "id="+album_Id+"&page="+$_GET(url, 'page'),

            beforeSend: function(data) {
                console.log("dataStart");
                console.log(data);
            },

            error: function(){
                console.log("ajaxError");},

            success: function (dataInput) {
                console.log('AJAX IS WORK ');
                console.log(dataInput);
                console.log("currenPageNamber" + dataInput[album_Id]['current_page_number']);
                console.log(dataInput[album_Id]['items']);

                var param = ".images-" + album_Id;
                var paramImg = "div.images-" + album_Id;
                var newHTMLImage =' ';

                $(param).after("<div class='images-" + album_Id + "'></div>");

                $.each(dataInput[album_Id]['items'], function(index, value1) {
                    $.each(value1, function(key, value2) {
                        if (key == 'name'){
                            newHTMLImage += "<img class='large' alt='" + value2 + " image not found' src='/images/" + value2 + "'>";
                        }
                    });
                });

                console.log("all image - " + newHTMLImage);
                $(paramImg).append(newHTMLImage);

                // $(param).append("<div class='navigation'>");

                // var newHTMLNav = "<div class='navigation'> {{ knp_pagition_render(paginations[" + albumId + "]) }} </div>";

                // var newHTMLNav = "<div class='navigation'><div class='pagination'><span class='current'>" +

                //     dataInput[album_Id]['current_page_number'] + "</span><span class='page'><a href='/show-album-images?albumId=2&page=2>2</a></span><span class='page'><a href='/show-album-images?albumId=2&page=3'>3</a></span><span class='next'><a href='/show-album-images?albumId=2&page=2'>></a></span><span class='last'><a href="/show-album-images?albumId=2&page=3">>></a></span></div></div></div>";

                // var script = document.createElement( 'script' );
                // script.type = 'text/javascript';
                // script.src = "scriptname.js";
                // script.text  = "alert('massege');"
                // $(param).append( script );

                // $(param).append(newHTMLNav);

                    // console.log("add navigation - " + newHTMLNav);




            }
        });

    }
    console.log('_1_document.location.href =  ' + document.location.href); // .href - return ful page's adress

    function Navigation() {

        // $(".navigation a").click(function () {
        //     var url = $(this).attr("href");
        //     var temp = 'div.images-' + $_GET(url, 'albumId');
        //     $(temp).remove(); //нужно чтоб удалило только фотки с определенного альбома
        //     loadData(url);
        //     return false;
        // });

        $(".navigation a").click(function () {
            var url = $(this).attr("href");
            var temp = 'div.images-' + $_GET(url, 'albumId');
            $(temp).empty(); //нужно чтоб удалило только фотки с определенного альбома
            loadData(url);
            return false;
        });

    }

    Navigation();
});