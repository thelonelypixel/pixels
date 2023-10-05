<?php if( get_field('accessibility_widget', 'option') ): ?>

	<div class="focus-overlay">
		<div class="focus-bar"></div>
	</div>

	<a href="#scroll-to" class="skip-link button">Skip to Content</a>
	<a href="#navbar" class="skip-link button">Skip to Navigation</a>
    <a href="#accessibilityBtn" class="skip-link button">Skip to Accessibility Options</a>
    <a href="#site-footer" class="skip-link button">Skip to Footer</a>

	<div x-data="{ open: false }" class="accessibility">
		<button @click="open = true" :aria-expanded="open.toString()" id="accessibilityBtn">
			<svg id="fi_7118029" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg">
				<g>
					<path d="m256 112c30.9 0 56-25.1 56-56s-25.1-56-56-56-56 25.1-56 56 25.1 56 56 56z"></path>
					<path d="m432 112.8-.5.1-.4.1c-1 .3-2 .6-3 .9-18.6 5.5-108.9 30.9-172.6 30.9-59.1 0-141.3-22-167.6-29.5-2.6-1-5.3-1.9-8-2.6-19-5-32 14.3-32 31.9 0 17.5 15.7 25.8 31.5 31.8v.3l95.2 29.7c9.7 3.7 12.3 7.5 13.6 10.8 4.1 10.6.8 31.6-.3 38.9l-5.8 45-32.1 176.3c-.1.5-.2 1-.3 1.5l-.2 1.3c-2.3 16.1 9.5 31.8 32 31.8 19.6 0 28.3-13.5 32-31.9 0 0 28-157.6 42-157.6s42.8 157.6 42.8 157.6c3.8 18.4 12.4 31.9 32 31.9 22.5 0 34.4-15.7 32-31.9-.2-1.4-.5-2.7-.8-4.1l-32.5-174.7-5.8-45c-4.2-26.2-.8-34.9.3-36.9 0 0 .1-.1.1-.2 1.1-2 6-6.5 17.5-10.8l89.3-31.2c.5-.1 1.1-.3 1.6-.5 16-6 32-14.3 32-31.9s-13-37-32-32z"></path>
				</g>
			</svg>
		</button>

		<!-- Accessibility Controls Modal -->
		<div x-show="open" class="accessibility-modal" role="dialog" aria-modal="true" id="accessibilityModal">
			<div class="accessibility-modal__content">
				<h2>Accessibility</h2>
				<!-- Close Button -->
				<button @click="open = false" id="closeBtn" aria-label="Close Accessibility Options">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
						<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
					</svg>
				</button>

				<fieldset>

					<legend>Options</legend>

					<!-- Font Size Option -->
					<div class="option">
						<div class="toggle">
						<input type="checkbox" id="largeTextToggle" class="visually-hidden" aria-labelledby="largeTextHeading" aria-describedby="largeTextDescription">
						<label for="largeTextToggle">
							<span class="slider"></span>
						</label>
						</div>
						<div class="description">
						<h3 id="largeTextHeading">Large Text</h3>
						<p id="largeTextDescription">Enable to increase the text size for improved readability.</p>
						</div>
					</div>

					<!-- High Contrast Option -->
					<div class="option">
						<div class="toggle">
						<input type="checkbox" id="highContrastToggle"  class="visually-hidden" aria-labelledby="highContrastHeading" aria-describedby="highContrastDescription">
						<label for="highContrastToggle">
							<span class="slider"></span>
						</label>
						</div>
						<div class="description">
						<h3 id="highContrastHeading">High Contrast</h3>
						<p id="highContrastDescription">Enable to use a high-contrast color scheme for better visibility.</p>
						</div>
					</div>

					<!-- Disable Animations Option -->
					<div class="option">
						<div class="toggle">
						<input type="checkbox" id="disableAnimationsToggle"  class="visually-hidden" aria-labelledby="disableAnimationsHeading" aria-describedby="disableAnimationsDescription">
						<label for="disableAnimationsToggle">
							<span class="slider"></span>
						</label>
						</div>
						<div class="description">
						<h3 id="disableAnimationsHeading">Disable Animations</h3>
						<p id="disableAnimationsDescription">Enable to stop animations that might be distracting or cause discomfort.</p>
						</div>
					</div>

					<!-- ADHD Focus Mode -->
					<div class="option">
						<div class="toggle">
							<input type="checkbox" id="adhdFocusToggle"  class="visually-hidden" aria-labelledby="adhdFocusHeading" aria-describedby="adhdFocusDescription">
							<label for="adhdFocusToggle">
								<span class="slider"></span>
							</label>
						</div>
						<div class="description">
							<h3 id="adhdFocusHeading">ADHD Focus Mode</h3>
							<p id="adhdFocusDescription">Enable to add a focus bar that moves as you scroll, aiding concentration.</p>
						</div>
					</div>

				</fieldset>

			</div>
		</div>

	</div>

<?php endif; ?>