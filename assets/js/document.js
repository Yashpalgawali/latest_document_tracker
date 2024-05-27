$(document).ready(function(){
	$('#regulation_issued_date').datetimepicker({ 
							format : 'YYYY-MM-DD',
							//format : 'DD-MM-YYYY',
							icons  : {
									time	: 'fa fa-clock-o',
									date	: 'fa fa-calendar',
									up		: 'fa fa-chevron-up',
									down	: 'fa fa-chevron-down',
									previous: 'fa fa-chevron-left',
									next	: 'fa fa-chevron-right',
									today	: 'fa fa-check',
									clear	: 'fa fa-trash',
									close	: 'fa fa-times'
								},
					});
		$('#last_renewed_date').datetimepicker({
				format	: 'YYYY-MM-DD',
				icons	: {
						time	: 'fa fa-clock-o',
						date	: 'fa fa-calendar',
						up		: 'fa fa-chevron-up',
						down	: 'fa fa-chevron-down',
						previous: 'fa fa-chevron-left',
						next	: 'fa fa-chevron-right',
						today	: 'fa fa-check',
						clear	: 'fa fa-trash',
						close	: 'fa fa-times'
					},
		});
	});

    function daysInMonth(month, year) {
        return new Date(year, month, 0).getDate();
    }
    
	function updateregulation(date)
	{
		let freq = $('#regulation_frequency').val();
	
		if(freq==1) {
			
			const d = new Date(""+date);
			let cur_month = d.getMonth()+1;
			let cur_date  = d.getDate();
			let cur_year  = d.getFullYear();
		    
			let cur_total_days = daysInMonth(cur_month, cur_year);
			
			let next_total_days ;
			let next_month ;
			let next_year ;
			let next_date ;
			
			if(cur_month==12){
			    next_month=1;
                next_total_days = daysInMonth((next_month), (cur_year+1));
			 }
			 else
			 {
			    next_total_days =  daysInMonth((cur_month+1), cur_year);
			 }
    
            if(cur_total_days==next_total_days)
            {
                if(cur_month==12) {
                       cur_month=1;
                       cur_year+=1;
                }
                else {
                    cur_month+=1;
                }
                if(cur_month<10) {
                    cur_month = "0"+cur_month;
                }
                if(cur_date<10) {
                    cur_date = "0"+cur_date;
                }
                let next_month_date = (cur_year)+"-"+(cur_month)+"-"+cur_date;
                $('#last_renewed_date').val(next_month_date);
            }
            
            if(cur_total_days < next_total_days)
            {
                cur_month+=1;
                if(cur_month<10) {
                    cur_month = "0"+cur_month;
                }
                if(cur_date<10) {
                    cur_date = "0"+cur_date;
                }
                let next_month_date = (cur_year)+"-"+(cur_month)+"-"+cur_date;
                $('#last_renewed_date').val(next_month_date);
            }
            
            if(cur_total_days > next_total_days)
            {
                if(cur_date<=next_total_days) {
                    cur_month+=1;
                    
                    if(cur_month<10) {
                        cur_month = "0"+cur_month;
                    }
                    if(cur_date<10) {
                        cur_date = "0"+cur_date;
                    }
                    let next_month_date = (cur_year)+"-"+(cur_month)+"-"+cur_date;
                    $('#last_renewed_date').val(next_month_date);
                }
                if(cur_date>next_total_days)
                {
                    let next_date =cur_date-next_total_days;
                    
                    if(cur_month ==1) {
                        cur_month+=2;
                    }
                    else {
                        cur_month+=1;
                    }
                    if(cur_month<10) {
                        cur_month = "0"+cur_month;
                    }
                    if(next_date<10) {
                        next_date = "0"+next_date;
                    }
                    let next_month_date = (cur_year)+"-"+(cur_month)+"-"+next_date;
                    $('#last_renewed_date').val(next_month_date);
                } 
                
            }
		}
		if(freq==3) {
			alert('yearly');
    		const d = new Date(""+date);
    		let cur_month = d.getMonth()+1;
    	    let cur_date  = d.getDate();
    		let cur_year  = d.getFullYear();
			
			let next_year = cur_year+1 ;
			if(next_year %400 ===0 || next_year %4 ===0)
			{
			   if(cur_month<10) {
                        cur_month = "0"+cur_month;
                    }
                    if(next_date<10) {
                        next_date = "0"+next_date;
                    }
                    let next_month_date = (cur_year)+"-"+(cur_month)+"-"+next_date;
                    $('#last_renewed_date').val(next_month_date); 
			}
			else {
			     alert('NOT leap year');
			}
		}
	}

		