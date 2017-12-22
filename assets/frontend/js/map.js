var map, ib, boxOptions, boxText, boxWide, url, path, areaColor;
var bpom = [
	['Badan POM', -6.1891762, 106.8592943, '#ff7f23', 'POM.jpg', 'Jl. Percetakan Negara No. 23 Jakarta', '01', '00'],
	['Balai Besar POM di Banda Aceh', 5.5602809, 95.2944058, '#1e73be', 'ACH.jpg', 'Jl. Tengku HM Daud Beureueh No. 110 Banda Aceh', '02', '01'],
	['Balai Besar POM di Medan', 3.6038563, 98.6808997, '#1e73be', 'MDN.jpg', 'Jl. Willem Iskandar Pasar V Barat I No. 2 Medan', '03', '02'],
	['Balai Besar POM di Padang', -0.9009274,100.326282, '#1e73be', 'PDG.jpg', 'Jl. Gajah Mada Gunung Pangilun Padang', '04', '05'],
	['Balai Besar POM di Pekanbaru', 0.522374, 101.4149036, '#1e73be', 'PKU.jpg', 'Jl. Diponegoro No. 10 Pekanbaru', '05', '03'],
	['Balai POM di Jambi', -1.6030397, 103.5400918, '#00ad56', 'JBI.jpg', 'Jl. RM Nur Atmadibrata No. 11 Jambi', '06', '06'],
	['Balai Besar POM di Palembang', -3.0177289, 104.7361797, '#1e73be', 'PLB.jpg', 'Jl. Pangeran Ratu SU I Palembang', '07', '08'],
	['Balai POM di Bengkulu', -3.81285, 102.274064, '#00ad56', 'BKL.jpg', 'Jl. Batanghari No. 1 Bengkulu', '08', '07'],
	['Balai Besar POM di Bandar Lampung', -5.4294745, 105.2339718, '#1e73be', 'LPG.jpg', 'Jl. Dr. Susilo No. 105 Bandar Lampung', '09', '10'],
	['Balai POM di Batam', 1.1687013, 104.1126358, '#00ad56', 'BTM.jpg', 'Komplek Citramas Indah E-28 Jl. Hangjebat Batam', '10', '04'],
	['Balai POM di Pangkal Pinang', -2.1802595, 106.1125368, '#00ad56', 'PKP.jpg', 'Komplek Perkantoran Pemerintah Jl. Pulau Bangka Pangkal Pinang', '11', '09'],
	['Balai Besar POM di Jakarta', -6.3355619, 106.8991912, '#1e73be', 'JKT.jpg', 'Jl. Assyafiiyah No. 133 Jakarta', '12', '12'],
	['Balai Besar POM di Bandung', -6.9006228, 107.563066, '#1e73be', 'BDG.jpg', 'Jl. Pasteur No. 25 Bandung', '13', '13'],
	['Balai Besar POM di Semarang', -6.9627179, 110.3592346, '#1e73be', 'SMG.jpg', 'Jl. Madukoro Blok AA-BB No. 8 Semarang', '14', '14'],
	['Balai Besar POM di Yogyakarta', -7.8024655, 110.2951189, '#1e73be', 'JOG.jpg', 'Jl. Tompeyan I Yogyakarta', '15', '15'],
	['Balai Besar POM di Surabaya', -7.270098, 112.7604644, '#1e73be', 'SBY.jpg', 'Jl. Karang Menjangan No. 20 Surabaya', '16', '16'],
	['Balai POM di Serang', -6.1449974, 106.1547787, '#00ad56', 'SRG.jpg', 'Jl. Syekh Nawawi Al-Bantani Serang', '17', '11'],
	['Balai Besar POM di Denpasar', -8.6706891, 115.1920467, '#1e73be', 'DPS.jpg', 'Jl. Cut Nyak Dien No. 5 Denpasar', '18', '17'],
	['Balai Besar POM di Mataram', -8.5878371, 116.0789468, '#1e73be', 'MTR.jpg', 'Jl. Caturwarga Mataram', '19', '18'],
	['Balai POM di Kupang', -10.1724379, 123.5409958, '#00ad56', 'KPG.jpg', 'Jl. R. A. Kartini Kupang', '20', '19'],
	['Balai Besar POM di Pontianak', -0.063558, 109.3267058, '#1e73be', 'POT.jpg', 'Jl. Dr. Soedarso Pontianak', '21', '20'],
	['Balai POM di Palangka Raya', -2.1996425, 113.8737048, '#00ad56', 'PRY.jpg', 'Jl. Cilik Riwut No. 13 Palangka Raya', '22', '21'],
	['Balai Besar POM di Banjarmasin', -3.2943493, 114.5522798, '#1e73be', 'BJR.jpg', 'Jl. Brigjen H. Hasan Basri No. 40 Banjarmasin', '23', '23'],
	['Balai Besar POM di Samarinda', -0.4769004, 117.1099048, '#1e73be', 'SMR.jpg', 'Jl. Letjen Soeprapto No. 3 Samarinda', '24', '22'],
	['Balai Besar POM di Manado', 1.4169197, 124.7969328, '#1e73be', 'MDO.jpg', 'Jl. Raya Manado - Tomohon Km. 7 Manado', '25', '24'],
	['Balai POM di Palu', -0.888474, 119.8649711, '#00ad56', 'PLU.jpg', 'Jl. Undata No. 3 Palu', '26', '26'],
	['Balai Besar POM di Makassar', -5.1660949, 119.41155, '#1e73be', 'MKS.jpg', 'Jl. Baji Minasa No. 2 Makassar', '27', '27'],
	['Balai POM di Kendari', -3.9686448, 122.5758172, '#00ad56', 'KRI.jpg', 'Kompleks Bumi Pradja Anduonohu Jl. Haluoleo Kendari', '28', '28'],
	['Balai POM di Gorontalo', 0.551405, 123.0710765, '#00ad56', 'GRO.jpg', 'Jl. Tengah Toto Selatan Bone Bolango Gorontalo', '29', '25'],
	['Balai POM di Ambon', -3.694337, 128.178635, '#00ad56', 'ABN.jpg', 'Jl. Dr. Kayadoe SK 20/2 Ambon', '30', '29'],
	['Balai Besar POM di Jayapura', -2.5333903, 140.7096101, '#1e73be', 'JYP.jpg', 'Jl. Gurabesi No. 63 Jayapura', '31', '30'],
	['Balai POM di Manokwari', -0.8643674, 134.0740985, '#00ad56', 'MKW.jpg', 'Jl. Angkasa Mulyono Manokwari', '32', '31'],
	['Balai POM di Sofifi', 0.733473, 127.559568, '#00ad56', 'SFF.jpg', 'Jl. Pemuda Sofifi', '33', '32'],
	['Balai POM di Mamuju', -2.7060739, 118.9482495, '#00ad56', 'MJU.jpg', 'Mamuju', '34', '33'],
];

