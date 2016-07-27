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
        var albumId = $_GET(url, 'albumId');

        $.ajax({
            url: '/album_show',
            dataType: 'json',
            // method: 'POST',
            // data: {'id': albumId,
            //        'page': page},
            data: "id="+$_GET(url, 'albumId')+"&page="+$_GET(url, 'page'),

            beforeSend: function(data) {
                console.log("dataStart");
                console.log(data);
            },

            error: function(){
                console.log("ajaxError");},

            success: function (dataInput) {
                console.log('AJAX IS WORK ');
                console.log(dataInput);
                console.log("currenPageNamber" + dataInput[albumId]['current_page_number']);
                console.log(dataInput[albumId]['items']);

                var param = ".images-" + albumId;
                var paramImg = "div.images-" + albumId;
                var newHTMLImage =' ';

                $(param).after("<div class='images-" + albumId + "'></div>");

                $.each(dataInput[albumId]['items'], function(index, value1) {
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


                // $(param).append(newHTMLNav);

                    console.log("add navigation - " + newHTMLNav);
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