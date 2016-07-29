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

            success: function (dataInput,htmlInput) {
                console.log('AJAX IS WORK ');
                console.log(dataInput);
                console.log(htmlInput);

                console.log("Items: ");
                console.log(dataInput[album_Id]['items']);


                    
                var param = ".images-" + album_Id;
                var paramImg = "div.images-" + album_Id;
                var newHTMLImage =' ';

                // it creates a block <div> for the current album of pictures
                $(param).after("<div class='images-" + album_Id + "'></div>");

                // it creates a string-tags with new pictures
                $.each(dataInput[album_Id]['items'], function(index, value1) {
                    $.each(value1, function(key, value2) {
                        if (key == 'name'){
                            newHTMLImage += "<img class='large' alt='" + value2 + " image not found' src='/images/" + value2 + "'>";
                        }
                    });
                });

                console.log("all image - " + newHTMLImage);
                // it fills the current album the new pictures
                $(paramImg).append(newHTMLImage);

                $(function(){
                    var knp = new KnpPaginatorAjax();

                    knp.setAjaxLoadedContent(newHTMLImage);
                    console.log(knp.setAjaxLoadedContent);


                //     knp.init({
                //         'loadMoreText': 'Load More', //load more text
                //         'loadingText': 'Loading..', //loading text
                //         'elementsSelector': dataInput, //this is where the script will append and search results
                //         'paginationSelector': 'ul.pagination' //pagination selector
                //     });
                // console.log(knp.init);
                });

                // $(param).append("<div class='navigation'>");

                // var newHTMLNav = "<div class='navigation'> {{ knp_pagition_render(paginations[" + albumId + "]) }} </div>";
                // $(param).append(newHTMLNav);
                    // console.log("add navigation - " + newHTMLNav);

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