	<span class="login100-form-title p-t-20 p-b-20">
		Create New Account
	</span>
	<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
		<input type="text" id="nama" placeholder="Full Name" class="input100" autocomplete="off">
		<span class="focus-input100"></span>
		<span class="symbol-input100">
			<i class="fa fa-user"></i>
		</span>
	</div>
	<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
		<input type="text" id="alamat" placeholder="Address" class="input100" autocomplete="off">
		<span class="focus-input100"></span>
		<span class="symbol-input100">
			<i class="fa fa-map"></i>
		</span>
	</div>
	<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
		<input type="number" id="telp" placeholder="Phone" class="input100" autocomplete="off">
		<span class="focus-input100"></span>
		<span class="symbol-input100">
			<i class="fa fa-phone"></i>
		</span>
	</div>
	<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
		<input type="text" id="mail" placeholder="Email" class="input100" autocomplete="off">
		<span class="focus-input100"></span>
		<span class="symbol-input100">
			<i class="fa fa-envelope"></i>
		</span>
	</div>
	<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
		<input type="text" id="usr" placeholder="Username" class="input100" autocomplete="off">
		<span class="focus-input100"></span>
		<span class="symbol-input100">
			<i class="fa fa-user"></i>
		</span>
	</div>
	<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
		<input type="password" id="pass" class="input100" placeholder="Password">
		<span class="focus-input100"></span>
		<span class="symbol-input100">
			<i class="fa fa-lock"></i>
		</span>
	</div>

	<div class="container-login100-form-btn p-t-10">
		<button class="login100-form-btn" id="new" style="background-color: #DC4F41">
			Create Account
		</button>
	</div>

	<div class="container-login100-form-btn p-t-10">
		<a href="index.php" class="login100-form-btn" style="background-color: #DC4F41">
			Cancle
		</a>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#new').on('click',function(){
				var nama = $('#nama').val();
				var alamat = $('#alamat').val();
				var telp = $('#telp').val();
				var mail = $('#mail').val();
				var usr = $('#usr').val();
				var pass = $('#pass').val();
				$.ajax({
					url:'login/buat_akun.php',
					type:'post',
					data:'nama='+nama+'&alamat='+alamat+'&telp='+telp+'&usr='+usr+'&pass='+pass+'&mail='+mail,
					success:function(response){
						if (response=="empty_input"){
							swal({
							title:'Lengkapi data akun',
							text:'',
							type: 'warning'
							});
						}
						else if (response=="same_usr"){
							swal({
							title: 'Change Username',
							text: 'Your username used by other',
							type: 'error'
							});
						}
						else if(response=="same_mail"){
							swal({
							title: 'Change Email',
							text: 'Your e-mail used by other',
							type: 'error'
							});
						}
						else{
							setTimeout(function () { 
							swal({
								title: 'Account Created',
								type: 'success',
								showConfirmButton: false,
								timer: 1450,
							});  
							},10);
							setTimeout(function () {
								window.location.href= 'index.php';
								},1330); 
						}
					}
				})
			})
		})
	</script>