<!DOCTYPE html>
<html lang="en">
	<head>
		<title>rapidems.github.io</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta charset="utf-8" />
		<meta property="twitter:card" content="summary_large_image" />

		<style data-tag="reset-style-sheet">
			html {  line-height: 1.15;}body {  margin: 0;}* {  box-sizing: border-box;  border-width: 0;  border-style: solid;}p,li,ul,pre,div,h1,h2,h3,h4,h5,h6,figure,blockquote,figcaption {  margin: 0;  padding: 0;}button {  background-color: transparent;}button,input,optgroup,select,textarea {  font-family: inherit;  font-size: 100%;  line-height: 1.15;  margin: 0;}button,select {  text-transform: none;}button,[type="button"],[type="reset"],[type="submit"] { appearance: button; -webkit-appearance: button;}button::-moz-focus-inner,[type="button"]::-moz-focus-inner,[type="reset"]::-moz-focus-inner,[type="submit"]::-moz-focus-inner {  border-style: none;  padding: 0;}button:-moz-focus,[type="button"]:-moz-focus,[type="reset"]:-moz-focus,[type="submit"]:-moz-focus {  outline: 1px dotted ButtonText;}a {  color: inherit;  text-decoration: inherit;}input {  padding: 2px 4px;}img {  display: block;}html { scroll-behavior: smooth  }
		</style>
		<style data-tag="default-style-sheet">
			html {
				font-family: DM Sans;
				font-size: 16px;
			}

			body {
				font-weight: 400;
				font-style:normal;
				text-decoration: none;
				text-transform: undefined;
				letter-spacing: normal;
				line-height: 1.3;
				color: var(--dl-color-scheme-darkblue);
				background-color: var(--dl-color-scheme-white);

			}
		</style>
		<link
			rel="shortcut icon"
			href="public/icon.png"
			type="icon/png"
			sizes="32x32"
		/>
		<link
			rel="stylesheet"
			href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;display=swap"
			data-tag="font"
		/>
		<link
			rel="stylesheet"
			href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital,wght@0,400;1,400&amp;display=swap"
			data-tag="font"
		/>
		<link
			rel="stylesheet"
			href="https://unpkg.com/@teleporthq/teleport-custom-scripts/dist/style.css"
		/>
		<style>
			.services-card:hover > div{
			background-color: #fff
			}
		</style>
	</head>
	<body>
		<link rel="stylesheet" href="../style.css" />
		<div>
			<link href="./footer.css" rel="stylesheet" />
			<footer class="footer-footer">
				<div class="footer-separator"></div>
				<nav class="footer-nav">
					<a href="index.html" class="footer-navlink"><span>Home</span></a>
					<a href="about.html" class="footer-navlink1"><span>About</span></a>
					<a href="news.html" class="footer-navlink2"><span>News</span></a>
				</nav>
				<span class="footer-text1"><span>© 2023 RapidEMS</span></span>
				<div class="footer-separator1"></div>
			</footer>
		</div>
		<script src="https://unpkg.com/@teleporthq/teleport-custom-scripts"></script>
		<script>
			window.onload = () => {
				const runAllScripts = () => {
					initializeAllSliders();
				};

				const listenForUrlChanges = () => {
					let url = location.href;
					document.body.addEventListener(
						"click",
						() => {
							requestAnimationFrame(() => {
								if (url !== location.href) {
									runAllScripts();
									url = location.href;
								}
							});
						},
						true
					);
				};

				const initializeAllSliders = () => {
					const allSliders = document.querySelectorAll('[data-type="slider"]');
					allSliders.forEach((slider) => {
						initializeSlider(slider);
					});
				};

				const initializeSlider = (slider) => {
					const slides = slider.querySelectorAll('[data-type="slide"]');
					const middle = Math.ceil(slides.length / 2);
					let currentSlide = middle;

					const nextSlideBtns = document.querySelectorAll(
						'[data-action="nextSlide"]'
					);
					const previousSlideBtns = document.querySelectorAll(
						'[data-action="previousSlide"]'
					);

					const changeSlide = (slideIndex, action) => {
						currentSlide = slideIndex;

						switch (action) {
							case "next":
								slideIndex === slides.length
									? (currentSlide = 1)
									: currentSlide++;
								break;
							case "previous":
								slideIndex === 1
									? (currentSlide = slides.length)
									: currentSlide--;
						}

						const slide = slides[0];
						if (!slide) {
							console.error("No slides present");
							return;
						}
						const style = window.getComputedStyle(slide);
						slideWidth =
							parseInt(style.width) +
							parseInt(style.marginLeft) +
							parseInt(style.marginRight);
						const transformValue = -slideWidth * (currentSlide - middle);

						slider.style.transform = `translateX(${transformValue}px)`;
					};

					previousSlideBtns.forEach((btn) => {
						btn.addEventListener("click", () =>
							changeSlide(currentSlide, "previous")
						);
					});

					nextSlideBtns.forEach((btn) => {
						btn.addEventListener("click", () =>
							changeSlide(currentSlide, "next")
						);
					});
				};

				runAllScripts();
			};
		</script>
	</body>
</html>
