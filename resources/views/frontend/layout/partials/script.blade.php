 <!-- Start Script -->
    <script src="{{asset('frontend/assets/js/jquery-1.11.0.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery-migrate-1.2.1.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/templatemo.js')}}"></script>
    <script src="{{asset('frontend/assets/js/custom.js')}}"></script>
    <!-- End Script -->
{{-- toastr --}}
<script src="{{ asset('assets/js/toastr.min.js') }}"></script>

<script src="{{ asset('assets/js/jquery-confirm.min.js') }}"></script>


<script>
    // success messages
    @if (session()->has('success'))
        toastr.success('{{ session()->get('success') }}')
    @endif
    // error messages
    @if (session()->has('error'))
        toastr.error('{{ session()->get('error') }}')
    @endif

    //  error validation messages
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error('{{ $error }}')
        @endforeach
    @endif
</script>


<script>
    $('button.delete-btn').on('click', function() {
        let currentBtn = $(this)
        $.confirm({
            title: 'Delete!',
            content: "You can't restore the deleted item!",
            type: 'green',
            theme: 'dark',
            escapeKey: true,
            buttons: {
                confirm: {
                    btnClass: 'btn-red',
                    keys: ['enter', 'shift'],
                    action: function() {
                        currentBtn.parent('form').submit()
                    }
                },
                cancel: { btnClass: 'btn-green',},
            }
        });
    })
</script>



