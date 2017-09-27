$(function(){
	
	$(".yz_zan").live('click',function(){		
		var obj = $(this);
		var newsid = parseInt(obj.parent().prevAll(".zan_newsid").val());
		var Num = parseInt(obj.text());
		//alert(newsid);
		obj.css({cursor:"default"}); 
		$.ajax({
			type:"post",
			url:url,
			data:"num="+Num+"&id="+newsid,
			dataType:"json",
			error:function(){alert("error");}, 
			success:function(data){
				//alert(data.res);
				if(data.info == 1){
					obj.text(data.res);
					obj.css({ backgroundPosition: "-47px -327px", color: "#406ca9", textDecoration: "none", cursor: "default"});
					obj.after("<em>+1</em>");
					$("em").fadeOut('slow');
				}else{
					obj.css({cursor:"default"});
					obj.removeAttr('href');
					alert(data.resinfo);
					return false;
				}
			}

		})
	})
	
})