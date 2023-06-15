@extends("tax_return.generate_p9")

@section("content")

    <!-- Calendly link widget begin -->
    <link href="https://calendly.com/assets/external/widget.css" rel="stylesheet">
    <script src="https://calendly.com/assets/external/widget.js" type="text/javascript"></script>
    <!-- Calendly link widget end -->

    <P>
        Please book a virtual meeting for consultations.
    </P>

    <button class="btn btn-info" onclick="Calendly.showPopupWidget('https://calendly.com/africa-in-3-2-1');return false;" >Book a virtual meeting</button>
    <a class="btn btn-primary" href="{{route("landing")}}">Back home.</a>
@stop
