fetch("http://localhost/projects/hackathon/uerj/app/api/geoJson.php?neighborhood=centro").then(e => e.json()).then(e => {
  console.log("LONG: ", e.features[0].geometry.coordinates[0])
  console.log("LAT: ", e.features[0].geometry.coordinates[1])
  const lat = e.features[0].geometry.coordinates[1]
  const long = e.features[0].geometry.coordinates[0]
    function a(e) {
        e.coords;
        var a = L.map("map", {
                fullscreenControl: {
                    pseudoFullscreen: !1
                },
                zoom: 16,
                center: new L.latLng(lat,long),
                layers: L.tileLayer("https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}.png")
            }),
            o = {
                pointToLayer: function(e, a) {
                    return L.marker(a, {
                        icon: L.divIcon({
                            className: e.properties.category,
                            iconSize: L.point(22, 22),
                            html: e.properties.category[0].toUpperCase()
                        })
                    }).bindPopup(`<aside class="popup-container"><div class="popup-header"><h2><i class="fas fa-star"></i> ${(-3 * Math.random() + 5).toFixed(2)}</h2><p><i class="fa-solid fa-phone"></i> <a href="tel:${e.properties.phone}">${e.properties.phone}</a></p><img src="assets/img/category/${e.properties.phone}.jpg" alt="${e.properties.name} - ${e.properties.address}"></div><div class="popup-body"><h3><i class="fa-sharp fa-solid fa-location-dot"></i> ${e.properties.name}</h3><p>${e.properties.available}</p><address>${e.properties.address}</address><hr><p><i class="fa-sharp fa-solid fa-universal-access"></i> <b>Acessibilidade</b></p><p>${e.properties.category}</p></div></aside>`)
                }
            },
            s = L.layerGroup([L.geoJson(r, o)]).addTo(a);
        L.control.search({
            layer: s,
            initial: !1,
            zoom: 16,
            propertyName: "name",
            buildTip: function(e, a) {
                var o = a.layer.feature.properties.name,
                    r = a.layer.feature.properties.category,
                    s = a.layer.feature.properties.address;
                return '<a href="#" class="' + r + '"><strong>' + o + " </strong><b>" + r + "</b><br><small>" + s + "</small></a><br>"
            }
        }).addTo(a)
    }

    function o(e) {
        console.warn("ERROR(" + e.code + "): " + e.message)
    }
    let r;
    r = e;
    var s = {
        enableHighAccuracy: !0,
        timeout: 5e3,
        maximumAge: 0
    };
    navigator.geolocation.getCurrentPosition(a, o, s)
});