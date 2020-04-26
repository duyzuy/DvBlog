@if (session('success'))
    <div class="message is-success m-r-25 m-l-25">
        <p class="message-body">
            {{ session('success') }}
        </p>
      </div>
@endif


@if (session('error'))
<div class="message is-danger m-r-25 m-l-25">
    <p class="message-body">
        {{ session('error') }}
    </p>
  </div>
@endif

@if(session('warning'))
<div class="message is-warning m-r-25 m-l-25">
    <p class="message-body">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. <strong>Pellentesque risus mi</strong>, tempus quis placerat ut, porta nec nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam, et dictum <a>felis venenatis</a> efficitur. Aenean ac <em>eleifend lacus</em>, in mollis lectus. Donec sodales, arcu et sollicitudin porttitor, tortor urna tempor ligula, id porttitor mi magna a neque. Donec dui urna, vehicula et sem eget, facilisis sodales sem.
    </p>
</div>
@endif