<table width="660" valign="top" align="center" cellspacing="0" cellpadding="0" style="color:#5a656a;">
	<tbody>
		<tr bgcolor="#ffffff" id="header" valign="top">
			<td id="logo" align="left" valign="bottom">
				 <p>Application Submitted From Worldwide Travel & Tourism Website</p> 
				 <h4><b>{{ $data['fname'] }}</b></h4>
			</td>
		</tr>
	</tbody>
</table>
<table id="postcard" width="660" valign="top" align="center" cellspacing="0" cellpadding="0" style="color:#5a656a;">
	<tbody>	
		<tr width="660">
			<td><b>Package:</b> {{ $data['packagename'] }}</td>
		</tr>
		<tr width="660">
			<td><b>Country:</b> {{ $data['country'] }}</td>
		</tr>
		<tr width="660">
			<td><b>Price:</b> USD {{ $data['price'] }}</td>
		</tr>
		<tr width="660">
			<td><b>Email Address:</b> {{ $data['email'] }}</td>
		</tr>
		<tr>
			<td><b>Phone:</b> {{ $data['phone'] }}</td>
		</tr>
		<tr>
			<td><b>Check In:</b> {{ $data['checkin'] }}</td>
		</tr>
		<tr>
			<td><b>Check Out:</b> {{ $data['checkout'] }}</td>
		</tr>
		<tr>
			<td><b>Nb. of Adult:</b> {{ $data['adultNb'] }}</td>
		</tr>
		<tr>
			<td><b>Nb. of Children:</b> {{ $data['childrenNb'] }}</td>
		</tr>
	</tbody>
</table>