@component('mail::message')

@component('mail::panel')
Hello {{ $ride->creator->firstName }},

We are sorry to let you know that {{ $passenger->fullName() }} has canceled his trip and won't be joining you
on {{ $ride->date }} from {{ $ride->start }} to {{ $ride->destination }}
@endcomponent

@endcomponent
