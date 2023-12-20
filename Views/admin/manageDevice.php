<!-- Header -->
<header class="w3-container w3-text-indigo" style="padding-top:22px">
	<h5><b><i class="fa fa-microchip"></i> Manage Device</b></h5>
</header>
<div class="w3-container w3-margin-bottom">
	<button class="w3-right w3-button w3-color m8-fancy w3-margin-top" onclick="w3.show('#addDevice')">Add Device</button>
</div>

<div class="w3-container w3-margin-bottom">
	<div class="w3-animate-top w3-border w3-white w3-text-color" style="display:none;" id="addDevice">
		<div class="w3-row" id="id02">
			<div class="w3-button w3-circle w3-red w3-right w3-margin" onclick="w3.hide('#addDevice')">X</div>
			<h3 style="padding-left:12px;">Add Device</h3>
			<hr>
			<div class="w3-col s12 m6 l3" id="showProjListDevice">
				<div style="padding: 10px;">
					<label>Project:</label>
					<select class="w3-input w3-border w3-round" id="projectDeviceId" onchange="deviceFillItems('_b_district',this.value)">
						<option value="-1">Select Project</option>
						<option w3-repeat="project_list" value="{{id}}">{{name}}</option>
					</select>
				</div>
			</div>
			<div class="w3-col s12 m6 l3" id="showDistListDevice">
				<div style="padding: 10px;">
					<label>District:</label>
					<select class="w3-input w3-border w3-round" id="districtDeviceId" onchange="deviceFillItems('_c_block',this.value)">
						<option value="-1">Select District</option>
						<option w3-repeat="district_list" value="{{id}}">{{name}}</option>
					</select>
				</div>
			</div>
			<div class="w3-col s12 m6 l3" id="showBlockListDevice">
				<div style="padding: 10px;">
					<label>Block :</label>
					<select class="w3-input w3-border w3-round" id="blockDeviceId" onchange="deviceFillItems('_d_panchayat',this.value)">
						<option value="-1">Select Block</option>
						<option w3-repeat="block_list" value="{{id}}">{{name}}</option>
					</select>
				</div>
			</div>
			<div class="w3-col s12 m6 l3" id="showPanchListDevice">
				<div style="padding: 10px;">
					<label>Panchayat :</label>
					<select class="w3-input w3-border w3-round" id="panchDeviceId" onchange="deviceFillItems('_e_ward',this.value)">
						<option value="-1">Select Panchayat</option>
						<option w3-repeat="panchayat_list" value="{{id}}">{{name}}</option>
					</select>
				</div>
			</div>
			<div class="w3-col s12 m6 l3" id="showWardListDevice">
				<div style="padding: 10px;">
					<label>Ward :</label>
					<select class="w3-input w3-border w3-round" id="wardDeviceId">
						<option value="-1">Select Ward</option>
						<option w3-repeat="ward_list" value="{{id}}">{{name}}</option>
					</select>
				</div>
			</div>
			<div class="w3-col s12 m6 l3">
				<div style="padding: 10px;">
					<label>Enter Device Imei :</label>
					<input class="w3-input w3-border w3-round" id="enterImei" type="text">
				</div>
			</div>
			<div class="w3-col s12 m6 l3">
				<div style="padding: 10px;">
					<label>Enter Device Name :</label>
					<input class="w3-input w3-border w3-round" id="enterName" type="text">
				</div>
			</div>
			<div class="w3-col s12 m6 l3">
				<div style="padding: 10px;">
					<label>Added By :</label>
					<input class="w3-input w3-border w3-round" id="enterAddedBy" type="text">
				</div>
			</div>
			<div class="w3-col s12 m6 l3">
				<div style="padding: 10px;">
					<label>Luminary QR Name:</label>
					<input class="w3-input w3-border w3-round" id="enterLuminary" type="text">
				</div>
			</div>
			<div class="w3-col s12 m6 l3">
				<div style="padding: 10px;">
					<label>Battery QR Name:</label>
					<input class="w3-input w3-border w3-round" id="enterBattery" type="text">
				</div>
			</div>
			<div class="w3-col s12 m6 l3">
				<div style="padding: 10px;">
					<label>Panel QR Name:</label>
					<input class="w3-input w3-border w3-round" id="enterPanel" type="text">
				</div>
			</div>
			<div class="w3-col s12 m6 l3">
				<div style="padding: 10px;">
					<label>Location Remark :</label>
					<input class="w3-input w3-border w3-round" id="enterLocation" type="text">
				</div>
			</div>
			<div class="w3-col s12 m6 l3">
				<div style="padding: 10px;">
					<label>Latitude :</label>
					<input class="w3-input w3-border w3-round" id="enterLatitude" type="text">
				</div>
			</div>
			<div class="w3-col s12 m6 l3">
				<div style="padding: 10px;">
					<label>Longitude :</label>
					<input class="w3-input w3-border w3-round" id="enterLongitude" type="text">
				</div>
			</div>
			<div class="w3-col s12 m6 l3">
				<div style="padding: 10px;">
					<label>Upload image :</label>
					<input class="w3-input w3-border w3-round" name ="enterImage" id="enterImage" type="file">
				</div>
			</div>
		</div>
		<div class="w3-row" style="margin:10px">
			<button class="w3-col s12 m12 l12 w3-button w3-color w3-round" id="addUserBtn" onclick="addDevice()">Add Device</button>
		</div>
	</div>
