@if (session('success'))
    <div class="message is-success m-r-25 m-l-25">
        <p class="message-body">
            {!! session('success') !!}
        </p>
      </div>
@endif


@if (session('error'))
<div class="message is-danger m-r-25 m-l-25">
    <p class="message-body">
        {!! session('error') !!}
    </p>
  </div>
@endif

@if(session('warning'))
<div class="message is-warning m-r-25 m-l-25">
    <p class="message-body">
        {!! session('warning') !!}
    </p>
</div>
@endif