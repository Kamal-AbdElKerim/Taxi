
{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
@if ($errors->any())
    <script>
        window.onload = function() {
            @foreach ($errors->all() as $error)
                notif({
                    msg: "{{ $error }}",
                    type: "error",
                 
                });
            @endforeach
        }
    </script>
@endif




    @if (session()->has('login_success'))
        <script>
            window.onload = function() {
                notif({
                    msg: "{{ trans('Dashboard/messages.login_success') }} {{ Auth()->user()->name }}",
		            type: "success",
                    position: "right",

                });
            }

        </script>
    @endif

    @if (session()->has('filed'))
        <script>
            window.onload = function() {
                notif({
                    msg: "<b>Success:</b> Well done Details Submitted Successfully",
		            type: "success"
                });
            }

        </script>
    @endif

    @if (session()->has('add'))
        <script>
            window.onload = function() {
                notif({
                    msg: "<b>Success:</b> Well done Details Submitted Successfully",
		            type: "success"
                });
            }

        </script>
    @endif

    @if (session()->has('edit'))
        <script>
            window.onload = function() {
                notif({
                    msg: "{{ trans('Dashboard/messages.edit') }}",
                    type: "success"
                });
            }

        </script>
    @endif

    @if (session()->has('delete'))
        <script>
            window.onload = function() {
                notif({
                    msg: "{{ trans('Dashboard/messages.delete') }}",
                    type: "success"
                });
            }

        </script>
    @endif
