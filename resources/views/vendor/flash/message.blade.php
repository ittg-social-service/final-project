@if (session()->has('flash_notification.message'))
    @if (session()->has('flash_notification.overlay'))
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => session('flash_notification.title'),
            'body'       => session('flash_notification.message')
        ])
    @else
        @if (session('flash_notification.level') == 'success')
          <script type="text/javascript">
          Materialize.toast('Hecho', 2000,'green');

          </script>
        @endif

    @endif
@endif
