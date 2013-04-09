
document.onreadystatechange = function() {

    if (document.readyState === 'complete') {

    	/* Mobile Menu */
        var pull = document.querySelector('.nav__pull'),
		    nav = document.querySelector('.main-nav');   

		pull.addEventListener( 'click', function( ev ) {  
		    ev.preventDefault(); 
		    console.log(nav.style.display);
		    if (nav.style.display == '')
		   		nav.style.display = 'block';
		   	else
		   		nav.style.display = '';
		}, false);


		/* Contact Label Removing */
			/* Setting Vars */
			var contactName = document.querySelector('.contact-form__name');
			var contactMail = document.querySelector('.contact-form__mail');

			var contactNameLabel = document.querySelector('.contact-form__name-label');
			var contactMailLabel = document.querySelector('.contact-form__mail-label');

			var contactMessage = document.querySelector('.contact-form__message');

			if(contactName) {
				/* On focus hide label */
				contactName.addEventListener( 'focus', function( ev ) {

					contactNameLabel.style.top = '-9999px';

				}, false);

				contactMail.addEventListener( 'focus', function( ev ) {

					contactMailLabel.style.top = '-9999px';
					
				}, false);

				contactMessage.addEventListener( 'focus', function ( ev ) {
					contactMessage.innerHTML = "";
				}, false);


				/*On blur, focus leaving, return label */
				contactName.addEventListener( 'blur', function( ev ) {

					if(contactName.value == "")
						contactNameLabel.style.top = '0px';

				}, false);

				contactMail.addEventListener( 'blur', function( ev ) {

					if(contactMail.value == "")
						contactMailLabel.style.top = '0px';

				}, false);

				contactMessage.addEventListener( 'blur', function( ev ) {

					if(contactMessage.value == "") 
						contactMessage.innerHTML = "What can i do for you?";

				}, false);
			}
    }

};