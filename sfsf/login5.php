<script src="jquery-3.2.1.min.js"></script>
<script>
 $(document).ready(function(){
	
	 $("#login").click(function(){	
		  username='gcs1540030';
		  password='akash.123@';
		  mode='191';
		  $.ajax({
		   type: "POST",
		   url: "10.1.0.7:8090/httpclient.html",
			data: "username="+username+"&password="+password+"&mode="+mode,
		   success: function(html){    
			if(html=='true')    {
			 //$("#add_err").html("right username or password");
			 window.location.href="hiii.php";
			}
			else    {
			$("#add_err").css('display', 'inline', 'important');
			 $("#add_err").html("<img src='images/alert.png' />Wrong username or password");
			}
		   },
		   beforeSend:function()
		   {
			$("#add_err").css('display', 'inline', 'important');
			$("#add_err").html("<img src='images/ajax-loader.gif' /> Loading...")
		   }
		  });
		return false;
	});
});
</script>

<button name='login'>asss</button>
