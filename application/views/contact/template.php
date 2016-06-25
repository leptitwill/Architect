<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Newsletter Conceptcub</title>
	<style type="text/css">
		body{
			margin:0;
			padding:0;
			font-family: arial;
		}

		img{
			border:0 none;
			height:auto;
			line-height:100%;
			outline:none;
			text-decoration:none;
		}

		a img{
			border:0 none;
		}

		table, td{
			border-collapse:collapse;
			margin:0;
			padding:0;
		}
	</style>
</head>
<body bgcolor="#eeeeee">
	<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
			<tr>
				<td align="center" valign="top">
					<table border="0" cellpadding="0" cellspacing="0" width="600" bgcolor="#ffffff">
						<tr bgcolor="#1d8c8e" height="20">
							<td colspan="3" valign="top" style="font-size: 1px; line-height: 1px;">
								&nbsp;
							</td>
						</tr>

						<tr bgcolor="#1d8c8e">
							<td align="center" valign="top" style="font-size: 1px; line-height: 1px;" width="20">
								&nbsp;
							</td>

							<td align="left" valign="top" style="font-size: 18px; color:white;" width="580">
								ConceptCub
							</td>

							<td align="center" valign="top" style="font-size: 1px; line-height: 1px;" width="20">
								&nbsp;
							</td>
						</tr>

						<tr bgcolor="#1d8c8e" height="20">
							<td colspan="3" valign="top" style="font-size: 1px; line-height: 1px;">
								&nbsp;
							</td>
						</tr>

						<tr bgcolor="#ffffff" height="20">
							<td colspan="3" valign="top" style="font-size: 1px; line-height: 1px;">
								&nbsp;
							</td>
						</tr>

						<tr>
							<td align="center" valign="top" style="font-size: 1px; line-height: 1px;" width="20">
								&nbsp;
							</td>

							<td align="left" valign="top" style="font-size:14px; color:#000000">
								<b>De</b> : <?= $nom ?>
							</td>

							<td align="center" valign="top" style="font-size: 1px; line-height: 1px;" width="20">
								&nbsp;
							</td>
						</tr>

						<tr bgcolor="#ffffff" height="20">
							<td colspan="3" valign="top" style="font-size: 1px; line-height: 1px;">
								&nbsp;
							</td>
						</tr>

						<tr bgcolor="#dddddd" height="1">
							<td colspan="3" valign="top" style="font-size: 1px; line-height: 1px;">
								&nbsp;
							</td>
						</tr>

						<tr bgcolor="#ffffff" height="20">
							<td colspan="3" valign="top" style="font-size: 1px; line-height: 1px;">
								&nbsp;
							</td>
						</tr>

						<tr>
							<td align="center" valign="top" style="font-size: 1px; line-height: 1px;" width="20">
								&nbsp;
							</td>

							<td align="left" valign="top" style="font-size:14px; color:#000000">
								<b>Objet</b> : <?= $objet ?>
							</td>

							<td align="center" valign="top" style="font-size: 1px; line-height: 1px;" width="20">
								&nbsp;
							</td>
						</tr>

						<tr bgcolor="#ffffff" height="20">
							<td colspan="3" valign="top" style="font-size: 1px; line-height: 1px;">
								&nbsp;
							</td>
						</tr>

						<tr bgcolor="#dddddd" height="1">
							<td colspan="3" valign="top" style="font-size: 1px; line-height: 1px;">
								&nbsp;
							</td>
						</tr>

						<tr bgcolor="#ffffff" height="20">
							<td colspan="3" valign="top" style="font-size: 1px; line-height: 1px;">
								&nbsp;
							</td>
						</tr>

						<tr>
							<td align="center" valign="top" style="font-size: 1px; line-height: 1px;" width="20">
								&nbsp;
							</td>

							<td align="left" valign="top" style="font-size:14px; color:#000000">
								<?= $message ?>
							</td>

							<td align="center" valign="top" style="font-size: 1px; line-height: 1px;" width="20">
								&nbsp;
							</td>
						</tr>

						<tr bgcolor="#ffffff" height="20">
							<td colspan="3" valign="top" style="font-size: 1px; line-height: 1px;">
								&nbsp;
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
</body>
</html>