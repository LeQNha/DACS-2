
var coverDiv = document.getElementById('cover-div');
const loginBtn = document.querySelector('#dang-nhap');

document.getElementById('dang-nhap').addEventListener('click', LoginPopOut);
var loginForm = document.getElementById('login-form');
var signUpForm = document.getElementById('sign-up-form');
document.getElementById('dang-ky').addEventListener('click',SignUpPopOut);


function SignUpPopOut(){
  signUpForm.style.top ='100px';
  coverDiv.style.top = '0px';
  if(loginForm.style.top ==='140px'){
    loginForm.style.top = '-800px';
  }
}
function LoginPopOut(){
    loginForm.style.top='140px';
    coverDiv.style.top = '0px';
    if(signUpForm.style.top ==='100px'){
      signUpForm.style.top = '-800px';
    }
}
document.getElementById("close-login").addEventListener('click',CloseLogin);
function CloseLogin(){
   coverDiv.style.top = '-100%';
   loginForm.style.top = '-800px';
}
document.getElementById("close-sign-up").addEventListener('click',CloseSignUp);
function CloseSignUp(){
   coverDiv.style.top = '-100%';
   signUpForm.style.top = '-800px';
}
document.getElementById("switch-to-login").addEventListener('click',SwitchToLogin);
function SwitchToLogin(){
    signUpForm.style.top = '-800px';
    loginForm.style.top = '140px';
 
}
document.getElementById("switch-to-sign-up").addEventListener('click',SwitchToSignUp);
function SwitchToSignUp(){
    loginForm.style.top = '-800px';
    signUpForm.style.top = '100px';
 
}


/////////
const scrollUp = document.querySelector(".scroll-up");
const header = document.querySelector(".header");
window.addEventListener("scroll", function () {
  var scroll = this.window.scrollY;
  if (scroll > 100) {
    scrollUp.style.left = '96%';
  } else {
    scrollUp.style.left = '100%';
  }
});



//open submenu by clicking on avatar
function ShowSubmenu() {
  var submenu = document.getElementById("submenu");
  if (submenu.style.display === "none") {
    submenu.style.display = "block";
  } else {
    submenu.style.display = "none";
  }
}


// AJAX DĂNG NHẬP ĐĂNG KÝ

function submitData() {
  console.log("an");
  $.ajax({
    type: "POST",
    url: "Login.php",
    data: $("#loginForm").serialize(),
    success: function(response) {
      if(response === "success") {
        alert("Đăng nhập thành công!");
        window.location.href = "Home.php"; // Điều hướng tới trang chính hoặc trang khác

      }else {
        alert("Tên đăng nhập hoặc mật khẩu không đúng!");
        // window.location.href = "Home.php"; // Điều hướng tới trang chính hoặc trang khác
       
      }
    }
  });
}

// $(document).ready(function() {
//   $('#loginForm').submit(function(event) {
//     event.preventDefault(); // Ngăn chặn form gửi đi

//     // Lấy dữ liệu từ các trường input
//     var username = $('#username').val();
//     var password = $('#password').val();

//     $.ajax({
//       url: 'Login.php',
//       type: 'post',
//       data: {
//         username: username,
//         password: password,
//         submit: true
//       },
//       dataType: 'json', // Đặt dataType thành 'json' để xử lý phản hồi từ server
//       success: function(response) {
//         if (response.status === 'success') {
//           alert('Đăng nhập thành công');
//           window.location.href = 'Home.php'; // Chuyển hướng đến trang Home.php
//         } else {
//           alert('Tên đăng nhập hoặc mật khẩu không chính xác');
//         }
//       },
//       error: function(xhr, textStatus, errorThrown) {
//         console.log(xhr.responseText);
//         console.log(textStatus);
//         console.log(errorThrown);
//         alert('Có lỗi xảy ra trong quá trình gửi yêu cầu');
//       }
//     });
//   });
// });