</div>


<div class="w3-container w3-responsive">
	<table id="id01" class="w3-table-all">
		<tr class="w3-color">
			<th>Device Name</th>
			<th>IMEI</th>
			<th>Ward</th>
			<th>Panchayat</th>
			<th>Block</th>
			<th>District</th>
			<th>Luminary QR</th>
			<th>Battery QR</th>
			<th>Panel QR</th>
			<th>Updated By</th>
			<th>Image</th>
			<th>Locate</th>
			<th>Location Remark</th>
			<th>Date & Time</th>
			<th>Action</th>
		</tr>
		<tbody>
			<?php
			$item = $_GET['item'];
			// $table = $_GET['table'];
			$itemsPerPage = 10;
			$totalPages = 0;
			$page = isset($_GET['page']) ? $_GET['page'] : 1;
			$offset = ($page - 1) * $itemsPerPage;
			$totalRecords = 0;
			$sqlTotal = "SELECT COUNT(id) as totalCount from _f_device WHERE active = 0";
			$resultCount = $conn->query($sqlTotal);
			if($resultCount->num_rows>0){
				$count_row = $resultCount->fetch_assoc();
				$totalRecords = $count_row['totalCount'];
			}
			if($totalRecords>0){
				$totalPages = ceil($totalRecords/$itemsPerPage);
			}
			$sql = "SELECT * FROM _f_device where active=0 ORDER BY id DESC LIMIT $offset, $itemsPerPage";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
			?>

					<tr id="dev_id_<?php echo $row["dev_id"]; ?>">
						<td style="width:50px;"><?php echo $row["name"]; ?></td>
						<td><?php echo $row["dev_id"]; ?></td>
						<td><?php echo $row["ward"]; ?></td>
						<td><?php echo $row["panchayat"]; ?></td>
						<td><?php echo $row["block"]; ?></td>
						<td><?php echo $row["district"]; ?></td>
						<td><?php echo $row["luminary_qr"]; ?></td>
						<td><?php echo $row["battery_qr"]; ?></td>
						<td><?php echo $row["panel_qr"]; ?></td>
						<td><?php echo $row["updated_by"]; ?></td>
						<?php if (str_contains($row["file"], ".jpeg")) { ?>
							<td><img src="../upload/images/<?php echo $row["file"]; ?>" style="width:200px;"></td>
						<?php } else { ?>
							<td><img src="data:image/png;base64,<?php echo $row["file"]; ?>" style="width:200px;"></td>
						<?php } ?>
						<td><a href="https://www.google.com/maps/search/?api=1&query=<?php echo $row["lat"] . "," . $row["lng"]; ?>" target="_blank" class="w3-large"><i class="fa fa-globe w3-text-color"></i> Locate</a></a></td>
						<td><?php echo $row["remark"]; ?></td>
						<td><?php echo $row["time"]; ?></td>
						<td>
							<button class="w3-button w3-teal m8-fancy" style="width:100px;" onclick="authorizeInactivesDevice('<?php echo $row['dev_id']; ?>')">Accept</button><br><br>
							<button class="w3-button w3-red m8-fancy" style="width:100px;" onclick="deleteDevice('<?php echo $row['dev_id']; ?>','<?php echo $row['id']; ?>')">Delete</button><br><br>
							<button class="w3-button w3-color m8-fancy" style="width:100px;">Block IMEI</button>
						</td>
					</tr>
			<?php
				}
			} else
				echo "<tr><td>No new device found!</td></tr>";
			?>
		</tbody>
	</table>
