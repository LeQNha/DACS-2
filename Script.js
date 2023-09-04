
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
  var avatar = document.querySelector(".avatar");
  if (submenu.style.display === "none") {
    avatar.style.borderColor = "lightgrey";
    submenu.style.display = "block";
  } else {
    avatar.style.borderColor = "transparent";
    submenu.style.display = "none";
  }
}


// AJAX DĂNG NHẬP ĐĂNG KÝ

// function submitData() {
//   $.ajax({
//     type: "POST",
//     url: "Login.php",
//     data: $("#loginForm").serialize(),
//     success: function(response) {
//       if(response === "success") {
//         alert("Đăng nhập thành công!");
//         window.location.href = "Home.php"; // Điều hướng tới trang chính hoặc trang khác

//       }else {
//         alert("Tên đăng nhập hoặc mật khẩu không đúng!");
//         window.location.href = "Home.php"; // Điều hướng tới trang chính hoặc trang khác
       
//       }
//     }
//   });
// }

// AJAX DANG NHAP
function submitLoginData(){
  var xhr = new XMLHttpRequest();
  var formData = new FormData(document.getElementById("loginForm"));

  xhr.open('POST', 'Login.php');

  event.preventDefault();

  xhr.onload = function(){
    var receivedData = JSON.parse(xhr.responseText);
    if(xhr.status == 200){
      if(receivedData.status == 'success'){
        window.location.href = "Home.php";
      }else{
        alert('Sai tài khoản hoặc mật khẩu!');
      }
    }
  };
  xhr.send(formData);
};
// AJAX DANG KY
function submitRegisterData(){
  var xhr = new XMLHttpRequest();
  var formData = new FormData(document.getElementById("registerForm"));

  xhr.open('POST','Register.php');

  event.preventDefault();

  xhr.onload= function(){
    // var receivedData = JSON.parse(xhr.responseText);
    if(xhr.responseText == "duplicate"){
      alert('Tài khoản đã tồn tại');
    }else if(xhr.responseText == "success"){
      alert('Đăng ký thành công');
      window.location.href = "Home.php";
    }else if(xhr.responseText == "password not match"){
      alert('Mật khẩu không trùng khớp');
    }else{
      alert('Không được để trống');
    }
  };
  xhr.send(formData);
}


//Show img details

function ShowDetails(pid){
  var imgDetailsContainer = document.querySelector('.show-details');
  var detailTile = document.querySelector('.detail-title');
  var detailImg = document.querySelector('.detail-img');
  
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'ShowProductDetails.php');
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onload = function() {
    var receivedData = JSON.parse(xhr.responseText);
    imgDetailsContainer.style.display = "block";
    // imgDetailsContainer.innerHTML = receivedData.title;
    detailTile.textContent = receivedData.title;
    detailImg.src = "./img/"+receivedData.path;
    
  };

  xhr.send("pid=" + encodeURIComponent(pid));
}
//close show details
var closeShowDetailsButton = document.querySelector('.close-show-details');
  closeShowDetailsButton.addEventListener('click',function(){
  var imgDetailsContainer = document.querySelector('.show-details');
  imgDetailsContainer.style.display = "none";
});