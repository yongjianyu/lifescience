
function MenuClick(){
	if($('.mobile-search').css('display') == 'block' ){
		$('.mobile-nav').css('margin-bottom','0');
		setTimeout("$('.mobile-search').css('display','none');",300);
	}

	if($('.mobile-sidenav').css('display') == 'none' && $('.mobile-nav').css('margin-bottom') == '0px'){
		$('.mobile-nav').css('margin-bottom','80%');
		$('.mobile-sidenav').css('display','block');
			
	}else{
		$('.mobile-nav').css('margin-bottom','0px');
		setTimeout("$('.mobile-sidenav').css('display','none');",300);
	}
}

function SearchClick(){
	if($('.mobile-sidenav').css('display') == 'block' ){
		$('.mobile-nav').css('margin-bottom','0px');
		setTimeout("$('.mobile-sidenav').css('display','none');",300);
	}

	if($('.mobile-search').css('display') == 'none' && $('.mobile-nav').css('margin-bottom') == '0px'){
		$('.mobile-nav').css('margin-bottom','20%');
		$('.mobile-search').css('display','block');	
	}else{
		$('.mobile-nav').css('margin-bottom','0');
		setTimeout("$('.mobile-search').css('display','none');",300);
	}
}

function MenuClick2(){
  $('.mobile-sidenav').slideToggle();
}

function SearchClick2(){
  $('.mobile-search').slideToggle();
}

function smallmenu(){
  $('.small-menu').slideToggle();
}


$(document).ready(function(){
     
     var $siderImg = $(".slidepic-slide-img ul");
 
     var $siderImgHtml = $siderImg.html();
 
     $siderImg.html($siderImgHtml+$siderImgHtml);  
 
     var $imgWidth = $siderImg.children().eq(0).css("width");  //img元素的宽度
     
     var $size =  $siderImg.children().size();  //img元素的个数
 
     var $ulWidth = $imgWidth.split("px")[0] * $size;   //获取ul中img元素的总宽度
 
     $siderImg.css("width",$ulWidth+"px");   //设置ul中宽度
 
     $leftVar=0;
     
     var $temp=-8;
 
     var $interval = null;
     
//图片滚动方法
    var  moveImg=function()
    { 
       $leftVar=$leftVar+$temp;
        
//判断图片滚动方向
        if($temp>0)   
    {  
      if($leftVar==0)
          {      
           $leftVar =-$ulWidth/2; //向左走重置
          }    
    }
    if($temp<0)
    {
      if($leftVar==-$ulWidth/2)
          {
           $leftVar = 0;  //向右走重置
          }
        }
    $siderImg.css("left",$leftVar+"px");
    };
 
//设置一定时间调用反复调用该函数
   interval = setInterval(moveImg,100);
 
/*鼠标待在元素上面触发该事件*/
    $siderImg.mouseover(function(){
         clearInterval(interval);
    });
/*鼠标移开触发该事件*/
$siderImg.mouseout(function(){
   interval = setInterval(moveImg,100);
})
 
$(".leftmove").click(function(){
 
   $temp = -8;
});
 
$(".rightmove").click(function(){
 
   $temp = 8;
});
});

