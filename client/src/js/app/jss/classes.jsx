import jss from 'jss'
import preset from 'jss-preset-default'
import AppStyles from "../../Components/app/AppStyles";
import HeaderStyles from "../../components/header/HeaderStyles";

jss.setup(preset());

const {classes} = jss.createStyleSheet({
	'@global': {
		body: {
			backgroundColor: '#2079b1',
            margin: 0,
            padding: 0,
		},
	},
	...AppStyles,
	...HeaderStyles,
}).attach();

export default classes;
