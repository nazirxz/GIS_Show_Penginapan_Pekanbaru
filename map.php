<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Appland Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="icon/home.png" rel="icon">
    <link href="icon/home.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.9.0/css/ol.css" type="text/css">
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.9.0/build/ol.js"></script>
    <style>
        .map {
            height: 800px;
            width: 100%;
        }
    </style>
</head>

<body data-aos-easing="ease-in-out" data-aos-duration="1000" data-aos-delay="0" data-new-gr-c-s-check-loaded="14.1007.0" data-gr-ext-installed="">

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top header-transparent">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <h1><a href="index.html">HotWim</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="index.html">Home</a></li>
                    <li><a class="nav-link scrollto" href="index.html">Kegunaan</a></li>
                    <li><a class="getstarted scrollto" href="map.php">Cari Lokasi</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->
    <!-- ======= App Features Section ======= -->


    <section id="testimonials" class="testimonials section-bg">
        <div class="container aos-init aos-animate" data-aos="fade-up">

            <div class="section-title">
                <h2>Tempat Penginapan</h2>
            </div>
            <select id="rating_penginapan" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option value="all" selected>Pilih Rating</option>
                <option value="3">3,0 - 3,9</option>
                <option value="40-45">4,0 - 4,5</option>
                <option value="46-50">4,6 - 5,0</option>
            </select>
            <select id="kategori" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option value="wisma">Wisma</option>
                <option value="hotel">Hotel</option>
            </select>
            <select id="harga" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option value="duaratus">0 - 200.000</option>
                <option value="empatratus">200.000 - 400.000</option>
                <option value="selebihnya">> 400.000 </option>
            </select>
            <div id="map" class="map"></div>
            <!-- fitur pop up -->
            <div class="ol-popup" id="popup">
                <a href="#" id="popup-closer" class="ol-popup-closer"></a>
                <div id="popup-content"></div>
            </div>
            <!-- end pop up -->
        </div>
    </section><!-- End Testimonials Section -->
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="container py-4">
            <div class="copyright">
                Project <strong><span>GIS</span></strong>. Santuuy
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>


    <script type="text/javascript">
        // code untuk menampilkan variabel
        var DataHotel = new ol.layer.Vector({
            source: new ol.source.Vector({
                format: new ol.format.GeoJSON(),
                url: 'penginapan.geojson' // path JSON
            }),
            style: new ol.style.Style({ // untuk menampilkan icon pada titik-titik variabel
                image: new ol.style.Icon(({
                    anchor: [0.5, 46],
                    anchorXUnits: 'flaticon',
                    anchorYUnits: 'pixels',
                    src: 'icon/home.png' //loc icon yang digunakan
                }))
            })
        });
        const rating = document.getElementById("rating_penginapan");
        const harga = document.getElementById("harga");
        // End variabel yang ditampilkan

        // Membuat variabel Layer Riau

        // End Layer Riau
        var map = new ol.Map({
            target: 'map',
            layers: [
                new ol.layer.Tile({
                    source: new ol.source.OSM()
                }), DataHotel //pemanggilan variabel
            ],
            view: new ol.View({
                center: ol.proj.fromLonLat([101.438309, 0.510440]),
                zoom: 11
            })
        });

        function filterData2() {
            map.removeLayer(DataHotel);
            map.getLayers().forEach(function(layer) {
                if (layer.get('name') != undefined && (layer.get('name') == "newLayer" || layer.get("name") == "spasialLayer")) {
                    map.removeLayer(layer);
                }
            });

            var newLayer = new ol.layer.Vector({
                source: new ol.source.Vector({
                    url: 'penginapan.geojson',
                    format: new ol.format.GeoJSON(),
                }),
                visible: true,
                style: function(feature) {
                    if (kategori.value == "hotel" && feature.get('Jenis Penginapan') == "Hotel") {
                        if (rating.value == "3" && feature.get('Rating') == "3.3" || rating.value == "3" && feature.get("Rating") == "3.4" || rating.value == "3" && feature.get("Rating") == "3.5" || rating.value == "3" && feature.get("Rating") == "3.6" ||
                            rating.value == "3" && feature.get("Rating") == "3.7" || rating.value == "3" && feature.get("Rating") == "3.8" || rating.value == "3" && feature.get("Rating") == "3.9") {
                            if (harga.value == "duaratus" && feature.get("Harga sewa") <= 200000) {
                                return styleFeature;
                            } else if (harga.value == "empatratus" && feature.get("Harga sewa") >= 200000 && feature.get("Harga sewa") <= 400000) {
                                return styleFeature;
                            } else if (harga.value == "selebihnya" && feature.get("Harga sewa") >= 400000) {
                                return styleFeature;
                            }
                        } else if (rating.value == "40-45" && feature.get('Rating') == "4.0" || rating.value == "40-45" && feature.get("Rating") == "4.1" ||
                            rating.value == "40-45" && feature.get("Rating") == "4.2" || rating.value == "40-45" && feature.get("Rating") == "4.4" || rating.value == "40-45" && feature.get("Rating") == "4.5") {
                            if (harga.value == "duaratus" && feature.get("Harga sewa") <= 200000) {
                                return styleFeature;
                            } else if (harga.value == "empatratus" && feature.get("Harga sewa") >= 200000 && feature.get("Harga sewa") <= 400000) {
                                return styleFeature;
                            } else if (harga.value == "selebihnya" && feature.get("Harga sewa") >= 400000) {
                                return styleFeature;
                            }
                        } else if (rating.value == "46-50" && feature.get('Rating') == "4.6" || rating.value == "46-50" && feature.get("Rating") == "4.7" ||
                            rating.value == "46-50" && feature.get("Rating") == "4.8" || rating.value == "46-50" && feature.get("Rating") == "4.9" || rating.value == "46-50" && feature.get("Rating") == "5.0") {
                            if (harga.value == "duaratus" && feature.get("Harga sewa") <= 200000) {
                                return styleFeature;
                            } else if (harga.value == "empatratus" && feature.get("Harga sewa") >= 200000 && feature.get("Harga sewa") <= 400000) {
                                return styleFeature;
                            } else if (harga.value == "selebihnya" && feature.get("Harga sewa") >= 400000) {
                                return styleFeature;
                            }
                        } else if (rating.value == "all") {
                            if (harga.value == "duaratus" && feature.get("Harga sewa") <= 200000) {
                                return styleFeature;
                            } else if (harga.value == "empatratus" && feature.get("Harga sewa") >= 200000 && feature.get("Harga sewa") <= 400000) {
                                return styleFeature;
                            } else if (harga.value == "selebihnya" && feature.get("Harga sewa") >= 400000) {
                                return styleFeature;
                            }
                        }
                    } else if (kategori.value == "wisma" && feature.get('Jenis Penginapan') == "Wisma") {
                        if (rating.value == "3" && feature.get('Rating') == "3.3" || rating.value == "3" && feature.get("Rating") == "3.4" || rating.value == "3" && feature.get("Rating") == "3.5" || rating.value == "3" && feature.get("Rating") == "3.6" ||
                            rating.value == "3" && feature.get("Rating") == "3.7" || rating.value == "3" && feature.get("Rating") == "3.8" || rating.value == "3" && feature.get("Rating") == "3.9") {
                            if (harga.value == "duaratus" && feature.get("Harga sewa") <= 200000) {
                                return styleFeature;
                            } else if (harga.value == "empatratus" && feature.get("Harga sewa") >= 200000 && feature.get("Harga sewa") <= 400000) {
                                return styleFeature;
                            } else if (harga.value == "selebihnya" && feature.get("Harga sewa") >= 400000) {
                                return styleFeature;
                            }
                        } else if (rating.value == "40-45" && feature.get('Rating') == "4.0" || rating.value == "40-45" && feature.get("Rating") == "4.1" ||
                            rating.value == "40-45" && feature.get("Rating") == "4.2" || rating.value == "40-45" && feature.get("Rating") == "4.4" || rating.value == "40-45" && feature.get("Rating") == "4.5") {
                            if (harga.value == "duaratus" && feature.get("Harga sewa") <= 200000) {
                                return styleFeature;
                            } else if (harga.value == "empatratus" && feature.get("Harga sewa") >= 200000 && feature.get("Harga sewa") <= 400000) {
                                return styleFeature;
                            } else if (harga.value == "selebihnya" && feature.get("Harga sewa") >= 400000) {
                                return styleFeature;
                            }
                        } else if (rating.value == "46-50" && feature.get('Rating') == "4.6" || rating.value == "46-50" && feature.get("Rating") == "4.7" ||
                            rating.value == "46-50" && feature.get("Rating") == "4.8" || rating.value == "46-50" && feature.get("Rating") == "4.9" || rating.value == "46-50" && feature.get("Rating") == "5.0") {
                            if (harga.value == "duaratus" && feature.get("Harga sewa") <= 200000) {
                                return styleFeature;
                            } else if (harga.value == "empatratus" && feature.get("Harga sewa") >= 200000 && feature.get("Harga sewa") <= 400000) {
                                return styleFeature;
                            } else if (harga.value == "selebihnya" && feature.get("Harga sewa") >= 400000) {
                                return styleFeature;
                            }
                        } else if (rating.value == "all") {
                            if (harga.value == "duaratus" && feature.get("Harga sewa") <= 200000) {
                                return styleFeature;
                            } else if (harga.value == "empatratus" && feature.get("Harga sewa") >= 200000 && feature.get("Harga sewa") <= 400000) {
                                return styleFeature;
                            } else if (harga.value == "selebihnya" && feature.get("Harga sewa") >= 400000) {
                                return styleFeature;
                            }
                        }
                    }
                }
            });
            map.addLayer(newLayer);
            newLayer.set('name', 'newLayer');
        }
        let styleFeature = new ol.style.Style({
            image: new ol.style.Icon({
                anchor: [0.5, 46],
                anchorXUnits: 'flaticon',
                anchorYUnits: 'pixels',
                src: 'icon/home.png'
            })
        });

        rating.addEventListener("change", function() {
            filterData2();
        });
        kategori.addEventListener("change", function() {
            filterData2();
        })
        harga.addEventListener("change", function() {
            filterData2();
        })
    </script>
    <script type="text/javascript">
        // JS untuk menampilkan Popup
        var container = document.getElementById('popup'),
            content_element = document.getElementById('popup-content'),
            closer = document.getElementById('popup-closer');

        closer.onclick = function() {
            overlay.setPosition(undefined);
            closer.blur();
            return false;
        };
        var overlay = new ol.Overlay({
            element: container,
            autoPan: true,
            offset: [0, -10]
        });
        map.addOverlay(overlay);
        var FullScreen = new ol.control.FullScreen();
        map.addControl(FullScreen);

        map.on('click', function(evt) {
            var feature = map.forEachFeatureAtPixel(evt.pixel,
                function(feature, layer) {
                    return feature;
                });
            if (feature) {
                var geometry = feature.getGeometry();
                var coord = geometry.getCoordinates();
                var content = '<h3>' + feature.get('Nama Penginapan') + '</h3>';
                content += '<h4>Jenis Penginapan : ' + feature.get('Jenis Penginapan') + '</h4>';
                content += '<h4>Harga Sewa : Rp.' + feature.get('Harga sewa') + '</h4>';
                content += '<h4>Rating : ' + feature.get('Rating') + '</h4>';

                content += '<img style="width:400px; height:200px;" src="' + feature.get('Link Photo') + '" class="foto" />';
                content_element.innerHTML = content;
                overlay.setPosition(coord);
                console.info(feature.getProperties());
            }
        });
        // end JS Popup
    </script>

</body>
<grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration>

</html>