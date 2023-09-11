var saveButton = document.getElementById('save');

saveButton.addEventListener('click', function(){
    console.log('click');
    showAndHide();
    var xhr = new XMLHttpRequest();
    formData = new FormData(document.getElementById('edit-profile-form'));
    xhr.open('POST','EditProfileProcess.php',true);

    xhr.onload = function(){
        if(xhr.status == 200){
            if(xhr.responseText == "success"){

                showAndHide();
            }else{
                console.log(xhr.responseText);
            }
        }else{
            alert('Đã xảy ra lỗi! Hãy thử lại sau.');
        }
    }
    xhr.send(formData);
});

//Hiện thông báo rồi ẩn
function showAndHide(){
   var alertMessage = document.querySelector('.alert-message');
   alertMessage.style.top = "90vh";
   alertMessage.style.opacity = "1";

    setTimeout(function () {
        alertMessage.style.top = "100vh"; // Ẩn thẻ div sau khoảng thời gian
        alertMessage.style.opacity = "0.3";
      }, 2000); // Thời gian đếm ngược (đơn vị: mili giây)
}