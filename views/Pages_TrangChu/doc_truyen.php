<?php require_once "./libs/functions.php";
	// $title_truyen = "da-doc-truyen-".$_GET['title'];
	// $link = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

	// setcookie("test", "yasuo", time() + 10, "/"); //2592000
?>
<ol class="breadcrumb shadow-sm">
	<li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i> Home</a></li>
	<li class="breadcrumb-item"><a href="truyen/<?php echo $_GET['title']; ?>.html"><?php echo $data['tua_truyen']; ?></a></li>
	<li class="breadcrumb-item active" aria-current="page">Chương <?php echo $data['chuong']['num_chap']; ?></li>
</ol>

<div class="container-fluid px-0 mb-3">
	<div id="body-truyen" class="container-fluid myboder-2 shadow-sm" <?php if(isset($_COOKIE['tangkinhcac_bgColor'])) echo 'style="background: '.$_COOKIE['tangkinhcac_bgColor'].';"'; ?>>
		<div class="setting-page mt-0">
			<span id="setting" class="btn btn-setting float-right"><i class="fad fa-cog"></i></span>
			<div class="cls"></div>
		</div>
		<div class="title-read-truyen mb-5">
			<h4 class="text-center font-roman font-weight-bolder">Chương <?php echo $data['chuong']['num_chap']; ?><br><?php echo $data['chuong']['title']; ?></h4>
		</div>
		<div class="content-truyen">
			<div class="phan-trang mb-3">
				<a class="btn my-btn-luot btn-trai btn-outline-secondary <?php echo $data['chuong_truoc']['id']; ?>" href="doc-truyen/<?php echo $_GET['title']; ?>/<?php echo $data['chuong_truoc']['title_u']; ?>-<?php echo $data['chuong_truoc']['id']; ?>.html">← Prev</a>
				<a class="btn my-btn-luot btn-phai float-right btn-outline-secondary <?php echo $data['chuong_sau']['id']; ?>" href="doc-truyen/<?php echo $_GET['title']; ?>/<?php if(isset($data['chuong_sau']['title_u'])) echo $data['chuong_sau']['title_u']; ?>-<?php echo $data['chuong_sau']['id']; ?>.html">Next →</a>
			</div>

			<div id="content-noi-dung" class="px-3">
				<?php
					if($data['chuong']['lock_chap'] == 0)
						echo $data['chuong']['content'];
					else
						echo '
							<div class="khoa-chuong text-center">
								<i class="fas fa-lock-alt fa-4x text-danger"></i>
								<h1 style="font-family: -apple-system,BlinkMacSystemFont,Segoe\ UI,Roboto,Oxygen,Ubuntu,Cantarell,Fira\ Sans,Droid\ Sans,Helvetica\ Neue,sans-serif;" class="text-primary">Cần Mở Khóa Để Xem Nội Dung</h1>
							</div>
						';
				?>	
			</div>

			<div class="phan-trang mb-3">
				<a class="btn my-btn-luot btn-trai btn-outline-secondary <?php echo $data['chuong_truoc']['id']; ?>" href="doc-truyen/<?php echo $_GET['title']; ?>/<?php echo $data['chuong_truoc']['title_u']; ?>-<?php echo $data['chuong_truoc']['id']; ?>.html">← Prev</a>
				<a class="btn my-btn-luot btn-phai float-right btn-outline-secondary <?php echo $data['chuong_sau']['id']; ?>" href="doc-truyen/<?php echo $_GET['title']; ?>/<?php if(isset($data['chuong_sau']['title_u'])) echo $data['chuong_sau']['title_u']; ?>-<?php echo $data['chuong_sau']['id']; ?>.html">Next →</a>
			</div>

			<div class="info-chap pb-2">
				<div class="mt-3"></div>
				<p class="py-0 px-3"><b>Cập nhật:</b> <?php echo DateToTime($data['chuong']['date_post']); ?></p>
				<p class="py-0 px-3"><b>Số chữ:</b> <?php echo MyWorldCount($data['chuong']['content']); ?></p>
			</div>
		</div>

		<div id="popu-father" class="container-fluid">
			<div id="span-close-nha"><span class="btn border-light rounded-circle float-right btn-closeee text-center mr-3 mt-2"><i class="far fa-times"></i></span><div class="cls"></div></div>
			
			<div id="popu" class="container">
				<form name="f_Font">
					<label class="font-weight-bolder text-light mt-2">Font Chữ</label>
					<select class="chonFont form-control">
						<option value="Helvetica" <?php if(isset($_COOKIE['tangkinhcac_fontFam']) && $_COOKIE['tangkinhcac_fontFam'] == "Helvetica"){echo 'selected';}?> >Helvetica</option>
						<option value="Times New Roman" <?php if(isset($_COOKIE['tangkinhcac_fontFam']) && $_COOKIE['tangkinhcac_fontFam'] == "Times New Roman"){echo 'selected';}?>>Times New Roman</option>
						<option value="Lora" <?php if(isset($_COOKIE['tangkinhcac_fontFam']) && $_COOKIE['tangkinhcac_fontFam'] == "Lora"){echo 'selected';}?>>Lora</option>
						<option value="Playfair Display" <?php if(isset($_COOKIE['tangkinhcac_fontFam']) && $_COOKIE['tangkinhcac_fontFam'] == "Playfair Display"){echo 'selected';}?>>Playfair Display</option>
						<option value="Open Sans Condensed" <?php if(isset($_COOKIE['tangkinhcac_fontFam']) && $_COOKIE['tangkinhcac_fontFam'] == "Open Sans Condensed"){echo 'selected';}?>>Open Sans Condensed</option>
						<option value="Raleway" <?php if(isset($_COOKIE['tangkinhcac_fontFam']) && $_COOKIE['tangkinhcac_fontFam'] == "Raleway"){echo 'selected';}?>>Raleway</option>
						<option value="David Libre" <?php if(isset($_COOKIE['tangkinhcac_fontFam']) && $_COOKIE['tangkinhcac_fontFam'] == "David Libre"){echo 'selected';}?> >David Libre</option>
					</select>
				</form>

				<form name="f_Size">
					<label class="font-weight-bolder text-light mt-2">Size Chữ</label>
					<select class="form-control chonSize">
						<option value="20px" <?php if(isset($_COOKIE['tangkinhcac_sizeFon']) && $_COOKIE['tangkinhcac_sizeFon'] == "20px"){echo 'selected';}?> >20px</option>
						<option value="21px" <?php if(isset($_COOKIE['tangkinhcac_sizeFon']) && $_COOKIE['tangkinhcac_sizeFon'] == "21px"){echo 'selected';}?> >21px</option>
						<option value="22px" <?php if(isset($_COOKIE['tangkinhcac_sizeFon']) && $_COOKIE['tangkinhcac_sizeFon'] == "22px"){echo 'selected';}?> >22px</option>
						<option value="23px" <?php if(isset($_COOKIE['tangkinhcac_sizeFon']) && $_COOKIE['tangkinhcac_sizeFon'] == "23px"){echo 'selected';}?> >23px</option>
						<option value="24px" <?php if(isset($_COOKIE['tangkinhcac_sizeFon']) && $_COOKIE['tangkinhcac_sizeFon'] == "24px"){echo 'selected';}?> >24px</option>
						<option value="25px" <?php if(isset($_COOKIE['tangkinhcac_sizeFon']) && $_COOKIE['tangkinhcac_sizeFon'] == "25px"){echo 'selected';}?> >25px</option>
						<option value="26px" <?php if(isset($_COOKIE['tangkinhcac_sizeFon']) && $_COOKIE['tangkinhcac_sizeFon'] == "26px"){echo 'selected';}?> >26px</option>
						<option value="27px" <?php if(isset($_COOKIE['tangkinhcac_sizeFon']) && $_COOKIE['tangkinhcac_sizeFon'] == "27px"){echo 'selected';}?> >27px</option>
						<option value="28px" <?php if(isset($_COOKIE['tangkinhcac_sizeFon']) && $_COOKIE['tangkinhcac_sizeFon'] == "28px"){echo 'selected';}?> >28px</option>
						<option value="29px" <?php if(isset($_COOKIE['tangkinhcac_sizeFon']) && $_COOKIE['tangkinhcac_sizeFon'] == "29px"){echo 'selected';}?> >29px</option>
						<option value="30px" <?php if(isset($_COOKIE['tangkinhcac_sizeFon']) && $_COOKIE['tangkinhcac_sizeFon'] == "30px"){echo 'selected';}?> >30px</option>
					</select>
				</form>

				<form name="f_Them">
					<label class="font-weight-bolder text-light mt-2">Giao Diện</label>
					<select class="form-control chonBackGround">
						<option value="url(./public/images/skin-default.jpg)" <?php if(isset($_COOKIE['tangkinhcac_fontFam']) && $_COOKIE['tangkinhcac_fontFam'] == "url(images/skin-default.jpg)"){echo 'selected';}?> >Cổ Trang</option>
						<option value="#FFFFFF" <?php if(isset($_COOKIE['tangkinhcac_bgColor']) && $_COOKIE['tangkinhcac_bgColor'] == "#FFFFFF"){echo 'selected';}?> >Trắng</option>
						<option value="#e4e2e2" <?php if(isset($_COOKIE['tangkinhcac_bgColor']) && $_COOKIE['tangkinhcac_bgColor'] == "#e4e2e2"){echo 'selected';}?> >Xám</option>
						<option value="#EEEEEE" <?php if(isset($_COOKIE['tangkinhcac_bgColor']) && $_COOKIE['tangkinhcac_bgColor'] == "#EEEEEE"){echo 'selected';}?> >Mạc Định</option>
					</select>
				</form>

			</div>
		</div>
	</div>

	<div class="ah-pif-footer mt-1">
	    <div class="fb-comments" data-href="http://tangkinhcac.atwebpages.com/<?php echo $_GET['title']; ?>" data-numposts="5" data-order-by="reverse_time" colorscheme="light" data-colorscheme="light" data-width="100%" width="100%"></div>      
	</div>

	<script>
		(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.1&appId=527870361017285&autoLogAppEvents=1";
		fjs.parentNode.insertBefore(js, fjs);
		}(document, "script", "facebook-jssdk"));
	</script>

