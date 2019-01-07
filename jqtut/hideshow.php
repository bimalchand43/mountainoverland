<?php
$title="JQuery : Element Show/Hide ";
include "toppage.php"; ?>
<hr />

<script type="text/javascript">
$(document).ready(function(){
  $("p").click(function(){
    $(this).hide();
  });
});
</script>



<p>If you click on me, I will disappear.</p>
</body>

</html>
