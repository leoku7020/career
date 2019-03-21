$(document).ready(function() {
    $('.summernote').summernote({
    	height: 500,
    	maximumImageFileSize:5242880, //5MB
    	lang: 'zh-TW',//中文語系
    	imageTitle: {
          specificAltField: true,
        },
    	toolbar: [
		    ['style', ['style']],
		    ['font', ['bold', 'italic', 'underline', 'clear']],
		    ['fontname', ['fontname']],
		    ['color', ['color']],
		    ['para', ['ul', 'ol', 'paragraph']],
		    ['height', ['height']],
		    ['table', ['table']],
		    ['insert', ['link', 'picture', 'hr']],
	    ],
	    callbacks:{ onImageUploadError: function(msg){ 
	    	swal("錯誤", "圖片不能超過5Mb", "error"); 
	    }}
    });
});
$(".btn-success").click(function(){ 
  var html = $(".clone").html();
  $(".increment").after(html);
});

$("body").on("click",".btn-danger",function(){ 
  $(this).parents(".control-group").remove();
});
