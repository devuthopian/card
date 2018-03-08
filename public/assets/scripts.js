// Content resizable width
function sizing() {
     $(document).ready(function () {
    var headerContentWidth = $('.header-content').outerWidth(),
        headerImageHeight = $('.header-image').outerHeight();

//         $('.header-image').outerWidth(headerImageHeight * 0.75);
         
         headerImageWidth = $('.header-image').outerWidth();
         
         $('.header-details').outerWidth(headerContentWidth-headerImageWidth+20);

    });
};