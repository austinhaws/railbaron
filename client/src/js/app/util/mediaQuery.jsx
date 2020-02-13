// sizes copied from: https://github.com/contra/react-responsive
export default {
	desktopOrLaptop: {query: '(min-device-width: 1224px)'},
	isBigScreen: {query: '(min-device-width: 1824px)'},
	isMobile: {query: '(max-width: 670px)'},
	isTabletOrMobile: {query: '(max-width: 1224px)'},
	isTabletOrMobileDevice: {query: '(max-device-width: 1224px)'},
	isPortrait: {query: '(orientation: portrait)'},
	isRetina: {query: '(min-resolution: 2dppx)'},
};
