<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon.png">
    <title>MKCE_BUS</title>
    <link href="assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <link href="dist/css/style.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<style>
    #map { height: 100vh; width: 100%; }
</style>
</head>
<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper">
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <a class="navbar-brand" href="index.html">
                        <span class="logo-text">
                             <img src="img/mkcenavlogo.png" alt="homepage" class="light-logo" />
                        </span>
                    </a>
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                    </ul>
                    <ul class="navbar-nav float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                <div class="dropdown-divider"></div>
                                 </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.html" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Bus Tracker</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <div class="page-wrapper">
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Bus Traker Dashboard</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                   
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                            <div id="map"></div>
<div id="info-box">
    <p id="distance">Distance    &nbsp;&nbsp;&nbsp;&nbsp; : 00 km</p>
    <p id="speed">Speed       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     : 00 m/sec</p>
    <p id="eta">Reach Time&nbsp;: 00 hrs : 00 mins</p>
</div>
    <select name="Bus" id="info-box1">
    <option value="0">Select BusNo</option>
        <option value="1">Bus | 01</option>
        <option value="2">Bus | 02</option>
        <option value="3">Bus | 03</option>
        <option value="4">Bus | 04</option>
        <option value="5">Bus | 05</option>
        <option value="6">Bus | 06</option>
        <option value="7">Bus | 07</option>
        <option value="8">Bus | 08</option>
        <option value="9">Bus | 09</option>
        <option value="10">Bus | 10</option>
        <option value="11">Bus | 11</option>
        <option value="12">Bus | 12</option>
      </select>
      <div id="notification-card" class="notification-card">
    <h3>Proximity Alerts</h3>
    <div id="proximity-messages"></div>
