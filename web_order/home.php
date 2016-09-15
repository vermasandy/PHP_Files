<?php include_once( "header.php"); $_SESSION[ 'error']="" ; ?>
<?php if($_GET[ 'c']=="200" ){ ?>
<script>
    var htmlfor = '<div class="containerHead"><div class="col-md-10"> <div class="col-md-12"><strong style="color: rgb(169, 1, 1);">Sorry! Your previous ride was cancelled by driver. Please reorder a taxi.</strong><br></div></div></div>';
    jQuery("#driverdetails").html(htmlfor);
    jQuery("#driverdetails").show();
</script>
<?php }?>
<?php if($_GET[ 'c']=="203" ){ ?>
<script>
    var htmlfor = '<div class="containerHead"><div class="col-md-12"> <div class="col-md-12"><strong style="color: rgb(169, 1, 1);">We have not found a driver that fits your needs. Please reorder a taxi as drivers are always moving in and out of your area.</strong><br></div></div></div>';
    jQuery("#driverdetails").html(htmlfor);
    jQuery("#driverdetails").show();
</script>
<?php }?>
<?php if($_GET[ 'c']=="202" ){ ?>
<script>
    var htmlfor = '<div class="containerHead"><div class="col-md-12"> <div class="col-md-12"><strong style="color: rgb(169, 1, 1);">Your previous ride was cancelled successfully. Please reorder a taxi.</strong><br></div></div></div>';
    jQuery("#driverdetails").html(htmlfor);
    jQuery("#driverdetails").show();
</script>
<?php } ?>
<?php if($_GET[ 'c']=="206" ){ ?>
<script>
    var htmlfor = '<div class="containerHead"><div class="col-md-12"> <div class="col-md-12"><strong style="color: rgb(169, 1, 1);">Your previous ride was completed successfully. </strong><br></div></div></div>';
    jQuery("#driverdetails").html(htmlfor);
    jQuery("#driverdetails").show();
</script>
<?php } ?>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
    function myFunction() {
        var phone = prompt("Please enter your Guests' mobile #", "(305)555-1212");
        if (phone != null) {
            var request = $.ajax({
                url: "sms_send.php?phone=" + phone,
                type: "GET",
                dataType: "html"
            });
            document.getElementById("status").innerHTML = "SMS download link has been sent to: " + phone;
        }
    }
</script>
<div id="status"></div>
<div class="mapContainer" id="dvMap"></div>
<div class="buttonContainer">
    <div class="buttonInnerContainer">
        <button data-toggle="modal" data-target="#myModal" class="get_app" href="">GET TAXI <b>NOW</b> </button>
        <p class="driver_waiting" style="display:none; width:100%" href="">Your order for a taxi has been placed.
            <br>A Driver Will Contact You Shortly!
            <br>
            <button class="cancel_before_acpt" href="">Cancel</button>
        </p>
        </br>
    </div>
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog formModel ">
        <div class="modal-content">
            <div class="modal-body">
                <div class="formInnerContainer">
                    <div class="taxi-icon_D"> <img class="taxi-icon" src="img/taxi-icon.png"> </div>
                    <table border="0" cellpadding="4" cellspacing="2" class="web_table">
                        <tr>
                            <td colspan="2"> <font size="12"><b>NEW TAXI ORDER<br>(pickup at:<?php echo $_SESSION['userXaddress']; ?>)</b></font> </td>
                        </tr>
                        <tr>
                            <td><b>How Many People?</b> </td>
                            <td>
                                <select id="People">
                                    <option value="">Select</option>
                                    <option value="1" selected>1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </td>
                        </tr>
                     
					   <tr class="ShowHide" >
                            <td><b>Do you have a bike?</b> </td>
                            <td>
                                <select id="bike">
                                    <option value="">Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0" selected>No</option>
                                </select>
                            </td>
                        </tr>
						
                        <tr class="ShowHide" >
                            <td><b>ADA Vehicle?</b> </td>
                            <td>
                                <select id="vehicle">
                                    <option value="">Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0" selected>No</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><b>How will you Pay?</b> </td>
                            <td>
                                <select id="Pay">
                                    <option value="">Select</option>
                                    <option value="2" selected>Cash or Credit</option>
                                    <option value="1">Cash Only</option>
                                    <option value="4">Credit Only</option>
                                </select>
                            </td>
                        </tr>
						<tr>
                            <td><b>Client Phone*</b> </td>
                            <td>
                                <input type="text" style="width: 128px;color: black;" id="client_phone" name="client_phone" value="" placeholder="(305)555-1212"> 
                            </td>
                        </tr>
                        <tr>
                            <td><b>Send TAXIASAP App download link via SMS to your clients for a ride home?</b> </td>
                            <td>
                                <button onclick="myFunction()">Yes! Click to enter mobile #</button>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Are you ready now?</b> </td>
                            <td>
                                <select id="ready">
                                    <option value="">Select</option>
                                    <option value="1" selected>Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="webButtons" data-dismiss="modal" type="button" value="Cancel"> </td>
                            <td>
                                <input class="webButtons" type="button" id="submit" value="Confirm"> </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="msgPopup" role="dialog">
    <div class="modal-dialog normalpops ">
        <div class="modal-content">
            <div class="modal-body message" style="color: white; font-weight:bold; font-size: 20px;">
                <p class="msg_p" style="padding: 0;"></p>
                <input class="webButtons" id="noticed" data-dismiss="modal" type="button" value="OK"> </div>
        </div>
    </div>
