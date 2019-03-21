$('.material_submit').click(function(){
	var name = $('.name').val();
	var file = $('.file').text();
	var type = $('.type').selectpicker('val');
	var link = $('.link').val();

	var Msg = '';
	if(name == ''){
		Msg = "名稱必填";
	}else if(type == ''){
		Msg = "類別必填";
	}else if(file == '請選擇檔案'){
		Msg = "請上傳圖片";
	}else if(link == ''){
		Msg = "連結必填";
	}

	if(Msg != ''){
		swal("錯誤", Msg, "error");
	}else{
		$('#materialform').submit();
	}
})

var _URL = window.URL || window.webkitURL;
$("#file").change(function (e) {
    var file, img;
    var limit_width = 260;
    var limit_height = 60;
    var limit_ext = Array('jpg','png');
    var limit_size = 2048;
    var Msg = '';
    //檔案格式
    if($.inArray(this.files[0].name.replace(/^.*\./, '').toLowerCase(),limit_ext) != "-1"){ //格式符合圖檔
    	//圖片驗證
	    if ((file = this.files[0])) {
	        img = new Image();
	        img.onload = function () {
	        	if(this.width != limit_width){
	        		Msg = "圖片寬度須為"+limit_width;
	        	}else if(this.height != limit_height && limit_height != 0){
	        		Msg = "圖片長度須為"+limit_height;
	        	}else if(Math.round(file.size/1024) > limit_size){
	        		Msg = "圖片大小超過限制";
	        	}else if($.inArray(file.name.replace(/^.*\./, '').toLowerCase(),limit_ext) == "-1"){
	        		Msg = "圖片格式不符";
	        	}
	        	if(Msg != ''){
	        		swal("錯誤", Msg, "error");
	        		$("#file").parent().find('.file').text('請選擇檔案');
	        		$("#file").val('');
	        	}
	        };
	        img.src = _URL.createObjectURL(file);
	    }
    }else{
    	swal("錯誤", '檔案格式不符', "error");
    	$("#file").parent().find('.file').text('請選擇檔案');
    	$("#file").val('');
    }
    
});