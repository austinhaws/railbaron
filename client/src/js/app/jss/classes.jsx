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
        input: {
            height: '33px',
            width: 'calc(100% - 16px)',
            fontSize: '1.75em',
            padding: '3px 8px',
            textAlign: 'center',
        },
        select: {
            height: '45px',
            width: '100%',
            fontSize: '1.75em',
            textAlignLast: 'center',
        }
    },
	...AppStyles,
	...HeaderStyles,
    ...HomeStyles,
    ...PlayersStyles,
    ...SyncGameStyles,
}).attach();

export default classes;