</div>
<button style="display:none" data-toggle="modal" data-target="#msgPopup" class="clicktoshowmsg" href=""></button>
<div class="process_wait_out_layer">
    <div class="inner_layer"> <img src="img/wait.gif"> </div>
</div>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script>
    var userXName = "<?php echo $_SESSION['userXname']; ?>";
    var userXphone = "<?php echo $_SESSION['userXphone']; ?>";
    var lat = "<?php echo $_SESSION['userXlat']; ?>";
    var lng = "<?php echo $_SESSION['userXlng']; ?>";
    var iconBaseUser = '<?php echo WEB_ROOT ;?>web_order/fare.png';
    var title = userXName;
    var mapOptions = {
        center: new google.maps.LatLng(lat, lng),
        zoom: 12,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
    var myLatlng = new google.maps.LatLng(lat, lng);
    
    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        icon: iconBaseUser,
        title: title
    });
	var iconBasetaxi = '<?php echo WEB_ROOT ;?>web_order/taxi.png';
	<?php 
	
	$lat = $_SESSION['userXlat'];;
	$lng =  $_SESSION['userXlng']; 
	
	// MT Added
	$is_test_user = $_GET['is_test_user']; 
	
	$radious=10; // MT Changed TO 10 from 6 as per chanage in app
	//$select = "SELECT *, ((ACOS(SIN($lat * PI() / 180) * SIN(lat * PI() / 180) + COS($lat * PI() / 180) * COS(lat * PI() / 180) * COS(($lng - lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) AS distance FROM taxi_users_status GROUP BY id HAVING distance<=$radious";
	
	$select = "SELECT user.*,status.*, ((ACOS(SIN($lat * PI() / 180) * SIN(status.lat * PI() / 180) + COS($lat * PI() / 180) * COS(status.lat * PI() / 180) * COS(($lng - status.lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) AS distance FROM taxi_users_status as status LEFT Join taxi_users_preferences as user on user.driver_id=status.user_id GROUP BY status.id HAVING distance<=$radious";
			
	$query = mysql_query($select);
	$countRows = mysql_num_rows($query);
	
	if($countRows>0)
	{
		while($driverRecord = mysql_fetch_assoc($query))
	{?>
	var myLatlng = new google.maps.LatLng(<?php echo$driverRecord['lat'];?>, <?php echo $driverRecord['lng'];?> );
	var iconBasetaxi = '<?php echo WEB_ROOT ;?>web_order/taxi.png';
	var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        icon: iconBasetaxi,
        title:"<?php echo "Taxi #".$driverRecord['hack'];?>"
    });
<?php
		
	}
	}
	?>
	
</script>

