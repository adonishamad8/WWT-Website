<table width="660" valign="top" align="center" cellspacing="0" cellpadding="0" style="color:#5a656a;">
	<tbody>
		<tr bgcolor="#ffffff" id="header" valign="top">
			<td id="logo" align="left" valign="bottom">
				 <p>Request From Worldwide Travel & Tourism Website - Contact Us</p> 
				 <h4><b>{{ $data['fname'] }} {{ $data['lname'] }}</b></h4>
			</td>
		</tr>
	</tbody>
</table>
<table id="postcard" width="660" valign="top" align="center" cellspacing="0" cellpadding="0" style="color:#5a656a;">
	<tbody>					        
		<tr width="660">
			<td><b>Email Address:</b> {{ $data['email'] }}</td>
		</tr>	
		<tr>
			<td><b>Phone:</b> {{ $data['phone'] }}</td>
		</tr>	
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr bgcolor="#ffffff" width="660">
			<td ><b>Message Details:</b>
				<br/>
				{!! $data['message'] !!}
			</td>
			<td>&nbsp;</td>
		</tr>
	</tbody>
</table>