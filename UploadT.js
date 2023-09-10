
var title = document.getElementById('title');
var description = document.getElementById('description');
window.onload = function() {
  
  var titleInputBottom = document.getElementById('title-bottom-border');
  var titleInputHeight =  title.offsetTop + title.offsetHeight;
  titleInputBottom.style.top = `${titleInputHeight + 7}px`;

  
  var descriptionTextareaBottom = document.getElementById('description-bottom-border');
  var descriptionTextareaHeight =  description.offsetTop + description.offsetHeight;
  descriptionTextareaBottom.style.top = `${descriptionTextareaHeight + 7}px`;

  var submenu = document.getElementById("submenu");
  submenu.style.display = "none";
}


imageShow = document.querySelector('.image-show');
input = document.querySelector('.myImage');
img = document.getElementById('selected-image');
var isUpLoaded = false;

// imageShow.addEventListener('click', () => input.click());
imageShow.addEventListener("click", function() {
  if(!isUpLoaded){
    input.click();
  }
});

var trashCan = document.getElementById('trash-can');
trashCan.addEventListener('click', function(){
  isUpLoaded = false;
  img.src = "";
  trashCan.style.display = "none";
});

input.addEventListener('change', function(e) {
  var file = e.target.files[0]; // Get the selected file

  if (file) {
    var reader = new FileReader(); // Create a FileReader object

    reader.onload = function(e) {
      // Set the innerHTML of the imageContainer to display the image
      // imageShow.innerHTML = '<img src="' + e.target.result + '" alt="Selected Image">';
      img.src = e.target.result;
      
      // img = document.querySelector('.image-show img');
      img.onload = function(){
        var width = img.naturalWidth;
        var height = img.naturalHeight;

        if (width >= height) {
          img.style.width = "100%";
          img.style.height = "auto";
            
        } else {
          img.style.height = "100%";
          img.style.width = "auto";
          
        }

        isUpLoaded = true;
        
        trashCan.style.display = "block";
        
      }
    };

    reader.readAsDataURL(file); // Read the file as a data URL
  }
});
//Ajax
submitBtn = document.getElementById('submit');
submitBtn.addEventListener('click', function(){
  var xhr = new XMLHttpRequest();
  formData = new FormData(document.getElementById('upload-form'));
  xhr.open("POST", 'UploadImageT.php');
  event.preventDefault();

  xhr.onload = function(){
    console.log(xhr.responseText);
    if(xhr.status == 200){
      if(xhr.responseText == 'success'){
        alert('Đăng tải thành công!');
        console.log('đăng thành công');
        title.value = "";
        title.value ="";
        isUpLoaded = false;
        img.src = "";
        trashCan.style.display = "none";
      }if(xhr.responseText == "invalid title"){
        document.querySelector('.alertP').style.display = "block"; 
      }else{
        alert(xhr.responseText);
        console.log('else');
      }
    }else{
      alert('Đã có lỗi xảy ra! Vui lòng thử lại sau.');
    }
  };
  xhr.send(formData);
});

//drag and drop

//tang size textarea
var count = 0;
function autoResize() {
  const textarea = document.getElementById('description');
  const div = document.getElementsByClassName('description-bottom-border')[0];

  textarea.style.height = 'auto';
  textarea.style.height = (textarea.scrollHeight) + 'px';
  
  const textareaBottom =  textarea.offsetTop + textarea.clientHeight;
  div.style.top = `${textareaBottom + 7}px`;
}
//tắt thông báo tiêu đề ko hợp lệ{
title.addEventListener('click', function(){
  document.querySelector('.alertP').style.display="none";
});


