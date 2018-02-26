var MAIN = MAIN || {};
(function($) {
	"use strict";


	MAIN.requestData = {

		init: function() {

			this.domCache();
			this.eventHandler();

		},

		domCache: function() {

			this.$insertForm = $("#insert_form");



		},

		eventHandler: function() {
			var self;
			self = MAIN.requestData;

			this.$insertForm.on("submit", self.insertFormWithLatLng);

		},

		insertFormWithLatLng: function(e) {
			// get first the full address
			var self,$this, street, district, barangay, city, address, 
			geocoder;
			self = MAIN.requestData;
			$this = $(this);
			street = self.$insertForm.find(".street").val();
			district = self.$insertForm.find(".district").val();
			barangay = self.$insertForm.find(".barangay").val();
			city = self.$insertForm.find(".city").val();	
			address = street + " " + district + " " + barangay + " " + city;

			geocoder = new google.maps.Geocoder();
			geocoder.geocode({"address": address}, function(results, status) {
				// console.log(address);
				if(status == 'OK') {
					// adding latitude and longitude to the hidden fields of it
					self.$insertForm.find(".latitude").val(results[0].geometry.location.lat().toFixed(6));
					self.$insertForm.find(".longitude").val(results[0].geometry.location.lng().toFixed(6));

					$.ajax({
						url: "postData.php",
						method: "post",
						data: self.$insertForm.serialize() + "&requestId=postToVolunteer",
						success: function(data) {
							console.log(data);
							window.location.reload();
						}
					});

				} else {
					alert("Please do correct your address");
					
				}

			});

			// return false;
			e.preventDefault();
		}


	}	


	$(function() {
		MAIN.requestData.init();
	});



})(jQuery);