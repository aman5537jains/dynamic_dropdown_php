<!DOCTYPE html>
<html>
<body>

<h2>Dynamic select box - Readerstacks.com</h2>

<form action="/action_page.php">
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname"><br><br>

  <label for="fname">Country:</label><br>
  <select type="text" id="country" name="country">
  
</select>	  
  <br><br>

  <label for="fname">State:</label><br>
  <select type="text" id="state" name="state">
  </select>	  

  <br><br>
  
  <input type="submit" value="Submit">
</form>
<!-- jQuery Library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- jQuery Library -->

<!-- start of  dynmic select box script -->
<script>
$(function(){

	$.post("load-dropdown.php",{country_id:$(this).val(),action:"load-country"},function(data){
			$("#country").html(data);
		});

	$(document).on("change","#country",function(){
		$.post("load-dropdown.php",{country_id:$(this).val(),action:"load-state"},function(data){
			$("#state").html(data);
		});
	})
});
</script>
<!-- end of   dynmic select box script -->
</body>
</html>
