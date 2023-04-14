@if(!session()->has(config('accept-cookies.sessionName')))
  <div class="cookies-info-b4 pt-4 {{config('accept-cookies.backgroundColor')}}"
       style="position: fixed; width: 100%;left: 0;bottom:0;z-index: 9999">
    <div class="cookies-info-b4-content text-center pt-3 pb-2" style="color: white !important;">
      {!! config('accept-cookies.text') !!}
      <a href="{{config('accept-cookies.linkMoreInfoUrl')}}"
         target="{{config('accept-cookies.linkMoreInfoTarget')}}"
         class="font-weight-bold {{config('accept-cookies.linkMoreInfoCollor')}}"
         style="text-decoration: underline">
        {!! config('accept-cookies.linkMoreInfoText') !!}
      </a>. <br>
      <button
        class="cookies-info-btn1 btn btn-link font-weight-bolder my-3 mx-2 {{config('accept-cookies.btnAcceptColor')}}"
        style="text-decoration: underline">
        {!! config('accept-cookies.btnAcceptText') !!}
      </button>
      <button
        class="cookies-info-btn2 btn btn-link font-weight-bolder my-3 mx-2 {{config('accept-cookies.btnRefuseColor')}}"
        style="text-decoration: underline">
        {!! config('accept-cookies.btnRefuseText') !!}
      </button>
    </div>
  </div>

  @push('js')
    <script>
      $(document).ready(function () {
        const url = '/{{config('accept-cookies.route.prefix')}}{{config('accept-cookies.route.route.url')}}';

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $('.cookies-info-btn1').click(function () {
          $.post(url, {accept: '1'})
            .then(resp => {
              if (resp.success) {
                $('.cookies-info-b4').addClass('d-none');
              }
            })
            .catch(error => console.log(error));
        });

        $('.cookies-info-btn2').click(function () {
          $.post(url, {accept: '0'})
            .then(resp => {
              if (resp.success) {
                $('.cookies-info-b4').addClass('d-none');
              }
            })
            .catch(error => console.log(error));
        });
      });
    </script>
  @endpush

@endif
