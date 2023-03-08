<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-baseline">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Pendaftaran
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-4 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200 p-4">
                    <div class="flex justify-between items-baseline">
                        <h1 class="text-xl font-semibold mb-3">Silahkan scan QR Code tiket anda</h1>
                        <button id="elToggle" class="underline">Show Controls</button>
                    </div>
                    <div id="reader" width="600px"></div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="js">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            let csrf_token = $('meta[name="csrf-token"]').attr('content');

            function onScanSuccess(decodedText, decodedResult) {
                html5QrcodeScanner.pause();

                $.ajax({
                    url: "{{ route('admin.attendance.validate') }}",
                    type: 'POST',
                    dataType: "json",
                    data: {
                        '_method': 'POST',
                        '_token': csrf_token,
                        'qr_code': decodedText
                    },
                    success: function(response) {
                        if (response.status_error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Scan Gagal',
                                text: 'QR Code tidak terdaftar',
                                showConfirmButton: false,
                                timer: 4000,
                                timerProgressBar: true
                            }).then(function() {
                                html5QrcodeScanner.resume();
                            })
                        } else if (response.status_already_exists) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Scan Gagal',
                                text: 'Tiket telah di-scan sebelumnya',
                                showConfirmButton: false,
                                timer: 4000,
                                timerProgressBar: true
                            }).then(function() {
                                html5QrcodeScanner.resume();
                            })
                        } else if (response.status_past) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Scan Gagal',
                                text: 'Waktu pendaftaran melebihi jadwal Ibadah',
                                showConfirmButton: false,
                                timer: 4000,
                                timerProgressBar: true
                            }).then(function() {
                                html5QrcodeScanner.resume();
                            })
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Selamat datang, ' + response.name,
                                text: 'Silahkan ambil Tiket anda',
                                showConfirmButton: false,
                                timer: 4000,
                                timerProgressBar: true
                            }).then(function() {
                                html5QrcodeScanner.resume();
                            })
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr);
                        Swal.fire({
                            icon: 'error',
                            title: 'Scan Gagal',
                            text: 'QR Code tidak terdaftar',
                            showConfirmButton: false,
                            timer: 4000,
                            timerProgressBar: true
                        }).then(function() {
                            html5QrcodeScanner.resume();
                        })
                    }
                })
            }

            function onScanFailure(error) {
                // handle scan failure, usually better to ignore and keep scanning.
                // for example:
                console.warn(`Code scan error = ${error}`);
            }

            let html5QrcodeScanner = new Html5QrcodeScanner(
                "reader", {
                    fps: 10,
                    qrbox: {
                        width: 250,
                        height: 250
                    }
                },
                /* verbose= */
                false);

            html5QrcodeScanner.render(onScanSuccess, onScanFailure)
            const box = document.getElementById('reader__dashboard');
            box.style.display = 'none';

            elToggle.addEventListener("click", function() {
                if (box.style.display === 'block' || box.style.display === '')
                    box.style.display = 'none';
                else
                    box.style.display = 'block'
            });
        </script>
    </x-slot>
</x-app-layout>
