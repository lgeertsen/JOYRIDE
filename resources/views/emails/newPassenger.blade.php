@component('mail::message')

@component('mail::panel')
Hello {{ $ride->creator->firstName }},

We are happy to announce that {{ $passenger->fullName() }} will be joining you on your trip
from {{ $ride->start }} to {{ $ride->destination }} on {{ $ride->date }}
@endcomponent

@endcomponent
