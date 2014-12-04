<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="ko" xml:lang="ko" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<link rel="stylesheet" href="inc/status.css" type="text/css" media="all" />
	
	<?php
	include_once('inc/dbconnect.php');
		if(basename($_SERVER['PHP_SELF']) == 'board.php')
			echo '<link rel="stylesheet" href="/layouts/mz_layout/css/layout.css" type="text/css" media="all" />';
			
		if(basename($_SERVER['PHP_SELF']) != 'board.php')
		{
			echo '<link rel="stylesheet" href="/player/include/css/player.css" type="text/css" media="all" />';
		}

		if(basename($_SERVER['PHP_SELF']) == 'insert.php' or basename($_SERVER['PHP_SELF']) == 'view.php' )
		{
			echo '<script type="text/javascript" src="/player/include/js/calendar_beans_v2.0.js"></script>';
		}
	?>
	
	
	</head>
<body>



<div id="bodybg1"></div>
<div id="search-bg"></div>



	<div id="header">
	
		<div id="header-logo">
			<div id="header_title"><a href="status.php">Status</a></div>
		</div>
        
        <!--
		<div id="header-search">
			
			<form method="get" action="list.php" class="search-header">
				<div class="search-header-wrap">
					<select name="category1" class="input search-title header-css">
							<?php
							$query = "SELECT * FROM WS_CATEGORY_1";

							$result = mysql_query($query, $dbc);
							while($row = mysql_fetch_array($result))
							    {
							    	echo '<option value="';
								    echo $row['wc_no1'].'"';
if($row['wc_no1'] == $_GET['category1']) echo ' selected="selected"';
								    echo '>';
								    echo $row['category_nm1'];
								    echo '</option>';
								}
								?>
				</select>
				</div>
				<div class="search-header-wrap">
					<select name="category2" class="input search-title header-css">
							<?php
							$query = "SELECT * FROM WS_CATEGORY_2";
							$result = mysql_query($query, $dbc);
							while($row = mysql_fetch_array($result))
							    {
							    	echo '<option value="';
								    echo $row['wc_no2'].'"';
if($row['wc_no2'] == $_GET['category2']) echo ' selected="selected"';
								    echo '>';
								    echo $row['category_nm2'];
								    echo '</option>';
								}
								?>
				</select>
				</div>
				<div class="search-header-wrap">
					<select name="category3" class="input search-title header-css">
							<?php
							$query = "SELECT * FROM WS_CATEGORY_3";
							$result = mysql_query($query, $dbc);
							while($row = mysql_fetch_array($result))
							    {
							    	echo '<option value="';
								    echo $row['wc_no3'].'"';
if($row['wc_no3'] == $_GET['category3']) echo ' selected="selected"';
								    echo '>';
								    echo $row['category_nm3'];
								    echo '</option>';
								}
								?>
				</select>
				</div>
				<input type="submit" class="submit_button header-css" value="SEARCH">
			</form>

		</div>
		-->
		
	</div>




<form name="list" method="post" action="list.php">
<table id="list_table">
	
	<thead>
		<tr>
			<th scope="col" style="width:2%;"><input type="checkbox" name="check_info" id="total"></th>
            <th scope="col" style="width:5%;">번호</th>
			<th scope="col" style="width:10%;">산모나이</th>
			<th scope="col" style="width:20%;">산모 생년월일</th>
			<th scope="col" style="width:10%;">임신시기</th>
			<th scope="col" style="width:10%;">결과</th>
			<th scope="col" style="width:10%;">확인</th>
			<th scope="col" style="width:20%;">등록일</th>
            <th scope="col" style="width:20%;">IP</th>
		</tr>
	</thead>


	<tbody>
		<?php
        
			
			include('paging.php');
            
            
            
			while($row = $result->fetch_array(MYSQLI_ASSOC))
			{
                $add_get = "";
                if($_GET['page'])
                    $add_get = $add_get."&page=$_GET[page]";
                
                if ( $row['RESULT'] == 1)
                    $result_sex = "남자";
                elseif ( $row['RESULT'] == 2)
                    $result_sex = "여자";
                
                if ( $row['ISCORRECT'] == 1)
                    $iscorrect = "맞음";
                elseif ( $row['ISCORRECT'] == 0)
                    $iscorrect = "틀림";
                
				echo '<tr>';
					echo '<td style="width:2%;"><input type="checkbox" name="chkbx[]" value="'.$row['NO'].'"></td>';
					echo '<td style="width:5%;">'.$row['NO'].'</td>';
					echo '<td style="width:10%;" align="left">'.$row['AGE'].'</td>';
					echo '<td style="width:20%;">'.$row['MOMS_YEAR'].'-'.$row['MOMS_MONTH'].'-'.$row['MOMS_DAY'].'</td>';
					echo '<td style="width:17%;">'.$row['PREGNANT_YEAR'].'-'.$row['PREGNANT_MONTH'].'</td>';
					echo '<td style="width:15%;">'.$result_sex.'</td>';
					echo '<td style="width:10%;">'.$iscorrect.'</td>';
					echo '<td style="width:20%;">'.$row['INSERT_DT'].'</td>';
                    echo '<td style="width:20%;">'.$row['IP'].'</td>';
				echo '</tr>';

			}
		?>
	</tbody>
</table>

<?php
	if($paging_str){
	    echo '<div class="paging">' . $paging_str . '</div>';

	}

?>


<input type="button" class="submit_button delete-button-css" value="DELETE" onclick="checkSubmit()">
</form>
