class GoogleMapInit {
    constructor() {
        // Only define the callback if an ACF map is present
        const mapEl = document.querySelector('.acf-map');
        if (!mapEl) return;

        // Expose init callback for Google Maps API
        window.initGoogleMaps = () => {
            this.initMaps();
        };
    }

    initMaps() {
        const maps = document.querySelectorAll('.acf-map');
        maps.forEach(mapEl => {
            this.renderMap(mapEl);
        });
    }

    renderMap(el) {
        const markers = el.querySelectorAll('.marker');

        const args = {
            zoom: 16,
            center: new google.maps.LatLng(0, 0),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            draggable: true,
            scrollwheel: false,
        };

        const map = new google.maps.Map(el, args);
        map.markers = [];

        markers.forEach(markerEl => {
            this.addMarker(markerEl, map);
        });

        this.centerMap(map);
    }

    addMarker(markerEl, map) {
        const lat = markerEl.getAttribute('data-lat');
        const lng = markerEl.getAttribute('data-lng');
        const latlng = new google.maps.LatLng(lat, lng);

        const marker = new google.maps.Marker({
            position: latlng,
            map: map,
        });

        map.markers.push(marker);

        if (markerEl.innerHTML.trim() !== '') {
            const infowindow = new google.maps.InfoWindow({
                content: markerEl.innerHTML
            });

            marker.addListener('click', function () {
                infowindow.open(map, marker);
            });
        }
    }

    centerMap(map) {
        const bounds = new google.maps.LatLngBounds();

        map.markers.forEach(marker => {
            bounds.extend(marker.position);
        });

        if (map.markers.length === 1) {
            map.setCenter(bounds.getCenter());
            map.setZoom(12);
        } else {
            map.fitBounds(bounds);
        }
    }
}

export default GoogleMapInit;
