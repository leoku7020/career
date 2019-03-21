var _URL = window.URL || window.webkitURL;
$("#cover").change(function (e) {
    var file, img;
    var limit_width = 0;
    var limit_height = 0;
    var limit_ext = Array('jpg','png');
    var limit_size = 5120;
    var Msg = '';
    //檔案格式
    if($.inArray(this.files[0].name.replace(/^.*\./, '').toLowerCase(),limit_ext) != "-1"){ //格式符合圖檔
    	//圖片驗證
	    if ((file = this.files[0])) {
	        img = new Image();
	        img.onload = function () {
	        	if(this.width > limit_width && limit_width != 0){
	        		Msg = "圖片寬度須為"+limit_width;
	        	}else if(this.height > limit_height && limit_height != 0){
	        		Msg = "圖片長度須為"+limit_height;
	        	}else if(Math.round(file.size/1024) > limit_size){
	        		Msg = "圖片大小超過限制";
	        	}else if($.inArray(file.name.replace(/^.*\./, '').toLowerCase(),limit_ext) == "-1"){
	        		Msg = "圖片格式不符";
	        	}
	        	if(Msg != ''){
	        		swal("錯誤", Msg, "error");
	        		$("#cover").parent().find('.cover').text('請選擇檔案');
	        		$("#cover").val('');
	        	}
	        };
	        img.src = _URL.createObjectURL(file);
	    }
    }else{
    	swal("錯誤", '檔案格式不符', "error");
    	$("#cover").parent().find('.cover').text('請選擇檔案');
    	$("#cover").val('');
    }
    
});


$('.banner_submit').click(function(){
	var name = $('.name').val();
	var img = $('.cover').text();
	var status = $('.status').selectpicker('val');
	var stime = $('.stime').val();
	var edtime = $('.edtime').val();

	var Msg = '';
	if(name == ''){
		Msg = "名稱必填";
	}else if(status == ''){
		Msg = "狀態必填";
	}else if(status == "2" && stime == ''){
		Msg = "當等待上架時，上架時間必填";
	}else if(stime!='' && edtime != '' && (Date.parse(stime) > Date.parse(edtime))){
		Msg = "下架時間不可早於上架時間";
	}else if(img == '請選擇檔案'){
		Msg = "請上傳輪播圖";
	}

	if(Msg != ''){
		swal("錯誤", Msg, "error");
	}else{
		$('#bannerForm').submit();
	}
})