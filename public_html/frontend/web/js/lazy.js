
$(function() {

    $('.lazy').lazy({
        beforeLoad: function(element) {
            if( element.prop('tagName').toLowerCase() == "div" )
                console.log('element with  with before is about to be loaded');
            else
                console.log('image "'+'" is about to be loaded');
        },
        afterLoad: function(element) {
            if( element.prop('tagName').toLowerCase() == "div" )
                console.log('element with "' +'" is about to be loaded');
            else
                console.log('image "'+'" is about to be loaded');
        },
        asyncLoader: function(element) {
            setTimeout(function() {
                element.removeClass('bg-warning  text-warning')
                    .addClass('bg-success text-success')
                    .load()
                    .find('p')
                    .html('Loaded successfully by "asyncLoader"!');
            }, 1000);
        },
        errorLoader: function(element) {
            element.removeClass('bg-warning text-warning')
                .addClass('bg-danger text-danger')
                .error()
                .find('p')
                .html('Loading failed by "errorLoader"!');
        }
    });
});
