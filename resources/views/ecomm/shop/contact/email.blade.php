<p>
	You have received a new message from your website contact form.
</p>
<p>
	Here are the details:
</p>
<ul>
	
	<li>Email: <strong>{{ $email }}</strong></li>
	
<hr>
<p>
	@foreach ($messageLines as $messageLine)
	{{ $messageLine }}<br>
	@endforeach
</p>
<hr>