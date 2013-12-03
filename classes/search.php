<script>
$(document).ready(function(){

	var hash = window.location.hash;
	var res = hash.substr(hash.indexOf(".") + 1); 
	$.ajax({
	    type: "POST",
	    async:true,
	    url: "../classes/searcher.php",
	    data: {search:res},
	    success: function(results){
	    	$('tbody').append(results);
	    }
	});


		var hash = window.location.hash;
		var res = hash.match(/[a-zA-Z]/g);


$('table.table-striped').on('click', '#remove',function d() {
	var k = $(this).attr('pid'); 
	//alert("you click " + k);
	$.ajax({type:"POST",async:true,url:"../classes/ajax.php",data: {d:k}, success: function(){}});
	$(this).parents('tr').fadeOut();
});

$('table.table-striped').on('click', '#up',function up() {
	var pid = $(this).attr('pid');
	var uid = $(this).attr('uid');
	$.ajax({type:"POST",async:true,url:"../classes/ajax.php",data: {up:pid, by:uid}, success: function(res){
		$('#rating-'+pid).replaceWith('<div id="rating-'+pid+'">'+res+'</div>');
		//alert(pid);
	}});
});

$('table.table-striped').on('click', '#down',function down() {
	var pid = $(this).attr('pid');
	var uid = $(this).attr('uid');
	$.ajax({type:"POST",async:true,url:"../classes/ajax.php",data: {down:pid, by:uid}, success: function(res){
		$('#rating-'+pid).replaceWith('<div id="rating-'+pid+'">'+res+'</div>');
	}});
});

function locationHashChanged() {
    var hash = window.location.hash;
    var res = hash.match(/[a-zA-Z]/g);
    if(res=='h') {
      $('li.home').addClass('active').removeClass('disable');
            $('li.home').siblings().removeClass('active').addClass('disable');
              $('div.home').load('../classes/home.php').show().siblings().hide();
	}
    var regex = new RegExp("b.");
    var ext = regex.exec(hash)[0];
	if(ext=='b.') {
      $('li.browse').addClass('active').removeClass('disable');
            $('li.browse').siblings().removeClass('active').addClass('disable');
              $('div.browse').load('../classes/search.php',function(){
              	//$('#default').toggle();
              }).show().siblings().hide();
              
	}
}
window.onhashchange = locationHashChanged;

});




</script>



<table class="table table-striped">
	<thead> 
		<th>#</th>
		<th>Username</th>
		<th>Title</th>
		<th>Subject</th>
		<th>Type</th>
		<th>Instructor</th>
		<th>Class</th>
		<th>Description</th>
		<th>Date</th>
		<th>Link</th>
		<th>Destroy</th>
		<th>Rate</th>

	</thead>
	<tbody>
		

		

	</tbody>
</table>
