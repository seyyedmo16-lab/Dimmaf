@component('mail::message')
# Fariborz Azari Sharghi 

<p>Hello admin</p>
<p>you have a new message here : </p>
<br>
{{-- Body --}}
name : {{ $contact->name }} <br>
email : {{ $contact->email }} <br>
subject : {{ $contact->subject }} <br>
message : {{ $contact->message }} <br>



@component('mail::button', ['url' => route('admin.contact.show' , $contact->id)])
Visit site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
