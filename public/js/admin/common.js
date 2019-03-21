	//search
	$('#generalSearch').on('input',function(){
		var keyword = $(this).val();
		if(keyword !=''){
			$('tbody').find('tr').each(function(){
				var status = 0;
				$(this).find('td').each(function(){
					var text = $(this).text();
					if(text.search(keyword) != '-1'){
						status = 1;
					}
				})
				if(status == 1){
					$(this).show();
				}else{
					$(this).hide();
				}
			})
		}else{
			$('tbody').find('tr').each(function(){
				$(this).show();
			})
		}
		
	})
	function convert(time){

		// Unixtimestamp
		var unixtimestamp = time;

		// Months array
		var months_arr = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];

		// Convert timestamp to milliseconds
		var date = new Date(unixtimestamp*1000);

		// Year
		var year = date.getFullYear();

		// Month
		var month = date.getMonth() + 1;
		month = (month>9 ? '' : '0') + month;
		// Day
		var day = date.getDate();
		day = (day>9 ? '' : '0') + day;
		// Hours
		var hours = date.getHours();

		// Minutes
		var minutes = "0" + date.getMinutes();

		// Seconds
		var seconds = "0" + date.getSeconds();

		// Display date time in MM-dd-yyyy h:m:s format
		var convdataTime = year+'/'+month+'/'+day+' '+hours + ':' + minutes.substr(-2);
		 
		return convdataTime;
	 
	}
	//get Links data
	function getLinks(id){
		var model = $('#m_modal_1');
		$.ajax({
				type: 'POST',
				url: '/api/ajax/getLinks',
				data: { 'id' : id},
				dataType: 'json',
				headers: {
				'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
			},
			success: function(data){
				if(data.syscode=="200"){
					// swal("成功", "已發出測試訊息", "success");
					// console.log(data);
					var m_id = data.data[0]['material_id'];
					model.find('.no').text(data.data[0]['sort']);
					
					$('#form1').attr('action',('/admin/Index/link/'+data.data[0]['id']));
					data.material.forEach(function(item, index, array){
						var selected = '';
						if(m_id == item.id){
							selected = "selected";
						}else{
							selected = '';
						}
						$('#material_id').append("<option value='"+item.id+"' "+selected+">"+item.name+"</option>");
					});
					$('#material_id').selectpicker('refresh');
					model.modal('show');
				}else{
					swal("錯誤", "取得資料失敗", "error");
				}
			},
			error: function(xhr, type){
				swal("錯誤", "取得資料失敗", "error");
			}
		})
	}
	// submit links 
	$('.Linksubmit').click(function(){
		var model = $('#m_modal_1');
		var m_id = model.find('#material_id').selectpicker('val');
		if(m_id=="select"){
			swal("錯誤", "請選擇素材", "error");
		}else{
			$('#form1').submit();
		}
	})
	//material check all
	$('.checked_all').click(function(){
		if($(this).prop('checked')){
			//select all
			$(this).parents().find('.tbody').find('.m-group-checkable').each(function(){
				$(this).prop('checked',true);
			});
		}else{
			//dis select all
			$(this).parents().find('.tbody').find('.m-group-checkable').each(function(){
				$(this).prop('checked',false);
			});
		}
	})
	//material one delete
	function material_delete(id){
		swal({
		  title: "確認刪除",
		  text: "刪除後，無法復原!",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: '確認',
		  cancelButtonText: '取消',
		}).then((result) => {
		  if (result.value) {
		    $('#delete_'+id).submit();
		  }
		})
	}

	function file_delete(id,name,obj){
		swal({
		  title: "確認刪除",
		  text: "刪除後，無法復原!",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: '確認',
		  cancelButtonText: '取消',
		}).then((result) => {
		  if (result.value) {
		    $.ajax({
				type: 'POST',
				url: '/api/ajax/delete',
				data: { 'id' : id,'name':name},
				dataType: 'json',
				headers: {
				'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
				},
				success: function(data){
					console.log(data);
					if(data.syscode=="200"){
						swal("成功", "刪除成功", "success");
						obj.closest('.row').remove();
					}else{
						swal("錯誤", "取得資料失敗", "error");
					}
				},
				error: function(xhr, type){
					swal("錯誤", "取得資料失敗", "error");
				}
			})
		  }
		})
	}
	//material batch delete
	$('.batchDelete').click(function(){
		var str = Array();
		$('.tbody').find('.m-group-checkable').each(function(){
			if($(this).prop('checked')){
				var value = $(this).parent().parent().find('.code').val();
				str.push(value);
			}
		});
		if(str.length){
			$('.code_array').val(str);
			swal({
			  title: "確認刪除",
			  text: "刪除後，無法復原!",
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: '確認',
			  cancelButtonText: '取消',
			}).then((result) => {
			  if (result.value) {
			    $('#batchDelete').submit();
			  }
			})
		}else{
			swal({
			  type: 'error',
			  title: '錯誤',
			  text: '請確認勾選!'
			})
		}
		
	})

	//ad chose for
	$('.chose_for').click(function(){
		var str = Array();
		$(this).parents().find('.chose_for').each(function(){
			if($(this).prop('checked')){
				str.push($(this).val());
			}
		});
		$('.for').val(str);
	})

	//ad check
	$('.ad_check').click(function(){
		var stime = $('.stime').val();
		var status = $('.ad_status').selectpicker('val');
		var forwho = $('.for').val();
		var code = $('.code').val();
		if((status == "1" || status == "2") && stime != ''){
			$.ajax({
				type: 'POST',
				url: '/api/ajax/checkAd',
				data: { 'stime' : stime,'for':forwho,'status':status,'code':code},
				dataType: 'json',
				headers: {
				'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
			},
				success: function(data){
					if(data.syscode=="200"){
						swal({
						  title: "提醒",
						  text: "目前已有資料是否直接覆蓋？",
						  type: 'warning',
						  showCancelButton: true,
						  confirmButtonColor: '#3085d6',
						  cancelButtonColor: '#d33',
						  confirmButtonText: '確認',
						  cancelButtonText: '取消',
						}).then((result) => {
						  if (result.value) {
						    $('#form').submit();
						  }
						})
					}else{
						$('#form').submit();
					}
				},
				error: function(xhr, type){
					swal("錯誤", "取得資料失敗", "error");
				}
			});
		}else{
			$('#form').submit();
		}
	})
	//廣告狀態改變
	$('.ad_status').change(function(){
		$('.edtime').attr('disabled',true);
		$('.stime').attr('disabled',true);
		$('.stime').val('');
		$('.edtime').val('');
		var select = $(this).val();
		if(select == "1"){
			$('.stime').val('系統自動帶入現在時間');
			$('.edtime').attr('disabled',false);
		}else if(select == "2"){
			$('.edtime').attr('disabled',false);
			$('.stime').attr('disabled',false);
		}else{
			$('.stime').val('系統自動帶入現在時間');
			$('.edtime').val('系統自動帶入現在時間');
			$('.edtime').attr('disabled',true);
			$('.stime').attr('disabled',true);
		}
	})
	//Carousel status change
	$('.carousel_status').change(function(){
		$('.edtime').attr('disabled',true);
		$('.stime').attr('disabled',true);
		$('.stime').val('');
		$('.edtime').val('');
		var select = $(this).val();
		if(select == "1"){
			$('.stime').val('系統自動帶入現在時間');
			$('.edtime').attr('disabled',false);
		}else if(select == "2"){
			$('.edtime').attr('disabled',false);
			$('.stime').attr('disabled',false);
		}else{
			$('.stime').val('系統自動帶入現在時間');
			$('.edtime').val('系統自動帶入現在時間');
			$('.edtime').attr('disabled',true);
			$('.stime').attr('disabled',true);
		}
	})
	//copy
	$('.copy_save').click(function(){
		var content = $(this).parent().find('.content').val();
		var id = $(this).parent().find('.code').val();
		console.log('content='+content);
		console.log('id='+id);
		$.ajax({
				type: 'POST',
				url: '/api/ajax/updateCopywriting',
				data: { 'id' : id,'content':content},
				dataType: 'json',
				headers: {
				'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
			},
				success: function(data){
					if(data.syscode=="200"){
						swal({
						  title: "成功",
						  text: "更新資料成功",
						  type: 'success',
						  showCancelButton: true,
						  confirmButtonColor: '#3085d6',
						  cancelButtonColor: '#d33',
						  confirmButtonText: '確認',
						  cancelButtonText: '取消',
						  showCancelButton: false,
						}).then((result) => {
						  if (result.value) {
						    location.reload();
						  }
						})
					}else{
						swal("錯誤", "更新資料失敗", "error");
					}
				},
				error: function(xhr, type){
					swal("錯誤", "取得資料失敗", "error");
				}
			});
	})
	//create news content type change
	$('.content_type').change(function(){
		var type = $(this).val();
		if(type == 1){ //content
			$('.content').show();
			$('.link').hide();
		}else if(type == 2){ //link
			$('.content').hide();
			$('.link').show();
		}else{
			$('.link').hide();
			$('.content').hide();
		}
	})
	//show create news model
	function createNews(){
		clear_model();
		var model = $('#m_modal_1');
		model.modal('show');
	}
	var url ='';
	//model type change
	$('.model_type').change(function(){
		var type = $(this).val();
		var str = '';
		url = '';
		$('.model_content').html('');
		if(type == "1"){
			str = '<div class="form-group m-form__group">'+
                    '<label for="exampleTextarea">'+
                        '<span class="m--font-danger">'+
                            '*'+
                        '</span>'+
                        '文字內容'+
                    '</label>'+
                    '<textarea class="form-control m-input content" id="exampleTextarea" rows="3"></textarea>'+
                '</div>';
			
		}else if(type == "0"){
			str = '<div class="form-group m-form__group row">'+
	                    '<label for="example-text-input" class="col-3 col-form-label">'+
	                        '<span class="m--font-danger">'+
	                            '*'+
	                        '</span>'+
	                        '上傳圖片'+
	                    '</label>'+
	                    '<div class="col-9">'+
	                        '<div class="custom-file">'+
	                            '<input type="file" class="custom-file-input content" id="customFile" name="image2x">'+
	                            '<label class="custom-file-label" for="customFile" >請選擇檔案</label>'+
	                        '</div>'+
	                        '<div class="m--margin-top-10">'+
	                            '<i class="flaticon-exclamation-1"></i>'+
	                            '<span>'+
	                                '提醒：圖片檔案可為 png 或 jpg，圖片尺寸為 w750*h不限，小於 1 MB。'+
	                            '</span>'+
	                        '</div>'+
	                    '</div>'+
	                '</div>'
		}else{
			$('.model_content').html('');
		}
		$('.model_content').html(str);
		//上傳檔案偵測用
		$('.custom-file-input').on('change',function(){
            var fileName = $(this).val();
            fileName = fileName.split("\\")[2];
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
		    var upload_file = $(this)[0].files[0];
		   reader.readAsDataURL(upload_file);
        });
	})
	//news model submit
	$('.news_model_submit').click(function(){
		var type = $('.model_type').selectpicker('val');
		var num = parseInt($('.num').val());
		var content ='';
		var type_str = '';
		if(Number.isInteger(num) && num > 0){
			if(type == "1"){ //文字
				content = $('.model_content').find('.content').val();
				type_str = "文字";
				var value = [
					type,
					content
				];
				content += '<input type="hidden" name =content[] value="'+value+'"';
				var table = '<tr class="sort" data-order="'+num+'">'+
	                        '<td>'+
	                            num+
	                        '</td>'+
	                        '<td>'+
	                        	type_str+
	                        '</td>'+
	                        '<td style="word-break: break-all;">'+
	                           content+
	                        '</td>'+
	                        '<td>'+                                                        
	                        	'<button type="button" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only news_remove">'+
	                                '<i class="fa fa-btn fa-trash m-r-5"></i>'+
	                            '</button>'+
	                        '</td>'+
	                    '</tr>';
	            if($('tbody').find('.sort').length > 0){
		            $('tbody').find('.sort').each(function(index){
		            	var sort = $(this).attr('data-order');
		            	var next = $(this).next().attr('data-order');
		            	console.log(sort);
		            	console.log(next);
		            	if(sort <= num && (next > num || typeof(next) == "undefined")){
		            		$(this).after(table);
		            		 return false;
		            	}else if(index == 0 && sort > num){
							$(this).before(table);
							return false;
		            	}
		            })
	        	}else{
	        		console.log($('tbody').find('.sort').length);
	        		$('.tbody').append(table);
	        	}
				//刪除event
				$('.news_remove').click(function(){
					$(this).parent().parent().remove();
				})
				var model = $('#m_modal_1');
				model.modal('hide');
			}else if(type == "0"){ //上傳圖片
				type_str = "圖片";
				content = '<div style="display:none">'+$('.model_content').find('.custom-file').html()+'</div>';
				var img = $('.model_content').find('.content').prop('files')[0];
				data = new FormData();
			    data.append('file', img);
			    var imgname  =  img.name;
			    var size  =  img.size;
			    var ext =  imgname.substr( (imgname.lastIndexOf('.') +1) );
				if(size <= 1000000 && (ext == 'jpg' || ext == 'jepg') && width == "750"){
					//傳到後端
					$.ajax({
						type: 'POST',
						url: '/api/ajax/uploadImage',
						data: data,
						enctype: 'multipart/form-data',
						processData: false,  // tell jQuery not to process the data
		      			contentType: false,  // tell jQuery not to set contentType
						headers: {
						'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
					},
						success: function(data){
							if(data.syscode=="200"){
								content = '<img class="preview" style="max-width: 150px; max-height: 150px;" src="/tmp/'+data.name+'">';
								var value = [
									type,
									data.name
								];
								content += '<input type="hidden" name =content[] value="'+value+'">';
								var table = '<tr>'+
						                        '<td>'+
						                            num+
						                        '</td>'+
						                        '<td>'+
						                        	type_str+
						                        '</td>'+
						                        '<td>'+
						                           content+
						                        '</td>'+
						                        '<td>'+                                                        
						                        	'<button type="button" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only news_remove">'+
						                                '<i class="fa fa-btn fa-trash m-r-5"></i>'+
						                            '</button>'+
						                        '</td>'+
						                    '</tr>';
						        if($('tbody').find('.sort').length > 0){
						            $('tbody').find('.sort').each(function(index){
						            	var sort = $(this).attr('data-order');
						            	var next = $(this).next().attr('data-order');
						            	if(sort <= num && (next > num || typeof(next) == "undefined")){
						            		$(this).after(table);
						            		 return false;
						            	}else if(index == 0 && sort > num){
											$(this).before(table);
											return false;
						            	}
						            })
					        	}else{
					        		$('.tbody').append(table);
					        	}
								var model = $('#m_modal_1');
								model.modal('hide');
								//刪除event
								$('.news_remove').click(function(){
									$(this).parent().parent().remove();
								})
							}else{
								swal("錯誤", "新增資料失敗", "error");
							}
						},
						error: function(xhr, type){
							swal("錯誤", "取得資料失敗", "error");
						}
					});
				}else{
					swal("錯誤", "圖片格式錯誤", "error"); //end image type size
				}
			}else{
				swal("錯誤", "請選擇類別", "error"); //end select type
			}
		}else{
			swal("錯誤", "順序錯誤", "error"); //end select type
		}
	})
	//news model clear
	function clear_model(){
		$('.model_type').selectpicker('val','select');
		$('.num').val('');
		$('.model_content').html('');
	}
	//news check data
	$('.news_submit').click(function(){
		var now = new Date();
		var name = $('.name').val();
		var type = $('.type').selectpicker('val');
		var cover = $('.cover').text();
		var status = $('.ad_status').selectpicker('val');
		var stime = $('.stime').val();
		var edtime = $('.edtime').val();
		var content_type = $('.content_type').selectpicker('val');
		var link = $('.url').val();
		if(name == ''){
			swal("錯誤", "標題必填", "error");
		}else if(type == ''){
			swal("錯誤", "類別必填", "error");
		}else if(cover == '請選擇檔案'){
			swal("錯誤", "請上傳列表圖", "error");
		}else if(status == ''){
			swal("錯誤", "請選擇狀態", "error");
		}else if(status == "2" && stime == ''){
			swal("錯誤", "當等待上架時，上架時間必填", "error");
		}else if(stime!='' && edtime != '' && (Date.parse(stime) > Date.parse(edtime))){
			swal("錯誤", "下架時間不可早於上架時間", "error");
		}else if(content_type == ''){
			swal("錯誤", "內容類別為必填", "error");
		}else if(content_type == '2' && link == ''){
			swal("錯誤", "當內容類別為連結時，連結必填", "error");
		}else{
			$('#Newsform').submit();
		}
	})
	//讀取圖片寬
	var reader = new FileReader();
	var img = new Image();
	var width = 0;
	reader.onload = function(e) {
	    img.src = e.target.result;
	}
	img.onload = function() {
		width = this.width;
	    // console.log(this.width);
	    // console.log(this.height);
	}
	//刪除event
	$('.news_remove').click(function(){
		$(this).parent().parent().remove();
	})
	//上移
	function up(id){
		swal({
		  title: "確認更改排序？",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: '確認',
		  cancelButtonText: '取消',
		}).then((result) => {
		  if (result.value) {
		    $('#up_'+id).submit();
		  }
		})
	}
	//下移
	function down(id){
		swal({
		  title: "確認更改排序？",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: '確認',
		  cancelButtonText: '取消',
		}).then((result) => {
		  if (result.value) {
		    $('#down_'+id).submit();
		  }
		})
	}

	//Activity
	$('.activity_save').click(function(){
		var min = $('.min').val();
		var max = $('.max').val();
		var mail = $('.mail').val();
		if(min != '' && max != '' && max != "非數值" && min != "非數值"){
			$.ajax({
				type: 'POST',
				url: '/api/ajax/uploadMoney',
				data: { 'max' : max,'min':min,'mail':mail},
				dataType: 'json',
				headers: {
				'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
			},
				success: function(data){
					if(data.syscode=="200"){
						swal({
						  title: "成功",
						  text: "更新資料成功",
						  type: 'success',
						  showCancelButton: true,
						  confirmButtonColor: '#3085d6',
						  cancelButtonColor: '#d33',
						  confirmButtonText: '確認',
						  cancelButtonText: '取消',
						  showCancelButton: false,
						}).then((result) => {
						  if (result.value) {
						    location.reload();
						  }
						})
					}else{
						swal("錯誤", "更新資料失敗", "error");
					}
				},
				error: function(xhr, type){
					swal("錯誤", "取得資料失敗", "error");
				}
			});
		}else{
			swal("錯誤", "數值錯誤", "error");
		}
		
	})

	//将数字转换成金额显示
	function toMoney(num){
	    num = num.toFixed(2);
	    num = parseFloat(num)
	    num = num.toLocaleString();
	    return num;//返回的是字符串23,245.12保留2位小数
	}

	$('.min').change(function(){
		$(this).val(toMoney(Number($(this).val())));
	})

	$('.max').change(function(){
		$(this).val(toMoney(Number($(this).val())));
	})

	function check_offline(id){
		swal({
		  title: "確認下架",
		  text: "下架後，無法復原!",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: '確認',
		  cancelButtonText: '取消',
		}).then((result) => {
		  if (result.value) {
		    $('#delete_'+id).submit();
		  }
		})
	}

	//offer check for
	$('.check_for').click(function(){
		console.log('check_for');
		$('.import_file').hide();
		$('.check_list').show();
		$('.check_list').find("input[type='checkbox']").each(function(){
			$(this).attr('disabled',false);
		})
	})
	//offer check all
	$('.offer_checkall').click(function(){
		if($(this).prop('checked')){
			$('.check_list').find(".child").each(function(){
				$(this).prop('checked',true)
			})
		}else{
			$('.check_list').find(".child").each(function(){
				$(this).prop('checked',false)
			})
		}
		
	})
	//check list data
	$('.check_list').find('.m-checkbox').click(function(){
		var check_value = Array();
		$(this).parent().find("input[type='checkbox']").each(function(){
			var value = $(this).val();
			if($(this).prop('checked') && value != "ALL"){
				check_value.push(value);
			}
		})
		$('.for_list').val(check_value.join(','));
	})
	//offer import
	$('.import').click(function(){
		console.log('import');
		$('.import_file').show();
		$('.check_list').hide();
		$('.check_list').find("input[type='checkbox']").each(function(){
			$(this).attr('disabled',true);
		})
	})

	//offer for all
	$('.For_all').click(function(){
		$('.import_file').hide();
		$('.check_list').hide();
		$('.check_list').find("input[type='checkbox']").each(function(){
			$(this).attr('disabled',true);
		})
	})

	//Event push_schedule
	$('.push_schedule').click(function(){
		$('.schedule_time').attr('disabled',false);
	})
	//Event push_now
	$('.push_now').click(function(){
		$('.schedule_time').attr('disabled',true);
	})
    //booking checkall
    $('.booking_check_all').click(function(){
    	if($(this).prop('checked')){
    		$('.child').find("input[type='checkbox']").each(function(){
				$(this).prop('checked',true);
			})
    	}else{
    		$('.child').find("input[type='checkbox']").each(function(){
				$(this).prop('checked',false);
			})
    	}
    })
    //booking check list data
	$('.booking_check_list').find('.m-checkbox').click(function(){
		var check_value = Array();
		$(this).parent().find("input[type='checkbox']").each(function(){
			var value = $(this).val();
			if($(this).prop('checked') && value != "ALL"){
				check_value.push(value);
			}
		})
		$('.time_list').val(check_value.join(','));
	})
	//booking change date
	$('#datepicker_book').on('changeDate', function(e) {
		var date = moment(e.date).format('YYYY/MM/DD');
		var unixtime = e.date.getTime()+8*60*60*1000; //UTC+8
		$( "td[data-date='"+unixtime+"']" ).css('background','#BD9060');
        $.ajax({
			type: 'POST',
			url: '/api/ajax/getSchedule',
			data: { 'date' : date},
			dataType: 'json',
			headers: {
			'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
		},
			success: function(data){
				if(data.syscode=="200"){
					$('.schedule_list').html(data.data[0].list);
					$('.delete_btn').show();
					$('#delete').attr('action',('/admin/Book/Book/'+data.data[0]['id']));
				}else{
					// swal("錯誤", "更新資料失敗", "error");
					$('.schedule_list').html('無');
					$('.delete_btn').hide();
					// console.log('no data');
				}
				$.each(data.list, function( index, value ) {
						var date = new Date(value['year'],value['month']-1,value['day'],8).getTime();
						$( "td[data-date='"+date+"']" ).css('background','#F6E6CF');
				});
			},
			error: function(xhr, type){
				// swal("錯誤", "取得資料失敗", "error");
				console.log('ajax error');
			}
		});
    });
    //booking change month
    $('#datepicker_book').on('changeMonth', function(e) {
    	var date = moment(e.date).format('YYYY/MM/DD');
        console.log(date);
  		$.ajax({
			type: 'POST',
			url: '/api/ajax/getScheduleMonth',
			data: { 'date' : date},
			dataType: 'json',
			headers: {
			'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
		},
			success: function(data){
				if(data.syscode=="200"){
					$.each(data.data, function( index, value ) {
						var date = new Date(value['year'],value['month']-1,value['day'],8).getTime();
						$( "td[data-date='"+date+"']" ).css('background','#F6E6CF');
					});
				}else{
					// swal("錯誤", "更新資料失敗", "error");
					console.log('no data');
				}
			},
			error: function(xhr, type){
				// swal("錯誤", "取得資料失敗", "error");
				console.log('ajax error');
			}
		});
    });

    //booking delete
	function book_delete(){
		swal({
		  title: "確認刪除",
		  text: "刪除後，無法復原!",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: '確認',
		  cancelButtonText: '取消',
		}).then((result) => {
		  if (result.value) {
		    $('#delete').submit();
		  }
		})
	}
    
    //offer_type change get ajax data
    $('.offer_type').change(function(){
    	var type = $(this).val();
    	console.log(type);
    	if(type == "0"){ //一般
    		$('.code').show();
    		$('.red_code_select').hide();
    	}else if(type == "1"){ //紅包
    		$('.code').hide();
    		$('.red_code_select').show();
    	}else{
    		//error
    	}
    })
