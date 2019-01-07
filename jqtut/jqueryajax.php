<?php
$title="JQuery : Ajax ";
include "toppage.php"; ?>
<hr />


<script>

$(document).ready(function(){
  var i=0;
  $("button").click(function(){
    //$("div").load("text1.txt");
    //$msg = $("#myd").html();
    //alert($msg);
    $("#myd1").load("try.php");
  });
  /*
  $(this).click(function(){
    var msg = $(this).text();
    alert(msg);
    //$(this).html("It was clicked ");
  });
  */
});
</script>
</head>
<body>

<div id="myd1">Let AJAX change this text 1</div>
<div id="myd2"><h2>Let AJAX change this text 2</h2></div>
<div id="myd3"><h2>Let AJAX change this text 3</h2></div>
<button>Change Content</button>

</body>
</html>
