
$(document).ready(function(){
		// ang mo show
		var contains = false;
		const  target = $('.cg-main');
  		var nothing = '<div class="item util-clearfix targetDiv nothing" data-spm="1" id="div1">' +
								'<h3 class="big-title anchor1'+
					               			'404 Nothing Found' +
			    				'</h3>'+
								'<div class="sub-item-wrapper util-clearfix">'+
										'<div class="sub-item">'+
											'  '+
					    				'</div>'+
								'</div>'+
							'</div>';

		//click ---

		$('.click-here').on('click',function(){
			// check if ang mga class kay naay singleShow na class then if
			// wla kay
			// $('.cg-main')
				// para ma addan ug div na nothing something then kuan dayon
			//if naay singleShow na class
			// $('.click-here').removeAttr("style");
			// $(this).css('background-color','yellow');.
			// $.ajax({
			// 	url : './',
			// 	success : function(result){
			// 		console.log(result);
			// 		$('.cg-main')
			// 	}
			// 	// ang ajax kay mo adto sa page na imong gi butang sa url pero iya e return ang page or onsa naa sa url
			// });

			if(!($(this).hasClass('showSingle'))){
					if(!contains){
						$('.cg-main').append(nothing);
						contains=true;
					}

					$( ".cg-main .item" ).each(function( i ) {
					    	$(this).css('display','none');
					    	if($(this).hasClass('nothing')){
					    		$(this).css('display','block');
					    	}
					 });


		 			$(this).css('color','grey');
					$(this).unbind('click');
					$(this).unbind('hover');
					$(this).css('text-decoration', 'none');
					$(this + 'i').css('color', 'grey!important');


				//alert(" The category is empty");
			}
			else{
				$( ".cg-main .item" ).each(function( i ) {
					    if(($(this).hasClass('nothing'))){
					    	$(this).css('display','none');

					    }
					  });
			}



		});
		$( ".click-here" ).each(function( i ) {
			if(!($(this).hasClass('showSingle'))){
						$(this).unbind('click');
						$(this).css('color','grey');
						//alert(" The category is empty");
					}
				});

		// $( ".click-here" ).each(function( index ) {
		// 		if(!($(this).hasClass('showSingle'))){
		// 			$(this).unbind('click');
		// 			$(this).css('color','grey');
		// 			//alert(" The category is empty");
		// 		}
		// });
		//hover na part

		// $('.click-here').mouseenter(function() {


		// 	// check if ang mga class kay naay singleShow na class then if
		// 	// wla kay
		// 	// $('.cg-main')
		// 		// para ma addan ug div na nothing something then kuan dayon
		// 	//if naay singleShow na class

		// 	// if(!($(this).hasClass('showSingle'))){
		// 	// 	alert("Empty");
		// 	// }


		// 	$('.click-here').removeAttr("style");
		// 	$(this).css('background-color','lightgray');
		// });
		// $('.click-here').mouseleave(function(){
		// 	$('.click-here').removeAttr("style");

		// });


});
