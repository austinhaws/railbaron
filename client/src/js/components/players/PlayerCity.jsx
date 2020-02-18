import React, {useContext} from 'react';
import ClassesContext from "../../app/jss/ClassesContext";
import Icon from "../../misc/Icon";
import PropTypes from "prop-types";

const propTypes = {
    player: PropTypes.object.isRequired,
    whichCity: PropTypes.string.isRequired,
    showDice: PropTypes.bool.isRequired,
    iconSide: PropTypes.oneOf(['right', 'left']).isRequired,
};
const defaultProps = {};

const PlayerCity = ({player, whichCity, showDice, iconSide}) => {
    const classes = useContext(ClassesContext);
    const city = player[`${whichCity}City`];

    return (
        <div className={classes.player_city__container}>
            <div className={classes.player_city__container__name}>
                {city.name}
            </div>
            <div className={classes.player_city__container__pencil}>
                {Icon.pencil()}
            </div>
            {
                showDice ?
                    <div className={classes.player_city__container__dice}>Icon.dice</div> :
                    undefined
            }
        </div>
    );
};

PlayerCity.propTypes = propTypes;
PlayerCity.defaultProps = defaultProps;

export default PlayerCity;
