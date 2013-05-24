<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title>jQuery</title>
  <style type="text/css">
    #daddy-shoutbox {
      padding: 5px;
      background: #3E5468;
      color: white;
      width: 600px;
      font-family: Arial,Helvetica,sans-serif;
      font-size: 11px;
    }
    .shoutbox-list {
      border-bottom: 1px solid #627C98;
      
      padding: 5px;
      display: none;
    }
    #daddy-shoutbox-list {
      text-align: left;
      margin: 0px auto;
    }
    #daddy-shoutbox-form {
      text-align: left;
      
    }
    .shoutbox-list-time {
      color: #8DA2B4;
    }
    .shoutbox-list-nick {
      margin-left: 5px;
      font-weight: bold;
    }
    .shoutbox-list-message {
      margin-left: 5px;
    }
    
  </style>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery.form.js"></script>
</head>
  <body>

  <center>
  <div id="daddy-shoutbox">
    <div id="daddy-shoutbox-list"></div>
    <br />
    <form id="daddy-shoutbox-form" action="demos/jquery-shoutbox/daddy-shoutbox.php?action=add" method="post"> 
    Nick: <input type="text" name="nickname" /> Say: <input type="text" name="message" />
    <input type="submit" value="Submit" />
    <span id="daddy-shoutbox-response"></span>
    </form>
  </div>
  </center>
  
  <script type="text/javascript">
        var count = 0;
        var files = 'demos/jquery-shoutbox/';
        var lastTime = 0;
        
        function prepare(response) {
          var d = new Date();
          count++;
          d.setTime(response.time*1000);
          var mytime = d.getHours()+':'+d.getMinutes()+':'+d.getSeconds();
          var string = '<div class="shoutbox-list" id="list-'+count+'">'
              + '<span class="shoutbox-list-time">'+mytime+'</span>'
              + '<span class="shoutbox-list-nick">'+response.nickname+':</span>'
              + '<span class="shoutbox-list-message">'+response.message+'</span>'
              +'</div>';
          
          return string;
        }
        
        function success(response, status)  { 
          if(status == 'success') {
            lastTime = response.time;
            $('#daddy-shoutbox-response').html('<img src="'+files+'images/accept.png" />');
            $('#daddy-shoutbox-list').append(prepare(response));
            $('input[@name=message]').attr('value', '').focus();
            $('#list-'+count).fadeIn('slow');
            timeoutID = setTimeout(refresh, 3000);
          }
        }
        
        function validate(formData, jqForm, options) {
          for (var i=0; i < formData.length; i++) { 
              if (!formData[i].value) {
                  alert('Please fill in all the fields'); 
                  $('input[@name='+formData[i].name+']').css('background', 'red');
                  return false; 
              } 
          } 
          $('#daddy-shoutbox-response').html('<img src="'+files+'images/loader.gif" />');
          clearTimeout(timeoutID);
        }

        function refresh() {
          $.getJSON(files+"daddy-shoutbox.php?action=view&time="+lastTime, function(json) {
            if(json.length) {
              for(i=0; i < json.length; i++) {
                $('#daddy-shoutbox-list').append(prepare(json[i]));
                $('#list-' + count).fadeIn('slow');
              }
              var j = i-1;
              lastTime = json[j].time;
            }
            //alert(lastTime);
          });
          timeoutID = setTimeout(refresh, 3000);
        }
        
        // wait for the DOM to be loaded 
        $(document).ready(function() { 
            var options = { 
              dataType:       'json',
              beforeSubmit:   validate,
              success:        success
            }; 
            $('#daddy-shoutbox-form').ajaxForm(options);
            timeoutID = setTimeout(refresh, 100);
        });
  </script>
</body>
</html>