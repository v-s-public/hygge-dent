<script>
    let mymap = L.map('map', { scrollWheelZoom:false }).setView([47.83040962398523, 35.13672363738203], 17);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(mymap);

    let marker = L.marker([47.83040962398523, 35.13672363738203]).addTo(mymap);
</script>
