

function fitImageContainerHeight()
{
    var container = $('[data-big-image-container]');

	var newheight = $(window).height() - container.offset().top - 5;

    if (container.hasClass('loading')) {
        container.find('[data-big-image]').attr('style', 'max-height:' + newheight + 'px;');
    }
}


!function ($)
{
	// If #imagenav exist, where on the image page
	$('[data-image-navigation]').exists(function()
	{
		// Fit image container
		fitImageContainerHeight();

		// When the window is resized, fit image container
		$(window).bind('resize', function() { fitImageContainerHeight(); });

		// Checks for keyup event on the document
		$(document).keyup(function(e)
		{
			// Redirect when left and right arrow key is clicked
			switch(e.which)
			{
				// Left arrow
				case 37:
					window.location.href = $('[data-previous-image]').attr("href");
				break;

				// Right arrow
				case 39:
					window.location.href = $('[data-next-image]').attr("href");
				break;

				// Just return if it's other keys than left and right arrow
				default: return;
			}
			e.preventDefault();
		});

		// Create a new image instance
		//var img = new Image();
		var img = $('[data-big-image]');

        img.hide().load(function () {

				// Remove loading class from the #loader and insert the image
				$(this).parent().removeClass('loading');

				// Fit image container
				fitImageContainerHeight();

				// Fade our image in
				$(this).fadeIn(300);
			})
			.error(function () {
                //console.log($(this).parent());
				// Fade the #loader out, add loaderror class and fade in again
                $(this).parent()
					.fadeTo('fast', 0, function () {
                        $(this)
							.addClass('loaderror')
							.fadeTo('slow', 1);
					});
			})
			.attr('src', img.data('src'));
    });


}(window.jQuery);
