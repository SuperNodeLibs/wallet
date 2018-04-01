/*ss*/
$(function(){
	tosmip_address();//简化地址
	$('.ewmtoggle_btn').click(function(){
		$('.ewm_box').slideToggle(75);
	});
	$('.ewm_box').mouseleave(function(){
		$(this).slideUp(75);
	});
	
	//显示全部
	$('.showall').click(function(){
		$('.trusted_table').toggleClass('showall');
	});
	
	$('.tab_a a').click(function(){
		$('.tab_a a').removeClass('active');
		$(this).addClass('active');
	});
	
	//滑动效果
	$('.arrow_btn_up').click(function(){
		var top = $('.scroll_main').scrollTop();//现高
		$('.scroll_main').animate({scrollTop:top-120},200)
	});//up
	$('.arrow_btn_down').click(function(){
		var top = $('.scroll_main').scrollTop();//现高
		$('.scroll_main').animate({scrollTop:top+120},200)
	});//down
	
	//reset_passtype
	$('.reset_passtype').click(function(){
		if($(this).find('input:checked').parent().index()==1){
			$('.login_pass').show();
			$('.pay_pass').hide();
		}
		if($(this).find('input:checked').parent().index()==2){
			$('.pay_pass').show();
			$('.login_pass').hide();
		}
	});
	
	
	
	//timepicker
	$('.dp_date').datetimepicker({
        language:  'zh-CN',
        weekStart: 0,
        startDate:new Date(),
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		format:'yyyy-mm-dd'
    });
    
    //height-option show
    $('.h_option_btn').click(function(){
    	$(this).toggleClass('b_active');
    	$(this).parent().siblings('.h_option').slideToggle(100);
    });
})
function tosmip_address(){
	$('.simp_address').each(function(){
		var txt = $(this).text();
		txt = txt.substring(0,4)+'*****'+txt.substring(txt.length-4);
		$(this).text(txt);
	});
}


/*读取信任网关*/
function loadXRWG(){
	$('.asset_create_box').hide();
	$('.asset_control').show();
}
/*新建网关*/
function createWG(){
	$('.asset_create_box').show();
	$('.asset_control').hide();
}

/*新增信任网关*/
function addWG(){
	$('.asset_edit_box').hide();
	$('.searchadd_box').show();
}

/*搜索显示网关*/
function showWG(){
	$('.asset_edit_box').show();
	$('.searchadd_box').hide();
}

/*充值详情*/
function showCZXQ(_this_){
	$('.cz_table').hide();
	$('.table_cz_xx').show();
}
/*充值详情返回*/
function hideCZXQ(){
	$('.cz_table').show();
	$('.table_cz_xx').hide();
}

/*提现详情*/
function showTXXQ(){
	$('.tx_table').hide();
	$('.table_tx_xx').show();
}
/*提现详情返回*/
function hideTXXQ(_this_){
	$('.tx_table').show();
	$('.table_tx_xx').hide();
}



/*-------------loading -------------*/
loadingmenu = "<main class=\"loaded\" style='z-index:9999'><div class=\"loaders\"><div class=\"loader\"><div class=\"loader-inner line-spin-fade-loader\"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div><div class=\"loadingtxt\">"+ONLOADING_TXT+"...</div></div></main>"
function addloading(){
	 $('html').append(loadingmenu);
	  setTimeout(function(){
		  delloading();
		  },1500);
	}
function delloading(){
		$('main').remove();
		}
		

//errortips
errormsg = "错误信息";
function adderror(errormsg){
errormenu = "<main class=\"loaded\" Onclick=\"delerror();\"><div class=\"loaders\"><div class=\"delerror\" Onclick=\"delerror();\">&times;</div><div class=\"loader\"><div class=\"glyphicon glyphicon-exclamation-sign errortips\"></div></div><div class=\"loadingtxt\">"+errormsg+"</div></div></main>"

	 $('html').append(errormenu);
	 /* setTimeout(function(){
		  delerror();
		  },1500);*/
	}
function delerror(){
		$('main').remove();
		}	
		
//点击hover

//longload
function addlongloading(){
	 $('html').append(loadingmenu);
	}