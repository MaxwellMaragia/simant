@component('mail::message')
    <b>Email:</b> {{ $data['email'] }}<br>
    <b>Subject:</b> New post update!<br>
    <b>Title:</b> {{ $data['title'] }}<br>
    <b>Message:</b> A new post has been published. Check it out by clicking below<br>

    @component('mail::button', ['url' => route('post',$data['slug'])])
        Read post
    @endcomponent

    @component('mail::button', ['url' => url('/').'/unsubscribe/'.$data['hash']])
        Unsubscribe
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