</div>

<center>
	<?php if($page>1) {?>
	<a href="admin.php?item=4&page=<?php echo max(1, $page - 1); ?>"><button id="prevBtn" class="w3-color btn mx-1 my-1" style="cursor:pointer;">Previous</button></a>
	<?php 
	}
	if($page<$totalPages){
	?>
	<a href="admin.php?item=4&page=<?php echo ($page + 1); ?>"><button id="nextBtn" class="w3-color btn mx-1 my-1" style="cursor:pointer;">Next</button></a>
<?php } ?>
</center>

<!-- <div id="deleteDevice" class="w3-modal" margin=10px;>
	<div class="w3-modal-content w3-animate-top w3-card-4" style="width:400px;height:auto;">
		<header class="w3-container w3-color">
			<span onclick="w3.hide('#deleteDevice')" class="w3-button w3-display-topright">&times;</span>
			<h2>DELETE DEVICE</h2>
		</header>
		<h4 id="askQuestion" class="w3-center"></h4>
		<div class="w3-center">
		<label for="password">Password:</label>
		<input class="m8-fancy" type="password" id="passwordInput" name="password" required>
		</div>
		<div class="w3-row" w3-repeat="result" style="margin-top:2vh" id="deleteDeviceButton">
		</div>
	</div>
</div> -->

<div id="deleteDevice" class="w3-modal">
	<div class="w3-modal-content w3-animate-top w3-card-4" style="width:400px;height:auto;">
		<header class="w3-container w3-color">
			<span onclick="w3.hide('#deleteDevice')" class="w3-button w3-display-topright">&times;</span>
			<h2>Delete Device?</h2>
		</header>
		<h4 id="askQuestion" class="w3-center"></h4>
		<div class="w3-padding">
			<label class="w3-text-color">Type security Key</label>
			<input class="w3-input w3-border m8-fancy" id="passwordInput" placeholder="Security Key Here" type="text" required>
			<!-- <button class="w3-red w3-button w3-section w3-col s12 m12 l12 m8-fancy" onclick="deleteEntity()">Delete</button> -->
			<div class="w3-row" w3-repeat="result" style="margin-top:2vh" id="deleteDeviceButton">
		</div>
		</div>
	</div>
</div>

