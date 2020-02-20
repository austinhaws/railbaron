import jss from 'jss'
import preset from 'jss-preset-default'
import AppStyles from "../../Components/app/AppStyles";
import HeaderStyles from "../../components/header/HeaderStyles";
import PlayersStyles from "../../components/players/PlayersStyles";
import HomeStyles from "../../components/home/HomeStyles";
import SyncGameStyles from "../../components/syncgame/SyncGameStyles";

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
    ...HomeStyles,
    ...PlayersStyles,
    ...SyncGameStyles,
}).attach();

export default classes;