jQuery(function(){
	url = jQuery("body").attr("url");
	initMap();
});

function initMap() {
	map = new google.maps.Map(document.getElementById('map'), {
		zoom: 5,
		center: {lat: -3, lng: 118}
	});
	ib = new InfoBox();
	boxText = document.createElement("div");
	boxText.className = 'map-box';
	boxOptions = {
		content: boxText,
		disableAutoPan: true,
		alignBottom : true,
		maxWidth: 0,
		pixelOffset: new google.maps.Size(-60, -5),
		zIndex: null,
		boxStyle: { width: "340px" },
		closeBoxMargin: "0", 
		closeBoxURL: "", 
		infoBoxClearance: new google.maps.Size(1, 1), 
		isHidden: false,
		pane: "floatPane",
		enableEventPropagation: false,
	};
	boxWide = {
		boxStyle: { width: "480px" },
	};
	addMarker();
}

function addMarker(){
	for (var i = 0; i < bpom.length; i++) {
		var x = bpom[i];
		var bpomval = '<a href="' + url + 'browse/balai/profile/' + x[7] + '" class="map-box-image"><img src="' + url + 'data/map/' + x[4] + '" alt=""/><i class="map-box-icon"></i></a><h2>' + x[0] + '</h2><span class="date">' + x[5] + '</span><table><tr><td>&nbsp;</td></tr></table><div class="infoBox-close"><i class="fa fa-times"></i></div>';
		var marker = new google.maps.Marker({
			position: {lat: x[1], lng: x[2]},
			map: map,
			icon: iconColor(x[3]),
			// red e20d0d
			// orange ff7f23
			title: x[0],
		    ibcontent: bpomval,
		});
		jQuery.getScript(url + "js/bpom/" + x[6] + ".js", function(){
			for (var p = 0; p < path.length; p++){
				var area = new google.maps.Polygon({
					paths: path[p],
					strokeColor: areaColor,
					strokeOpacity: 0.5,
					strokeWeight: 1,
					fillColor: areaColor,
					fillOpacity: 0.25
				});
				area.setMap(map);
			}
		});
		google.maps.event.addListener(marker, 'click', (function(marker, i){
			return function(){
				ib.setOptions(boxOptions);
				boxText.innerHTML = this.ibcontent;
				ib.open(map, this);
				var latLng = this.getPosition();
				map.panTo(latLng);
				map.panBy(90, -120);
				google.maps.event.addListener(ib,'domready',function(){
					jQuery('.infoBox-close').click(function(){ ib.close(); });
					/*jQuery('.map-box-image').click(function(){
						jQuery('.map-box-image').hide();
						jQuery('table').replaceWith('<p>Loading..</p>');
						ib.setOptions(boxWide);
						map.panTo(latLng);
						map.panBy(180, -120);
						return false;
					});*/
				});
			}
		})(marker, i));
	}
}