<script>
	function authorizeInactivesDevice(devId) {
		console.log(devId);
		var param = "devId="+devId;
		console.log("param",param);
		ajax("../Controller/admin/authoriseDevice.php", param, devId);
	}

	function deleteDevice(imei,id) {
		w3.show("#deleteDevice");
		console.log(imei);
		console.log(id);
		w3.id("askQuestion").innerHTML = "Are you sure you want to delete<br><b>" + imei + "?</b></br>";
		w3.id("deleteDeviceButton").innerHTML = '<button class="w3-red w3-button w3-section w3-col s12 m12 l12 m8-fancy" onclick= "deleteDeviceNow(' + id + ')">Delete</button>';
		
	}

	function deleteDeviceNow(id){
		var pass = document.getElementById("passwordInput").value;
		// var passInt = parseInt(pass);
		var param = "id=" + id + "&pass=" + pass;
		ajax("../Controller/admin/deleteManageDevice.php", param);
		setTimeout(() =>{
			w3.hide('#deleteDevice');
		},2000);
	}

	deviceFillItems('_a_project', '');

	function deviceFillItems(table_name, id) {
		sw();
		w3.getHttpObject("../Controller/getParentChildList.php?branch=" + table_name + "&parent=" + id, function(result) {
			if (table_name == '_a_project') {
				var project_list = {
					'project_list': result
				};
				w3.displayObject("showProjListDevice", project_list);
				w3.id('districtDeviceId').value = -1;
				w3.id('blockDeviceId').value = -1;
				w3.id('panchDeviceId').value = -1;
				w3.id('wardDeviceId').value = -1;

			}
			if (table_name == '_b_district') {
				var district_list = {
					'district_list': result
				};
				w3.displayObject("showDistListDevice", district_list);
				w3.id('blockDeviceId').value = -1;
				w3.id('panchDeviceId').value = -1;
				w3.id('wardDeviceId').value = -1;
			}
			if (table_name == '_c_block') {
				var block_list = {
					'block_list': result
				};
				w3.displayObject("showBlockListDevice", block_list);
				w3.id('panchDeviceId').value = -1;
				w3.id('wardDeviceId').value = -1;

			}
			if (table_name == '_d_panchayat') {
				var panchayat_list = {
					'panchayat_list': result
				};
				w3.displayObject("showPanchListDevice", panchayat_list);
				w3.id('wardDeviceId').value = -1;
			}
			if (table_name == '_e_ward') {
				var ward_list = {
					'ward_list': result
				};
				w3.displayObject("showWardListDevice", ward_list);
			}
			sw();
			// console.log(project_list);
		});
	}


	function setWardId(id) {
		ward_id = id;
	}

	function addDevice() {
		// var projectId = document.getElementById("projectDeviceId").value;
		var projectId = w3.id("projectDeviceId").value;
		var districtId = w3.id("districtDeviceId").value;
		var blockId = w3.id("blockDeviceId").value;
		var panchId = w3.id("panchDeviceId").value;
		var wardId = w3.id("wardDeviceId").value;
		var enterImei = w3.id("enterImei").value;
		var enterName = w3.id("enterName").value;
		var enterAddedBy = w3.id("enterAddedBy").value;
		var enterLuminary = w3.id("enterLuminary").value;
		var enterBattery = w3.id("enterBattery").value;
		var enterPanel = w3.id("enterPanel").value;
		var enterLocation = w3.id("enterLocation").value;
		var enterLatitude = w3.id("enterLatitude").value;
		var enterLongitude = w3.id("enterLongitude").value;
		var fileValue = w3.id("enterImage");
		var file = fileValue.files[0];

		if (projectId == "" || districtId == "" || blockId == "" || panchId == "" || wardId == "" || enterImei == "" || enterName == "" || enterAddedBy == "" || enterLuminary == "" || enterBattery == "" || enterPanel == "" || enterLocation == "" || enterLatitude == "" || enterLongitude == "") {
			msg("Please fill all the fields");
			return 0;
		}

		var formData = new FormData();

		formData.append('projectId', projectId);
		formData.append('districtId', districtId);
		formData.append('blockId', blockId);
		formData.append('panchId', panchId);
		formData.append('wardId', wardId);
		formData.append('enterImei', enterImei);
		formData.append('enterName', enterName);
		formData.append('enterAddedBy', enterAddedBy);
		formData.append('enterLuminary', enterLuminary);
		formData.append('enterBattery', enterBattery);
		formData.append('enterPanel', enterPanel);
		formData.append('enterLocation', enterLocation);
		formData.append('enterLatitude', enterLatitude);
		formData.append('enterLongitude', enterLongitude);
		formData.append('file', file);

		// var param  = "uname="+uname+"&name="+name+"&email="+email+"&mob1="+mob1+"&mob2="+mob2+"&pass="+pass+"&type="+type+"&branch="+branch+"&branchValue="+branchValue+"&file="+file;

		ajax("../Controller/admin/addDevice.php", formData, null);
	}

	function ajax(url, params, devId = null) {
		sw();
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.open("POST", url, true);
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4) {
				if (xmlhttp.status == 200) {
					if (xmlhttp.responseText == "1") {
						msg("Success!");
						if (devId != null) {
							document.getElementById("dev_id_"+devId).remove();
						}
					} else {
						msg("Some error occurred. Please try again later");
					}
				}
			}
			sw();
		}
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		// xmlhttp.setRequestHeader("Content-length", params.length);
		// xmlhttp.setRequestHeader("Connection", "close");
		xmlhttp.send(params);
	}

</script>
