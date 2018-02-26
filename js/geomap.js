var MAIN = MAIN || {};

(function($){
	"use strict";

	MAIN.geomap = {
		init: function() {
			this.domCache();
			this.bindEvents();
			// getting data
			this.getData();
			// initializing map
			this.initMap();
		},

		domCache: function() {
			// global variables
			this.map;
			this.marker = new google.maps.Marker();
			this.circle = new google.maps.Circle();
			this.nearbyMarkers = [];
			this.data;
			this.infoWindow = new google.maps.InfoWindow();

   			
			// domcaching the selectors
			this.$searchForm = $("#searchForm");
			this.$txtSearch = this.$searchForm.find(".txt-search");
			this.$searchType = this.$searchForm.find(".search-type");

		},

		bindEvents: function() {
			var self;
			self = MAIN.geomap;

			this.$searchForm.on("submit", self.initSearch);
		},

		getData: function() {
			var self = MAIN.geomap;

			$.ajax({
				url: "getData.php",
				method: "get",
				data: {
					requestId: "getAllVolunteers"
				},
				success: function(data) {
					self.data = $.parseJSON(data);
				}
			});

		},

		initMap: function() {
			this.map = new google.maps.Map(document.getElementById('map'), {
	          center: {lat: 14.6841162, lng: 120.9921627},
	          zoom: 15
	        });
		},

		initSearch: function(e) {
			var self, search, type;
			self = MAIN.geomap;
			search = self.$txtSearch.val();

			type = self.$searchType.find("option:selected").data("type");

			// removing the marker
			self.removeMarker(self.marker);
			self.removeMarker(self.nearbyMarkers);
			// removing circle of marker
			// self.removeCircle(self.circle);

			
			if(type == "location") {
				// set the location based on the input
				self.setLocation(search);

			} else {
				// use name of the volunteer to search its latitude and longitude
				// and use its latlng to plot in map
				// find all the nearby volunteer aside from itself

				self.getVolunteer(search);
			}

			e.preventDefault();
		},

		setLocation: function(address) {
			var self, geocoder;
			self = MAIN.geomap;
			geocoder = new google.maps.Geocoder();
			self.marker = new google.maps.Marker();

			geocoder.geocode({'address': address}, function(results, status) {

				if(status == 'OK') {
					// creating a user marker
			        self.addMarker(results[0].geometry.location);
			        self.marker.addListener("click", function() {
			        	self.infoWindow.setContent("My Location");
			        	self.infoWindow.open(self.map, self.marker);
			        });


			        // get all the nearby volunteers
			        self.getNearby(self.data, {
			        	lat: results[0].geometry.location.lat(),
			        	lng: results[0].geometry.location.lng()
			        });
				} else {
					alert("Please do correct your address");
				}


			});


		},

		addMarker: function(location) {
			var self, circle;
			self = MAIN.geomap;
			
			
			// adding radius or circle to the marker
			// self.addCircle(location, 1000);

			// setting map center
			self.map.setCenter(location);
			// positioning the marker
			self.marker.setPosition(location);
			// adding the marker to the map
			self.marker.setMap(self.map);
			
		},

		addCircle: function(location, radius) {
			var self;
			self = MAIN.geomap;

			self.circle = new google.maps.Circle({
				strokeColor: '#FF0000',
		      	strokeOpacity: 0.8,
		      	strokeWeight: 2,
		      	fillColor: '#FF0000',
		      	fillOpacity: 0.35,
		      	map: self.map,
		      	center: location,
		      	radius: radius
			});
		},

		removeCircle: function(circle) {
			circle.setMap(null);
		},

		addMultipleMarker: function(data, index) {
			var self, marker, latLng;
			self = MAIN.geomap;
			

			latLng = {lat: parseFloat(data[index].latitude), lng: parseFloat(data[index].longitude)};
			console.log(latLng);

			marker = new google.maps.Marker({
				position: new google.maps.LatLng(latLng),
				map: self.map
			});

			self.nearbyMarkers.push(marker);

			self.map.setCenter(latLng);

			// adding info window for each marker
			self.nearbyMarkers[index].addListener("click", function() {
	        	self.infoWindow.setContent(self.getInfo(data[index]));
	        	self.infoWindow.open(self.map, self.nearbyMarkers[index]);
	        });
			

		},

		getInfo: function(data) {
			var str = "";

			str = "<table border='0'>";
			str += "<tr><td>Name:</td><td>"+data.full_name+"</td></tr>";
			str += "<tr><td>Address:</td><td>"+data.address+"</td></tr>";
			str += "<tr><td>Profession:</td><td>"+data.profession+"</td></tr>";
			str += "<tr><td>Age:</td><td>"+data.age+"</td></tr>";
			str += "<tr><td>Contact:</td><td>"+data.contact_number+"</td></tr>";
			str += "<tr><td>Blood Type:</td><td>"+data.blood_type+"</td></tr>";
			str += "<tr><td>Volunteer Type:</td><td>"+data.volunteer_type+"</td></tr>";
			str += "</table>";

			return str;
		},

		getVolunteer: function(name) {
			var self, info, json;
			self = MAIN.geomap;
			$.ajax({
				url: "getData.php",
				method: "get",
				data: {
					requestId: "getVolunteer",
					name: name
				},
				success: function(data) {
					json = $.parseJSON(data);
					info = {
						lat: parseFloat(json[0].latitude), 
						lng: parseFloat(json[0].longitude),
						id: json[0].volunteer_id
					};
					// plot to the map
					// self.addMarker(latLng);
					self.getNearby(self.data, info );
				}
			});


		},

		setMap: function(markers) {
			var self = MAIN.geomap;
			// plotting the marker to the map
			for(var x = 0; x < markers.length; x++) {
				markers[x].setMap(self.map);
			}
		},

		removeMarker: function(marker) {
			var self = MAIN.geomap;
			if($.isArray(marker)) {
				for(var x = 0; x < marker.length; x++) {
					// removing the marker from the map
					marker[x].setMap(null);
				}
				// empty the array
				self.nearbyMarkers = [];
			} else {
				// removing the marker from the map
				marker.setMap(null);
			}

		},

		getNearby: function(locations, myLocation) {
			var self, geometry, distance, marker, latLng, inc = 0;
			self = MAIN.geomap;
			
			geometry = google.maps.geometry.spherical;

			for(var x = 0; x < locations.length; x++) {
				latLng = {lat: parseFloat(locations[x].latitude), lng: parseFloat(locations[x].longitude)};
				distance = (geometry.computeDistanceBetween(new google.maps.LatLng(myLocation.lat, myLocation.lng), new google.maps.LatLng(latLng)) / 100).toFixed(6);
					
					console.log(distance);

				if(distance > 0 && distance <= 100	) {
					// show to the map the nearby volunteer
					self.addMultipleMarker(locations, inc);
					inc++;
				}
				
			}
			
		}

	}


	$(function() {
		MAIN.geomap.init();
	});


})(jQuery);