
imageShow = document.querySelector('.image-show');
input = document.querySelector('form input');


// imageShow.addEventListener('click', () => input.click());
imageShow.addEventListener("click", function() {
  input.click();
});

input.addEventListener('change', function(e) {
  var file = e.target.files[0]; // Get the selected file

  if (file) {
    var reader = new FileReader(); // Create a FileReader object

    reader.onload = function(e) {
      // Set the innerHTML of the imageContainer to display the image
      imageShow.innerHTML = '<img src="' + e.target.result + '" alt="Selected Image">';
      
      img = document.querySelector('.image-show img');
      var width = img.naturalWidth;
      var height = img.naturalHeight;

      if (width >= height) {
        img.style.width = "100%";
        img.style.height = "auto";   
      } else {
        img.style.height = "100%";
        img.style.width = "auto";
      }
    };

    reader.readAsDataURL(file); // Read the file as a data URL
  }
});

//drag and drop




