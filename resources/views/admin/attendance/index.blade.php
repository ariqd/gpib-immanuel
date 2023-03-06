<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-baseline">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Pendaftaran
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-4 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200 p-4">
                    <div id="reader" width="600px"></div>

                    <input type="text" id="result"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
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
                document.getElementById('result').value = decodedText

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
                                timer: 3500,
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
                                timer: 3500,
                                timerProgressBar: true
                            }).then(function() {
                                html5QrcodeScanner.resume();
                            })
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Scan Berhasil',
                                text: 'Silahkan ambil Tiket anda',
                                showConfirmButton: false,
                                timer: 3500,
                                timerProgressBar: true
                            }).then(function() {
                                html5QrcodeScanner.resume();
                            })
                        }
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

            html5QrcodeScanner.render(onScanSuccess, onScanFailure);
        </script>
    </x-slot>
</x-app-layout>
