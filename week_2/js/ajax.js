document.addEvent("domready", function(){
	$$("nav>a").addEvent("click", function(ev){
		ev.stop();
		var myOption = this.get("data-type");
		var content = document.id("content");
		
		content.set('load', {
			method: 'post',
			data: {
				option: myOption
			}
		});
		
		content.load("data.php");
		return false;
	});
});