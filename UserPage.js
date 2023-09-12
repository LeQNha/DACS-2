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