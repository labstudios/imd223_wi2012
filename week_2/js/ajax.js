document.addEvent("domready", function(){
	$$("nav>a").addEvent("click", function(ev){
		ev.stop();
		var option = this.get("data-type");
		var content = document.id("content");
		
		content.set('load', {
			method: 'post',
			data: {
				option: option
			}
		});
		
		content.load("data.php");
		return false;
	});
});