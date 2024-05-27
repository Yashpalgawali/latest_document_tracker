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
                alert('curent days and Next month days are EQUAL');
                if(cur_month<10)
                {
                    cur_month = "0"+cur_month;
                }
                if(cur_date<10)
                {
                    cur_date = "0"+cur_date;
                }
                let next_month_date = (cur_year)+"-"+(cur_month)+"-"+cur_date;
                $('#last_renewed_date').val(next_month_date);
            }
            
            if(cur_total_days < next_total_days)
            {
                alert('curent days are less\n Current month is '+cur_month);
                cur_month+=1;
                alert('Next month is '+cur_month);
                if(cur_month<10)
                {
                    cur_month = "0"+cur_month;
                }
                if(cur_date<10)
                {
                    cur_date = "0"+cur_date;
                }
                let next_month_date = (cur_year)+"-"+(cur_month)+"-"+cur_date;
                $('#last_renewed_date').val(next_month_date);
            }
            
            if(cur_total_days > next_total_days)
            {
                alert('curent days are Greater \n Current month is '+cur_month);
                
                if(cur_date<=next_total_days)
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
            // alert('Total Days in Selected Month'+cur_total_days);
            
            // alert('Total Days in Next Month'+next_total_days);
            // alert('Difference in days is '+diff_days); 
            
            // if(cur_year%400===0 || cur_year%4===0)
            // {
            //     if(cur_month=='01' )
            //     {
            //         if(cur_date==29 )
            //         {
            //             cur_month= cur_month+1;
            //             if(cur_month<10) {
            //                 cur_month = "0"+cur_month;
            //             }
            //             let next_month_date = (cur_year)+"-"+(cur_month)+"-"+cur_date;
            //             $('#last_renewed_date').val(next_month_date);
            //         }
            //         if(cur_date>=30 && cur_date <=31){
            //             let daysinnextmonth = daysInMonth((cur_month+1),cur_year);
            //             let next_date =cur_date-daysinnextmonth;
            //             if(next_date<10) {
            //                 next_date = "0"+next_date;
            //             }
            //             cur_month=cur_month+2;
            //             if(cur_month<10) {
            //                 cur_month = "0"+cur_month;
            //             }
                        
            //             let next_month_date = (cur_year)+"-"+((cur_month))+"-"+next_date;
            //             $('#last_renewed_date').val(next_month_date);
            //         }
            //     }    
            // }
            // else 
            // {
            //     let next_date = cur_date-next_total_days;
            //     if(next_date===0){
            //         next_date = cur_date;
            //     }
               
            //     if(next_total_days>=29 && next_total_days<=31)
            //     {
            //         if(next_total_days<cur_total_days){
                        
            //             cur_month= cur_month+2;
            //         }
            //         else {
            //             if(cur_month==12)
            //                 cur_month=1;
            //             else
            //                 cur_month= cur_month+1;
            //         }
            //         if(cur_month <10) {
            //             cur_month= "0"+cur_month;
            //         }
            //         if(next_date<10) {
            //             next_date = "0"+next_date;
            //         }
            //         if(cur_month==12)
            //         {
            //             cur_year+=1;
            //         }
            //         let next_month_date = (cur_year)+"-"+((cur_month))+"-"+next_date;
            //         alert('Next Month date is '+next_month_date);
            //     }
            //      else {
            //         cur_month= cur_month+1;
            //         if(cur_month <10) {
            //             cur_month= "0"+cur_month;
            //         }
            //         if(cur_date<10) {
            //             cur_date = "0"+cur_date;
            //         }
            //          let next_month_date = (cur_year)+"-"+((cur_month))+"-"+cur_date;
            //         alert('Next Month date is '+next_month_date);
            //      }
			    
                // if(cur_month=='01' )
                // {
        //             let next_month_date = (cur_year)+"-0"+((cur_month)+2)+"-0"+1;
        //             alert('Next Month date is '+next_month_date);
			     //   $('#last_renewed_date').val(next_month_date);
            //         if(cur_date==29 )
            //         {
            //             let next_month_date = (cur_year)+"-0"+((cur_month)+2)+"-0"+1;
            //             alert('Next Month date is '+next_month_date);
				        // $('#last_renewed_date').val(next_month_date);
            //         }
        //             else if(cur_date==30 )
        //             {
        //                 let next_month_date = (cur_year)+"-0"+((cur_month)+2)+"-0"+2;
        //                 alert('Next Month date is '+next_month_date);
				    //     $('#last_renewed_date').val(next_month_date);
        //             }
        //             else if(cur_date==31 )
        //             {
        //                 let next_month_date = (cur_year)+"-0"+((cur_month)+2)+"-0"+3;
        //                 alert('Next Month date is '+next_month_date);
				    //     $('#last_renewed_date').val(next_month_date);
        //             }
        // 			else {
        //     			if(cur_date < 10) {
        //     				cur_date = "0"+cur_date;
        //     			}
        //                 let next_month_date = (cur_year)+"-0"+((cur_month)+1)+"-"+cur_date;
        //                 alert('Next Month date is '+next_month_date);
    			 //       $('#last_renewed_date').val(next_month_date);
        // 			}
                //}  
          //  }
            
		}
