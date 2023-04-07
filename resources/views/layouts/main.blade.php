<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/feather.css') }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/emoji.css') }}">

    <link rel="stylesheet" href="{{ asset('css/lightbox.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.7.3/dist/alpine.js"></script>
    @laravelPWA


</head>

<body class="color-theme-blue mont-font">
    @include('sweetalert::alert')

    <div class="preloader"></div>

    <div class="main-wrapper">

        @include('layouts.navbar')

        @include('layouts.sidebar')

        @yield('content')

        @include('layouts.menu-mobile')

    </div>

    <script src="{{ asset('js/plugin.js') }}"></script>
    <script src="{{ asset('js/lightbox.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var resultContainer = document.getElementById('qr-reader-results');
        var lastResult, countResults = 0;

        function onScanSuccess(decodedText, decodedResult) {
            if (decodedText !== lastResult) {
                ++countResults;
                lastResult = decodedText;
                console.log(`Scan result ${decodedText}`, decodedResult);
                document.getElementById('scan-result').value = decodedText;
                swal({
                        title: "Presensi",
                        text: "Apakah Anda ingin melakukan presensi?",
                        icon: "info",
                        buttons: ["Tidak", "Ya"],
                    })
                    .then((willPresensi) => {
                        if (willPresensi) {
                            document.getElementById('scan-form').submit();
                        } else {
                            document.getElementById('scan-result').value = "";
                        }
                    });
            }
        }

        function onScanSuccess(decodedText, decodedResult) {
            if (decodedText !== lastResult) {
                ++countResults;
                lastResult = decodedText;
                console.log(`Scan result ${decodedText}`, decodedResult);
                document.getElementById('scan-result').value = decodedText;
                document.getElementById('scan-form').submit();
            }
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", {
                fps: 10,
                qrbox: 250
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
                })
                .then((willDelete) => {
                    if (willDelete) {
                        document.forms[0].submit();
                    } else {
                        return false;
                    }
                });
        }
    </script>
    <script>
        const copyBtn = document.getElementById('copy-button')
        const copyText = document.getElementById('copy-link')

        copyBtn.onclick = () => {
            copyText.select(); // Selects the text inside the input
            document.execCommand('copy'); // Simply copies the selected text to clipboard
            Swal.fire({ //displays a pop up with sweetalert
                icon: 'success',
                title: 'Text copied to clipboard',
                showConfirmButton: false,
                timer: 1000
            });
        }
    </script>
    <script>
        function copyToClipboard(textToCopy) {
            // Membuat elemen textarea baru
            const textarea = document.createElement("textarea");
            textarea.value = textToCopy;
            document.body.appendChild(textarea);

            // Memilih teks di dalam textarea
            textarea.select();

            // Menyalin teks yang sudah dipilih ke clipboard
            document.execCommand("copy");

            // Menghapus elemen textarea yang sudah dibuat
            document.body.removeChild(textarea);

            // Menampilkan Sweet Alert sebagai feedback
            Swal.fire({
                title: "Copied to Clipboard!",
                text: textToCopy,
                icon: "success",
                confirmButtonColor: "#2196f3",
                confirmButtonText: "OK"
            });
        }
    </script>
    {{-- <script>
        function copyText() {
            var copyText = document.getElementById("link-login");
            copyText.select();
            document.execCommand("copy");
        }
    </script> --}}
</body>

</html>
