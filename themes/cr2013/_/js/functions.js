
document.onreadystatechange = function() {
    if (document.readyState === 'complete') {
        // DOM is ready!
        var pull        = document.querySelector('.nav__pull'),
		    nav        = document.querySelector('.main-nav');   

		pull.addEventListener( 'click', function( ev ) {  
		    ev.preventDefault(); 
		    console.log(nav.style.display);
		    if (nav.style.display == '')
		   		nav.style.display = 'block';
		   	else
		   		nav.style.display = '';
		}, false);
    }
};