function iconColor(color) {
	return {
		path: 'M19.9,0c-0.2,0-1.6,0-1.8,0C8.8,0.6,1.4,8.2,1.4,17.8c0,1.4,0.2,3.1,0.5,4.2c-0.1-0.1,0.5,1.9,0.8,2.6c0.4,1,0.7,2.1,1.2,3 c2,3.6,6.2,9.7,14.6,18.5c0.2,0.2,0.4,0.5,0.6,0.7c0,0,0,0,0,0c0,0,0,0,0,0c0.2-0.2,0.4-0.5,0.6-0.7c8.4-8.7,12.5-14.8,14.6-18.5 c0.5-0.9,0.9-2,1.3-3c0.3-0.7,0.9-2.6,0.8-2.5c0.3-1.1,0.5-2.7,0.5-4.1C36.7,8.4,29.3,0.6,19.9,0z M2.2,22.9 C2.2,22.9,2.2,22.9,2.2,22.9C2.2,22.9,2.2,22.9,2.2,22.9C2.2,22.9,3,25.2,2.2,22.9z M19.1,26.8c-5.2,0-9.4-4.2-9.4-9.4 s4.2-9.4,9.4-9.4c5.2,0,9.4,4.2,9.4,9.4S24.3,26.8,19.1,26.8z M36,22.9C35.2,25.2,36,22.9,36,22.9C36,22.9,36,22.9,36,22.9 C36,22.9,36,22.9,36,22.9z M13.8,17.3a5.3,5.3 0 1,0 10.6,0a5.3,5.3 0 1,0 -10.6,0',
		strokeOpacity: 0,
		strokeWeight: 1,
		fillColor: color,
		fillOpacity: 1,
		rotation: 0,
		scale: 0.75,
		anchor: new google.maps.Point(19,52)
   };
}