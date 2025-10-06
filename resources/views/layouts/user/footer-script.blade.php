<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/vendor/purecounter/purecounter.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>
{{-- <script src="{{ asset('assets/vendor/apexchart/apexcharts.min.js') }}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
@yield('scripts')

<script>
    $("#YT").fadeIn(500);
    $("#YT").fadeOut(500);
    
    if ($("#contact_us").length > 0) {
        $("#contact_us").validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 50
                },
                email: {
                    required: true,
                    maxlength: 50,
                    email: true,
                },
            },

            messages: {
                name: {
                    required: "Please enter name",
                    maxlength: "Your last name maxlength should be 50 characters long."
                },
                email: {
                    required: "Please enter valid email",
                    email: "Please enter valid email",
                    maxlength: "The email name should less than or equal to 50 characters",
                },
            },

            submitHandler: function(form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#send_form').html('Sending..');
                $.ajax({
                    url: 'http://localhost/blog/save-form',
                    type: "POST",
                    data: $('#contact_us').serialize(),
                    success: function(response) {
                        $('#send_form').html('Submit');
                        $('#res_message').show();
                        $('#res_message').html(response.msg);
                        $('#msg_div').removeClass('d-none');
                        document.getElementById("contact_us").reset();
                        setTimeout(function() {
                            $('#res_message').hide();
                            $('#msg_div').hide();
                        }, 10000);
                    }
                });
            }
        })
    }
</script>
