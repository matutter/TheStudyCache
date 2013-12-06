<!-- document view -->
<?php session_start(); ?>
<script type="text/javascript">
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
    success: function(pid){ focus(pid); get_rating(pid); }
});

function focus(pid) {
  $.ajax({
      type: "POST", dataType: "json", url: "../classes/ajax.php", data: {dv:pid},
      success: function(data){ dv_callback(data); populate(pid);  }
  });
}




////////////////////////////////////
//ben + adam
function populate(pid) {
    owner = $('.dv-user').text();
    $.ajax({
    type: "POST",
    async:true,
    url: "../classes/comments.php",
    data: {request:pid,by:owner},
    success: function(response){ 
        $(response).appendTo('.current-comments');
        $( 'blockquote:nth-of-type(odd)' ).css({'margin-left':20});
      }
    });
}
/////////////////////////////////
function dv_callback(data) {
  name = $('.dv-title').text();
  if($('#id' + name).length==0) {
    $('.master').attr('id',data['id']);
    $('div.dv-panel').attr('href', '/classes/' + data['path']); 
    $('.dv-title').append(data['ttl']);
    $('.dv-title').attr('id',data['ttl']);
    $('.dv-user').append(data['user']);
    $('.dv-breadcrumb').append('<ol class="breadcrumb"><li><a href="#b.'+ data['sbj'] + '">'+ data['sbj'] + '</a></li><li><a href="#b.'+ data['cls'] +'">'+ data['cls'] +'</a></li><li><a href="#b.'+ data['typ'] +'">'+ data['typ'] +'</a></li><li class="active">'+ data['ttl'] +'</li></ol>');
    $('.dv-body').append(data['summary']);
    var regex = /(?:\.([^.]+))?$/;
    var ext = regex.exec(data['path'])[1];
    ext = ext+".";
    if( ext.match(/png.|JAVA.|java.|pdf.|jpg.|png.|jpeg.|txt.|css.|cpp.|js.|h.|c./i) )
      $('.embedded').append('<iframe id="content" scrolling="yes" class="background" background-position="center" src="../classes/'+data['path']+'" style="background-color:white"></iframe>');
    else
      $('.embedded').append('<iframe src="http://docs.google.com/viewer?url=http%3A%2F%2Fstudy.cs.sunyit.edu%2Fclasses%2F'+ data['path'] +'&embedded=true" width="600" height="780" style="border: none;"></iframe>');
    $('.dv-body-slider').hide();

    $('.dv-rating').append('<div class="col-md-6"></div>'+
        '<div class="col-md-3">'+
          '<div class="rating-top"  > RATE </div>'+
            '<div class="thumbs">'+
              '<li class="fa fa-thumbs-up" pid="'+data['id']+'" id="up"></li> '+
              '<li class="fa fa-thumbs-down" pid="'+data['id']+'" id="down"></li>'+
        
            '</div>'+
        '</div><div class="col-md-3"> <h2 id="rating-'+data['id']+'"></h2> </div>');



    $('.fa-chevron-down').click(function() {
      $('.dv-heading').animate({opacity:0,width:"50%"},'fast');
      $('.dv-heading-right').hide();
      $('.dv-body').fadeToggle('fast',function() {
        $('.dv-body-slider').fadeToggle('fast');   
      });
    });
    $('.fa-chevron-up').click(function() {
      $('.dv-heading').animate({opacity:100,width:"66.66666666666666%"},'fast');
      $('.dv-heading-right').show();
      $('.dv-body-slider').fadeToggle('fast',function(){
        $('.dv-body').fadeToggle('fast');
      });
    });
  } // end if 
  get_rating(data['id']);
} // end callback

function get_rating(pid) {
    $.ajax({
      type: "POST",
      async:true,
      url: "../classes/ajax.php",
      data: {rating:pid},
      success: function(res){ 
        $('#rating-'+pid).replaceWith('<div id="rating-'+pid+'"><h2>'+res+'</h2></div>'); 
      }
    });
}

}); // end function

