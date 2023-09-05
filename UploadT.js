
imageShow = document.querySelector('.image-show');
input = document.querySelector('.myImage');
var isUpLoaded = false;

// imageShow.addEventListener('click', () => input.click());
imageShow.addEventListener("click", function() {
  if(!isUpLoaded){
    input.click();
  }
});

input.addEventListener('change', function(e) {
  var file = e.target.files[0]; // Get the selected file

  if (file) {
    var reader = new FileReader(); // Create a FileReader object

    reader.onload = function(e) {
      // Set the innerHTML of the imageContainer to display the image
      imageShow.innerHTML = '<img src="' + e.target.result + '" alt="Selected Image">';
      
      img = document.querySelector('.image-show img');
      img.onload = function(){
        var width = img.naturalWidth;
        var height = img.naturalHeight;

        if (width >= height) {
          img.style.width = "100%";
          img.style.height = "auto";
          console.log("rong");   
        } else {
          img.style.height = "100%";
          img.style.width = "auto";
          console.log("cao");
        }

        isUpLoaded = true;
      }
    };

    reader.readAsDataURL(file); // Read the file as a data URL
  }
});

//drag and drop




