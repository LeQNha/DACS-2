<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoginT</title>
    <link rel="stylesheet" href="css/LoginRegister.css">

    <script>
        function submitLoginData(){
            var xhr = new XMLHttpRequest();
            var formData = new FormData(document.getElementById('loginForm'));
            xhr.open('POST', 'LoginProcess.php', true);

            xhr.onload = function(){
                if(xhr.status === 200){
                    if(xhr.responseText === 'success'){
                        window.location.href = 'Home.php';
                    }else{
                        alert(xhr.responseText);
                    }
                }else{
                    alert('Đã xảy ra lỗi! Hãy thử lại.');
                }
            }
            xhr.send(formData);
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="form-box login-form" id="login-form">
            <h1>Đăng nhập</h1>
            <form action="#" method="post" id="loginForm">
                <input type="text" name="username" id="username" placeholder="Tài khoản" required>                
                <input type="password" name="password" id="password" placeholder="Mật khẩu" required>
                        
                <a href="#" class="forgot-password"><p>Quên mật khẩu?</p></a>

                <button type="submit" name="submit" onclick="submitLoginData()">Đăng nhập</button>
                            
                <p class="not-have-account">Chưa có tài khoản? <a href="Register.php" class="switch" id="switch-to-sign-up">Đăng ký</a></p>
            </form>
        </div>
    </div>
</body>
</html>