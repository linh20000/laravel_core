/*menu handler*/
// $(function() {
//     var url = window.location.pathname;
//     var activePage = url.substring(url.lastIndexOf('/') + 1);
//     $('.nav li a').each(function() {
//         var currentPage = this.href.substring(this.href.lastIndexOf('/') + 1);
//
//         if (activePage == currentPage) {
//             $(this).parent().addClass('active');
//         }
//     });
// })


// (function ($) {
//     'use strict';
//     /** add active class and stay opened when selected */
//     var url = window.location;
//
// // for sidebar menu entirely but not cover treeview
//     $('ul.sidebar-menu a').filter(function() {
//         return this.href == url;
//     }).parent().addClass('active');
//
// // for treeview
//     $('ul.treeview-menu a').filter(function() {
//         return this.href == url;
//     }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');
//
// })(jQuery);


//console.log(makeid(5));

// function uuidv4() {
//     return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
//         var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
//         return v.toString(16);
//     });
// }
// console.log(uuidv4());

/** add active class and stay opened when selected */
var url = window.location;

$('ul.sidebar-menu a').filter(function() {
    return this.href == url;
}).parent().addClass('active');

// for treeview
$('ul.treeview-menu a').filter(function() {
    return this.href == url;
}).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');

(function ($) {
    // code here
})(jQuery);

/**
 * function javascript change published
 * @param e
 */
function togglePublished (e) {
    let table = $(e).data('table');  // Đặt giá trị data-attribute trong thẻ button
    let id = $(e).data('id');
    let url = `/admin/toggle-published/${table}/${id}`;
    let token = $("meta[name=csrf-token]").attr('content');
    let currentPublished = $(e).data('published');
    console.log(url);
    $.ajax({
        type: 'POST',
        dataType: 'json',
        data: {
            _token: token,
            value : currentPublished
        },
        url,
        success: function (data) {
            if (data.status === 200) {
                $(e).html(data.data.responseHtml);
                $(e).data('table', data.data.table);
                $(e).data('id', data.data.id);
                $(e).data('published', data.data.value);
                toastr['success']('Cập nhật thành công!');
            }
            // window.location.reload();
        }
    });
}
