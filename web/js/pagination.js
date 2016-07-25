$(document).ready(function() {

    function loadData(url) {
// remove later
        console.log('URL -> '+url);

        if (document.location.search !== '') {
            var arr = url.toString();
    console.log(document.location.search);
            var t = url.split('?');
    // console.log(t[1]);
            var array = t[1].split('&');
            var albumIdTemp = array[0].split('=');
            var albumId = albumIdTemp[1];
            var pageTemp = array[1].split('=');
            var page = pageTemp[1];

            console.log('al = ' + albumId + ' and p = ' + page);
        }
        else {
            var albumId = 0;
            var page = 1;
        }

        $.ajax({
            url: '/album_show',
            dataType: 'json',
            // method: 'POST',
            // data: {'id': albumId,
            //        'page': page},
            data: "id="+albumId+"&page="+page,

            beforeSend: function(data) {
                console.log("dataStart");
                console.log(data);
            },

            error: function(){
                console.log("ajaxError");},

            success: function (dataInput) {
                console.log('AJAX IS WORK ');
                console.log(dataInput);
                console.log(dataInput[albumId]['current_page_number']);
                console.log(dataInput[albumId]['items']);

                $.each(dataInput[albumId]['items'], function(index, value1) {
                    $.each(value1, function(key, value2) {
                        if (key == 'name'){
                            $(".images").append("<img class='large' alt='" + value2 + " image not found' src='/images/" + value2 + "'>");
                        }
                    });
                });
                $(".images").append("<div id='pagin' class='navigation'>");
                    console.log("FI");


                // $("#totalCount").text(data.pagination.totalCount);
                // $("#pagin").html(data.pagin);
                Navigation();
            }
        });
        
    }

    function Navigation() {
        console.log('aaaaaaaaaaa_4444');
        $(".pagin A").click(function () {

            console.log('aaaaaaaaaaa_55555');

            $(".images").remove();
            var url = $(this).attr("href");

            loadData(url);
            window.history.pushState("", "", url);
            return false;
        });
    }


    loadData(document.location.href); //href); // .href - return ful page's adress

    $(window).bind('popstate', function () {
        loadData(document.location);
    });
});