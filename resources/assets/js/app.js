
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example', require('./components/Example.vue'));

// const app = new Vue({
//     el: '#app'
// });

$(document).ready(function() {

    $(".dropdown-menu li a").click(function(){
        $(this).parents('.dropdown').find('.btn .selected').text($(this).text());
        $(this).parents('.dropdown').find('.btn input[type="hidden"]').val($(this).data('reason-id'));
    });

    $("#input-files").fileinput({
        'uploadUrl': '/files/',
        'dropZoneEnabled': false,
        'fileActionSettings': {
            'showDrag': false,
            'showZoom': true,
            'showUpload': false,
            'showDelete': true,
        },
        'maxFileCount': 5,
        'validateInitialCount': true,
        'overwriteInitial': false,
        'maxFileSize': 15000,
        'allowedFileExtensions': ["jpg", "png", "gif"]
    }).on('fileselect', function(event, numFiles, label) {
        $(this).parents('.file-input').find('.file-preview-thumbnails .file-thumbnail-footer .file-upload-indicator').hide();
    });

    $('.gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        gallery:{
            enabled:true,
            navigateByImgClick: true
        }
    });
});
