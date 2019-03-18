$(function () {
    $('#datepicker_book').datepicker({
        inline: true,
        sideBySide: true,
        format: "dd/mm/yyyy",
    });
    var date = moment(new Date()).format('YYYY/MM/DD');
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
				// console.log('no data');
			}
		},
		error: function(xhr, type){
			// swal("錯誤", "取得資料失敗", "error");
			// console.log('ajax error');
		}
	});

});