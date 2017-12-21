@component('mail::message')

@component('mail::panel')
Hello {{ $user->firstName }},

We are sorry to let you know that {{ $ride->creator->fullName() }} has canceled his trip
on {{ $ride->date }} from {{ $ride->start }} to {{ $ride->destination }}

We are sorry for the inconvienience.
@endcomponent

@endcomponent
