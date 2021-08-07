if(window.SimpleSlide) {

	new SimpleSlide({
		slide: "quote", // atribute name data-slide="principal"
	  time: 10000 // transition duration, 10s
	});

	new SimpleSlide({
		slide: "gallery",
	  time: 10000,
	  nav: true
	});

}

if(window.SimpleAnime) {
	new SimpleAnime();
}


if(window.SimpleForm) {
	new SimpleForm({
	  form: ".formphp", // seletor do formulário
	  button: "#sendmail", // seletor do botão
	  error: "<div id='form-error'><h2>An error ocurred!</h2><p>An error ocurred, please send your message to batheus.dev@gmail.com or get in touch through my social networks.</p></div>", // Error message
	  success: "<div id='form-success'><h2>Success!</h2><p>I will contact you soon.</p></div>", // Success message
	});
}