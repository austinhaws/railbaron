import jss from 'jss'
import preset from 'jss-preset-default'
import AppStyles from "../../Components/app/AppStyles";

jss.setup(preset());

const {classes} = jss.createStyleSheet({
	'@global': {
		body: {
			backgroundColor: '#2079b1',
		},
	},
	...AppStyles,
}).attach();

export default classes;
