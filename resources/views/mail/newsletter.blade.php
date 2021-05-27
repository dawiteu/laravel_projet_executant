@component('mail::message')
# Bienvenu à notre newsletter

Bonjour, nous sommes ravis de t'avoir parmis les notres. 

Tu recois ce e-mail de confirmations car tu t'es inscrit a notre newsletter. 

Ce n'est pas toi/ il s'agit d'une erreur? 
Nous somme désolé. Tu peux rester si tu le veux, mais tu peux aussi 

@component('mail::button', ['url' => 'http://127.0.0.1:8000/unsub/{{$mail->email}}'])
Te dé(?)abonner. 
@endcomponent



@endcomponent
