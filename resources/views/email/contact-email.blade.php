<h1 style="text-align: center">Hello Admin!</h1>
<p>You received a message from:</p>
<ul>
    <li>{{$lead->surname }}, {{$lead->name}}</li>
    <li><strong>Phone number</strong>: {{ $lead->phone }}</li>
    <li><strong>@</strong>: {{ $lead->email_address }}</li>
</ul>
<p><strong style="color:brown">The message</strong>:</p>
<p>{{$lead->content}}</p>