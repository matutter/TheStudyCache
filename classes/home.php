<!-- document view -->
<script>
$(document).ready(function(){

if(window.location.hash && window.location.hash.match(/\d+/g) != null)
  var pid = window.location.hash.match(/\d+/g);
else 
  pid = "latest";

$.ajax({
    type: "POST",
    async:true,
    url: "../classes/ajax.php",
    data: {find:pid},
    success: function(pid){ focus(pid); }
});

function focus(pid) {
  $.ajax({
      type: "POST", dataType: "json", url: "../classes/ajax.php", data: {dv:pid},
      success: function(data){ dv_callback(data); }
  });
}
function dv_callback(data) {
  name = $('.dv-title').text();
  if($('#id' + name).length==0) {

    //$('div.dv-panel').css('background-image', 'url(../classes/' + data['path'] + ')');
    $('div.dv-panel').attr('href', '/classes/' + data['path']); 
    $('.dv-title').append(data['ttl']);
    $('.dv-title').attr('id',data['ttl']);
    $('.dv-user').append(data['user']);
    $('.dv-breadcrumb').append('<ol class="breadcrumb"><li><a href="#">'+ data['sbj'] + '</a></li><li><a href="#">'+ data['cls'] +'</a></li><li><a href="#">'+ data['typ'] +'</a></li><li class="active">'+ data['ttl'] +'</li></ol>');
    $('.dv-body').append(data['summary']);
    $('.test').append('<iframe id="content" scrolling="no" class="background" background-position="center" src="../classes/'+data['path']+'"></iframe>');
  // $('.test').append('<iframe src="http://docs.google.com/viewer?url=http%3A%2F%2Fstudy.cs.sunyit.edu%2Fclasses%2F'+ data['path'] +'&embedded=true" width="600" height="780" style="border: none;"></iframe>');
    $('.dv-body-slider').hide();

    $('.fa-chevron-down').click(function() {
      $('.dv-heading').animate({opacity:0,width:"50%"},'fast');
      $('.dv-body').fadeToggle('fast',function() {
        $('.dv-body-slider').fadeToggle('fast');   
      });
    });
    $('.fa-chevron-up').click(function() {
      $('.dv-heading').animate({opacity:100,width:"100%"},'fast');
      $('.dv-body-slider').fadeToggle('fast',function(){
        $('.dv-body').fadeToggle('fast');
      });
    });
  } // end if 
} // end callback
}); // end function

</script>

<!-- START LEFT ELEMENTS -->
<div class="col-md-8">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="dv-panel">
        <div class="dv-heading">
            <h2 class="dv-title"></h2> <cite> by <div class="dv-user"></div></cite>
            <div class="dv-breadcrumb"></div>
        </div>
        
          <div class="test"> </div>
        

      </div>
      <div class="panel-body dv-body"> <i class="fa fa-chevron-down"></i>
      </div>
      <div class="panel-body dv-body-slider"> <i class="fa fa-chevron-up"></i>
      </div>
    </div>
  </div>


  <div class="col-md-8">
    other tabs for interaction, download, comments, history, ect..
  </div>

</div>
<!-- END LEFT ELEMENTS --> 


<!-- START RIGHT ELEMENTS -->
 <div class="col-md-4">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">More by poster</div>
     <div class="panel-body">
        sub data + thumbnail
      </div>
    </div>
  </div>

  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading"> = </div>
     <div class="panel-body">
          + 
      </div>
    </div>
  </div>
</div>
