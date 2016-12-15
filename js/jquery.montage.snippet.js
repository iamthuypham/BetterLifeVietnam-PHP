			$(function() {
				
				var $container 	= $('#am-container'),
					$imgs		= $container.find('img').hide(),
					totalImgs	= $imgs.length,
					cnt			= 0;
				
				$imgs.each(function(i) {
					var $img	= $(this);
					$('<img/>').load(function() {
						++cnt;
						if( cnt === totalImgs ) {
							$imgs.show();
							$container.montage({
								fillLastRow				: false,
								alternateHeight			: true,
								alternateHeightRange	: {
									min	: 90,
									max	: 225
								},
								margin : 10,
							});
						}
					}).attr('src',$img.attr('src'));
				});	
				
			});