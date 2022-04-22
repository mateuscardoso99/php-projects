function openMenu(prop) {
	const menu = document.getElementById(prop)
	if (menu.style.display === "flex") {
		menu.style.display = "none"
	}else{
		menu.style.display = "flex"
	}
}