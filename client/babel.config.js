module.exports = function(api) {
	api.cache(false);
	return {
		"presets": [
			[
				"@babel/preset-env",
				{
					"useBuiltIns": "entry",
					"corejs": 3,
				}
			],
			"@babel/preset-react"
		],
		"plugins": [
            ["@babel/plugin-proposal-decorators", { "legacy": true }],
			"@babel/plugin-proposal-class-properties",
			"@babel/plugin-proposal-object-rest-spread",
        ]
	};
};
