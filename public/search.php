<script type="text/javascript">
	function showSearchBook($name){

	  var xmlhttp = new XMLHttpRequest();
	  xmlhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	      document.getElementById("mainScreen").innerHTML = this.responseText;
	    }
	  };
	  xmlhttp.open("GET","getSearch.php?name=",true);
	  xmlhttp.send();
}
</script>