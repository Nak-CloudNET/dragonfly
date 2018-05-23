<?php
	//$this->erp->print_arrays($digitalDatas);
	$ref = substr($inv->reference_no, 5);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $this->lang->line("sales") . " " . $inv->reference_no; ?></title>
    <link href="<?php echo $assets ?>styles/theme.css" rel="stylesheet">
    <style type="text/css">
		@media print {
		    .wrapper {
				width:570px;
			}
		}
		.wrapper {
			width:570px;
		}
    </style>
</head>

<body>

	<div class ="wrapper">

		<button type="button" class="btn btn-xs btn-default no-print pull-right" style="margin-right:15px;" onclick="window.print();">
                <i class="fa fa-print"></i> <?= lang('print'); ?>
            </button>
		<div style="width:570px;height:90px;">
			
		</div>
		
		<div style="width:570px;height:165px;">
			<div style="width:200px;float:left;">
				<br></br>
				<br></br>
				<p style="padding-left:65px;line-height:25px;"><?=$customer->code?></p>
			</div>
			
			<div style="width:200px;float:right;">
				<p style="font-size:16px; font-weight:bold;padding-left:90px;margin-top:-4px;"><?=$ref?></p>
				<p style="font-size:16px; font-weight:bold; padding-left:42px;"><?=$customer->name?></p>
				<p style="font-size:15px;padding-left:20px;line-height:11px;"><?=$customer->phone?></p>
				<p style="font-size:15px;padding-left:35px;line-height:20px;"><?=$customer->address?></p>
			</div>
		</div>
		<div style="width:570px;">
			<div>
				<table style="width:100%;font-size:16px;">
					<?php 
					$i = 0;
					$total = 0;
					foreach($digitalDatas as $key => $digitalData){ 
					if($digitalData['quantity'] > 0){ ?>
						<tr style="height:27px;">
							<th style="padding-left:65px;width:255px;text-align:left;"><?php echo $digitalData['name']; ?></th>
							<th style="padding-left:27px;width:100px;text-align:left;"><?php echo $this->erp->formatQuantity($digitalData['quantity']) .' '. $digitalData['variant']; ?></th>
							<th style="width:100px;"><?php echo $digitalData['price'] != 0? $this->erp->formatMoney($digitalData['price'])."$":"Free"; ?></th>
							<th style="width:100px;"><?php 
										echo $digitalData['price'] != 0? $this->erp->formatMoney($digitalData['price'] * $digitalData['quantity'])."$":"Free"; 
										
										$total += $digitalData['price'] * $digitalData['quantity'];
									?></th>
						</tr>
						
					<?php $i++; }} ?>
					<?php for($j=0;$j<15-$i;$j++){ ?>
						<tr style="height:27px;">
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					<?php } ?>
					
				</table>
			</div>
			
		</div>
		<div style="margin-top:21px;width:570px;">
			<div style="width:500px;margin-left:75px;padding-top:0px;">
			<table  id="table_h" border="0" border-collapse: collapse; style="width:500px;">
				<tr>
					<th style="width:200px;"></th>
					<th style="width:80px;"></th>
					<th style="width:100px;"></th>
					<th style="width:120px;"> </th>
				</tr>
				
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td style="text-align:center;font-size:18px;font-weight: bold;"><?=$this->erp->formatMoney($inv->grand_total)."$"?></td>
				</tr>
			</table>
			<?php
				//$this->erp->print_arrays($this->erp->KhmerNumDate(date('y', strtotime(urldecode($inv->date)))));
			?>
			<p style="margin-left:295px;margin-top:7px;"><span><?=$this->erp->KhmerNumDate(date('d', strtotime(urldecode($inv->date))));?></span><span style="padding-left:50px;"><?=$this->erp->KhmerMonthToNumber(date('m', strtotime(urldecode($inv->date))));?></span><span style="padding-left:85px;"><?=$this->erp->KhmerNumDate(date('y', strtotime(urldecode($inv->date))));?></span></p>
			</div>
			
		</div>
	</div>
</body>
</html>