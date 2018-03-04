// Animated marker via https://bl.ocks.org/4284949
L.Marker.prototype.animateDragging = function () {
  
  var iconMargin, shadowMargin;
  
  this.on('dragstart', function () {
    if (!iconMargin) {
      iconMargin = parseInt(L.DomUtil.getStyle(this._icon, 'marginTop'));
      shadowMargin = parseInt(L.DomUtil.getStyle(this._shadow, 'marginLeft'));
    }
  
    this._icon.style.marginTop = (iconMargin - 15)  + 'px';
    this._shadow.style.marginLeft = (shadowMargin + 8) + 'px';
  });
  
  return this.on('dragend', function () {
    this._icon.style.marginTop = iconMargin + 'px';
    this._shadow.style.marginLeft = shadowMargin + 'px';
  });
};

var Map = function(elem, lat, lng) {
    this.$el = $(elem);
    this.$overlay = this.$el.find('.map-overlay');
    this.$map = this.$el.find('.map-container');
    this.init(lat, lng);
};

Map.prototype.init = function(lat, lng) {
    
    this.lat = lat;
    this.lng = lng;
    
    this.map = L.map(this.$map[0]).setView([lat, lng], 13);
    
    var osmUrl='http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
    var mapTiles = new L.TileLayer(osmUrl, {
        attribution: 'Map data &copy; '
        + '<a href="http://openstreetmap.org">OpenStreetMap</a> contributors, '
        + '<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
        maxZoom: 18
    });
    
    this.map.addLayer(mapTiles);
};

Map.prototype.setCircle = function(latLng, meters) {
    if(!this.circle) {
        this.circle = L.circle(latLng, meters, {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.3
        }).addTo(this.map);
    }
    else {
        this.circle.setLatLng(latLng);
        this.circle.setRadius(meters);
        this.circle.redraw();
    }
    this.map.fitBounds(this.circle.getBounds());
};

Map.prototype.setLatLng = function(latLng) {
    this.lat = latLng.lat;
    this.lng = latLng.lng;
    
    if(this.circle) {
        this.circle.setLatLng(latLng);
    }           
};

Map.prototype.centerOnLocation = function(lat, lng) {
    
    var self = this;
    
    this.lat = lat;
    this.lng = lng;
    
    if(!this.marker) {
        this.marker = L.marker([this.lat, this.lng], {
            draggable: true
        });
    
        this.marker.on('drag', function(event) {
            self.setLatLng(event.target.getLatLng());            
        });
        
        this.marker
            .animateDragging()
            .addTo(this.map);
    }
    
    this.map.setView([this.lat, this.lng], 16);
    this.setCircle([this.lat, this.lng], this.milesToMeters(5));
};

Map.prototype.getCurrentLocation = function(success, error) {
    
    var self = this;
    
    var onSuccess = function(lat, lng) {
        success(new L.LatLng(lat, lng));
    };
    
    // get location via geoplugin.net. 
    // Typically faster than browser's geolocation, but less accurate.
    var geoplugin = function() {
        jQuery.getScript('http://www.geoplugin.net/javascript.gp', function() {
            onSuccess(geoplugin_latitude(), geoplugin_longitude());
        });
    };
    
    // get location via browser's geolocation. 
    // Typically slower than geoplugin.net, but more accurate.
    var navGeoLoc = function() {
        navigator.geolocation.getCurrentPosition(function(position) {
            success(new L.LatLng(position.coords.latitude, position.coords.longitude));
        }, function(positionError) {
            geoplugin();
            //error(positionError.message);
        });
    };
    
    if(navigator.geolocation) {
        navGeoLoc();
    }
    else {
        geoplugin();
    }
};

// Overlay message methods

Map.prototype.dismissMessage = function() {
    this.$el.removeClass('show-message');
    this.$overlay.html('');       
};

Map.prototype.showMessage = function(html) {
    this.$overlay.html('<div class="center"><div>' + html + '</div></div>');
    this.$el.addClass('show-message');
};

// Conversion Helpers

Map.prototype.milesToMeters = function(miles) {
    return miles * 1069;
};

jQuery(function($) {
  
    // clear than temporary background image
    $('.map-container').css('background', 'transparent');

    var map = new Map('#map', 51.505, -0.09);  
    
    map.showMessage('<p><span>Acquiring Current Location.</span><br /><br />'
                    + '<span>Please ensure the app has permission to access your location.</span></p>');
    
    map.getCurrentLocation(function(latLng) {
        map.centerOnLocation(latLng.lat, latLng.lng);
        map.dismissMessage();
    }, function(errorMessage) {
        map.showMessage('<p><span>Location Error:</span><br /><br />'
                    + '<span>' + errorMessage + '</span></p>');
    });  

    var s = $('select').on('change', function(e) {
        var value = $(this).val();
        var meters = map.milesToMeters(5);
        map.setCircle([14.590643895849555,120.97745418548584], meters);
    });    
        
});
