<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Berkas <?= $siswa->noreg ?></title>
</head>

<body>

	<table width="100%">
		<tr style="text-align: center;">
			<td style="font-size:18px; font-weight: 700;"><?= get_settings('school_name') ?></td>
		</tr>
		<tr style="text-align: center;">
			<td style="font-size: 14px;"><?= get_settings('school_addres') ?></td>
		</tr>
		<tr style="text-align: center;">
			<td style="font-size: 12px;">Email : <?= get_settings('system_email') ?> | Phone : <?= get_settings('phone') ?></td>
		</tr>
	</table>

</body>

</html>
