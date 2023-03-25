@component('mail.html.message')
# CONGRATULATIONS! 🎉🎊🎈

Dear {{ $name }}

We are pleased to inform you that you have been accepted to Waroma School for the January intake.Your Username is {{ $email }} and your Password is {{ $password }}
Kindly click the button below to log into the official School Management System. 

@component('mail.html.button', ['url' => ''])
Waroma AMS
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
