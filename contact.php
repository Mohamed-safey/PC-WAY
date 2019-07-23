<?php
require_once('includes/header.php');
$msg="";
if(isset($_GET['done'])){
if($_GET['done']==1){

$msg="<p class='success' style='color:green; font-weight:bold;'>your Message has been Sent Successfully</p>";

}

 }
?>

<div class="container" style="padding-top:130px; margin-bottom:30px;">


<div class="left fifty">
<p class="border"></p>
<h1 class="main_title">Contact Info</h1>

<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>
<div style='overflow:hidden;height:400px;width:520px; margin-top:30px;'><div id='gmap_canvas' style='height:400px;width:520px;'></div>
<style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div>
 <a href='http://www.freevisitorcounters.com'>Get Visitor Counters</a> <script type='text/javascript' src='http://embedmaps.com/google-maps-authorization/script.js?id=387559253b8fe1de6f499ba347508cfacb67bd39'></script><script type='text/javascript'> function init_map(){
var myOptions = {
zoom:12,center:new google.maps.LatLng(30.0691739,31.218120099999965),
mapTypeId: google.maps.MapTypeId.ROADMAP};
map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(30.0691739,31.218120099999965)});
infowindow = new google.maps.InfoWindow({
content:'<strong>Pc- way</strong><br>'+
'abo el feda <br>'+
' Giza<br>'
});
google.maps.event.addListener(marker, 'click', function(){
infowindow.open(map,marker);
});
infowindow.open(map,marker);
}
google.maps.event.addDomListener(window, 'load', init_map);
</script>



<div class="address-block">
                        <address>
                            <span class="our-address">11 St ABU El Feda,Giza<br>Zmalek BIS.</span>
                            <span class="numbers telephone">Freephone:</span><span>+1 800 559 6580</span><br>
                            <span class="numbers telephone">Telephone:</span><span>+1 800 603 6035</span><br>
                            <span class="numbers fax">FAX:</span><span>+1 800 889 9898</span><br>
                            <span>E-mail: </span><span><a href="#" class="simple-link">contact@pc-way.com</a></span>
                        </address>
                    </div>

</div>


<div class="left fifty">
<p class="border"></p>
<h1 class="main_title">Contact Form</h1>

<form action="contact_done.php" method="post" class="contact_form">
<?php echo $msg; ?>
<input type="text" name="name" placeholder="Name*" required  style="margin-top:30px;"/>
<input type="email" name="mail" placeholder="Email*" required />
<input type="text" name="Mobile" placeholder="Mobile*" required pattern="\d{11}" title="11 Digits mobile Number digits only" />
<textarea placeholder="your message*" style="width: 575px; height: 248px;padding:10px;" onfocus="this.value=''; setbg('#e5fff3');" 
    oninvalid="invalidComment(this);" 
    onblur="setbg('white')" 
    placeholder="Max characters 140"
    maxlength="140" 
    required></textarea>

<button class="right btn_big" name="contact">Send</button>

</form>

</div>

<div class="clear"></div>

</div>



<?php
require_once('includes/footer.php');
?>