</div>

<script>
	$(document).ready(function(){
    	$("#setting").click(function(){
			$("#popu-father").show();
    	});

    	$("#span-close-nha").click(function(){
			$("#popu-father").hide();
    	});

    	$("select.chonFont").change(function(){
        	var selectedCountry = $(this).children("option:selected").val();
        	$('#content-noi-dung').css("font-family", selectedCountry);
        	setCookie("tangkinhcac_fontFam",SetValueCookie(selectedCountry), 365);
    	});

    	$("select.chonBackGround").change(function(){
        	var selectedCountry = $(this).children("option:selected").val();
        	$('#body-truyen').css("background", selectedCountry);
        	setCookie("tangkinhcac_bgColor",SetValueCookie(selectedCountry), 365);
    	});

    	$("select.chonSize").change(function(){
        	var selectedCountry = $(this).children("option:selected").val();
        	$('#content-noi-dung').css("font-size", selectedCountry);
        	setCookie("tangkinhcac_sizeFon",SetValueCookie(selectedCountry), 365);
    	});
    });
</script>

<script type="text/javascript">
	function getCookie(cname) {
	    var name = cname + "=";
	    var ca = document.cookie.split(';');
	    for(var i = 0; i <ca.length; i++) {
	        var c = ca[i];
	        while (c.charAt(0)==' ') {
	            c = c.substring(1);
	        }
	        if (c.indexOf(name) == 0) {
	            return c.substring(name.length,c.length);
	        }
	    }
	    return "";
	}

	function setCookie(cname, cvalue, exdays) {
		var d = new Date();
		d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
		var expires = "expires="+d.toUTCString();
		document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
	}

	function ReturnMyCookie(cname){
		var x = unescape(getCookie(cname));
		return x;
	}

	function SetValueCookie(value){
		var str_esc= escape(value);
		return str_esc;
	}

	$(document).ready(function(){
		$('#body-truyen').css("background", ReturnMyCookie("tangkinhcac_bgColor"));
		$('#content-noi-dung').css("font-family", ReturnMyCookie("tangkinhcac_fontFam"));
		$('#content-noi-dung').css("font-size", ReturnMyCookie("tangkinhcac_sizeFon"));
	});
</script>

<script type="text/javascript">
	$('title').text('Truyện <?php echo $data['tua_truyen']; ?> - Chương <?php echo $data['chuong']['num_chap']; ?>: <?php echo $data['chuong']['title']; ?>');
</script>