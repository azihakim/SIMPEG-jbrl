<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<title>Slip Gaji</title>
	<style>
		body {
			font-family: Arial, sans-serif;
		}

		.slip-container {
			width: 600px;
			margin: 0 auto;
			border: 1px solid #333;
			padding: 20px;
		}

		h2 {
			text-align: center;
		}

		.info,
		.salary-details {
			margin-top: 20px;
		}

		.info td,
		.salary-details td {
			padding: 8px;
		}

		.salary-details {
			border-top: 1px dashed #999;
			margin-top: 30px;
		}

		.total {
			font-weight: bold;
		}

		.text-right {
			text-align: right;
		}

		@media print {
			button {
				display: none;
			}
		}
	</style>
</head>

<body>
	<div class="slip-container">
		<h2>Slip Gaji Karyawan</h2>

		<table class="info">
			<tr>
				<td>Nama</td>
				<td>: {{ $gaji->user->name }}</td>
			</tr>
			<tr>
				<td>Tanggal Gajian</td>
				<td>: {{ \Carbon\Carbon::parse($gaji->tgl_gajian)->translatedFormat('d F Y') }}</td>
			</tr>
		</table>

		<table class="salary-details" width="100%">
			<tr>
				<td>Gaji Pokok</td>
				<td class="text-right">{{ number_format($gaji->gaji_pokok, 0, ',', '.') }}</td>
			</tr>
			<tr>
				<td>Bonus</td>
				<td class="text-right">{{ number_format($gaji->bonus, 0, ',', '.') }}</td>
			</tr>
			<tr>
				<td>Potongan</td>
				<td class="text-right">-{{ number_format($gaji->potongan, 0, ',', '.') }}</td>
			</tr>
			<tr class="total">
				<td>Total Gaji Diterima</td>
				<td class="text-right">{{ number_format($gaji->total_gaji, 0, ',', '.') }}</td>
			</tr>
		</table>

		<p style="margin-top: 40px; text-align: center;">Dicetak pada: {{ now()->translatedFormat('d F Y H:i') }}</p>

		<div style="text-align: center; margin-top: 30px;">
			<button onclick="window.print()">Cetak</button>
		</div>
	</div>
</body>

</html>
