@component('mail::message')
# Fariborz Azari Sharghi 

<p>Hello Dear {{$contact->name}}</p>
<p>Thank you for contacting us</p>
<p>Your message has reached us and this answer is recorded for it</p>
<br>
{{-- Body --}}
{{ $contact->answer }}



@component('mail::button', ['url' => route('guest.blog.index',$contact->state->id)])
Visit site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