</script>

<!-- START LEFT ELEMENTS -->
<div class="col-md-8">
  <div class="col-md-12">
    <div class="panel panel-default master">
      <div class="dv-panel">
        <div class="">
            <div class="col-md-8 dv-heading">
              <h2 class="dv-title"></h2> <cite> by <div class="dv-user"></div></cite>
              <div class="dv-breadcrumb"></div>
            </div>
            <div class="col-md-4 dv-heading-right">
              <div class="dv-rating"></div>
            </div>
              
        </div>
        
          <div class="embedded"> </div>
        

      </div>

      <div class="panel-body dv-body">  <i class="fa fa-chevron-down"></i>
      </div>
      <div class="panel-body dv-body-slider"> <i class="fa fa-chevron-up"></i>
      </div>
    </div>
  </div>



</div>
<!-- END LEFT ELEMENTS --> 


<!-- START RIGHT ELEMENTS -->
<div class="col-md-4">

<script type="text/javascript">

var uid="<?php echo $_SESSION['user']; ?>";
lastcomment = 0;
$(document).ready(function() {
  var comment;
  var pid;

  $('#post').click(function(){ MakePost(); });
  $('textarea#mycomment').on('keyup', function(e) {
      var code = (e.keyCode ? e.keyCode : e.which);
      if (code == 13)
        MakePost();
  });

function MakePost() {
    pid = $('.master').attr('id');
    comment = $('#mycomment').val();
    if(comment != lastcomment) {
      comment_now = ''+
        '<blockquote style="background-color:#0099ff;">' +
          '<div class="row">'+
            '<strong>'+ uid +'</strong> <cite> posted NOW </cite>' +
              '</div>'+
          '<div class="row">'+
            comment +
          '</div>'+
        '</blockquote>'+ 
      '</div>';

      $('<div class="new" >' + comment_now + ' </div> ').appendTo('.new-comment').fadeIn(8000);
    }
    
    lastcomment = comment;  
    $('#post').addClass('disabled');
    $('textarea#mycomment').attr("disabled", "disabled").val("comment posted...");
    var payload = pid + "." + uid + "." + comment;

    $.ajax({ type: "POST", async:true, url: "../classes/comments.php",
     data: {new_comment:payload}, success: function(response){} });
  }


  $('#mycomment').click(function(){
    $('#post').removeClass('disabled');
  });

  //since these icos were added by a post processor we have to use a delegated function to find it
  $('.row').on('click', '#remove',function(){
    var cid = $(this).attr('cid');
    $(this).parent().parent().fadeOut();
    $.ajax({ type: "POST", async:true, url: "../classes/comments.php", data: {remove:cid},
      success: function(response){
        if(response!="ok")
          alert("Err:C-0-0-0");
      }
    });
  });
  $('.dv-rating').on('click', '#up',function() {
  var pid = $(this).attr('pid');
  $.ajax({type:"POST",async:true,url:"../classes/ajax.php",data: {up:pid}, success: function(res){
    $('#rating-'+pid).replaceWith('<h2 id="rating-'+pid+'">'+res+'</h2>'); 
  }});
});

$('.dv-rating').on('click', '#down',function() {
  var pid = $(this).attr('pid');
  $.ajax({type:"POST",async:true,url:"../classes/ajax.php",data: {down:pid}, success: function(res){
    $('#rating-'+pid).replaceWith('<h2 id="rating-'+pid+'">'+res+'</h2>');
  }});
});
});

</script>

  <div class="col-md-12" id="messages">
    <div class="row">
      <form>
        <textarea id="mycomment" class="form-control input-large" name="post" placeholder="comments..."></textarea>
      </form>
        <a class="btn btn-default" id="post">Post Comment</a>
      
        <div class="comments">

          <div class="new-comment"></div>




          <div class="current-comments"></div>

        </div> <!-- END COMMENTS -->   
       

      </div>
  </div>
</div>
