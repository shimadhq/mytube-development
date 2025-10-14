document.addEventListener("DOMContentLoaded", function() {
    const mapDiv = document.getElementById("custom-map");
    if (!mapDiv) return;

    const lat = parseFloat(mapDiv.dataset.lat);
    const lng = parseFloat(mapDiv.dataset.lng);
    const zoom = parseInt(mapDiv.dataset.zoom);

    // سبک خاکستری برای Google Maps
    const grayStyle = [
        { elementType: "geometry", stylers: [{ color: "#e5e5e5" }] },
        { elementType: "labels.icon", stylers: [{ visibility: "off" }] },
        { elementType: "labels.text.fill", stylers: [{ color: "#333333" }] },
        { elementType: "labels.text.stroke", stylers: [{ color: "#f5f5f5" }] },
        {
            featureType: "water",
            elementType: "geometry",
            stylers: [{ color: "#cccccc" }]
        }
    ];

    const map = new google.maps.Map(mapDiv, {
        center: { lat, lng },
        zoom,
        styles: grayStyle,
        disableDefaultUI: true
    });

    new google.maps.Marker({
        position: { lat, lng },
        map,
        icon: {
            url: "https://maps.google.com/mapfiles/ms/icons/red-dot.png",
            scaledSize: new google.maps.Size(40, 40)
        }
    });
});