Xin chào {{$email_data['name']}}
<br><br>
Chào mừng đến với website của chúng ta
<br>
Hãy click vào link đính kèm dưới đây để xác định email của bạn!
<br><br>
<a href="{{route('login')}}/verify?code={{$email_data['verification_code']}}">Click here!</a>
<br><br>
Cảm ơn nhiều!