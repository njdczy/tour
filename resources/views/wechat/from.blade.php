
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link rel="stylesheet" type="text/css" href="/css/example.css"/>
		<link rel="stylesheet" type="text/css" href="/css/weui.css"/>
		<link rel="stylesheet" type="text/css" href="/css/style.css"/>
		<title>报名表</title>
	</head>
	<body>
		<div class="container">
			<p class="head-title">{{$trip->name}}—报名表</p>
			<p class="subtitle">请认真填写表单</p>
			<div class="adds"> 
				<h3 class="Info">小朋友信息<span class="nums">(1)</span></h3>
				<div class="weui-cells__title">小朋友姓名 <span> *</span></div>
				<div class="weui-cells">
		            <div class="weui-cell">
		                <div class="weui-cell__bd">
		                    <input class="weui-input" type="text" placeholder="小朋友姓名" value="" name="inputChild">
		                </div>
		           	</div>
	        	</div>
	        	<div class="weui-cells__title">证件号码 <span> *</span></div>
				<div class="weui-cells">
		            <div class="weui-cell">
		                <div class="weui-cell__bd">
		                    <input class="weui-input" type="text" placeholder="证件号码" value=""  name="inputID">
		                </div>
		           	</div>
	        	</div>
	        	<div class="weui-cells__title">身高<span> *</span></div>
				<div class="weui-cells">
		            <div class="weui-cell">
		                <div class="weui-cell__bd">
		                    <input class="weui-input" type="text" placeholder="身高" value=""  name="inputHeight">
		                </div>
		           	</div>
	        	</div>
	        	<div class="weui-cells__title">体重（kg）<span> *</span></div>
				<div class="weui-cells">
		            <div class="weui-cell">
		                <div class="weui-cell__bd">
		                    <input class="weui-input" type="text" placeholder="体重" value="" name="inputWeight">
		                </div>
		           	</div>
	        	</div>
	        	<div class="weui-cells__title">所在学校<span> *</span></div>
				<div class="weui-cells">
		            <div class="weui-cell">
		                <div class="weui-cell__bd">
		                    <input class="weui-input" type="text" placeholder="所在学校" value="" name="inputSchool">
		                </div>
		           	</div>
	        	</div>
			</div>
        	<div class="Btns">
        		<a href="javascript:;" class="weui-btn weui-btn_mini weui-btn_primary more">+</a>
        		<a href="javascript:;" class="weui-btn weui-btn_mini weui-btn_primary reduce">-</a>
        	</div>
        	
        	<h3 class="Info">家长信息</h3>
        	<div class="weui-cells__title">家长姓名<span> *</span></div>
			<div class="weui-cells">
	            <div class="weui-cell">
	                <div class="weui-cell__bd">
	                    <input class="weui-input" type="text" placeholder="家长姓名" value="" name="inputParent">
	                </div>
	           	</div>
        	</div>
        	<div class="weui-cells__title">家长手机<span> *</span></div>
			<div class="weui-cells">
	            <div class="weui-cell">
	                <div class="weui-cell__bd">
	                    <input class="weui-input" type="text" placeholder="家长手机" value="" name="inputTel">
	                </div>
	           	</div>
        	</div>
        	<div class="weui-cells__title">家庭住址<span> *</span></div>
			<div class="weui-cells">
	            <div class="weui-cell">
	                <div class="weui-cell__bd">
	                    <input class="weui-input inputParent" type="text" placeholder="家庭住址" value="" name="inputAdress">
	                </div>
	           	</div>
        	</div>
        	<div class="weui-cells__title">联系邮箱<span> *</span></div>
			<div class="weui-cells">
	            <div class="weui-cell">
	                <div class="weui-cell__bd">
	                    <input class="weui-input" type="text" placeholder="联系邮箱" value="" name=" inputEmail">
	                </div>
	           	</div>
        	</div>
        	<div class="weui-cells__title">微信ID（开营前5天建立微信群<span> *</span></div>
			<div class="weui-cells">
	            <div class="weui-cell">
	                <div class="weui-cell__bd">
	                    <input class="weui-input" type="text" placeholder="微信ID" value="" name=" inputWechat">
	                </div>
	           	</div>
        	</div>
        	<div class="weui-cells__title">家长特殊嘱咐<span> *</span></div>
			<div class="weui-cells">
	            <div class="weui-cell">
	                <div class="weui-cell__bd">
	                    <input class="weui-input" type="text" placeholder="家长特殊嘱咐" value="" name="inputEnjoin">
	                </div>
	           	</div>
        	</div>
        	<h3 class="Info">时间选择</h3>
        	<div class="weui-cells__title">入营时间（按照实际情况选择）<span> *</span></div>
        	<div class="weui-cells weui-cells_checkbox">
	            <label class="weui-cell weui-check__label" for="firstDate">
	                <div class="weui-cell__hd">
	                    <input type="checkbox" class="weui-check" name="firstDate" id="firstDate" checked="checked">
	                    <i class="weui-icon-checked"></i>
	                </div>
	                <div class="weui-cell__bd">
	                    <p>第一期：7月3-7日</p>
	                </div>
	            </label>
	            <label class="weui-cell weui-check__label" for="secondDate">
	                <div class="weui-cell__hd">
	                    <input type="checkbox" name="secondDate" class="weui-check" id="secondDate">
	                    <i class="weui-icon-checked"></i>
	                </div>
	                <div class="weui-cell__bd">
	                    <p>第一期：7月3-7日</p>
	                </div>
	            </label>
	            <label class="weui-cell weui-check__label" for="thirdDate">
	                <div class="weui-cell__hd">
	                    <input type="checkbox" name="thirdDate" class="weui-check" id="thirdDate">
	                    <i class="weui-icon-checked"></i>
	                </div>
	                <div class="weui-cell__bd">
	                    <p>第一期：7月3-7日</p>
	                </div>
	            </label>
	            <label class="weui-cell weui-check__label" for="forthDate">
	                <div class="weui-cell__hd">
	                    <input type="checkbox" name="forthDate" class="weui-check" id="forthDate">
	                    <i class="weui-icon-checked"></i>
	                </div>
	                <div class="weui-cell__bd">
	                    <p>第一期：7月3-7日</p>
	                </div>
	            </label>
	            <label class="weui-cell weui-check__label" for="fifthDate">
	                <div class="weui-cell__hd">
	                    <input type="checkbox" name="fifthDate" class="weui-check" id="fifthDate">
	                    <i class="weui-icon-checked"></i>
	                </div>
	                <div class="weui-cell__bd">
	                    <p>第一期：7月3-7日</p>
	                </div>
	            </label>
	            <label class="weui-cell weui-check__label" for="sixthDate">
	                <div class="weui-cell__hd">
	                    <input type="checkbox" name="sixthDate" class="weui-check" id="sixthDate">
	                    <i class="weui-icon-checked"></i>
	                </div>
	                <div class="weui-cell__bd">
	                    <p>第一期：7月3-7日</p>
	                </div>
	            </label>
	            <label class="weui-cell weui-check__label" for="seventhDate">
	                <div class="weui-cell__hd">
	                    <input type="checkbox" name="seventhDate" class="weui-check" id="seventhDate">
	                    <i class="weui-icon-checked"></i>
	                </div>
	                <div class="weui-cell__bd">
	                    <p>第一期：7月3-7日</p>
	                </div>
	            </label>
	            <label class="weui-cell weui-check__label" for="eighthDate">
	                <div class="weui-cell__hd">
	                    <input type="checkbox" name="eighthDate" class="weui-check" id="eighthDate">
	                    <i class="weui-icon-checked"></i>
	                </div>
	                <div class="weui-cell__bd">
	                    <p>第一期：7月3-7日</p>
	                </div>
	            </label>
        	</div>
        	<div class="page__bd page__bd_spacing">
        		<a href="javascript:;" class="weui-btn weui-btn_primary">提交</a>
        	</div>
        	
		</div>
		
	</body>
	<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
	<script type="text/javascript">
		
		function createEles(){
			var index = $('.adds').prev().index();
			index++;
			var html="<h3 class='Info'>小朋友信息("+index+")</h3>"+'<div class="weui-cells__title">小朋友姓名 <span> *</span></div>'+
	            '<div class="weui-cells"><div class="weui-cell"><div class="weui-cell__bd"><input class="weui-input" type="text" placeholder="小朋友姓名" value="" name="inputChild"></div></div></div>'
	            +'<div class="weui-cells__title">证件号码 <span> *</span></div>'+
	            '<div class="weui-cells"><div class="weui-cell"><div class="weui-cell__bd"><input class="weui-input" type="text" placeholder="证件号码" value="" name="inputID"></div></div></div>'
	            +'<div class="weui-cells__title">身高<span> *</span></div>'+
	            '<div class="weui-cells"><div class="weui-cell"><div class="weui-cell__bd"><input class="weui-input" type="text" placeholder="身高" value="" name="inputHeight"></div></div></div>'
	            +'<div class="weui-cells__title">体重（kg）<span> *</span></div>'+
	            '<div class="weui-cells"><div class="weui-cell"><div class="weui-cell__bd"><input class="weui-input" type="text" placeholder="体重" value="" name="inputWeight"></div></div></div>'
	            +'<div class="weui-cells__title">所在学校<span> *</span></div>'+
	            '<div class="weui-cells"><div class="weui-cell"><div class="weui-cell__bd"><input class="weui-input" type="text" placeholder="所在学校" value="" name="inputSchool"></div></div></div>'
	            ;
			var Adds = document.createElement('div');
			Adds.className = 'adds';	
			Adds.innerHTML = html;
            $(Adds).insertBefore($(".Btns"));
		};
		$('.more').on('click',function(){
			createEles();
			$('.reduce').css('display','inline-block');
			if($('.adds').prev().index() >= 1){
				$('.nums').css('display','inline-block');
			}
		});
		$('.reduce').on('click',function(){
				var adds = $('.adds');
				$('.Btns').prev().remove();
				if($('.adds').prev().index() == 1){
					$('.reduce').css('display','none');
					$('.nums').css('display','none');
			}
				
		});

	</script>
</html>