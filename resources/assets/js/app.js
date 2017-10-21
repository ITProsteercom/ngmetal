
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
        'uploadAsync': false,
        'uploadUrl': '/fileupload',
        'uploadExtraData': {
            '_token': $('meta[name="csrf-token"]').attr('content')
        },
        'deleteUrl': '/filedelete/',
        'ajaxDeleteSettings': {
            'data': {'_token': $('meta[name="csrf-token"]').attr('content')}
        },
        'dropZoneEnabled': false,
        'fileActionSettings': {
            'showDrag': false,
            'showZoom': true,
            'showUpload': false,
            'showDelete': true
        },
        'maxFileCount': 5,
        'overwriteInitial': false,
        'initialPreviewAsData': true,
        'initialPreviewFileType': 'image',
        'maxFileSize': 15000,
        'allowedFileExtensions': ["jpg", "jpeg", "png", "gif"],
    }).on('filebatchselected', function(event, files) {
        $(this).parents('.file-input').find('.file-preview-thumbnails .file-thumbnail-footer .file-upload-indicator').hide();
        $(this).fileinput('upload');
    }).on('filebatchuploadsuccess', function (event, data, previewId, index) {
        var response = data.response;

        if (response.id.length) {
            var input = $('#file_id'),
                ids = input.val();

            if (ids.length) {
                res = ids.split(',')
                    .concat(response.id)
                    .join(',');
            } else {
                res = response.id;
            }

            if(res.length > 0) {
                $(this).attr('required', false);
                input.val(res);
            }
        }
    }).on('filedeleted', function(event, key, jqXHR, data) {
        var response = jqXHR.responseJSON;

        if(response.id > 0) {
            var input = $('#file_id'),
                ids = input.val().split(','),
                index = ids.indexOf(response.id);

            if (index > -1) {
                ids.splice(index, 1);
            }

            input.val(ids.join(','));

            if(ids.length <= 0)
                $(this).attr('required', true);
        }
    });

    $('.gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        gallery:{
            enabled:true,
            navigateByImgClick: true
        }
    });

    $('.setting-edit').click(function(){
        $(this).closest('td').prev().find('input').prop('disabled', function(i, v) { return !v; });
        $(this).closest('td').find('button').prop('disabled', function(i, v) { return !v; });
    });
});
