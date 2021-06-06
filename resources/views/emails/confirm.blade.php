@component('mail::message')
    <b>Email:</b> {{ $data['email'] }}<br>
    <b>Subject:</b>Confirm your Newsletter Subscription Now!<br>
    <b>Message:</b>Please confirm your newsletter subscription by clicking below<br>

    @component('mail::button', ['url' => url('/').'/confirm/'.$data['hash']])
       Confirm
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
