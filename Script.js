
var coverDiv = document.getElementById('cover-div');

function CloseLogin(){
   coverDiv.style.top = '-100%';
   loginForm.style.top = '-800px';
}

function CloseSignUp(){
   coverDiv.style.top = '-100%';
   signUpForm.style.top = '-800px';
}
function SwitchToLogin(){
    signUpForm.style.top = '-800px';
    loginForm.style.top = '140px';
 
}

function SwitchToSignUp(){
    loginForm.style.top = '-800px';
    signUpForm.style.top = '100px';
 
}


/////////

window.addEventListener("scroll", function () {
  const scrollUp = document.querySelector(".scroll-up");
const header = document.querySelector(".header");
  var scroll = this.window.scrollY;
  if (scroll > 100) {
    scrollUp.style.left = '96%';
  } else {
    scrollUp.style.left = '100%';
  }
});


//open submenu by clicking on avatar
window.onload = function() {
  var submenu = document.getElementById("submenu");
  submenu.style.display = "none";
};
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
// Ẩn submenu đi
document.addEventListener('click', function(event) {
  var submenu = document.getElementById("submenu");
  var avatar = document.querySelector(".avatar");
  
  // Kiểm tra xem click có xảy ra bên ngoài avatar và submenu hay không
  if (event.target !== avatar && !avatar.contains(event.target)) {
    // Ẩn submenu nếu click xảy ra bên ngoài
    avatar.style.borderColor = "transparent";
    submenu.style.display = 'none';

  }
});


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


//Show img details

function ShowDetails(pid){
  var showDetailsContainer = document.querySelector('.show-details-container');
  var detailTile = document.querySelector('.detail-title');
  var detailImg = document.querySelector('.detail-img');
  
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'ShowProductDetails.php');
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onload = function() {
    var receivedData = JSON.parse(xhr.responseText);
    showDetailsContainer.style.display = "block";
    // imgDetailsContainer.innerHTML = receivedData.title;
    detailTile.textContent = receivedData.title;
    detailImg.src = "./img/"+receivedData.path;
    
  };

  xhr.send("pid=" + encodeURIComponent(pid));

  //close show details
  var closeShowDetailsButton = document.querySelector('.close-show-details');
  closeShowDetailsButton.addEventListener('click',function(){
    console.log("hksdfuihsdui");
    var showDetailsContainer = document.querySelector('.show-details-container');
    showDetailsContainer.style.display = "none";
  });
}



