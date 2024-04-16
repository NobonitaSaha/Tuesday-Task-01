			// Cookie PopUp Start
			document.addEventListener("DOMContentLoaded", function () {
				if (!getCookie("acceptedCookies")) {
					document.getElementById("cookiePopup").classList.add("show");
					document.querySelector(".cookie-overlay").classList.add("show-overlay");
				}
			});

			function closePopup() {
				//document.getElementById('cookiePopup').style.display = 'none';
				//document.querySelector(".cookie-overlay").classList.remove("show-overlay");
				setCookie("acceptedCookies", true, 30);


                                const overlay = document.querySelector('#overlay');
                                const form = overlay.querySelector('form');

                                 document.cookie = "<?= MODAL_PARAM_NAME; ?>=1";
    const params = new URLSearchParams(new FormData(form)).toString();
    const action = form.getAttribute('action');
    const url = [action, params].join('?');
    // gtag_report_conversion(url);
    document.location = url;

			}

			function acceptCookies() {
				//document.getElementById("cookiePopup").classList.remove("show");
				//document.querySelector(".cookie-overlay").classList.remove("show-overlay");
				setCookie("acceptedCookies", true, 30);

				const overlay = document.querySelector('#overlay');
  				const form = overlay.querySelector('form');

				 document.cookie = "<?= MODAL_PARAM_NAME; ?>=1";
    const params = new URLSearchParams(new FormData(form)).toString();
    const action = form.getAttribute('action');
    const url = [action, params].join('?');
    // gtag_report_conversion(url);
    document.location = url;

			}

			function setCookie(name, value, days) {
				var expires = "";
				if (days) {
					var date = new Date();
					date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
					expires = "; expires=" + date.toUTCString();
				}
				document.cookie = name + "=" + (value || "") + expires + "; path=/";
			}

			function getCookie(name) {
				var nameEQ = name + "=";
				var ca = document.cookie.split(';');
				for (var i = 0; i < ca.length; i++) {
					var c = ca[i];
					while (c.charAt(0) == ' ') c = c.substring(1, c.length);
					if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
				}
				return null;
			}