/* -------------------------------------------------------------------  */		
		/*if(freq==1)
		{
			const d = new Date(""+date);
			let cur_month = d.getMonth()+1;
			let cur_date  = d.getDate();
			let cur_year  = d.getFullYear();
		
			if(cur_month==12)
			{
				cur_month=1;
					if(cur_month < 10) {
					cur_month = "0"+cur_month;
				}

				if(cur_date < 10) {
					cur_date = "0"+cur_date;
				}
			
				let next_month_date = (d.getFullYear()+1)+"-"+(cur_month)+"-"+cur_date;
				$('#last_renewed_date').val(next_month_date);
			}
			if(cur_month==1)
			{
			    let cur_total_days = daysInMonth(cur_month, cur_year);
			     alert('Current MOnth is '+1+' \n Total days are '+cur_total_days);
			    
			    let next_total_days = daysInMonth(2, cur_year);
			     alert('Next  MOnth is '+2+' \n Total days are '+next_total_days);
			     
			    let diff_days =cur_date - next_total_days;
			    
			    if(cur_date>=29 && cur_date<=31)
			    {
			        if(cur_year%400===0 || cur_year%4===0 && cur_date===29)
			        {
			            alert("Leap year \n differnce between days is "+diff_days);
			            if(cur_month < 10) {
        					    cur_month = "0"+cur_month;
            			}
            			if(cur_date < 10) {
        					    cur_date = "0"+cur_date;
            			}
			            let next_month_date = d.getFullYear()+"-"+(cur_month+1)+"-"+cur_date;
				        $('#last_renewed_date').val(next_month_date);
			        }
			        else
			        {
			            alert("Not Leap year \n differnce between days is "+diff_days);
	            		
			             let next_month_date = d.getFullYear()+"-"+(cur_month+2)+"-"+diff_days;
    				    $('#last_renewed_date').val(next_month_date);
			            /*if(cur_date===29) {
    			            let next_month_date = d.getFullYear()+"-"+"0"+(cur_month+2)+"-0"+diff_days;
    				        $('#last_renewed_date').val(next_month_date);
			            }
			            if(cur_date===30) {
    			            let next_month_date = d.getFullYear()+"-"+"0"+(cur_month+2)+"-0"+diff_days;
    				        $('#last_renewed_date').val(next_month_date);
			            }
			            if(cur_date===31) {
    			            let next_month_date = d.getFullYear()+"-"+"0"+(cur_month+2)+"-0"+diff_days;
    				        $('#last_renewed_date').val(next_month_date);
			            }*/
			      /*  }
			    }
			  let next_month_date = d.getFullYear()+"-"+(cur_month+1)+"-"+cur_date;
			  $('#last_renewed_date').val(next_month_date);
			
			}
			else {
				cur_month+=1;
				if(cur_month<10) {
					cur_month =  "0"+cur_month;
				}
				if(cur_date<10) {
					cur_date = "0"+cur_date;
				}
				let next_month_date = d.getFullYear()+"-"+(cur_month)+"-"+cur_date;
				$('#last_renewed_date').val(next_month_date);
			}
		}*/
		
		/*if(freq==2)
		{
			const d = new Date(""+date);
			let cur_month = d.getMonth()+1;
			let cur_date = d.getDate();
			if(cur_month==10) 
			{
				let next_month=1;

				if(next_month<10) {
					next_month =  "0"+next_month;
				}

				if(cur_date<10) {
					cur_date = "0"+cur_date;
				}
			
				let next_quarter_date = (d.getFullYear()+1)+"-"+(next_month)+"-"+cur_date;
			
				$('#last_renewed_date').val(next_quarter_date);
				return 0;
			}

			if(cur_month==11){
				cur_month=2;

				if(cur_month<10) {
					cur_month =  "0"+cur_month;
				}

				if(cur_date<10) {
					cur_date = "0"+cur_date;
				}

				let next_quarter_date = (d.getFullYear()+1)+"-"+(cur_month)+"-"+cur_date;
				$('#last_renewed_date').val(next_quarter_date);
				return 0;
			}
			if(cur_month==12){

				cur_month=3;

				if(cur_month<10) {
					cur_month =  "0"+cur_month;
				}

				if(cur_date<10) {
					cur_date = "0"+cur_date;
				}

				let next_quarter_date = (d.getFullYear()+1)+"-"+(cur_month)+"-"+cur_date;
				$('#last_renewed_date').val(next_quarter_date);
				return 0;
			}
			else {
			cur_month+=3;

			if(cur_month<10) {
				cur_month =  "0"+cur_month;
			}

			if(cur_date<10) {
				cur_date = "0"+cur_date;
			}
		
			let next_quarter_date = d.getFullYear()+"-"+(cur_month)+"-"+cur_date;
			$('#last_renewed_date').val(next_quarter_date);
		  }
		} 
		if(freq==3)
		{
			const d = new Date(""+date);
			let cur_month = d.getMonth()+1;
			let cur_date = d.getDate();
			
			if(cur_month<10) {
				cur_month =  "0"+cur_month;
			}

			if(cur_date<10) {
				cur_date = "0"+cur_date;
			}
		
			let next_year_date = (d.getFullYear()+1)+"-"+(cur_month)+"-"+cur_date;
			$('#last_renewed_date').val(next_year_date);
		}*/
	}

		