Hello Mr/Ms. {{ $data1['username'] }}
<br>
Your account is created successfully. Please verify your email to activate your account.
<br>
<a href="http://hotelmanagementsystem.test/verifyAccount/{{ $data1['email'] }}/{{ $data1['token'] }}">Click here to verify your
    email</a>
<br>