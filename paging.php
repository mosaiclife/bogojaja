<?php

	require_once('inc/dbconnect.php');

	
	
	/* ***************** 페이징 시작 ***************** */
	
	if(isset($_GET['page']))	// page가 비어있지 않으면
	{
		if($_GET['page'] && $_GET['page'] > 0) // 현재 페이지 값이 존재하고 0 보다 크면 그대로 사용
		{
		    $page = $_GET['page'];
		}
	}else{	// 그 외의 경우는 현재 페이지를 1로 설정
	    $page = 1;
	}
	

	// 페이지 기본 설정			
	$page_row = 10; // 한 페이지에 보일 글 수
	$page_scale = 10; // 한줄에 보여질 페이지 수
	

	
	// 검색 부분
	$add_query = "";
	$i = 0;



/*
	if(isset($_GET['mood2']))
	{
		if($i == 0)
			$add_query = "WHERE mood2 = " . $_GET['mood2'];
		else if($i > 0)
			$add_query = $add_query . " AND mood2 = " . $_GET['mood2'];
		$i++;
	}
	if(isset($_GET['voice']))
	{
		if($i == 0)
			$add_query = "WHERE voice = " . $_GET['voice'];
		else if($i > 0)
			$add_query = $add_query . " AND voice = " . $_GET['voice'];
		$i++;
	}
	if(isset($_GET['sort_check']))
	{
		$sort_check;
		
		if($_GET['sort_check'] == 1)
			$sort_check = 'Y';
		else if($_GET['sort_check'] == 2)
			$sort_check = 'N';
		else if($_GET['sort_check'] == 3)
			$sort_check = '';
	
		if($i == 0)
			$add_query = "WHERE sort_check LIKE '" . $sort_check . "'";
		else if($i > 0)
			$add_query = $add_query . " AND sort_check LIKE '" . $sort_check . "'";
		$i++;
	}
	
*/

	// 전체 글 수 구하기
	$query_total = 'SELECT COUNT(*) AS cnt FROM result '.$add_query.' ORDER BY insert_dt desc;';
	
    $result_total = $mysqli->query($query_total);
    $data_total = $result_total->fetch_array(MYSQLI_ASSOC);
	
	$total_count = $data_total['cnt'];
	
	// 전체 페이지 계산
	$total_page  = ceil($total_count / $page_row);
	
	// 시작 열을 구함
	$from_record = ($page - 1) * $page_row;
	
	// 페이징을 출력할 변수 초기화
	$paging_str = "";
	
	// URL에 페이지 출력 변수
	$add_page = "";
	
	$request_url = $_SERVER['REQUEST_URI'];
	
	if(strstr($request_url,'?'))
	{
		if(strstr($request_url,'?page='))
		{
			$request_url = preg_replace('/page=(\d)*/','',$request_url);
			$add_page = '&page=';
		}
		else if(strstr($request_url,'&page='))
		{
			$request_url = preg_replace('/&page=(\d)*/','',$request_url);
			$add_page = '&page=';
		}
		else
			$add_page = '&page=';
	}
	else
		$add_page = '?page=';
		
	
	// 처음 페이지 링크 만들기
	if ($page > 1) {
	    $paging_str .= "<a href='".$request_url.$add_page."1'>◀</a>";
	}
	
	// 페이징에 표시될 시작 페이지 구하기
	$start_page = ( (ceil( $page / $page_scale ) - 1) * $page_scale ) + 1;
	
	// 페이징에 표시될 마지막 페이지 구하기
	$end_page = $start_page + $page_scale - 1;
	if ($end_page >= $total_page) $end_page = $total_page;
	
	// 이전 페이징 영역으로 가는 링크 만들기
	if ($start_page > 1){
	    $paging_str .= " &nbsp;<a href='".$request_url.$add_page.($start_page - 1)."'>이전</a>";
	}
	
	// 페이지들 출력 부분 링크 만들기
	if ($total_page > 1) {
	    for ($i=$start_page;$i<=$end_page;$i++) {
	        // 현재 페이지가 아니면 링크 걸기
	        if ($page != $i){
	            $paging_str .= " &nbsp;<a href='".$request_url.$add_page.$i."'><span>$i</span></a>";
	        // 현재 페이지면 굵게 표시하기
	        }else{
	            $paging_str .= " &nbsp;<b>$i</b> ";
	        }
	    }
	}
	
	// 다음 페이징 영역으로 가는 링크 만들기
	if ($total_page > $end_page){
	    $paging_str .= " &nbsp;<a href='".$request_url.$add_page.($end_page + 1)."'>다음</a>";
	}
	
	// 마지막 페이지 링크 만들기
	if ($page < $total_page) {
	    $paging_str .= " &nbsp;<a href='".$request_url.$add_page.$total_page."'>▶</a>";
	}
	
	/* ***************** 페이징 끝 ***************** */
	
	// 쿼리문 작성

		$query = "
                 SELECT NO
                    ,   AGE
                    ,   MOMS_YEAR
                    ,   MOMS_MONTH
                    ,   MOMS_DAY
                    ,   PREGNANT_YEAR
                    ,   PREGNANT_MONTH
                    ,   RESULT
                    ,   ISCORRECT
                    ,   INSERT_DT
                    ,   IP
                FROM    result
                ORDER BY NO DESC             
				 LIMIT ".$from_record.", ".$page_row; // SQL Query 입력

	//$query = "SELECT * FROM music ORDER BY id ASC";	// SQL Query 입력
	
	// 쿼리문 적용하여 $result 에 대입
	$result = $mysqli->query($query);
	
	
	// 데이터 갯수 체크를 위한 변수 설정
	$i = 0;

?>
