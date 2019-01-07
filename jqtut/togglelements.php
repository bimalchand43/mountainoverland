<?php
$title="JQuery : Toggle Elements ";
include "toppage.php"; ?>
<hr />

<script type="text/javascript">
$(document).ready(function(){
  $(".msg").hide();

  $(".mt").click(function(){
    //alert(this.html());
    //$(this).toggle();
  });
});

function showmesage(obj){
     alert(obj);
     var n = obj+".msg";
    $(n).show();
}
</script>


<div id="msg1" class="mt" onclick="showmesage(this.id);">
Message 1
<div class="msg">This is message 1</div>
</div>
<div class="mt">
Message 2
<div class="msg">This is message 2</div>
</div>
<div class="mt">
Message 3
<div class="msg">This is message 3</div>
</div>
<p>If you click on me, I will disappear.</p>
</body>

</html>
