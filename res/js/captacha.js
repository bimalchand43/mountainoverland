$(document).ready(function(){
  $('.clickedImg').click(function(){
    grabImage();
    return false;
  })
function grabImage(){
 $.ajax({
        url:'captcha/captchaSecurityImages.php',
        cache:false,
        success:function(imageFromTheController){
            var newCaptcha = $('<div id = "oldDiv">'+imageFromTheController+'</div>');
            $('#oldDiv').replaceWith(newCaptcha);
        }
 })
}
});