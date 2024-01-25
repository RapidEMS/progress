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