</div>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<style>
    /* Map styling */
    #map {
        height: 80vh;
    }
    #info-box1 option {
    background-color: #fff; /* White background for options */
    color: #333; /* Text color for options */
    font-size: 15px;
    text-align: center;
  }
    /* Styling for info box */
    #info-box1 {
        position: absolute;
        top: 20px;
        right: 20px;
        appearance: none; 
        background-color: rgb(251, 71, 71);
        padding: 15px 10px;
        border-radius: 8px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        font-family: Arial, sans-serif;
        font-size: xx-large;
        text-align: center;
        font-weight: bold;
        color: rgb(255, 255, 255);
        width: 240px;
        z-index: 1000;
        height:80px ;
        outline: 3px solid rgb(165, 0, 0);
    }
    #info-box {
        position: absolute;
        bottom: 40px;
        right: 20px;
        font-size: 20px;
        background-color: rgb(43, 204, 37);
        padding: 10px 15px;
        border-radius: 8px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        font-family: Arial, sans-serif;
        font-weight: bold;
        color: rgb(255, 255, 255);
        width: 320px;
        z-index: 1000;
        outline: 3px solid rgb(4, 135, 0);
    }
    #info-box p {
        margin: 5px 0;
    }
    .notification-card {
    width: 300px;
    padding: 15px;
    background-color: #f9f9f9;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    position: absolute;
    top: 160px;
    right: 20px;
    font-family: Arial, sans-serif;
    z-index: 1000;
}
.notification-card h3 {
    margin: 0;
    font-size: 18px;
    color: #333;
}
.proximity-message {
    margin-top: 10px;
    padding: 8px;
    border-radius: 5px;
    background-color: #e0f7fa;
    color: #00796b;
    font-size: 14px;
}
</style>
<script>
// Define the map and set the initial view
const map = L.map('map').setView([10.980611666666666,78.07579], 17);
// Keep a reference to the tile layer
const tileLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; OpenStreetMap contributors'
}).addTo(map);
const redIcon = L.icon({
    iconUrl: 'img/location_icon.png',
    iconSize: [40, 51],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
});
const busIcon = L.icon({
    iconUrl: 'img/bus-cartoon-icon.png',
    iconSize: [70, 81],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
});
// Define route and moving marker outside the update function
let route = L.polyline([], { color: 'black' }).addTo(map);  // Light blue route
let traveledRoute = L.polyline([], { color: '#00008b' }).addTo(map);  // Dark blue for traveled distance
let movingMarker = L.marker([11.053593333333334, 78.0494761111111], { icon: busIcon }).addTo(map).bindPopup("Current Location");
let stops = []; // Define stops globally
document.getElementById("info-box1").addEventListener("change", async function () {
    const selectedBusNo = this.value;
    const busData = await fetchBusData(selectedBusNo);
    if (busData) {
        updateMapMarkers(busData);
        startLiveTracking(busData);
    }
});
async function fetchBusData(busNo) {
    const response = await fetch(`busData.php?BusNo=${busNo}`);
    const data = await response.json();
    return data;
}
function updateMapMarkers(busData) {
    stops = [
        { name: busData.SourceName, coords: busData.SourceCoordinates },
        { name: busData.Stop1Name, coords: busData.Stop1Coordinates },
        { name: busData.Stop2Name, coords: busData.Stop2Coordinates },
        { name: busData.Stop3Name, coords: busData.Stop3Coordinates },
        { name: busData.DestinationName, coords: busData.DestinationCoordinates }
    ];
    stops.forEach((stop) => {
        if (stop.coords) {
            const [lat, lng] = stop.coords.split(',').map(Number);
            L.marker([lat, lng], { icon: redIcon }).addTo(map).bindPopup(stop.name);
        }
    });
    // Draw the route from Source to Stop1 to Stop2 to Destination
    let routeCoords = stops.map(stop => {
        return stop.coords ? stop.coords.split(',').map(Number) : null;
    }).filter(coord => coord !== null);

    route.setLatLngs(routeCoords);  // Light blue route
}
async function startLiveTracking(busData) {
    const [srcLat, srcLng] = busData.SourceCoordinates.split(',').map(Number);
    const [destLat, destLng] = busData.DestinationCoordinates.split(',').map(Number);
    const sourceCoords = [srcLat, srcLng];
    const destinationCoords = [destLat, destLng];
    let previousPos = sourceCoords;

    traveledRoute.setLatLngs([sourceCoords]);

    setInterval(async () => {
        try {
            const response = await fetch("https://app.gpstrack.in/api/get_current_data?token=balajivenkatesan_s2JPSJlW1j18DT9TQZY8vytznR7k7YXq&email=balajivenkatesan2k04@gmail.com");
            
            if (!response.ok) {
                throw new Error(`Network response was not ok: ${response.statusText}`);
            }

            const gpsData = await response.json();
            console.log("GPS data received:", gpsData); // Log to verify data

            if (Array.isArray(gpsData) && gpsData.length > 0) {
                const gpsInfo = gpsData[0];
                const latitude = parseFloat(gpsInfo.latitude);
                const longitude = parseFloat(gpsInfo.longitude);

                if (!isNaN(latitude) && !isNaN(longitude)) {
                    const currentPos = [latitude, longitude];
                    movingMarker.setLatLng(currentPos);
                    traveledRoute.addLatLng(currentPos); // Update traveled route
                    displayDistanceInfo(currentPos, destinationCoords, gpsInfo.speed || 0);
                    checkProximity(currentPos, stops);
                    previousPos = currentPos;
                } else {
                    console.warn("Invalid latitude or longitude in GPS data");
                }
            } else {
                console.warn("Received empty or undefined GPS data array");
            }
        } catch (error) {
            console.error("Error fetching GPS data:", error);
        }
    }, 31000); // Adjusted interval to 30 seconds
}
function checkProximity(currentPos, stops) {
    const proximityMessagesContainer = document.getElementById("proximity-messages");
    let alertedStops = []; // Track stops that have triggered alerts

    stops.forEach((stop) => {
        if (stop.coords) {
            const [lat, lng] = stop.coords.split(',').map(Number);
            const distance = calculateDistance(currentPos, [lat, lng]);

            // When bus is approaching near the stop
            if (distance < 0.04 && !alertedStops.includes(stop.name)) {
                proximityMessagesContainer.innerHTML = ""; // Clear previous messages

                const messageElement = document.createElement("div");
                messageElement.classList.add("proximity-message");
                messageElement.innerText = `Bus is approaching near ${stop.name}`;
                
                proximityMessagesContainer.appendChild(messageElement); // Append proximity message
                alertedStops.push(stop.name); // Mark this stop as alerted
            }

            // When bus crosses the stop
            if (distance < 0.02 && alertedStops.includes(stop.name)) {
                proximityMessagesContainer.innerHTML = ""; // Clear previous messages

                const messageElement = document.createElement("div");
                messageElement.classList.add("proximity-message");
                messageElement.innerText = `Bus has crossed ${stop.name}`;
                
                proximityMessagesContainer.appendChild(messageElement); // Append crossing message
                alertedStops = alertedStops.filter(name => name !== stop.name); // Reset alert for this stop
            }
        }
    });
    // Remove alerts that are older than 30 seconds
    setTimeout(() => {
        alertedStops = []; // Clear alerted stops so alerts can be re-triggered
    }, 31000);
}
function displayDistanceInfo(currentPos, destination, speed) {
    const distanceToDestination = calculateDistance(currentPos, destination).toFixed(2);
    let etaMessage = "N/A";
    if (speed > 0) {
        const etaInMinutes = (distanceToDestination / speed * 60).toFixed(0);
        const etaHours = Math.floor(etaInMinutes / 60);
        const etaMinutes = etaInMinutes % 60;
        etaMessage = `${etaHours} hrs : ${etaMinutes} mins`;
    }
    document.getElementById("distance").innerText = `Distance: ${distanceToDestination} km`;
    document.getElementById("speed").innerText = `Speed: ${speed} m/sec`;
    document.getElementById("eta").innerText = `Reach Time: ${etaMessage}`;
}
function calculateDistance(coord1, coord2) {
    const R = 6371;
    const dLat = (coord2[0] - coord1[0]) * Math.PI / 180;
    const dLng = (coord2[1] - coord1[1]) * Math.PI / 180;
    const a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
        Math.cos(coord1[0] * Math.PI / 180) * Math.cos(coord2[0] * Math.PI / 180) *
        Math.sin(dLng / 2) * Math.sin(dLng / 2);
    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    return R * c;
}
</script>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer text-center">
            <b>2024 © M.Kumarasamy College of Engineering. All Rights Reserved.<br>
                Developed and Maintained by Technology Innovation Hub.</b>
        </footer>
        </footer>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
</footer>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
   

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <script src="assets/libs/flot/excanvas.js"></script>
    <script src="assets/libs/flot/jquery.flot.js"></script>
    <script src="assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="assets/libs/flot/jquery.flot.time.js"></script>
    <script src="assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="dist/js/pages/chart/chart-page-init.js"></script>
</body>
</html>