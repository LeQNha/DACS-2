var saveButton = document.getElementById('save');

saveButton.addEventListener('click', function(){
    console.log('click');
    showAndHide();
    var xhr = new XMLHttpRequest();
    formData = new FormData(document.getElementById('edit-profile-form'));
    xhr.open('POST','EditProfileProcess.php?action=',true);
    event.preventDefault();
    xhr.onload = function(){
        if(xhr.status == 200){
            if(xhr.responseText == "success"){

                showAndHide('Thay đổi thành công!');
                
            }else{
                // alert(xhr.responseText);
                showAndHide(xhr.responseText);
            }
        }else{
            // alert('Đã xảy ra lỗi! Hãy thử lại sau.');
            showAndHide(xhr.responseText);
        }
    }
    xhr.send(formData);
});

//Hiện thông báo rồi ẩn
function showAndHide(msg){
   var alertMessage = document.querySelector('.alert-message');
   var message = document.querySelector('.alert-message p');
   message.textContent = msg;
   alertMessage.style.top = "90vh";
   alertMessage.style.opacity = "1";

    setTimeout(function () {
        alertMessage.style.top = "100vh"; // Ẩn thẻ div sau khoảng thời gian
        alertMessage.style.opacity = "0.3";
        if(msg == 'Thay đổi thành công!'){
            window.location.href = "EditProfile.php";
        }
      }, 1000); // Thời gian đếm ngược (đơn vị: mili giây)
}

//Thay đổi avatar
var userAvatar = document.getElementById('user-avatar');
var changeAvatarButton = document.getElementById('change-avatar-btn');
var avatarInput = document.getElementById('avatar-file');
userAvatar.addEventListener('click', ChangeAvatar);
changeAvatarButton.addEventListener('click', ChangeAvatar);

function ChangeAvatar(){
    avatarInput.click();
}
avatarInput.addEventListener('change',function(e){
    var file = e.target.files[0];

    if(file){
        var fileReader = new FileReader();

        fileReader.onload = function(e){
            userAvatar.src = e.target.result;
        };

        fileReader.readAsDataURL(file);
    }
});