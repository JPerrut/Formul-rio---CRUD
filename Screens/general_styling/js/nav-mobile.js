document.querySelector('.menu_user').addEventListener('click', function () {
	const navMobile = document.querySelector('.nav-mobile');
	const menuUser = document.getElementById('menu-user');

	if (getComputedStyle(navMobile).display === 'none' || navMobile.classList.contains('hidden')) {

		navMobile.classList.remove('hidden');
		navMobile.style.display = 'flex';
		menuUser.classList.add('menu_user-toggle'); 
	} else {
	
		navMobile.classList.add('hidden');
		menuUser.classList.remove('menu_user-toggle');


		setTimeout(() => {
			navMobile.style.display = 'none'; 
		}, 500); 
	}
});
