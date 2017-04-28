$(function() {
	var nav = $(".burger");
	nav.on("click", function() {
		// this
		console.log("I was clicked");
		$(this).parent().find(".burger_nav").toggleClass("open");
	});
});