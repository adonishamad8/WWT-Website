<table width="660" valign="top" align="center" cellspacing="0" cellpadding="0" style="color:#5a656a;">
	<tbody>
		<tr bgcolor="#ffffff" id="header" valign="top">
			<td id="logo" align="left" valign="bottom">
				 <p>Application Submitted From Worldwide Travel & Tourism Website</p> 
				 <h4><b><?php echo e($data['fname']); ?></b></h4>
			</td>
		</tr>
	</tbody>
</table>
<table id="postcard" width="660" valign="top" align="center" cellspacing="0" cellpadding="0" style="color:#5a656a;">
	<tbody>	
		<tr width="660">
			<td><b>Package:</b> <?php echo e($data['packagename']); ?></td>
		</tr>
		<tr width="660">
			<td><b>Country:</b> <?php echo e($data['country']); ?></td>
		</tr>
		<tr width="660">
			<td><b>Price:</b> USD <?php echo e($data['price']); ?></td>
		</tr>
		<tr width="660">
			<td><b>Email Address:</b> <?php echo e($data['email']); ?></td>
		</tr>
		<tr>
			<td><b>Phone:</b> <?php echo e($data['phone']); ?></td>
		</tr>
		<tr>
			<td><b>Check In:</b> <?php echo e($data['checkin']); ?></td>
		</tr>
		<tr>
			<td><b>Check Out:</b> <?php echo e($data['checkout']); ?></td>
		</tr>
		<tr>
			<td><b>Nb. of Adult:</b> <?php echo e($data['adultNb']); ?></td>
		</tr>
		<tr>
			<td><b>Nb. of Children:</b> <?php echo e($data['childrenNb']); ?></td>
		</tr>
	</tbody>
</table><?php /**PATH /home/u133514729/domains/worldwidetravel-lb.com/public_html/core/resources/views/emails/package-message.blade.php ENDPATH**/ ?>