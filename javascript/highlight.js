		// ang mo show 
 $(document).ready(function(){
		var target = $('.cg-main').html();
  		var nothing = '<div class="item util-clearfix targetDiv" data-spm="1" id="div1">' +
								'<h3 class="big-title anchor1'+
					               			'404 Nothing Found' +
			    				'</h3>'+
								'<div class="sub-item-wrapper util-clearfix">'+
										'<div class="sub-item">'+		
											''+	                                
					    				'</div>'+
								'</div>'+
							'</div>'; 

						$('.click-here').on('click',function(){

						  var $td = $(this).parent();	
						    $('.selected').not($td).removeClass("selected");
						    $td.toggleClass("selected");
						});

						// function toggleBorderColor(c) {
						//     cells = c.parentElement.parentElement.getElementsByTagName('td');
						//     for (var i in cells) {
						//        var cell = cells.item(i);
						//        cell.style.borderColor = (cell != c) ? "" : "red";
						// }
			

		


});



	
