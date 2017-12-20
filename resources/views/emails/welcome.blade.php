{{-- <!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Welcome to JOYRIDE</h2>

<div>
  Hello {{ $user->firstName }}
</div>

</body>
</html> --}}

@component('mail::message')

@component('mail::panel')
## Welcome to JOYRIDE
Hello {{ $name }}
@endcomponent

@endcomponent
