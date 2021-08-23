@extends('layouts.bigbrother')
@section('content')

@if(!$brothersDealForm)
	<div class="alert alert-warning">
		<h2>
			لم يتم التعاقد بعد
		</h2>
	</div>
@else
    <!DOCTYPE html>
    <html>

		<head>
			<meta charset='utf-8'>
			<meta http-equiv='X-UA-Compatible' content='IE=edge'>
			<title>استمارة تعاقد الأخ الأكبر مع الأخ الأصغر </title>
			<meta name='viewport' content='width=device-width, initial-scale=1'>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
			<link rel='stylesheet' type='text/css' media='screen' href='main.css'>
			<script src='main.js'></script>

			<style>
				@page {
					size: auto;
					/* auto is the initial value */
					margin: 0;
					/* this affects the margin in the printer settings */
				}

				table {
					width: 100%;
				}

				table th {
					font-weight: normal;
				}

				table.padding th {
					padding: .5rem .7rem;
				}

				table.padding td {
					padding: .7rem;
				}

				table.sm-padding td {
					padding: .2rem .7rem;
				}

				.border-bottom td,
				.border-bottom th {
					border-bottom: 1px solid #eceff4;
				}

				.text-left {
					text-align: left;
				}

				.text-right {
					text-align: right;
				}

				.small {
					font-size: .85rem;
				}

				.currency {}

				div.s2 {
					position: static;
					height: fit-content;
					margin-top: 50px;
					text-align: center;
					padding: 50px;


				}

			</style>
		</head>

		<body style="background-color: white">
			<div style="display: flex; justify-content: center;">
				<div style="width: 21.59cm; height: 27.94cm ;">


					<a class="btn btn-success"
						href="{{ route('bigbrother.brothers-deal-forms.print', $brothersDealForm->id) }}">
						{{ trans('global.print') }}
					</a>
					<img src="{{ URL::to('images/2.jpg') }}" style="width:800px;height:100px;">


					<h1 style=" text-align:center"><b> <ins> تعاقد بين الأخ الأكبر/الأخت الكبرى مع الأخ الأصغر/ الأخت الصغرى
							</ins></b></h1>

					<h2 style="background-color: #DDD ; text-align:center"> ( {{ $brothersDealForm->id }} ) استمارة رقم</h2>
					<br>
					<br>
					<div style="display: flex; justify-content: center;">
						<div style="border: 1px solid #000; width: 20cm;">


							<table style="padding: 1.5rem;float: right;position: relative;">
								<tr>
									<td class="text-right "><span>{{ $big_brother->user->identity_number ?? '' }}</span> <label
											class="gry-color strong selectBoxLabel bold block" style="float:right"> : رقم الهوية
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
									</td>
									<td class="text-right "><span>{{ $big_brother->user->name ?? '' }}</span> <label
											class="gry-color strong" style="float:center">: أناالأخ الأكبر&nbsp;&nbsp;</label>
									</td>
									<td class="text-right "><span>{{ $brothersDealForm->day }}</span> <label
											class="gry-color strong" style="float:right">: إنه في يوم &nbsp;&nbsp;</label></td>
								</tr>
								<tr>
									<td class="text-right "><span>{{ $small_brother->user->identity_number ?? '' }}</span>
										<label class="gry-color strong selectBoxLabel bold block" style="float:right"> : رقم
											الهوية
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
									</td>
									<td class="text-right "><span></span>{{ $small_brother->user->name }}<label
											class="gry-color strong" style="float:center">: تم التعاقد مع الأخ
											الأصغر&nbsp;&nbsp;</label></td>
									<td class="text-right "><span></span> <label class="gry-color strong" style="float:right">
											&nbsp;&nbsp;</label></td>
								</tr>
								<tr>
									<td class="text-right "><span>{{ $brothersDealForm->approvment_form->id ?? '' }}</span>
										<label class="gry-color strong selectBoxLabel bold block" style="float:right"> : بناء
											على الموافقة رقم
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
									</td>
									<td class="text-right "><span>{{ $brothersDealForm->created_at }}</span> <label
											class="gry-color strong" style="float:center">:بتاريخ &nbsp;&nbsp;</label></td>
									<td class="text-right "><span></span> <label class="gry-color strong" style="float:right">
											&nbsp;&nbsp;</label>
								</tr>


							</table>

							<br>
						</div>
					</div>
					<div class="s2">
						<b>وعلى ذلك جرى التوقيع</b>
						<div class="row">

							<table style="padding: 1.5rem;float: right;position: relative; margin-top:50px;">
								<tr>
									<td class="text-right "><span>{{ $brothersDealForm->executive_committee }}</span> <label
											class="gry-color strong selectBoxLabel bold block" style="float:right"> : اللجنة
											التنفيذية
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
									</td>
									<td class="text-right "><span>{{ $brothersDealForm->department_of_social_service }}</span>
										<label class="gry-color strong" style="float:right">: قسم الخدمة
											الإجتماعية&nbsp;&nbsp;</label></td>
								</tr>
								<tr>
									<td class="text-right ">{{ $brothersDealForm->executive_director }}<span></span> <label
											class="gry-color strong selectBoxLabel bold block" style="float:right"> : المدير
											التنفيذي
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
									</td>
									<td class="text-right ">{{ $brothersDealForm->specialist->email ?? '' }}<span></span>
										<label class="gry-color strong" style="float:right">: الإخصائي الإجتماعي
											&nbsp;&nbsp;</label></td>
								</tr>
								<tr>
									<td class="text-right "><span></span> <label
											class="gry-color strong selectBoxLabel bold block" style="float:right"> : التوقيع
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
									</td>
									<td class="text-right "><span></span> <label class="gry-color strong" style="float:right">:
											التوقيع&nbsp;&nbsp;</label></td>
								</tr>
							</table>


							<img src="{{ URL::to('images/3.jpg') }}" style="width:800px;height:30px;">


						</div>
					</div>

		</body>

    </html>
@endif
@endsection
