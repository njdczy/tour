@include('wechat.layouts.header')
<body>
		<div class="container">
			
		<div class="page uploader js_show">
		   <p class="head-title">2016年北京延庆秋季亲子游照片</p>
			<article>
				<h4>怀念这样的地方——</h4>
				<p>
					有斑斓缤纷的连绵秋色，有暮霭中山脚下宁静的小院，有和煦而温暖阳光里的乡里人家，有一望无际的山和宛如被心灵纯透过的水，还有像你我一样来找寻行走与隐居感觉的旅 行者，离开的久了，会怀念这样的地方
				</p>
			</article>
		    <div class="page__bd">
		        <div class="weui-gallery" id="gallery" style=" display: none;">
		            	<div class="gallery-box">
		            		<img class="weui-gallery__img imgs" id="galleryImg" />
		            	</div>
		            <div id="">
		            	
		            </div>
		        </div>
		        <div class="weui-cells weui-cells_form">
		            <div class="weui-cell">
		                <!--<div class="weui-cell__bd">-->
		                    <div class="weui-uploader">		                   
		                        <div class="weui-uploader__bd">
		                            <ul class="weui-uploader__files" id="imgFiles">
		                                <li class="weui-uploader__file" data-src="/images/byq/child.jpg" style="background-image:url(/images/byq/child.jpg)"></li>
		                                <li class="weui-uploader__file" data-src="/images/byq/child.jpg" style="background-image:url(/images/byq/child.jpg)"></li>
		                                <li class="weui-uploader__file" data-src="/images/byq/child.jpg" style="background-image:url(/images/byq/child.jpg)"></li>
		                                <li class="weui-uploader__file" data-src="/images/byq/child.jpg" style="background-image:url(/images/byq/child.jpg)"></li>
		                                <li class="weui-uploader__file middle" data-src="/images/byq/zhongxin.png" style="background: url(/images/byq/zhongxin.png) 0 0 no-repeat;background-size: contain;"></li>
		                                <li class="weui-uploader__file" data-src="/images/byq/child.jpg" style="background-image:url(/images/byq/child.jpg)"></li>
		                                <li class="weui-uploader__file" data-src="/images/byq/child.jpg" style="background-image:url(/images/byq/child.jpg)"></li> 
		                                <li class="weui-uploader__file" data-src="/images/byq/child.jpg" style="background-image:url(/images/byq/child.jpg)"></li>
		                                <li class="weui-uploader__file" data-src="/images/byq/child.jpg" style="background-image:url(/images/byq/child.jpg)"></li>
		                            </ul>
		                        </div>
		                    <!--</div>-->
		                </div>
		            </div>
		        </div>
    		</div>
		</div>
	<script src="/js/zepto.min.js" type="text/javascript"></script>
	<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
	<script type="text/javascript" class="uploader js_show">
	    $(function(){
	        var tmpl = '<li class="weui-uploader__file" style="background-image:url(#url#)"></li>',
	            $gallery = $("#gallery"), $galleryImg = $("#galleryImg"),
	            $Files = $("#imgFiles")
	        $Files.on("click", "li", function(){
	        	if($(this).index() == 4){
	        		return false;
	        	}
	        	$('.imgs').attr("src",this.getAttribute("data-src"));
	            $gallery.fadeIn(100);
	        });
	        $gallery.on("click", function(){
	            $gallery.fadeOut(100);
	        });
	    });
	</script>
		
	</div>
		
</body>
	<script src="https://res.wx.qq.com/open/libs/weuijs/1.0.0/weui.min.js"></script>
</html>