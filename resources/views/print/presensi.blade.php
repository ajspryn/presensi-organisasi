<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Dahboard</title>

    <link rel="stylesheet" href="{{ url('/') }}/css/themify-icons.css" />
    <link rel="stylesheet" href="{{ url('/') }}/css/feather.css" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png" />
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{ url('/') }}/css/style.css" />
    <link rel="stylesheet" href="{{ url('/') }}/css/emoji.css" />

    <link rel="stylesheet" href="{{ url('/') }}/css/lightbox.css" />

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.7.3/dist/alpine.js"></script>
</head>

<body class="color-theme-blue mont-font">
    <div class="row">
        <div class="col-lg-12">
            <div class="card p-md-5 p-4 bg-primary-gradiant rounded-3 shadow-xss bg-pattern border-0 overflow-hidden">
                <div class="bg-pattern-div"></div>
                <h2 class="display2-size display2-md-size fw-700 text-white mb-0 mt-0">
                    Presensi {{ $agenda->nama }}
                    <span class="fw-700 ls-3 text-grey-200 font-xsssss mt-2 d-block">Scan QR Code Yang Telah Di Sediakan</span>
                </h2>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3 mt-3">
                <div class="card-body p-0 mb-3 rounded-3 overflow-hidden">
                    <div class="visible-print text-center">
                        {!! QrCode::eye('circle')->style('dot')->size(400)->mergeString(asset('logo.png'))->generate($agenda->uuid) !!}
                    </div>
                    {{-- <img src="data:image/png;base64, {!! base64_encode(
                        QrCode::format('png')->size(100)->generate('Make me into an QrCode!'),
                    ) !!} "> --}}
                </div>
                <div class="card-body p-0 me-lg-5">
                    <p class="fw-500 lh-26 font-xssss w-100 mb-1">
                        - Klik Start Scanning / Inpukan Gambar QR Code
                    </p>
                    <p class="fw-500 lh-26 font-xssss w-100 mb-1">
                        - Setujui Browser Untuk Menggunakan Camera Perangkat
                        Anda
                    </p>
                    <p class="fw-500 lh-26 font-xssss w-100 mb-1">
                        - Arahkan Camera Ke QR Code Yang Telah Di Sediakan
                    </p>
                    <p class="fw-500 lh-26 font-xssss w-100 mb-1">
                        - Tunggu Sampai Ada Pemberitahuan Berhasil Presensi
                    </p>
                    <p class="fw-500 lh-26 font-xssss w-100 mb-1">
                        - Lalu Anda Akan Diarahkan Kehalaman Kegiatan Untuk
                        Mengakses Materi dll
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('/') }}/js/plugin.js"></script>
    <script src="{{ url('/') }}/js/lightbox.js"></script>
    <script src="{{ url('/') }}/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

    <script>
        var resultContainer = document.getElementById("qr-reader-results");
        var lastResult,
            countResults = 0;

        function onScanSuccess(decodedText, decodedResult) {
            if (decodedText !== lastResult) {
                ++countResults;
                lastResult = decodedText;
                console.log(`Scan result ${decodedText}`, decodedResult);
                document.getElementById("scan-result").value = decodedText;
                document.getElementById("scan-form").submit();
            }
        }

        var html5QrcodeScanner = new Html5QrcodeScanner("qr-reader", {
            fps: 10,
            qrbox: 250,
        });
        html5QrcodeScanner.render(onScanSuccess);
    </script>
    <script>
        function deleteConfirmation() {
            swal({
                title: "Apakah Anda yakin ingin menghapus data ini?",
                icon: "warning",
                buttons: ["Tidak", "Ya"],
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    document.forms[0].submit();
                } else {
                    return false;
                }
            });
        }
    </script>
</body>

</html>