<script>
    jQuery(document).ready(function() {
		
		
		
		
		
        jQuery(".special_order").on("click", function() {
			jQuery(".ShowHide").toggle();
		});	
		jQuery("#noticed").on("click", function() {
            var c = jQuery(this).attr("rel");
            if (c == '200') {
                window.location = "home.php?c=200";
            }
            if (c == '203') {
                window.location = "home.php?c=203";
            }
            if (c == '202') {
                window.location = "home.php?c=202";
            }
            if (c == '204') {
                window.location = "home.php?c=204";
            }
			if (c == '206') {
                window.location = "home.php?c=206";
            }
        });
        var userXId = "<?php echo $_SESSION['userXId']; ?>";
        var userXName = "<?php echo $_SESSION['userXname']; ?>";
        var userXphone = "<?php echo $_SESSION['userXphone']; ?>";
        var userXisTest = "<?php echo $_SESSION['userXisTest']; ?>";
        var lat = "<?php echo $_SESSION['userXlat']; ?>";
        var lng = "<?php echo $_SESSION['userXlng']; ?>";
        jQuery("#submit").on("click", function() {
            var marker = new Array();
            var random_order=Math.floor(Math.random()*90000) + 10000;;
		 
            window.isGetDriver = 0;
            window.refreshId2 = null;
            window.refreshId3 = null;
            window.refreshId = null;
            var People = jQuery("#People").val();
            var bike = jQuery("#bike").val();
            var vehicle = jQuery("#vehicle").val();
            var Pay = jQuery("#Pay").val();
            var client_phone = jQuery("#client_phone").val();
			if(Pay == 3){
					Pay  =  3;
				}else if(Pay == 2){
					Pay  =  3;
				}else if(Pay == 1){
					Pay  =  2;
				}else{
					Pay  =  4;
				}

            var ready = jQuery("#ready").val();
            if (People == "") {
                alert("How Many People?");
                jQuery("#People").css("border", "1px solid red");
            } else if (bike == "") {
                alert("Select all fields");
                jQuery("#bike").css("border", "1px solid red");
            } else if (vehicle == "") {
                alert("Select all fields");
                jQuery("#vehicle").css("border", "1px solid red");
            } else if (Pay == "") {
                alert("Select all fields");
                jQuery("#Pay").css("border", "1px solid red");
            } else if (ready == "") {
                alert("Select all fields");
                jQuery("#ready").css("border", "1px solid red");
            } else if (client_phone == "" || client_phone.length != 10 ||  isNaN(parseFloat(client_phone))) {
                alert("Enter a valid client's phone number");
                jQuery("#client_phone").css("border", "1px solid red");
            } else {
				 jQuery(".process_wait_out_layer").show();
              	   jQuery.ajax({
						url: "<?php echo WEB_ROOT ;?>webapp/delete_request.php",
						method: "get",
						data: {
							client_id: userXId,
							current_lat: lat,
							current_long: lng,
						},
						success: function(res) {
							
						}
					});
                jQuery.ajax({
                    url: "<?php echo WEB_ROOT ;?>webapp/fare_qualifiers.php",
                    method: "get",
                    data: {
                        client_id: userXId,
                        how_many_people: People,
                        have_bike: bike,
                        ada: vehicle,
                        how_will_pay: Pay,
                        ready_now: ready,
                        identify: 'yes',
						client_phone:client_phone
                    },
                    success: function(data) {
                        var obj = jQuery.parseJSON(data);
                        var code = obj.response.code;
                        if (code == '200') {
                            jQuery(".process_wait_out_layer").hide();
                            jQuery(".get_app").hide();
                            jQuery(".modal-backdrop").hide();
                            jQuery("#myModal").hide();
                            jQuery(".driver_waiting").show();
                            isGetDriver = 0;
                            refreshId = setInterval(function() {
                                jQuery.ajax({
                                    url: "<?php echo WEB_ROOT ;?>webapp/search_driver.php",
                                    method: "get",
                                    data: {
                                        user_id: userXId,
                                        lat: lat,
                                        lng: lng,
                                        fare_status: 1,
										random_order: random_order,
                                        is_test_user: userXisTest
                                    },
                                    success: function(res) {
                                        var resobj = jQuery.parseJSON(res);
                                        var code = resobj.response.code;
                                        if (code == '200') {
                                            clearInterval(refreshId);
                                            refreshId2 = setInterval(function() {
                                                jQuery.ajax({
                                                    url: "<?php echo WEB_ROOT ;?>webapp/search_driver.php",
                                                    method: "get",
                                                    data: {
                                                        user_id: userXId,
                                                        lat: lat,
                                                        lng: lng,
                                                        fare_status: 0,
                                                        random_order: random_order,
                                                        is_test_user: userXisTest
                                                    },
                                                    success: function(res) {
                                                        var resobj = jQuery.parseJSON(res);
                                                        var code = resobj.response.code;
                                                        if (code == '305') {
                                                            clearInterval(refreshId2);
                                                        }
                                                    }
                                                });
                                            }, 5000);
                                            refreshId3 = setInterval(function() {
                                                jQuery.ajax({
                                                    url: "<?php echo WEB_ROOT ;?>webapp/client_fare_alert.php",
                                                    method: "get",
                                                    data: {
                                                        client_id: userXId
                                                    },
                                                    success: function(res) {
                                                        var resobj = jQuery.parseJSON(res);
                                                        var code = resobj.response.code;
                                                        if (code == '200') {
                                                            isGetDriver = 1;
                                                            clearInterval(refreshId3);
                                                            clearInterval(refreshId2);
                                                            var driver_id = resobj.response.id;
                                                            var first_name = resobj.response.first_name;
                                                            var middle_name = resobj.response.middle_name;
                                                            var last_name = resobj.response.last_name;
                                                            var phone = resobj.response.phone;
                                                            var email = resobj.response.email;
                                                            var hack = resobj.response.hack;
                                                            var taxi_license_no = resobj.response.taxi_license_no;
                                                            var dl_number = resobj.response.dl_number;
                                                            if (dl_number == "") {
                                                                dl_number = "Not Available";
                                                            }
                                                            var msg = "" + first_name + " in cab #" + hack + "  is in route. Please be courteous and wait for this cab. The driver has paid a fee for the opportunity to serve you. Any problems please call the driver directly.";
                                                            var htmlfor = '<div class="containerHead"><div class="col-md-12"> <div class="col-md-10" style="margin: 9px 0;"><strong>Driver: </strong>' + first_name + '&nbsp;<strong>Phone: </strong>' + phone + '&nbsp;<strong>City Permit #: </strong>' + taxi_license_no + '&nbsp;&nbsp;<strong>Cab #: </strong>' + hack + '&nbsp;&nbsp;<strong class="onb" style="color: rgb(169, 1, 1);">Any problems please call driver</strong></div><div class="col-md-2"><button class="cancel_drive">Cancel</button></div></div></div>';
                                                            jQuery("#driverdetails").html(htmlfor);
                                                            jQuery("#driverdetails").show();
                                                            jQuery(".cancel_drive").on("click", function() {
                                                                jQuery(".process_wait_out_layer").show();
                                                                jQuery.ajax({
                                                                    url: "<?php echo WEB_ROOT ;?>webapp/accept_cancel.php",
                                                                    method: "get",
                                                                    data: {
                                                                        client_id: userXId,
                                                                        driver_id: driver_id,
                                                                        user_type: "client"
                                                                    },
                                                                    success: function(res) {
                                                                        jQuery(".process_wait_out_layer").hide();
                                                                        jQuery(".msg_p").html("Your ride successfully cancel.");
                                                                        jQuery(".clicktoshowmsg").click();
                                                                        jQuery("#noticed").attr("rel", "202");
                                                                        setTimeout(function() {
                                                                            jQuery("#noticed").click();
                                                                            jQuery(".msg_p").html("");
                                                                            window.location = "home.php?c=202";
                                                                        }, 5000);
                                                                    }
                                                                });
                                                            });
                                                            jQuery(".msg_p").html(msg);
                                                            jQuery(".clicktoshowmsg").click();
                                                            setTimeout(function() {
                                                                jQuery("#noticed").click();
                                                                jQuery(".msg_p").html("");
                                                            }, 10000);
                                                            jQuery(".driver_waiting").hide();
                                                            var driver_lastlat = null;
                                                            var diver_lastlng = null;
                                                            var driverlat = resobj.response.lat;
                                                            var driverlng = resobj.response.lng;
                                                            var UserLatlng = new google.maps.LatLng(lat, lng);
                                                            var iconBaseUser = '<?php echo WEB_ROOT ;?>web_order/fare.png';
                                                            var iconBasetaxi = '<?php echo WEB_ROOT ;?>web_order/taxi.png';
                                                            var markers = [{
                                                                "lat": lat,
                                                                "lng": lng,
                                                            }, {
                                                                "lat": driverlat,
                                                                "lng": driverlng,
                                                            }];
                                                            var mapOptions = {
                                                                center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
                                                                zoom: 15,
                                                                mapTypeId: google.maps.MapTypeId.ROADMAP
                                                            };
                                                            var infoWindow = new google.maps.InfoWindow();
                                                            var lat_lng = new Array();
                                                            var latlngbounds = new google.maps.LatLngBounds();
                                                            for (i = 0; i < markers.length; i++) {
                                                                if (i == 1) {
                                                                    var iconBase = iconBasetaxi;
                                                                    var title = first_name + "/" + phone;
                                                                }
                                                                if (i == 0) {
                                                                    var iconBase = iconBaseUser;
                                                                    var title = userXName + "/" + userXphone;
                                                                }
                                                                var data = markers[i];
                                                                var myLatlng = new google.maps.LatLng(data.lat, data.lng);
                                                                lat_lng.push(myLatlng);
                                                                var marker = new google.maps.Marker({
                                                                    position: myLatlng,
                                                                    map: map,
                                                                    icon: iconBase,
                                                                    title: title
                                                                });
                                                                if (i == 1) {
                                                                    window.previousdData = new Array();
                                                                    previousdData = marker;
                                                                }
                                                                latlngbounds.extend(marker.position);
                                                                (function(marker, data) {
                                                                    google.maps.event.addListener(marker, "click", function(e) {
                                                                        infoWindow.setContent(data.description);
                                                                        infoWindow.open(map, marker);
                                                                    });
                                                                })(marker, data);
                                                            }
                                                            var path = new google.maps.MVCArray();
                                                            var service = new google.maps.DirectionsService();
                                                            var poly = new google.maps.Polyline({
                                                                map: map,
                                                                strokeColor: '#4986E7'
                                                            });
                                                            for (var i = 0; i < lat_lng.length; i++) {
                                                                if ((i + 1) < lat_lng.length) {
                                                                    var src = lat_lng[i];
                                                                    var des = lat_lng[i + 1];
                                                                    path.push(src);
                                                                    poly.setPath(path);
                                                                    service.route({
                                                                        origin: src,
                                                                        destination: des,
                                                                        travelMode: google.maps.DirectionsTravelMode.DRIVING
                                                                    }, function(result, status) {
                                                                        if (status == google.maps.DirectionsStatus.OK) {
                                                                            for (var i = 0, len = result.routes[0].overview_path.length; i < len; i++) {
                                                                                path.push(result.routes[0].overview_path[i]);
                                                                            }
                                                                        }
                                                                    });
                                                                }
                                                            }
                                                            var refreshId6 = setInterval(function() {
                                                                var newdata = previousdData;
                                                                jQuery.ajax({
                                                                    url: "<?php echo WEB_ROOT ;?>webapp/getlatlng.php",
                                                                    method: "get",
                                                                    data: {
                                                                        user_id: driver_id,
                                                                        user_type: 'driver'
                                                                    },
                                                                    success: function(res) {
                                                                        var resobj = jQuery.parseJSON(res);
                                                                        var code = resobj.response.code;
                                                                        if (code == '200') {
                                                                            var driverlat = resobj.response.lat;
                                                                            var driverlng = resobj.response.lng;
                                                                            if (driver_lastlat != driverlat || diver_lastlng != driverlng) {
                                                                                driver_lastlat = driverlat;
                                                                                diver_lastlng = driverlng;
                                                                                newdata.setMap(null);
                                                                                var iconBaseUser = '<?php echo WEB_ROOT ;?>web_order/fare.png';
                                                                                var iconBasetaxi = '<?php echo WEB_ROOT ;?>web_order/taxi.png';
                                                                                var markers = [{
                                                                                    "lat": lat,
                                                                                    "lng": lng,
                                                                                }, {
                                                                                    "lat": driverlat,
                                                                                    "lng": driverlng,
                                                                                }];
                                                                                var mapOptions = {
                                                                                    center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
                                                                                    zoom: 15,
                                                                                    mapTypeId: google.maps.MapTypeId.ROADMAP
                                                                                };
                                                                                var infoWindow = new google.maps.InfoWindow();
                                                                                var lat_lng = new Array();
                                                                                var latlngbounds = new google.maps.LatLngBounds();
                                                                                for (i = 0; i < markers.length; i++) {
                                                                                    if (i == 1) {
                                                                                        var iconBase = iconBasetaxi;
                                                                                        var title = first_name + "/" + phone;
                                                                                    }
                                                                                    if (i == 0) {
                                                                                        var iconBase = iconBaseUser;
                                                                                        var title = userXName + "/" + userXphone;
                                                                                    }
                                                                                    var data = markers[i];
                                                                                    var myLatlng = new google.maps.LatLng(data.lat, data.lng);
                                                                                    lat_lng.push(myLatlng);
                                                                                    var marker = new google.maps.Marker({
                                                                                        position: myLatlng,
                                                                                        map: map,
                                                                                        icon: iconBase,
                                                                                        title: title
                                                                                    });
                                                                                    if (i == 1) {
                                                                                        window.previousdData = new Array();
                                                                                        previousdData = marker;
                                                                                    }
                                                                                    latlngbounds.extend(marker.position);
                                                                                    (function(marker, data) {
                                                                                        google.maps.event.addListener(marker, "click", function(e) {
                                                                                            infoWindow.setContent(data.description);
                                                                                            infoWindow.open(map, marker);
                                                                                        });
                                                                                    })(marker, data);
                                                                                }
                                                                                var path = new google.maps.MVCArray();
                                                                                var service = new google.maps.DirectionsService();
                                                                                var poly = new google.maps.Polyline({
                                                                                    map: map,
                                                                                    strokeColor: '#4986E7'
                                                                                });
                                                                                for (var i = 0; i < lat_lng.length; i++) {
                                                                                    if ((i + 1) < lat_lng.length) {
                                                                                        var src = lat_lng[i];
                                                                                        var des = lat_lng[i + 1];
                                                                                        path.push(src);
                                                                                        poly.setPath(path);
                                                                                        service.route({
                                                                                            origin: src,
                                                                                            destination: des,
                                                                                            travelMode: google.maps.DirectionsTravelMode.DRIVING
                                                                                        }, function(result, status) {
                                                                                            if (status == google.maps.DirectionsStatus.OK) {
                                                                                                for (var i = 0, len = result.routes[0].overview_path.length; i < len; i++) {
                                                                                                    path.push(result.routes[0].overview_path[i]);
                                                                                                }
                                                                                            }
                                                                                        });
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                });
																
															
																			jQuery.ajax({
																				url: "<?php echo WEB_ROOT ;?>webapp/check_driver_onboard_or_not.php",
																				method: "get",
																				data: {
																					client_id: userXId,
																					driver_id: driver_id,
																					
																				},
																				success: function(res) {
																					var resobj = jQuery.parseJSON(res);
																					var code = resobj.response.code;
																					if (code == '200') {
																						jQuery(".msg_p").html("Driver is onboard");
																						jQuery(".clicktoshowmsg").click();
																						setTimeout(function() {
																							jQuery("#noticed").click();
																							jQuery(".msg_p").html("");
																						}, 10000);
																						
																					}
																				}
																			});
																		  
																		  
                                                              
																jQuery.ajax({
																				url: "<?php echo WEB_ROOT ;?>webapp/check_ride_complete_or_not.php",
																				method: "get",
																				data: {
																					client_id: userXId,
																					driver_id: driver_id,
																					
																				},
																				success: function(res) {
																					var resobj = jQuery.parseJSON(res);
																					var code = resobj.response.code;
																					if (code == '200') {
																						clearInterval(refreshId4);
																						jQuery(".msg_p").html("Your ride has been completed.");
																						jQuery(".clicktoshowmsg").click();
																						jQuery("#noticed").attr("rel", "206");
																						setTimeout(function() {
																							jQuery("#noticed").click();
																							jQuery(".msg_p").html("");
																							window.location = "home.php?c=206";
																						}, 10000);
																					}
																				}
																			});
																
																
																
																
																
																
																
																
																
																
																
																
																
																
																
																
																
																
																
																
																
																
																
																
																
																
																
																
																
																
																
                                                            }, 5000);
                                                            var refreshId4 = setInterval(function() {
                                                                jQuery.ajax({
                                                                    url: "<?php echo WEB_ROOT ;?>webapp/cancel_by_driver_for_web.php",
                                                                    method: "get",
                                                                    data: {
                                                                        client_id: userXId,
                                                                        driver_id: driver_id,
                                                                    },
                                                                    success: function(res) {
                                                                        var resobj = jQuery.parseJSON(res);
                                                                        var code = resobj.response.code;
                                                                        if (code == '200') {
                                                                            clearInterval(refreshId4);
                                                                            jQuery(".msg_p").html("Sorry! Your ride has been cancelled by driver. Please select ride again.");
                                                                            jQuery(".clicktoshowmsg").click();
                                                                            jQuery("#noticed").attr("rel", "200");
                                                                            setTimeout(function() {
                                                                                jQuery("#noticed").click();
                                                                                jQuery(".msg_p").html("");
                                                                                window.location = "home.php?c=200";
                                                                            }, 10000);
                                                                        }
                                                                    }
                                                                });
                                                            }, 5000);
                                                        }
                                                    }
                                                });
                                            }, 5000);
                                        }
                                    }
                                });
                                setTimeout(function() {
                                    if (isGetDriver == 0) {
                                        clearInterval(refreshId);
                                        clearInterval(refreshId2);
                                        clearInterval(refreshId3);
                                        var msg = "We have not found a driver that fits your needs.Please select ride again.";
                                        jQuery(".msg_p").html(msg);
                                        jQuery(".clicktoshowmsg").click();
                                        jQuery("#noticed").attr("rel", "203");
                                        setTimeout(function() {
											
											   jQuery.ajax({
												url: "<?php echo WEB_ROOT ;?>webapp/delete_request.php",
												method: "get",
												data: {
													client_id: userXId,
													current_lat: lat,
													current_long: lng,
												},
												success: function(res) {
													
													
													
													
													
													
													var resobj = jQuery.parseJSON(res);
													var code = resobj.response.code;
													if (code == '200') {
														jQuery("#noticed").click();
														jQuery(".msg_p").html("");
														window.location = "home.php?c=203";
													}
												}
											});
											
    
                                        }, 1000);
                                    }
                                }, 120000);
                            }, 5000);
                        } else {
                            alert("Unkown Error ! Please try again later.");
                        }
                    }
                });
            }
        });
        jQuery(".cancel_before_acpt").on("click", function() {
            jQuery(".process_wait_out_layer").show();
            clearInterval(refreshId);
            clearInterval(refreshId2);
            clearInterval(refreshId3);
            jQuery.ajax({
                url: "<?php echo WEB_ROOT ;?>webapp/delete_request.php",
                method: "get",
                data: {
                    client_id: userXId,
                    current_lat: lat,
                    current_long: lng,
                },
                success: function(res) {
                    var resobj = jQuery.parseJSON(res);
                    var code = resobj.response.code;
                    jQuery(".process_wait_out_layer").hide();
                    if (code == '200') {
                        jQuery(".msg_p").html("Your request has been cancelled.");
                        jQuery(".clicktoshowmsg").click();
                        jQuery("#noticed").attr("rel", "204");
                        setTimeout(function() {
                            jQuery("#noticed").click();
                            jQuery(".msg_p").html("");
                            window.location = "home.php?c=204";
                        }, 10000);
                    }
                }
            });
        });
    });
</script>
</body>

</html>