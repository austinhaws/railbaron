const CONTEXT_URL = {
	LOCAL: 'http://localhost/railbaron/server/graphql.php',
	DEV: 'https://???/graphql',
	AT: 'https://???/graphql',
	PROD: 'https://rpggenerator.com/railbaronGQL/graphql.php',
};

export default (
	// *** uncomment the following line if running webservice locally ***
	document.location.hostname.includes('localhost') ? CONTEXT_URL.LOCAL
	// document.location.hostname.includes('localhost') ? CONTEXT_URL.DEV
		// an ip also goes to dev (cloud environment without DNS)
		: (document.location.hostname.match(/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$/)) ? CONTEXT_URL.DEV
			: (document.location.hostname.includes('.dev.')) ? CONTEXT_URL.DEV
				: (document.location.hostname.includes('.at.')) ? CONTEXT_URL.AT
					: CONTEXT_URL.PROD
);
