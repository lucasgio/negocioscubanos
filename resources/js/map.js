// TODO: Terminar el geocoding reverse para busqueda por pin y por input


document.addEventListener('DOMContentLoaded', () => {


    if(document.querySelector('#mapa')) {
        // Recoje los datos de inputo escondidos o setea por default valores (Punto Cero Capitolio)
        const lat = document.querySelector('#lat').value === '' ? 23.137101780277284 : document.querySelector('#lat').value;
        const lng = document.querySelector('#lng').value === '' ? -82.35785485661802 : document.querySelector('#lng').value;

        const mapa = L.map('mapa').setView([lat, lng], 16);

        // Eliminar pines previos
        let markers = new L.FeatureGroup().addTo(mapa);

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
            maxZoom: 18,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1IjoiaW9zdmFueSIsImEiOiJja3BzY3Q5cmwwY3NhMnVvNjFmeHM1cWF3In0.De9etlDFvb0eHq-szJzsqQ'
        }).addTo(mapa);

        let marker;

        // agregar el pin
        marker = new L.marker([lat, lng], {
            draggable: true,
            autoPan: true
        }).addTo(mapa);

        // Agregar el pin a las capas
        markers.addLayer(marker);


        function geoCodeReverseCoor ({lat,lng}) { 
            const settings = {
                "async": true,
                "crossDomain": true,
                "url": `https://us1.locationiq.com/v1/reverse.php?key=pk.d3df210c5dc4b5d79e14c5cb35bc5147&lat=${lat}&lon=${lng}&format=json`,
                "method": "GET"
            }
            
            return settings;
            
        }
        
        reubicarPin(marker);
        function reubicarPin(marker) {
            // Detectar movimiento del marker
            marker.on('moveend', function(e) {
                marker = e.target;

                const posicion = marker.getLatLng();
                // Centrar automaticamente
                mapa.panTo( new L.LatLng( posicion.lat, posicion.lng ) );
                const resp = geoCodeReverseCoor(posicion);
                $.ajax(resp).done(function (response) {
                    marker.bindPopup(response.display_name);
                    marker.openPopup();
                    llenarInputs(response);
                });
                
            });
        }


        function llenarInputs(resultado) {
            document.querySelector('#calle').value = resultado.address.road || '';
            document.querySelector('#provincia').value = resultado.address.city || '';
            document.querySelector('#municipio').value = resultado.address.town || resultado.address.county ||'';
            document.querySelector('#lat').value = resultado.lat || '';
            document.querySelector('#lng').value = resultado.lon || '';
        }

    }

});